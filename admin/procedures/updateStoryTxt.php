<?php
//ini_set('display_errors', 1);
require_once __DIR__ . '/../inc/bootstrap.php';
requireAdmin();

$inputStoryTxt = request()->get('inputStoryTxt');

updateStoryTxt($inputStoryTxt);
$session->getFlashBag()->add('success', 'Story Text Updated');
redirect('/admin/story.php');