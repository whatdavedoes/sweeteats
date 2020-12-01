<?php
//ini_set('display_errors', 1);
require_once __DIR__ . '/../inc/bootstrap.php';
requireAdmin();

$id = request()->get('id');

deleteTestimonial($id);
$session->getFlashBag()->add('neutral', 'Testimonial Deleted');
redirect('/admin/testimonials.php');