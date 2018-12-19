<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.12.2018
 * Time: 17:01
 */
require_once 'styles.php';
require_once 'functions.php';
$response = ['status' => 'success', 'message' => '', ''];
?>
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
    }

    .form-signin .checkbox {
        font-weight: 400;
    }

    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
    }

    .form-signin .form-control:focus {
        z-index: 2;
    }

    .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }

</style>
<body class="text-center">
<form class="form-signin">
    <img class="mb-4" src="images/log_in.png" alt="" width="64" height="64">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="">
    <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <a href="index.php" class="btn btn-lg btn-primary btn-block" type="button">Main menu</a>
    <div class="mt-2 alert alert-<?= $response['status'] ?> alert-dismissible fade <?= getAlertBlock($response) ?>"
         role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Внимание!</strong><?= $response['message'] ?>
    </div>
    <p class="mt-5 mb-3 text-muted">© 2017-<?= date('Y'); ?></p>

</form>
</body>
<?php
require_once 'scripts.php'; ?>

