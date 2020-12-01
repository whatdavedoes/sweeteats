<?php
//ini_set('display_errors', 1);

/*****
    INCLUDES: 
        vendor/autoload.php: HTTP Foundations package from Symfony
        functions.php: request() and addBook() function
        connection.php: connection to database with global $db variable
        points system to .env file
*/
require_once __DIR__ . '/../inc/bootstrap.php';

$session->getFlashBag()->add('neutral', 'You have been logged out');

 $accessToken = new \Symfony\Component\HttpFoundation\Cookie("access_token", "Expired", time()-3600, '/', getenv('COOKIE_DOMAIN'));
        redirect('/admin/login.php', ['cookies' => [$accessToken]]);