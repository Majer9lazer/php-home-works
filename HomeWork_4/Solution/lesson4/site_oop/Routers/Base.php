<?php

namespace Routers;

class Base implements RouterInterface
{
	protected static $routers = [
		'index',
		'registration',
		'auth',
	];
	
	public static function run()
	{
		$path = explode('/', ltrim($_SERVER['PATH_INFO'], '/'));
		$controllerName = $path[0] ?: 'index';
		$controllerMethod = $path[1] ?? 'index';
		
		$result = false;
		
		//exit($controllerName . ' ' . $controllerMethod);
		
		foreach (self::$routers as $router) {
			if ($router === $controllerName) {
				
				$controller = self::getController(trim($controllerName, '/'));
				
				if (!method_exists($controller, $controllerMethod)) {
					throw new \Exception('Wrong 1' . $controllerMethod);
				}
				
				$controller->$controllerMethod();
				
				$result = true;
				break;
			}
		}
		
		if (!$result) {
			throw new \Exception('Wrong 2');
		}
	}
	
	protected static function getController($controllerName)
	{
		$controllerClassName = '\\Controllers\\' .  ucfirst($controllerName);
		return new $controllerClassName;
	}
}













