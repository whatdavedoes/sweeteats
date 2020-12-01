<?php
ini_set('display_errors', 1);
require_once __DIR__ . '/../inc/bootstrap.php';
requireAdmin();

$id = request()->get('userId');

deleteUser($id);
$session->getFlashBag()->add('neutral', 'User Deleted');
redirect('/admin/admin.php');