<?php
/*****
    INCLUDES: 
        vendor/autoload.php: HTTP Foundations package from Symfony
        functions.php: request() and addBook() function
        connection.php: connection to database with global $db variable
        points system to .env file
*/
require_once __DIR__ . '/../inc/bootstrap.php';
requireAdmin();

$userId = request()->get('userId');
$role = request()->get('role');


switch (strtolower($role)) {
        case 'promote':
            changeRole($userId, 1);
            $session->getFlashBag()->add('success', 'Promoted to Admin!');
            break;
        case 'demote':
            changeRole($userId, 2);
            $session->getFlashBag()->add('success', 'Demoted from Admin!');
            break;
}
redirect('/admin/admin.php');