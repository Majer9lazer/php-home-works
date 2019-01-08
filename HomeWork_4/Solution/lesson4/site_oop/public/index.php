<?php

require dirname(__DIR__). DIRECTORY_SEPARATOR . 'config.php';
require BASE_PATH . DIRECTORY_SEPARATOR . 'autoloader.php';
require BASE_PATH . DIRECTORY_SEPARATOR . 'helper.php';

\Routers\Base::run();
