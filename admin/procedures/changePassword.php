<?php
/*****
    INCLUDES: 
        vendor/autoload.php: HTTP Foundations package from Symfony
        functions.php: request() and addBook() function
        connection.php: connection to database with global $db variable
        points system to .env file
*/
require_once __DIR__ . '/../inc/bootstrap.php';

requireAuth();

$currPassword = request()->get('current_password');
$newPassword = request()->get('password');
$confirmPassword = request()->get('confirm_password');

//check to see if new passwords match
if ($newPassword != $confirmPassword) {
    $session->getFlashBag()->add('error', 'New passwords do not match, please try again.');
    redirect('/admin/account.php');
}

// gets current user from JWT and returns associative array from database with user details
$user = findUserByAccessToken();



//if user does not exist, display error
if (empty($user)) {
    $session->getFlashBag()->add('error', 'Some error happened. Try again. If it continues please log out and log back in.');
    redirect('/admin/account.php');
    
}

//verify current password from form with password in database
if (!password_verify($currPassword, $user['password'])) {
    $session->getFlashBag()->add('error', 'Current password is not correct.');
    redirect('/admin/account.php');
}

$updated = updatePassword(password_hash($newPassword, PASSWORD_DEFAULT), $user['id']);

if (!$updated) {
    $session->getFlashBag()->add('error', 'Could not update password, Please try again.');
    redirect('/admin/account.php');
}

$session->getFlashBag()->add('success', 'Password Updated');
redirect('/admin/account.php');
