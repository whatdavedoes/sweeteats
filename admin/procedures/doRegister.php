<?php

//ini_set('display_errors', 1);
/*****
    INCLUDES: 
        vendor/autoload.php: HTTP Foundations package from Symfony
        functions.php: request() and addBook() function
        connection.php: connection to database with global $db variable
*/
require_once __DIR__ . '/../inc/bootstrap.php';

/*****
    1. form is submitted on register.php with action="/procedures/doRegister.php" (this page)
    
    2. the request() function from functions.php initializes a new Request Object, which is is an object-oriented representation of POST (set by method attribute of form)
    
    3.variables below are set to the submitted form inputs
*/
$password = request()->get('password');
$confirmPassword = request()->get('confirm_password');
$email = request()->get('email');


//if passwords do not match, redirect to same page
if ($password != $confirmPassword) {
    $session->getFlashBag()->add('error', 'Your passwords do not match');
    redirect('/admin/register.php');
}

/*****
    1. the findUserByEmail() function from functions.php is used and returns an associative array
    
    2. if $user variable is not empty, redirect to register.php
    
    3. it should be empty b/c account was not created yet
*/
$user = findUserByEmail($email);
if (!empty($user)) {
    $session->getFlashBag()->add('error', 'This user already exists');
    redirect('/admin/register.php');
}

// hashed password saved to $hashed variable
$hashed = password_hash($password, PASSWORD_DEFAULT);

// createUser() function from functions.php used to add user to the database
$user = createUser($email, $hashed);

$user = findUserByEmail(request()->get('email'));
if (empty($user)) {
    redirect('/admin/login.php');
}

if (!password_verify(request()->get('password'), $user['password'])) {
    redirect('/admin/login.php');
}

// JWT - expire time variable (1 hour)
$expTime = time() + 3600;


/*
********** THIS IS A JWOT - JSON WEB TOKEN ********** 
1. JWT is made below and pulls secret key from .env

2. A cookie is created below(access_token) the $jwt variable
*/
$jwt = \Firebase\JWT\JWT::encode([
    //Issuer, who issues the claim?
    'iss' => request()->getBaseUrl(),
    
    //Subject, who is the subject?
    'sub' => "{user['id']}",
    
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
$session->getFlashBag()->add('success', 'You have been successfully registered');
redirect('/admin/dash.php',['cookies' => [$accessToken]]);