<?php

echo '<pre>';

require 'interface.php';
require 'parent.php';

trait MyFirstTrait {
	//const XY = 3;
	
	protected $xy = 3;
	public static $xyz;
	
	public function hiddenMethod()
	{
		echo "I'm here! $this->xy<br>";
	}
}

class MyFirstClass extends ParentMyFirstClass
{
	use MyFirstTrait;
	
	// public / protected / private
	public $x;
	public $y;
	
	function __construct($x, $y) 
	{
		$this->x = $x;
		$this->y = $y;
	}
	
	// public / protected / private
	public function method()
	{
		echo 'THIS METHOD<br>';
	}
	
	protected function protectedMethod()
	{
		echo 'THIS is protected METHOD<br>';
	}
	
	public function second()
	{
		
	}
	
	public static function firstStatic()
	{
		echo 'first_static<br>';
	}
}

$class = new MyFirstClass(5, 'simple text');
$class->method();
// $class->protectedMethod();
$class->first();
$class->hiddenMethod();
MyFirstClass::firstStatic();
echo 'xyz = ' . MyFirstClass::$xyz;


var_dump($class);

echo 'OK<br>';