<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.12.2018
 * Time: 17:01
 */
const USERNAME_DB = 'root';
const DSN = 'mysql:dbname=testdb;host=127.0.0.1';
const PASSWORD = '';
function Db()
{
    return new PDO(DSN, USERNAME_DB, PASSWORD);
}
