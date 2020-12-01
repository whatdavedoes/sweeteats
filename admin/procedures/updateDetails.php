<?php
//ini_set('display_errors', 1);
require_once __DIR__ . '/../inc/bootstrap.php';
requireAdmin();

$inputLocation = request()->get('inputLocation');
$inputPhone= request()->get('inputPhone');
$inputEmail = request()->get('inputEmail');

updateLocationTxt($inputLocation);
updatePhoneTxt($inputPhone);
updateEmailTxt($inputEmail);

$session->getFlashBag()->add('success', 'Details Updated');
redirect('/admin/dash.php');