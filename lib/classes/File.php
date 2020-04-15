<?php

/**
 * File system Class
 * 
 * @method public static get()
 * @method public static put()
 */
class File
{

	/**
	 * Get array data from given url
	 * 
	 * @param string 	$url		File directory
	 * 
	 * @return array
	 */
	public static function read($url)
	{
		return json_decode(file_get_contents($url), true);
	}

	/**
	 * Put data into given url
	 * 
	 * @param string 	$url		File with directory
	 * @param array 	$data		Data to be stored into file
	 * 
	 * @return bool
	 */
	public static function write($url, $data)
	{
		if(file_put_contents($url, json_encode($data)))
			return true;
		
		return false;
	}
	
}
