<?php

namespace ymobiz\components;

use yii\base\Component;

/**
 * @inheritdoc
 */
class ymoArray extends Component
{
	private static $output = [];
	
	// Find the value of a Key
	public static function searchKey($haystack, $needle){
		if(is_array($haystack)){
			foreach($haystack as $key => $value){
				if($key == $needle){
					static::$output = $value;
				}elseif(is_array($value)){
					static::$output = static::searchKey($value, $needle);
				}
			}
		}
		return static::$output;
	}
	
	// Find the Key that matches the Value
	public static function searchValue($haystack, $needle){
		if(is_array($haystack)){
			foreach($haystack as $key => $value){
				if($key == $needle){
					static::$output = $value;
				}elseif(is_array($value)){
					static::$output = static::searchValue($value, $needle);
				}
			}
		}
		return static::$output;
	}
	
	// Destroy Key and Value
	public static function searchAndDestroy($haystack, $needle){
		if(is_array($haystack)){
			foreach($haystack as $key => $value){
				if($key == $needle){
					unset($key);
				}elseif(is_array($value)){
					static::$output[$key] = static::searchAndDestroy($value, $needle);
				}else{
					static::$output[$key] = $value;
				}
			}
		}
		return static::$output;
	}
	
	// Rename Key
	public static function searchAndRename($haystack, $needle, $new){
		if(is_array($haystack)){
			foreach($haystack as $key => $value){
				if($key == $needle){
					static::$output[$new] = $value;
				}elseif(is_array($value)){
					static::$output[$key] = static::searchAndRename($value, $needle, $new);
				}else{
					static::$output[$key] = $value;
				}
			}
		}
		return static::$output;
	}
	
}