<?php

/**
 * Account model
 */
class Account extends Model
{
	/**
	 * Accounts Table
	 * 
	 * @var string
	 */
	protected static $table = 'data/account.json';

	/**
	 * 
	 */
	public static function create($accounts)
	{
		return File::write($table, $accounts) ? true : false;
	}
	
}
