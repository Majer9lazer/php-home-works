<?php
/**
 * Created by PhpStorm.
 * User: YSidoren
 * Date: 20.12.2018
 * Time: 17:03
 */
require_once "../base.php";
function return_bytes($val)
{
    $val = trim($val);

    $last = strtolower($val[strlen($val) - 1]);
    $val = (int)$val;

    switch ($last) {
        case 'g':
            $val *= 1024;
            break;
        case 'm':
            $val *= 1024;
            break;
        case 'k':
            $val *= 1024;
            break;
    }

    return $val;
}

function getResponse()
{
    $available_types = ['image/gif', 'image/png', 'image/jpeg', 'image/jpg'];
    $resp = ['status' => 'success', 'message' => 'good'];
    try {
        if (!empty($_FILES['uploadPicture'])) {
            if ($_FILES['uploadPicture']['error'] === UPLOAD_ERR_INI_SIZE) {
                $resp['status'] = 'error';
                $resp['message'] = 'Вы превысили максимальный размер загрузки файлов.';
            } else {
                $errorCode = $_FILES['uploadPicture']['error'];
                if (in_array($_FILES['uploadPicture']['type'], $available_types)) {
                    $fileName = $_FILES['uploadPicture']['name'];
                    $filePath = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $fileName;
                    $fileSize = $_FILES['uploadPicture']['size'];
                    $resp['file-size'] = $fileSize;
                    move_uploaded_file($_FILES['uploadPicture']['tmp_name'], $filePath);
                    $addToDbResp = addToDb($fileName, $fileSize, 'images' . DIRECTORY_SEPARATOR . $fileName, 'Test description');
                    if ($addToDbResp['status'] === 'success') {
                        if ($addToDbResp['executing_result'] === true) {
                            move_uploaded_file($_FILES['uploadPicture']['tmp_name'], $filePath);
                            $resp['status'] = 'success';
                            $resp['message'] = 'Файл с названием ' . $fileName . ' был загружен успешно!';
                        } else {
                            $resp['status'] = 'error';
                            $resp['message'] = 'Произошла неизвестная ошибка ';
                        }
                    } else {
                        $resp['status'] = 'error';
                        $resp['message'] = $addToDbResp['message'];
                    }
                } else {
                    $resp['status'] = 'error';
                    $resp['message'] = 'Запрещённый тип файла. Попробуйте другой файл';
                }
                $resp['file_error'] = $errorCode === UPLOAD_ERR_INI_SIZE ? 'Размер оказался больше чем надо' : $errorCode === UPLOAD_ERR_OK ? 'Ошибок при загрузке со стороны системы не обнаружено.' : 'Неизвестная ошибка. Код ошибки : '
                    . $_FILES['uploadPicture']['error'];
            }
        } else {
            $resp['status'] = 'warning';
            $resp['message'] = 'Либо пусто либо превышен размер на закачку фотографийю';
        }
    } catch (Exception $exception) {
        $resp['message'] = $exception;
    }


    return json_encode($resp, JSON_UNESCAPED_UNICODE);
}

function addToDb($name, $size, $imagePath, $description)
{
    $resp = [];
    try {
        $statement = db()->prepare('insert into `pictures` (name, size, imagepath, description) values(?,?,?,?)');
        $resp['status'] = 'success';
        $resp['executing_result'] = $statement->execute([$name, (int)$size, $imagePath, $description]);
    } catch (PDOException $pdoException) {
        $resp['message'] = $pdoException;
    }

    return $resp;
}

function imageExists($name)
{
    $image = db()->prepare('SELECT COUNT(id) FROM pictures WHERE name = ?');
    $image->execute([$name]);

    return ($image->fetchAll()['0']['COUNT(id)']) >= 1;
}

function getImageExistsResponse($fileName, $filePath)
{
    if (imageExists($fileName) === true) {

        $resp['status'] = 'success';
        $resp['message'] = 'Файл с названием ' . $fileName . ' был загружен успешно!';
    } else {
        $resp['status'] = 'error';
        $resp['message'] = 'Данный файл с таким именем уже существует!';
    }
    return $resp;
}