<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18.12.2018
 * Time: 17:01
 */
require_once 'functions.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
    <title>Task1/Register</title>
</head>
<body class="text-center">
<form class="form-signin" method="post" action="register_request.php">
    <img class="mb-4" src="../images/register.png" alt="" width="64" height="64">
    <h1 class="h3 mb-3 font-weight-normal">Try to register</h1>
    <label for="inputLogin" class="sr-only">Email address</label>
    <input type="email"
           id="inputLogin"
           name="user_login"
           class="form-control" placeholder="Email address will be yor login" required
           autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password"
           name="user_password"
           id="inputPassword" class="form-control" placeholder="Password" required>

    <button class="btn btn-lg btn-primary btn-block"
            id="registerButton" type="submit">Register
    </button>
    <div class="mt-2 alert alert-danger
    alert-dismissible fade show"
         id="errorBlock"
         role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong>Внимание!</strong>
        <div id="__errorMessageBlock">
            <p id="errorMessageText"></p>
        </div>

    </div>
    <p class="mt-5 mb-3 text-muted">© 2017-<?= date('Y'); ?></p>

</form>

</body>
<script src="../jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<script>
    $('#errorBlock').toggleClass('show', 'in');
    $(document).ready(function (e) {

        $('#registerButton').click(function (e) {
            e.preventDefault();
            let user_login = $('#inputLogin').val();
            let user_password = $('#inputPassword').val();
            $.post('register_request.php', {
                user_login: user_login,
                user_password
            }, function (data) {
                $('#__errorMessageBlock').empty();
                console.log(data);
                data = JSON.parse(data);
                console.log(data);
                if (data.status === 'success') {
                    alert(data.message);
                    window.location.href = "../Task_2/Site2/index.php";
                } else if (data.status === 'error') {
                    if (data.errors.length > 0) {
                        $.each(data.errors, function (key, value) {
                            let markup = "<p>" + value + "</p>"
                            $('#__errorMessageBlock').append(markup);
                        });
                    } else {
                        let templateError = "<p>" + data.message + "</p>";
                        $('#__errorMessageBlock').append(templateError)
                    }
                    $('#errorBlock').addClass('show');
                    console.log(data.error);
                }
            });
        });
    });
</script>
</html>

