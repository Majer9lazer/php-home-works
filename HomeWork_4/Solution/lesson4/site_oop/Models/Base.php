<?php

namespace Models;

use \Database\Engine as DB;

abstract class Base implements ModelInterface
{
	protected static $table;
	
	protected static $fields = [];
	
	public static function find(array $params)
	{
		$where = (is_array($params[0])) ? implode(' and ', $params[0]) : $params[0];
		
		$prepare = DB::init()->prepare(
			'SELECT ' . implode(',', static::$fields) . ' FROM ' 
			. static::$table . ' WHERE ' . $where
		);
		
		$prepare->execute();
		
		return $prepare->fetchAll();
	}

	public static function findFirst()
	{
		
	}
	
	public static function save()
	{
		
	}
}
