<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 08.01.2019
 * Time: 9:44
 */

use DependencyInjection\MyController;
use DependencyInjection\MyModel;

require_once "MyController.php";
$myController = new MyController(new MyModel());
echo json_encode($myController->getAllRecords());
?>