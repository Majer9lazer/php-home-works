<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 08.01.2019
 * Time: 9:35
 */
namespace DependencyInjection;

use PDO;

require_once "base.php";

class MyModel
{

    /**
     * @return array
     */
    public function getAllRecordsModel()
    {
        return $this->pdo()->query('select * from cars')->fetchAll();
    }

    private function pdo()
    {
        return new PDO(DSN, DB_USERNAME, DB_PASSWORD);
    }
}