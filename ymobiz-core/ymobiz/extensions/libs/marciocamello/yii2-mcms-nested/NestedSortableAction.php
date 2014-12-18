<?php

namespace mcms\nested;

use yii\base\Action;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;

class NestedSortableAction extends Action
{
	public $modelclass;
	public $scenario='';

	public function run()
	{
		// Get the JSON string
		$jsonstring = $_GET['jsonstring'];
        $params = $_GET['params'];

        //if(\Yii::$app->request->isAjax){
            if(isset($jsonstring))
            {

                // Decode it into an array
                $jsonDecoded = json_decode(preg_replace('/("\w+"):(\d+(\.\d+)?)/', '\\1:"\\2"', $jsonstring), true);

                // Run the function above
                $readbleArray = $this->parseJsonArray($jsonDecoded);

                // Loop through the "readable" array and save changes to DB
                foreach ($readbleArray as $key => $value) {

                    // $value should always be an array, but we do a check
                    if (is_array($value)) {

                        $modelclass=$this->modelclass;
                        $model= $modelclass::find()->where([
                            'id' => $value['id']
                        ]);

                        foreach($model->all() as $modelUnique)
                        {
                            if(isset($params) && $params!='false')
                            {
                                $jsonParams = json_decode(preg_replace('/("\w+"):(\d+(\.\d+)?)/', '\\1:"\\2"', $params), true);


                                if($jsonParams['multiple']==true)
                                {
                                    $modelUniqueRecord= $modelclass::find()->where([
                                        'unique_id' => $modelUnique->unique_id
                                    ]);

                                    foreach($modelUniqueRecord->all() as $modelUniq)
                                    {
                                        if($this->scenario){
                                            $modelUniq->setScenario($this->scenario);
                                        }

                                        $modelUniq->order = $key;
                                        $modelUniq->parent = $value['parentID'];
                                        $modelUniq->save(false);
                                    }
                                }

                            }else{

                                if($this->scenario){
                                    $modelUnique->setScenario($this->scenario);
                                }

                                $modelUnique->order = $key;
                                $modelUnique->parent = $value['parentID'];
                                $modelUnique->save(false);
                            }
                        }
                    }
                }
            }

            // Echo status message for the update
            echo \Yii::t('app',"The list was updated ").date("y-m-d H:i:s")."!";
        //}
	}

	public function parseJsonArray($jsonArray, $parentID = 0)
	{
		$return = array();
		foreach ($jsonArray as $subArray) {
			$returnSubSubArray = array();
			if (isset($subArray['children'])) {
				$returnSubSubArray = $this->parseJsonArray($subArray['children'], $subArray['id']);
			}
			$return[] = array('id' => $subArray['id'], 'parentID' => $parentID);
			$return = array_merge($return, $returnSubSubArray);
		}

		return $return;
	}
}