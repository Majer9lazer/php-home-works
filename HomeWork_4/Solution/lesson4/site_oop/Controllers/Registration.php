<?php

namespace Controllers;

use \Database\Engine as DB;

class Registration extends Base
{
	public function index()
	{
		$this->view('registration', [
			'categories' => [],
		]);
	}
	
	public function reg()
	{
		$result = $this->registration($_POST);
		
		if ($result['status'] === 'success') {
			location(url());
		}
		
		print_R($result);
		
		exit();
		
		location(url('registration'));
	}
	
	function checkIfUserExistsByLogin($login)
	{
		$prepare = DB::init()->prepare(
			'SELECT 1 FROM users WHERE login=?'
		);
		
		$prepare->execute([$login]);
		
		return (bool) $prepare->rowCount();
	}

	/**
	 * Создание пользователя
	 * 
	 * @param array $data
	 * 
	 * @return bool
	 */
	function createUser($data)
	{
		$hash = password_hash($data['password'], PASSWORD_DEFAULT);
		
		$prepare = DB::init()->prepare(
			'INSERT INTO users (login, first_name, last_name, password) VALUES(?,?,?,?)'
		);
		
		$prepare->execute([$data['login'], $data['first_name'], $data['last_name'], $hash]);
		
		return (bool) $prepare->rowCount();
	}

	/**
	 * Регистрация пользователя
	 * 
	 * @param array $data
	 * 
	 * @return array
	 */
	function registration($data)
	{
		if (empty($data['login'])) {
			return response('Login пользователя не может быть пустым', 'error');
		}
		
		if (empty($data['first_name'])) {
			return response('Имя пользователя не может быть пустым', 'error');
		}
		
		if (empty($data['last_name'])) {
			return response('Фамилия пользователя не может быть пустой', 'error');
		}
		
		if (strlen($data['password']) < 6) {
			return response('Слишком легкий пароль. Минимальная длина 6 символов', 'error');
		}
		
		if (($data['password'] !== $data['repeat_password'])) {
			return response('Введенный пароль и повторенный пароль не совпадают', 'error');
		}
		
		if ($this->checkIfUserExistsByLogin($data['login'])) {
			return response('Пользователь с указанным логином уже существует', 'error');
		}
		
		if (!$this->createUser($data)) {
			return response('Невозможно создать пользователя', 'error');
		}
		
		return response('Успешно зарегистрирован');
	}

}
