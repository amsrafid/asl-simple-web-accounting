<?php

class Model
{
	/**
	 * All data into table
	 * 
	 * @return array|bool
	 */
	public static function all()
	{
		return File::read(self::tableName());
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
		$table = self::all();
		$table[self::primaryKey()] = $accounts;

		return File::write(self::tableName(), $table) ? true : false;
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
		$file = File::read(self::tableName());
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
	public static function update($accounts, $key = null)
	{
		if($key) {
			$table = self::all();
			$table[$key] = $accounts;
			return File::write(self::tableName(), $table) ? true : false;
		} else
			return File::write($table, $accounts) ? true : false;
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

	/**
	 * Get model related table name
	 * 
	 * @return string
	 */
	private static function tableName()
	{
		$class = get_called_class();
		return $class::$table;
	}

	private static function primaryKey()
	{
		$table = self::all();
		if(!empty($table)) {
			$keys = array_keys($table);
			return $keys[count($keys) - 1] + 1;			
		} else
			return '1';
	}

}
