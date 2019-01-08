<?php

namespace Database;

use PDO;

class Engine 
{
	public static $connection;
	
	public static function init()
	{
		if (!self::$connection) {
			$dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET;
			
			self::$connection = new PDO($dsn, DB_USER, DB_PASS, [
				PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
				PDO::ATTR_EMULATE_PREPARES   => false,
			]);
		}
	
		return self::$connection;
	}
}
