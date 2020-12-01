<?php
/*****
    INCLUDES: 
        vendor/autoload.php: HTTP Foundations package from Symfony
        functions.php: request() and addBook() function
        connection.php: connection to database with global $db variable
        points system to .env file
*/
require_once __DIR__ . '/../inc/bootstrap.php';

/*****
    CHECK 1 of 2:
        1. findUserByEmail() from functions.php will save a row in the database's users table where the email is the same as the parameter
        
        2. email sent from form is entered as a parameter
        
        3. the result is saved to the $user variable
        
        4. if the result is empty, user does not exist and redirects to login
*/
$user = findUserByEmail(request()->get('email'));
if (empty($user)) {
    $session->getFlashBag()->add('error', 'Username was not found');
    redirect('/admin/login.php');
}

/*****
    CHECK 2 of 2:
        1. password_verify default php function takes hashed password from database and compares it to the one submitted on the login.php form
        
        2. if statement uses the not (!) operator to redirect to the home page if passwords do not match
*/
if (!password_verify(request()->get('password'), $user['password'])) {
    
    $session->getFlashBag()->add('error', 'Incorrect password.');
    redirect('/admin/login.php');
}

// JWT - expire time variable (1 hour)
$expTime = time() + 3600;

/******
NOTES ON .env

.env.txt is where you define any environment variables that you want to access with the getenv function or _env variable

this file should contain any secret keys that you need for your application

SECRET_KEY is needed for JWT to be signed, string of 64 random characters
COOKIE_DOMAIN is domain where cookie lives, http in the beginning is not wanted or slash at end of url

bootstrap.php points the system to the .env file
*/


/*****
a JWT is made up of the header, claims, and signature

encode method takes 3 parameters (data in claim
    2. signing key
    3. encrytion algorithm
    
A $jwt variable is set below that can be used in a cookie

********** THIS IS A JWT - JSON WEB TOKEN ********** 
1. JWT is made below and pulls secret key from .env

2. A cookie(access_token) is created below the $jwt variable
*/

$jwt = \Firebase\JWT\JWT::encode([
    //Issuer, who issues the claim?
    'iss' => request()->getBaseUrl(),
    
    //Subject, who is the subject?
    'sub' => "{$user['id']}",
    
    //Expiration Time, when JWT expires, variable set above
    'exp' => $expTime,
    
    //Issued At, time stamp of when JWT is issued
    'iat' => time(),
    
    //not before, can't use JWT before current timestamp
    'nbf' => time(),
    
    //Private Claim Data, is the user an admin?
    'is_admin' => $user['role_id'] == 1
    
], getenv("SECRET_KEY"),'HS256');

/*****
********** THIS IS A COOKIE (access_token) ********** 
uses cookie class from pulled in symfony package
*/

$accessToken = new Symfony\Component\HttpFoundation\Cookie('access_token', $jwt, $expTime, '/', getenv('COOKIE_DOMAIN'));

/*****
1. redirect() is a functions in functions.php

2. redirects to the homepage with ('/')

3. sets 'cookies' as a key in the $extra array(2nd parameter)

4. sets the value of 'cookies' to the cookie variable above ($accessToken)
*/
$session->getFlashBag()->add('success', 'You have been logged in');
redirect('/admin/dash.php',['cookies' => [$accessToken]]);






