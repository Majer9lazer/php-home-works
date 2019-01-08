<!DOCTYPE html>
<!-- saved from url=(0059)https://getbootstrap.com/docs/4.1/examples/floating-labels/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https://getbootstrap.com/favicon.ico">

    <title>Регистрация</title>

    <!-- Bootstrap core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="public/css/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin" method="post" action="<?=url('registration/reg')?>">
      <div class="text-center mb-4">
        <img class="mb-4" src="./Floating labels example for Bootstrap_files/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Регистрация</h1>
		<?php if (!empty($status)): ?>
			<p class="<?=($status === 'error') ? 'alert-danger' : 'alert-info'?>"><?=$message?></p>
		<?php endif ?>
	  </div>

	  <div class="form-label-group">
        <input name="login" id="inputLogin" class="form-control" placeholder="Имя" required autofocus="">
        <label for="inputLogin">Логин</label>
      </div>
	  
      <div class="form-label-group">
        <input name="first_name" id="inputFirstName" class="form-control" placeholder="Имя" required autofocus="">
        <label for="inputFirstName">Имя</label>
      </div>
	  
	  <div class="form-label-group">
        <input name="last_name" id="inputLastName" class="form-control" placeholder="Фамилия" required autofocus="">
        <label for="inputLastName">Фамилия</label>
      </div>

      <div class="form-label-group">
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <label for="inputPassword">Пароль</label>
      </div>
	  
	  <div class="form-label-group">
        <input type="password" name="repeat_password" id="inputRepeatPassword" class="form-control" placeholder="Password" required>
        <label for="inputRepeatPassword">Повторить пароль</label>
      </div>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Запомнить меня
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button>
      <p class="mt-5 mb-3 text-muted text-center">© 2017-2018</p>
    </form>
  

</body></html>