<?php
//ini_set('display_errors', 1);

require_once __DIR__ . '/../inc/bootstrap.php';
requireAdmin();

$inputBannerTxt = request()->get('inputBannerTxt');

updateBannerTxt($inputBannerTxt);
$session->getFlashBag()->add('success', 'Home Banner Text Updated');
redirect('/admin/home.php');