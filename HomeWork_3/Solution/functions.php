<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 19.12.2018
 * Time: 13:47
 */
require_once 'base.php';
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

/**
 * @param $userLogin
 * @param $userPassword
 * @return array
 */
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


/**
 * @param $userLogin
 * @return bool
 */
function userExists($userLogin)
{
    $user = db()->query('select * from `user` where user_login like ' . $userLogin . ' limit 1');

    if (!empty($user))
        return true;

    return false;
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
