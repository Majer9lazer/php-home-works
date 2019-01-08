<?php

namespace Models;

class Category extends Base
{
	protected static $table = 'categories';
	
	protected static $fields = [
		'id', 'name', 'text', 'is_visible', 
		'sort_order', 'created_at', 'updated_at',
	];
}
