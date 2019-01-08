<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 08.01.2019
 * Time: 12:09
 */
require_once "serialize.php";
require_once "unserialize.php";
serializeObj($IPhone);
$obj = deserializeObj();
echo $obj->printPhone();
?>
