<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 08.01.2019
 * Time: 11:53
 */
require_once "Phone.php";
$IPhone = new Phone();
/** @var Phone $IPhone */
$IPhone->id = rand(1, getrandmax());
$IPhone->Name = "IPHONE 6";
$IPhone->IMEI = '444584102205454';
$IPhone->OSVersion = 'IOS ' . mt_rand(6, 12);

function serializeObj($data)
{
    file_put_contents('serialize.dat', serialize($data));
}
