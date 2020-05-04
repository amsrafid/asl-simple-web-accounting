<?php

/**
 * Session handling class
 */
class Session {

	/**
	 * Session constrictor
	 */
	public function __construct() {
		if (session_status() == PHP_SESSION_NONE )
			session_start();
	}

	/**
	 * Get Data from session
	 * 
	 * @param string $key			Key of session array
	 * 
	 * @return mixed
	 */
	public static function get($key)
	{
		return isset($_SESSION[$key]) ? $_SESSION[$key] : "";
	}

	/**
	 * Write Data to session
	 * 
	 * @param string $key			Key of session array
	 * @param string $value		Key value that to be saved into session variable
	 * 
	 * @return bool
	 */
	public static function put($key, $value)
	{
		$_SESSION[$key] = $value;
		return true;
	}
	
	/**
	 * Call static magic method
	 */
	public static function __callStatic($method, $argument)
	{
		return self::get($method);
	}

}
