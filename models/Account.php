<?php

/**
 * Account model
 */
class Account
{

	/**
	 * Accounts Table
	 * 
	 * @var string
	 */
	private static $accountTable = 'data/account.json';

	/**
	 * All data into table
	 * 
	 * @return array|bool
	 */
	public static function all()
	{
		return File::read(self::$accountTable);
	}
	
	/**
	 * get single Account data
	 * 
	 * @param int		$id		Account number
	 * 
	 * @return array|bool	
	 */
	public static function find($id)
	{
		$file = File::read(self::$accountTable);
		if(isset($file[$id]))
			return $file[$id];
		else
			return false;
	}

}
