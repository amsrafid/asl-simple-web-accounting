<?php 

/**
 * Array handling Class
 */
class Arr{

	/**
	 * Check key is exists or not
	 * 
	 * @param array		$arr 			Given array
	 * @param string	$key 			Key that to be checked into $arr
	 * @param string	$default 	if key is not found into array
	 * 
	 * @return mixed
	 */
	public static function has($arr, $key, $defaut = '')
	{
		return isset($arr[$key]) ? $arr[$key] : $defaut;
	}

}
