<?php

namespace myclass;

use \library\houses\House as LibraryHouse;

require 'class1.php';
require 'class2.php';
require 'class2_houses.php';

$x = 444;

$libraryHouse = new LibraryHouse();

$class1 = new House($x);
$class1->example($libraryHouse);

echo '<br><br>varibale: ';
var_dump(isset($class1->variable));
var_dump($class1->setVariable());

echo '<br>--------------';
// unset($class1);

$class2 = new \library\House();
$class3 = new LibraryHouse();









