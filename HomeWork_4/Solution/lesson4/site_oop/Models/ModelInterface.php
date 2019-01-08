<?php

namespace Models;

interface ModelInterface 
{
	public static function find(array $params);

	public static function findFirst();
	
	public static function save();
}
