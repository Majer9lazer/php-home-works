<?php

abstract class ParentMyFirstClass implements MyFirstInterface
{
	public function first()
	{
		echo 'FIRST<br><br>';
	}
	
	abstract public function second();
}
