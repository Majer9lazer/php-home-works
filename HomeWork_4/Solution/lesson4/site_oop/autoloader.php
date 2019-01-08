<?php

spl_autoload_register(function($className) {
	if (DIRECTORY_SEPARATOR === '/') {
		$className = str_replace('\\', '/', $className);
	}
	
	require BASE_PATH . $className . '.php';
});
