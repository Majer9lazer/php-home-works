<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.12.2018
 * Time: 17:01
 */
const USERNAME_DB = 'root';
const DSN = 'mysql:dbname=site_03;host=127.0.0.1';
const PASSWORD = '';
function db()
{
    return new PDO(DSN, USERNAME_DB, PASSWORD);
}

function TestDb()
{
    $data = (db()->prepare('select * from users ')->fetchAll());

    var_dump($data);
}
