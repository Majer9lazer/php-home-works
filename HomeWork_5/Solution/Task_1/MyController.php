<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 08.01.2019
 * Time: 9:34
 */

namespace DependencyInjection;
require_once "MyModel.php";

class MyController
{
    private $model_;

    public function __construct(MyModel $model)
    {
        $this->model_ = $model;
    }

    public function getAllRecords()
    {
        return $this->model_->getAllRecordsModel();
    }
}