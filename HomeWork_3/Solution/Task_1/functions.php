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

/**
 * @param $login
 * @param $password
 * we use here user_credentials to set cookie in json
 * encoded;
 */
function rememberUser($login, $password, $rememberMe)
{
    $user_cred = json_encode(['login' => $login
        , 'password' => $password, 'remember_me', $rememberMe], JSON_UNESCAPED_UNICODE);
    setcookie('user_credentials', $user_cred, time() * 60 * 15);
}

function isAuthorized()
{
    if (isset($_SESSION['user_login']) && !empty($_SESSION['user_login']))
        return $_SESSION['user_login'];
    else
        return "not_set";

}

function userSessionExists()
{

    if (isset($_SESSION['user_login'])) {
        if (!empty($_SESSION['user_login'])) {
            return 'exists';
        } else {
            return 'not exists';
        }
    } else {
        return 'not set';
    }
}

function userCookiesCheck()
{
    if (isset($_COOKIE['user_login'])) {
        if (!empty($_COOKIE['user_login'])) {
            return 'exists';
        } else {
            return 'not exists';
        }
    } else {
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
            $response['message'] = $res;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Данный пользователь с таким логином уже существует';
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
        array_push($response['errors'],'Поле login не должно быть пустым');
        $response['status'] = 'error';
    }

    if (empty($password)) {
        array_push($response['errors'],'Поле password не должно быть пустым');
        $response['status'] = 'error';
    }
    return $response;
}


/**
 * @param $userLogin
 * @return bool
 */
function userExists($userLogin)
{
    $user = db()->prepare('SELECT COUNT(id) FROM `user` WHERE user_name = ?');
    $user->execute([$userLogin]);
    return ($user->fetchAll()['0']['COUNT(id)']) >= 1;
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
