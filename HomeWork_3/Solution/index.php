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
    <title> Title</title>

    <style>
        .marketing {
            margin-bottom: 1.5rem;
            text-align: center;
        }
    </style>
    <?php
    require_once 'styles.php';
    require_once 'functions.php';
    $images = getImages();
    ?>
</head>
<body>
<?php
require_once "nav.php"; ?>
<main role="main" class="container-fluid">
    <div class="jumbotron text-center">
        <h1>Pictures</h1>
        <p>Under will be list of pictures</p>
    </div>

</main>

<div class="container marketing">
    <div class="row">
        <?php foreach ($images as $image): ?>
            <div class="col-lg-4">
                <img class="rounded-circle"
                     src="<?= $image['imagepath']; ?>"
                     alt="<?php echo $image['name']; ?>" width="140" height="140">
                <h2><?php echo $image['name']; ?></h2>
                <p><?php echo $image['description']; ?></p>
                <!--                <p><a class="btn btn-secondary" href="#" role="button">-->
                <!--                        View details »</a></p>-->
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
<?php
require_once "scripts.php";
?>
</html>