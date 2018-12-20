<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 20.12.2018
 * Time: 17:03
 */
$resp = ['status' => 'success', 'message' => 'good'];
$resp['post'] = json_encode($_POST);
$resp['files'] = json_encode($_FILES);
if (isset($_POST['submit'])) {
    $resp['message'] = 'Initialized';
    $resp['submitVal'] = $_POST['submit'];
}

if (isset($_FILES['uploadPicture'])) {
    $resp['uploadPicture'] = 'picture was uploaded';
    $resp['imageVal'] = $_FILES['uploadPicture'];
}
echo json_encode($resp);
