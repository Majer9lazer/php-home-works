<?php

// Проверить, авторизован ли пользователь
function isLoggedIn()
{
	return (!empty($_SESSION['id']));
}

// Хелпер для получения урла
function url($path = '')
{
	return SITE_URL . $path;
}

// Перенаправить пользователя
function location($url)
{
	header('Location: ' . $url);
	exit();
}

// Интерфейс возвращаемых ответов из функций
function response($message, $status = 'success')
{
	return [
		'status'  => $status,
		'message' => $message,
	];
}

// Получить авторизованного пользователя
function user($key = null)
{
	if (!$key) {
		return $GLOBALS['user'];
	}

	return $GLOBALS['user'][$key] ?? null;
}
