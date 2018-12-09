<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 07.12.2018
 * Time: 20:27
 */
require_once "base.php";

/**
 * @param $countryName
 */
function addCountry($countryName)
{
    /**
     * @var array $data
     * @static array $response
     */
    static $response = ['status' => 'success', 'error' => ''];
    $data = getAllCountries();
    if (in_array($countryName, $data) === true) {
        $response['status'] = 'error';
        $response['error'] = 'Данная страна уже существует';
    } else {
        echo 'doesn\'t exist';
    }

    return $response;
}

/**
 * @return array
 */
function getAllCountries()
{
    return explode(DELIMITER, file_get_contents(DB_PATH));
}

function getCountry()
{
    return $_GET['countryName'];
}
