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
    $data = db()->prepare(
        'select * from pictures where name like ' . $imageName . ' limit 1')->fetchAll();
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