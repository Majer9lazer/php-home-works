<?php

namespace Controllers;

use \Database\Engine as DB;

class Base
{
	function __construct()
	{
		session_start();
	}
	
	public function view($fileName, $data)
	{
		extract($data);
		require VIEW_PATH . $fileName . '.php';
	}
}
