<?php

const BASE_PATH = __DIR__ . DIRECTORY_SEPARATOR;
const FUNCTIONS_PATH = BASE_PATH . 'functions' . DIRECTORY_SEPARATOR;
const VIEW_PATH = BASE_PATH . 'view' . DIRECTORY_SEPARATOR;

const SITE_URL = 'http://localhost/lesson4/site_oop/';

const DB_HOST    = '127.0.0.1';
const DB_NAME    = 'site';
const DB_USER    = 'root';
const DB_PASS    = '';
const DB_CHARSET = 'utf8';

const OPT = [
	PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES   => false,
];

