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

function addCountryTask2($countryName)
{

    $check = CheckCountry($countryName, true);
    if ($check['status'] === 'success') {
        addToDb($countryName, true);
        $check['message'] = 'Страна была добавлена усшено! проверте её в выпадающем списке)';
    }
    return $check;
}

/**
 * @param bool $isTask2
 * @return array
 */
function getAllCountries($isTask2 = false)
{
    if ($isTask2 === true)
        return file(DB_PATH_TASK_2, FILE_SKIP_EMPTY_LINES);
    else
        return file(DB_PATH, FILE_SKIP_EMPTY_LINES);
}

function CheckCountry($countryName, $isTask2 = false)
{
    $response = ['status' => 'success', 'message' => ''];
    if (!empty($countryName)) {
        if ($isTask2 === true) {
            $data = getCountriesFromDictionary();
            if (in_array($countryName, $data) === true) {
                $data = getAllCountries(true);

                if (in_array($countryName, $data) === true) {
                    $response['status'] = 'danger';
                    $response['message'] = 'Данная страна уже существует';
                } else {
                    $response['status'] = 'success';
                    $response['message'] = '';
                }

            } else {
                $response['status'] = 'danger';
                $response['message'] = 'Данной страны не существует в списке стран';
            }
        } else {
            $data = getAllCountries();
            if (in_array($countryName, $data) === true) {
                $response['status'] = 'danger';
                $response['message'] = 'Данная страна уже существует';
            } else {
                $response['status'] = 'success';
            }
        }
    } else {
        $response['status'] = 'danger';
        $response['message'] = 'Значение пришло пустым';
    }

    return $response;
}

function addToDb($countryName, $isTask2 = false)
{
    if ($isTask2 === true)
        file_put_contents(DB_PATH_TASK_2, $countryName, FILE_APPEND);
    else
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