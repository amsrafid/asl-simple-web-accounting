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
	 * Create new record
	 * 
	 * @param array $accounts		Account Data array
	 * 
	 * @return bool
	 */
	public static function create($accounts)
	{
		return File::write(self::$accountTable, $accounts) ? true : false;
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

	/**
	 * Update Account Table
	 * 
	 * @param array $data  Data Array
	 * 
	 * @return bool
	 */
	public static function update($accounts)
	{
		return File::write(self::$accountTable, $accounts) ? true : false;
	}

	/**
	 * Delete data from json Data
	 * 
	 * @param array $number  Key number
	 * 
	 * @return bool
	 */
	public static function delete($number)
	{
		if(self::find($number)) {
			$data = self::all();

			unset($data[$number]);

			return self::create($data);

		}
		return false;
	}

}
