<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Uploads</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <?php
    require_once '../functions.php';
    function getActivePage($pageName)
    {
        return $_GET['pageName'] === $pageName ? 'active' : '';
    }

    ?>

</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= getActivePage('index') ?>">
                <a class="nav-link" href="../index.php?pageName=index">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item  <?= getActivePage('register') ?>">
                <a class="nav-link" href="../Task_1/register.php?pageName=register">Register</a>
            </li>
            <li class="nav-item  <?= getActivePage('login') ?>">
                <a class="nav-link" href="../login.php?pageName=login">Log in</a>
            </li>
            <li class="nav-item  <?= getActivePage('upload') ?>">
                <a class="nav-link" href="upload.php?pageName=upload">Upload</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<body>
<div class="container-fluid">
    <form class="my-2 form-inline" method="post" action="uploadLogic.php" enctype="multipart/form-data">
        <div class="col-md-5 col-sm-5">
            <input type="file" name="uploadPicture" class="custom-file-input" id="uploadPicture" required>
            <label class="custom-file-label" for="uploadPicture">Choose file...</label>
            <div class="invalid-feedback">Example invalid custom file feedback</div>

        </div>
        <div class="col-md-5 col-sm-7">
            <input type="button" name="submit" id="uploadButton" class="btn btn-primary" value="Upload"/>
        </div>
    </form>

    <div class="my-2 jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Picture list</h1>
            <p class="lead">There will be only new uploaded images</p>
            <pre/>
            <p><?php
                if (isset($_POST['uploadPicture'])) {
                    if (!empty($_POST['uploadPicture'])) {

                        var_dump($_POST['uploadPicture']);
                    } else {
                        echo 'upload picture is null';
                    }
                } else {
                    echo 'post variable isn\'t initialize';
                }
                ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="list-group" id="list-tab" role="tablist">

                <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list"
                   href="#list-home" role="tab" aria-controls="home">Home</a>
                <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list"
                   href="#list-profile" role="tab" aria-controls="profile">Profile</a>
                <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list"
                   href="#list-messages" role="tab" aria-controls="messages">Messages</a>
                <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list"
                   href="#list-settings" role="tab" aria-controls="settings">Settings</a>
            </div>
        </div>
        <div class="col-8">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">List group item heading</h5>
                            <small id="uploadPassed">3 days ago</small>
                        </div>
                        <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                            varius blandit.</p>
                        <small>Donec id elit non mi porta.</small>
                    </a>
                </div>
                <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">...
                </div>
                <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">...
                </div>
                <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">...
                </div>
            </div>
        </div>
    </div>
</body>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script>
    $(document).ready(function (e) {
        $('#uploadButton').click(function (e1) {
            e1.preventDefault();
            var file_data = $('#uploadPicture').prop('files')[0];
            var form_data = new FormData();
            form_data.append('uploadPicture', file_data);
            console.log(file_data);
            console.log(form_data);
            $.post("uploadLogic.php", {uploadPicture: file_data.name})
                .done(function (data) {
                    console.log(data);
                });
        });

    });

    function setSeconds(id) {
        let counter = 0;
        setInterval(function () {
            counter++;
            $('#uploadPassed_' + id).text(counter + ' seconds passed');
        }, 1000);
    }
</script>
</html>
