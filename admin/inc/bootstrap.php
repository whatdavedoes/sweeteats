<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/admin-config.php'; 
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/functions.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$session = new \Symfony\Component\HttpFoundation\Session\Session();
$session->start();