<?php

namespace myclass;

use \library\houses\House as LibraryHouse;

class House
{
	function __construct(int $x)
	{
		echo 'myclass ' . $x . ' ' . gettype($x) . '<br>';
	}
	
	function __destruct() 
	{
		echo 'DELETED :( <br>';
	}
	
	function example(LibraryHouse $libraryHouse) 
	{
		print_r(get_object_vars($libraryHouse));
		print_r(get_class_vars(get_class($libraryHouse)));
		
		$libraryHouse->example();
	}
	
	function __get($name)
	{
		echo "EMPTY $name";
		
		return $name;
	}
	
	function __call( string $name , array $arguments )
	{
		
		return null;
	}
}
