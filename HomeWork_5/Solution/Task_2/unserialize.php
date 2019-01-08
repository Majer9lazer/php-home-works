<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 08.01.2019
 * Time: 12:02
 */
require_once "Phone.php";
function getData()
{
    return file_get_contents('serialize.dat');
}

function deserializeObj()
{
    return unserialize(getData());
}


?>