<nav class="navbar navbar-expand-lg navbar-dark fixed-top bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= getActivePage('index') ?>">
                <a class="nav-link" href="index.php?pageName=index">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item  <?= getActivePage('register') ?>">
                <a class="nav-link" href="register.php?pageName=register">Register</a>
            </li>
            <li class="nav-item  <?= getActivePage('login') ?>">
                <a class="nav-link" href="login.php?pageName=login">Log in</a>
            </li>
            <li class="nav-item  <?= getActivePage('upload') ?>">
                <a class="nav-link" href="pages/upload.php?pageName=upload">Upload</a>
            </li>
        </ul>
    </div>
</nav>
<?php
function getActivePage($pageName)
{
    return $_GET['pageName'] === $pageName ? 'active' : '';
}
?>

