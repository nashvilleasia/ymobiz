<?php

namespace ymobiz\helpers;

use ymobiz\auth\User;
use ymobiz\core\Security;
use yii\helpers\ArrayHelper;

class Password extends Security
{
	protected $resultEncrypt = false;
	protected $encryptedKey = false;
	
    /**
     * Wrapper for yii security helper method.
     *
     * @param $password
     * @return string
     */
    public function hash($password)
    {
        return \Yii::$app->security->generatePasswordHash($password,User::COST);
    }

    /**
     * Wrapper for yii security helper method.
     *
     * @param $password
     * @param $hash
     * @return bool
     */
    public function validate($password, $hash)
    {
        return \Yii::$app->security->validatePassword($password, $hash);
    }

    /**
     * Generates user-friendly random password containing at least one lower case letter, one uppercase letter and one
     * digit. The remaining characters in the password are chosen at random from those three sets.
     * @see https://gist.github.com/tylerhall/521810
     * @param $length
     * @return string
     */
    public function generate($length)
    {
        $sets = [
            'abcdefghjkmnpqrstuvwxyz',
            'ABCDEFGHJKMNPQRSTUVWXYZ',
            '23456789'
        ];
        $all = '';
        $password = '';
        foreach ($sets as $set) {
            $password .= $set[array_rand(str_split($set))];
            $all .= $set;
        }

        $all = str_split($all);
        for ($i = 0; $i < $length - count($sets); $i++) {
            $password .= $all[array_rand($all)];
        }

        $password = str_shuffle($password);

        return $password;
    }

    /**
     * Generates user-friendly random password containing at least one lower case letter, one uppercase letter and one
     * digit. The remaining characters in the password are chosen at random from those three sets.
     * @see https://gist.github.com/tylerhall/521810
     * @param $length
     * @return string
     */
    public function generateInt($length)
    {
        $password = '';

	    for($i = 0; $i < $length; $i++) {
	        $password .= mt_rand(0, 9);
	    }
	
	    return $password;
    }

    public function securityProtect($method,$value,$params=false)
    {
    	if(ArrayHelper::getValue($params, 'securityAction')=='encode'){
    		$this->encryptedKey = $value;
    	}else if(ArrayHelper::getValue($params, 'securityAction')=='decode'){
    		$this->encryptedKey = $method($value);
    	}else if($method=='custom'){
    		$this->encryptedKey = $this->$method($value,$params);
    	}

    	if(ArrayHelper::getColumn($params, 'compression') &&
    		ArrayHelper::getValue($params, 'compression')==true &&
    		ArrayHelper::getValue($params, 'securityAction')=='encode'){
    		
    			$this->resultEncrypt = $method($this->encryptCompress($this->encryptedKey));
    			
    	}else if(ArrayHelper::getValue($params, 'securityAction')=='decode'){
    		$this->resultEncrypt = $this->encryptUncompress($this->encryptedKey);
    	}else{
    		$this->resultEncrypt = $this->encryptedKey;
    	}
    	
    	return $this->resultEncrypt;
    }
    
    public function encryptCompress($data)
    {
    	return gzcompress(serialize($data));
    }
    
    public function encryptUncompress($data)
    {
    	return unserialize(gzuncompress($data));
    }
    
    public static function encode($value,$params=false){
    	if(ArrayHelper::getColumn($params, 'method')){
    		$method = ArrayHelper::getColumn($params, 'method');
    		return $method($value);
    	}
    }
    
    public static function decode($value,$params=false){
    	if(ArrayHelper::getColumn($params, 'method')){
    		$method = ArrayHelper::getColumn($params, 'method');
    		return $method($value);
    	}
    }
}
