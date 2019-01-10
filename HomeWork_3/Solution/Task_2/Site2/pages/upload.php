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
    require_once '../functions_Task2.php';
    require_once "uploadLogic.php";
    ?>

</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../index.php?pageName=index">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../../../Task_1/register.php?pageName=register">Register</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="upload.php?pageName=upload">Upload <span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>
<body>
<div class="container-fluid">
    <form class="my-2 form-inline"
          enctype="multipart/form-data"
          method="POST"
    >
        <div class="col-md-5 col-sm-5">
            <input type="file" name="uploadPicture" class="custom-file-input" id="uploadPicture" required>
            <label class="custom-file-label" for="uploadPicture">Choose file...</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
            <div class="invalid-feedback">
                Example invalid custom file feedback
            </div>

        </div>
        <div class="col-md-5 col-sm-7">
            <input type="submit" id="uploadButton" class="btn btn-primary" value="Upload"/>
        </div>
    </form>

    <div class="my-2 jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">Hello!</h1>
            <p class="lead">Приветствую вас на странице загрузки файлов</p>
            <p class="lead" id="uploadPictureStatusMessage">

            </p>
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
    $(document).ready(function () {
        try {
            let jsonData = '<?php echo getResponse();?>';
            let parsedData = JSON.parse(jsonData);

            if (parsedData.status === 'success') {
                $('#uploadPictureStatusMessage').addClass('bg-success');
                $('#uploadPictureStatusMessage').text(parsedData.message);
            } else if(parsedData.status==='error') {
                $('#uploadPictureStatusMessage').addClass('bg-danger');
                $('#uploadPictureStatusMessage').text(parsedData.message);
            }else if(parsedData.status==='warning'){
                console.log(parsedData.message);
            }else{
                console.log(parsedData);
            }

        } catch (e) {
            if (e.name === 'SyntaxError') {
                if (e.message.includes('JSON')) {
                    $('#uploadPictureStatusMessage').addClass('bg-danger');
                    $('#uploadPictureStatusMessage').text('Произошла ошибка при преобразовании ответа.');

                } else {
                    console.log(e.message);
                }
            }
        }

    });

    function setSeconds(id) {

        let counter = 0;
        setTimeout(function () {
            setInterval(function () {
                counter++;
                $('#uploadPassed_' + id).text(counter + ' seconds passed');
            }, 1000);
        }, 1000 * 60);

    }
</script>
</html>
