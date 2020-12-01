<?php
ini_set('display_errors', 1);
require_once __DIR__ . '/../inc/bootstrap.php';
requireAdmin();

$inputDay = request()->get('inputDay');
$inputActive = request()->get('inputActive');

updatePromoDay($inputDay);
updatePromoActive($inputActive);

$session->getFlashBag()->add('success', 'Free Cupcake Promotion Updated');
redirect('/admin/home.php');