<?php
//ini_set('display_errors', 1);
require_once __DIR__ . '/../inc/bootstrap.php';
requireAdmin();


$tName = request()->get('inputName');
$tReview = request()->get('inputReview');
$tStars = request()->get('inputStars');

if(empty($tName) || empty($tReview)) {
    $session->getFlashBag()->add('error', 'Please fill out the name and review fields.');
    redirect('/admin/testimonials.php');
}

//echo $tName . ' ' . $tReview . ' ' . $tStars;

addTestimonial($tName, $tReview, $tStars);
$session->getFlashBag()->add('success', 'Testimonial Added');
redirect('/admin/testimonials.php');

/*try {
    $newTestimonial = addTestimonial($tName, $tReview, $tStars);
    
    $response = \Symfony\Component\HttpFoundation\Response::create(null, \Symfony\Component\HttpFoundation\Response::HTTP_FOUND, ['Location' => '/admin/testimonials.php']);
    $response->send();
    exit;
   
} catch (\Exception $e) {
    $response = \Symfony\Component\HttpFoundation\Response::create(null, \Symfony\Component\HttpFoundation\Response::HTTP_FOUND, ['Location' => '/admin/testimonials.php']);
    $response->send();
    exit;\
}*/

//ini_set('display_errors', 1);


//tells system where to find .env file
/*$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

$session = new \Symfony\Component\HttpFoundation\Session\Session();
$session->start();*/

/*****
    1. form on /adim/testimonials.php with method of POST, redirects to this page (-- <form method="post" action="procedures/addTestimonial.php"> --)
    
    2. the request() function from functions.php initializes a new Request Object, which is is an object-oriented representation of POST (-- method="post" --)
    
    3. the get method of the Request Object returns a parameter by name
    
    4. the returned values(POST method from form) are saved as variables
*/

/*
$tName = request()->get('name');
$tReview = request()->get('review');
$tStars = request()->get('stars');

if (empty($tName) || empty($tReview)) {
    $session->getFlashBag()->add('error', 'You must add a name and review');
    redirect('/admin/testimonials.php');
}
*/

/*****
    1. uses addTestimonial() function with variables from above
    2. SQL statement executed and inserts into database via addBook() function
    3. saves the returned value (-- return $stmt->execute() --) to variable $newTestimonial
    4. the constant (::) create method of the response class from Http Foundation package is used for a redirection and status code
    
*/


/*try {
    $newTestimonial = addTestimonial($tName, $tReview, $tStars);
    if (!empty($newTestimonial))
    $session->getFlashBag()->add('success', 'Testimonial added');
    redirect('/admin/testimonials.php');
} catch (\Exception $e) {bh
    $session->getFlashBag()->add('error', 'Error: Testimonial was not added');
    redirect('/admin/testimonials.php');
}*/