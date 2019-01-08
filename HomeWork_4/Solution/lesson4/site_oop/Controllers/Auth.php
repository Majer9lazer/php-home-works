<?php

namespace Controllers;

use \Database\Engine as DB;

class Auth extends Base
{
	public function index()
	{
		$this->view('auth', [
			'categories' => [],
		]);
	}
	
	public function login()
	{
		$result = $this->authorization($_POST);
		
		if ($result['status'] === 'success') {
			location(url());
		}
		
		print_R($result);
		
		exit();
		
		location(url('auth'));
	}
	
	// Обновление (создание) сессии
	function createSession($user)
	{
		$_SESSION['id'] = $user['id'];
	}

	/**
	 * Авторизация пользователя
	 * 
	 * @param array $data
	 * 
	 * @return array
	 */
	function authorization($data)
	{
		if (empty($data['login'])) {
			return response('Логин пользователя не может быть пустым', 'error');
		}
		
		if (empty($data['password'])) {
			return response('Пароль пользователя не может быть пустым', 'error');
		}
		
		$user = $this->getUserByHash($data['login'], $data['password']);
		
		if (!$user) {
			return response('Логин или пароль указаны неправильно', 'error');
		}
		
		$this->createSession($user);

		$newHash = password_hash($data['password'] . md5(microtime(1)), PASSWORD_DEFAULT);
		$this->setUserHash($user, $newHash); // Создаем отдельный `hash` от поля `password`

		setCookie('login', $user['login'], time() + 60*60*24*3); // Авторизация на куках
		setCookie('hash', password_hash($newHash, PASSWORD_DEFAULT), time() + 60*60*24*3); // дополнительно шифруем куку. Это нужно обязательно для безопасности
		
		return response('Успешно авторизован');
	}

	// Установить новое поле hash пользователю
	function setUserHash($user, $hash)
	{
		$prepare = DB::init()->prepare(
			'UPDATE users SET hash=? WHERE id=?'
		);
		
		$prepare->execute([$hash, $user['id']]);
	}

	// Получить пользователя по логину и паролю
	function getUserByHash($login, $password) {
		//$hash = password_hash($password, PASSWORD_DEFAULT);
		
		$prepare = DB::init()->prepare(
			'SELECT * FROM users WHERE login=?'
		);
		
		$prepare->execute([$login]);
		$row = $prepare->fetch();
		
		if (!$row) {
			return null;
		}
		
		if (!password_verify($password, $row['password'])) {
			return null;
		}
		
		return $row;
	}
}
