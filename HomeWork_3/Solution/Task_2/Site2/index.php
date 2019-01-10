<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 17.12.2018
 * Time: 10:35
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Home </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .marketing {
            margin-bottom: 1.5rem;
            text-align: center;
        }
    </style>
    <?php

    require_once '../Site2/functions_Task2.php';
    $images = getImages();
    ?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?pageName=index">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../Task_1/register.php?pageName=register">Register</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pages/upload.php?pageName=upload">Upload</a>
            </li>
        </ul>
    </div>
</nav>
<main role="main" class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Pictures
            <span class="badge badge-primary">
                <?= imagesCount(); ?></span></h1>
        <p>Under will be list of pictures</p>
        <h3></h3>
    </div>
</main>

<div class="container marketing">
    <div class="row">
        <?php foreach ($images as $image): ?>
            <div class="col-lg-4">
                <img class="rounded-circle"
                     src="<?= $image['imagepath']; ?>"
                     alt="<?php echo $image['name']; ?>"
                     width="64" height="64">
                <h2><?php echo $image['name']; ?></h2>
<!--                <p>--><?php //echo $image['description']; ?><!--</p>-->
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
<script src="../../jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

</html>