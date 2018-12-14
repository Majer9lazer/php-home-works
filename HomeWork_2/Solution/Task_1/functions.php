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
 * @return array
 */
function addCountry($countryName)
{
    $check = CheckCountry($countryName);
    if ($check['status'] === 'success') {
        addToDb($countryName);
        $check['message'] = 'Страна была добавлена усшено! проверте её выпадающем списке)';
    }
    return $check;
}

/**
 * @return array
 */
function getAllCountries()
{
    return file(DB_PATH, FILE_SKIP_EMPTY_LINES);
}

function CheckCountry($countryName)
{
    $response = ['status' => 'success', 'message' => ''];
    if (!empty($countryName)) {
        $data = getAllCountries();

        if (in_array($countryName, $data) === true) {
            $response['status'] = 'danger';
            $response['message'] = 'Данная страна уже существует';
        } else {
            $response['status'] = 'success';
        }
    } else {
        $response['status'] = 'danger';
        $response['message'] = 'Значение пришло пустым';
    }
    return $response;
}

function addToDb($countryName)
{
    file_put_contents(DB_PATH, $countryName . PHP_EOL, FILE_APPEND);
}

function getCountry()
{
    if (isset($_GET['countryName'])) {
        return $_GET['countryName'];
    }
    return null;
}

function getCountriesFromDictionary()
{
    return file(DIC_PATH, FILE_SKIP_EMPTY_LINES);
}