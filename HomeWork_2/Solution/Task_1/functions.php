<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07.12.2018
 * Time: 20:27
 * @param $countryName
 */
function AddCountry($countryName){
    $fd = fopen(__DIR__."Country.txt", 'r');

    $data = readfile("Country.txt");
 echo $data;
    fclose($fd);
}
function getAllCountries(){

}