<?php
$dbServer = getenv('MYSQL_PORT_3306_TCP_ADDR') ? getenv('MYSQL_PORT_3306_TCP_ADDR') : '127.0.0.1';
$dbUser = isset($_SERVER['MYSQL_USER'])     ? $_SERVER['MYSQL_USER']     : 'testuser';
$dbPass = isset($_SERVER['MYSQL_PASSWORD']) ? $_SERVER['MYSQL_PASSWORD'] : 'pass';
$dbName = isset($_SERVER['MYSQL_DB'])       ? $_SERVER['MYSQL_DB']       : 'mydb';
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";
$db = new PDO($dsn, $dbUser, $dbPass);