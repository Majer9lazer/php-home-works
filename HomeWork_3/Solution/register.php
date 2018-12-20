<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.12.2018
 * Time: 17:01
 */
require_once 'styles.php';
require_once 'functions.php';

/**
 * @return array
 */
function tryRegister()
{
    $checkResult = checkUser();
    $registerResult = [];

    if ($checkResult['status'] === 'success') {
        $registerResult = register($_GET['inputLogin'], $_GET['inputPassword']);
    } else {
        $registerResult = $checkResult;
    }
    return $registerResult;
}

function checkUser()
{
    $response = ['status' => 'success', 'message' => '', 'errors' => []];

    if (!isset($_GET['inputLogin']) || empty($_GET['inputLogin'])) {
        $response['status'] = 'danger';
        array_push($response['errors'],
            ['name' => 'login', 'message' => 'Поле не должно быть пустым']);
    }
    if (!isset($_GET['inputPassword']) || empty($_GET['inputPassword'])) {
        $response['status'] = 'danger';
        array_push($response['errors'],
            ['name' => 'password', 'message' => 'Поле не должно быть пустым']);
    }
    return $response;
}

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
<?php $res = checkUser();
$registerResult = tryRegister();
?>
<form class="form-signin" method="get">
    <img class="mb-4" src="images/register.png" alt="" width="64" height="64">
    <h1 class="h3 mb-3 font-weight-normal">Try to register</h1>
    <label for="inputLogin" class="sr-only">Email address</label>
    <input type="email"
           id="inputLogin"
           name="inputLogin"
           class="form-control" placeholder="Email address will be yor login" required=""
           autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password"
           name="inputPassword"
           id="inputPassword" class="form-control" placeholder="Password" required="">

    <button class="btn btn-lg btn-primary btn-block" id="registerButton" type="submit">Register</button>
    <a href="index.php" class="btn btn-lg btn-primary btn-block" type="button">Main menu</a>

    <div class="mt-2 alert alert-<?= $res['status']; ?> alert-dismissible fade <?= getAlertBlock($res); ?>"
         role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Внимание!</strong>
        <?php foreach ($res['errors'] as $item): ?>
            <p>
                <b>Поле</b> - <?= $item['name']; ?>.
                <b>Error</b> - <?= $item['message']; ?>
            </p>

        <?php endforeach; ?>
    </div>
    <p class="mt-5 mb-3 text-muted">© 2017-<?= date('Y'); ?></p>

</form>

</body>
<?php
require_once 'scripts.php'; ?>
<script>
    $(document).ready(function (e) {
        let checkUserRes = '<?php echo $res['status'];?>'
        $('#registerButton').click(function (e) {
            e.preventDefault();

            let status = "<?php echo $registerResult['status'];?>";
            let message = "<?php echo $registerResult['message'];?>";
            if (status === 'success') {
                window.location.href = 'login.php';
            }
            console.log(status);
        });
    });
</script>