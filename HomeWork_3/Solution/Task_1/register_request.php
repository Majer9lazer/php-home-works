<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 08.01.2019
 * Time: 14:42
 */
require_once "functions.php";
$userLogin = $_POST['user_login'];
$userPassword = $_POST['user_password'];
echo json_encode(tryRegister($userLogin, $userPassword), JSON_UNESCAPED_UNICODE);