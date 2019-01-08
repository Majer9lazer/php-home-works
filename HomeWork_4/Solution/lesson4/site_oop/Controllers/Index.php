<?php

namespace Controllers;

use \Database\Engine as DB;
use \Models\Category;

class Index extends Base
{
	public function index()
	{
		
		$result = Category::find(['is_visible=true']);
		var_dump($result);
		exit();
		
		$this->view('index', [
			'categories' => [],
		]);
	}
}
