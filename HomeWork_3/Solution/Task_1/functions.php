<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 19.12.2018
 * Time: 13:47
 */
require_once 'base.php';
session_start();

function getImageByName($imageName)
{
    $data = db()->query(
        'select * from pictures where name like '
        . $imageName . ' limit 1')->fetchAll();
    if (!empty($data)) {
        var_dump($data);
    }
    return new Exception('В обьект пришло нулевое значение ');
}
function userSessionExists(){

    if(isset($_SESSION['user_login'])){
        if(!empty($_SESSION['user_login'])){
            return 'exists';
        }else{
            return 'not exists';
        }
    }else{
        return 'not set';
    }
}
function userCookiesCheck(){
    if(isset($_COOKIE['user_login'])){
        if(!empty($_COOKIE['user_login'])){
            return 'exists';
        }else{
            return 'not exists';
        }
    }else{
        return 'not set';
    }
}
function register($userLogin, $userPassword)
{
    $response = ['status' => 'success', 'message' => '', 'errors' => []];

    if (!userExists($userLogin)) {
        $res = addUser($userLogin, $userPassword);
        if ($res === true) {
            $response['status'] = 'success';
            $response['message'] = 'Вы были зарегестрированы успешно!';
        } else {
            $response['status'] = 'error';
            array_push(
                $response['errors'],
                ['name' => 'user', 'description' => $res]);
        }
    } else {
        $response['status'] = 'error';
        array_push(
            $response['errors'],
            ['name' => 'user', 'description' => 'Данный пользователь уже существует']);
    }

    return $response;
}
function getAlertBlock($response = [])
{
    if ($response['status'] === 'danger') {
        return 'show';
    }
    return 'in';
}

/**
 * @return array
 */
function getImages()
{
    $data = db()->query('select * from pictures')->fetchAll();
    return $data;
}


function logIn()
{
    $response = ['status' => 'success', 'message' => ''];
    session_start();
    $userLogin = $_COOKIE['user_login'];
    if (isset($userLogin) && empty($userLogin)) {
        $response['message'] = 'Добро пожаловать ' . $userLogin . ' !';
    }
    return $response;
}
function tryRegister($login, $password)
{
    $checkResult = checkUser($login, $password);
    $registerResult = [];

    if ($checkResult['status'] === 'success') {
        $registerResult = register($login, $password);
    } else {
        $registerResult = $checkResult;
    }
    return $registerResult;
}

function checkUser($login, $password)
{
    $response = ['status' => 'success', 'message' => '', 'errors' => []];
    if (empty($login)) {
        $response['status'] = 'danger';
        array_push($response['errors'],
            ['name' => 'login', 'message' => 'Поле не должно быть пустым']);
    }

    if (empty($password)) {
        $response['status'] = 'danger';
        array_push($response['errors'],
            ['name' => 'password', 'message' => 'Поле не должно быть пустым']);
    }
    return $response;
}


/**
 * @param $userLogin
 * @return bool
 */
function userExists($userLogin)
{
    $user = db()->query('select * from `user` where user_login like ' . $userLogin . ' limit 1');
    return !empty($user);
}

/**
 * @param $userLogin
 * @param $userPassword
 * @return array|bool
 */
function addUser($userLogin, $userPassword)
{
    try {
        $res = db()->exec("insert into `user` (user_name, user_login, user_password) values ('$userLogin','$userLogin','$userPassword')");
        return true;
    } catch (Exception $ex) {
        return ['status' => 'error', 'message' => $ex];
    }
}
