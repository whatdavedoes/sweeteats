<?php 

function request() {
    return \Symfony\Component\HttpFoundation\Request::createFromGlobals();
}

function redirect($path, $extra = []) {
    $response = \Symfony\Component\HttpFoundation\Response::create(null, \Symfony\Component\HttpFoundation\Response::HTTP_FOUND, ['Location' => $path]);
    
    //checks if 'cookies' exists in the $extra array from redirect parameter
    if (key_exists('cookies', $extra)) {
        foreach ($extra['cookies'] as $cookie) {
            //if there are cookies in the $extra array multiple cookies are set in the response headers in this foreach loop
            $response->headers->setCookie($cookie);
        }
    }
    
    $response->send();
    exit;
}

//used on registration to check if user exists
function findUserByEmail($email) {
    global $db;
        
    try{
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        throw $e;
    }
}

function createUser($email, $password) {
     global $db;
     global $defaultRole;    
    
     try{
        $query = "INSERT INTO users (email, password, role_id) VALUES (:email, :password, :role)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $defaultRole);
        $stmt->execute();
        return findUserByEmail($email);
     } catch (\Exception $e) {
        throw $e;
    }
}

function deleteUser($id) {
     global $db;
     global $defaultRole;    
    
     try{
        $query = "DELETE FROM users WHERE id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return;
     } catch (\Exception $e) {
        throw $e;
    }
}

function findUserByAccessToken() {
    global $db;
    
    //the 'sub' param(subject) below is a key in the associative array of the $jwt variable, it contains the current user's id
    
    try{
        $userId = decodeJwt('sub');
    } catch (\Exception $e) {
        throw $e;
    }
        
    try{
        $query = "SELECT * FROM users WHERE id = :userId";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        throw $e;
    }
}

function decodeJwt($prop = null) {
     \Firebase\JWT\JWT::$leeway = 1;
       $jwt = \Firebase\JWT\JWT::decode(
            request()->cookies->get('access_token'),
            getenv('SECRET_KEY'),
            ['HS256']
        );
    if ($prop === null) {
        return $jwt;
    }
    
    return $jwt->{$prop};
}

function isAuthenticated() {
    /***** 
    1. if the cookie access_token doesn't exist returns false
    
    2. if it exists, uses decode method(in function above) to check with .env secret key
    
    3. if error, returns false
*/
    if (!request()->cookies->has('access_token')) {
        return false;
    }
    
    try {
        decodeJwt();
        return true;
        
    } catch (\Exception $e) {
        return false;
    }
}

//use this function at the top of any file that requires authentication
function requireAuth() {
    if(!isAuthenticated()) {
        /*****
        ********** THIS IS A COOKIE (access_token) **********
        uses cookie class from pulled in symfony package
        */
        $accessToken = new \Symfony\Component\HttpFoundation\Cookie("access_token", "Expired", time()-3600, '/', getenv('COOKIE_DOMAIN'));
        
        //redirects to login.php after setting cookie to Expired
        redirect('/admin/login.php', ['cookies' => [$accessToken]]);
    }
}

function updatePassword($password, $userId) {
    global $db;
    
    try{
        $query = 'UPDATE users SET password=:password WHERE id = :userId';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();
    } catch (\Exception $e) {
        return false;
    }
    
    return true;
}

//Authentication -----------------------------------------------------

function requireAdmin() {
    global $session;
    //makes sure request is authenticated
    if(!isAuthenticated()) {
        /*****
        ********** THIS IS A COOKIE (access_token) **********
        uses cookie class from pulled in symfony package
        */
        $accessToken = new \Symfony\Component\HttpFoundation\Cookie("access_token", "Expired", time()-3600, '/', getenv('COOKIE_DOMAIN'));
        
        //redirects to login.php after setting cookie to Expired
        redirect('/admin/login.php', ['cookies' => [$accessToken]]);
    }
    
    try {
        if (! decodeJwt('is_admin')) {
            $session->getFlashBag()->add('error', 'Not Authorized');
            redirect('/admin/login.php');
        }
    } catch (\Exception $e) {
         /*****
        ********** THIS IS A COOKIE (access_token) **********
        uses cookie class from pulled in symfony package
        */
        $accessToken = new \Symfony\Component\HttpFoundation\Cookie("access_token", "Expired", time()-3600, '/', getenv('COOKIE_DOMAIN'));
        
        //redirects to login.php after setting cookie to Expired
        redirect('/admin/login.php', ['cookies' => [$accessToken]]);
    }
    
}

function isAdmin() {
    if (!isAuthenticated()) {
        return false;
    }
    
    try {
        $isAdmin = decodeJwt('is_admin');  
    } catch (\Exception $e) {
        return false;
    }
    
    return (boolean)$isAdmin;
}


function isOwner($ownerId) {
    if (!isAuthenticated()) {
        return false;
    }
    
    try {
        $userId = decodeJwt('sub');
    } catch (\Exception $e) {
        return false;
    }
    
    return $ownerId == $userId;
}

function getAllUsers() {
    global $db;
    
    try {
        $query = "SELECT * FROM users";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        throw $e;
    }
}

function changeRole($userId, $roleId) {
   global $db;

   try {
       $query = "UPDATE users SET role_id=? WHERE id = ?";
       $stmt = $db->prepare($query);
       $stmt->bindParam(1, $roleId);
       $stmt->bindParam(2, $userId);
       $stmt->execute();
   } catch (\Exception $e) {
       throw $e;
   }
}



//-----------------------------------------------------------------------

function getContent() {
   global $db;
    
   try {
        $output = $db->query('SELECT * FROM Testimonials ORDER BY t_id DESC');
    } catch (\Exception $e) {
        throw $e;
    }
    
    return $output;
}

function returnOne($id) {
   global $db;
    
   try {
        $query = "SELECT * FROM Content Where content_id = :id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e) {
        throw $e;
    }
    
    return $output;
}

function addTestimonial($name, $review, $stars) {
    global $db;
    
    try{
        $query = 'INSERT INTO Testimonials (name, review, stars) VALUES (:name, :review, :stars)';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':review', $review);
        $stmt->bindParam(':stars', $stars);
        return $stmt->execute();
    } catch (\Exception $e){
        throw $e;
    }
}

function deleteTestimonial($id) {
    global $db;
    
    
    try{
        $query = 'DELETE FROM Testimonials WHERE t_id = :id';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    } catch (\Exception $e){
        throw $e;
    }
}

function getBannerTxt() {
    global $db;
    
    
    try{
        $query = 'SELECT text FROM Content WHERE content_id = 1';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e){
        throw $e;
    }
    
    return $output['text'];
}

function updateBannerTxt($inputBannerTxt) {
    global $db;
    
    
    try{
        $query = 'UPDATE Content SET text = :bannerTxt WHERE content_id = 1;';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':bannerTxt', $inputBannerTxt);
        return $stmt->execute();
    } catch (\Exception $e){
        throw $e;
    }
    
}

function updatePromoDay($inputDay) {
    global $db;
    
    try{
        $query = 'UPDATE Content SET content_day = :inputDay WHERE content_id = 6;';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':inputDay', $inputDay);
        return $stmt->execute();
    } catch (\Exception $e){
        throw $e;
    }
    
}

function getPromoDay() {
    global $db;
    
    
    try{
        $query = 'SELECT content_day FROM Content WHERE content_id = 6';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e){
        throw $e;
    }
    
    return $output['content_day'];
}

function updatePromoActive($inputActive) {
    global $db;
    
    try{
        $query = 'UPDATE Content SET enabled = :enabled WHERE content_id = 7;';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':enabled', $inputActive);
        return $stmt->execute();
    } catch (\Exception $e){
        throw $e;
    }
    
}

function getPromoActive() {
    global $db;
    
    try{
        $query = 'SELECT enabled FROM Content WHERE content_id = 7';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e){
        throw $e;
    }
    
    return $output['enabled'];
}


function getStoryTxt() {
    global $db;
    
    
    try{
        $query = 'SELECT text FROM Content WHERE content_id = 2';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e){
        throw $e;
    }
    
    return $output['text'];
}

function updateStoryTxt($inputStoryTxt) {
    global $db;
    
    
    try{
        $query = 'UPDATE Content SET text = :bannerTxt WHERE content_id = 2;';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':bannerTxt', $inputStoryTxt);
        return $stmt->execute();
    } catch (\Exception $e){
        throw $e;
    }
    
}

function updateLocationTxt($inputLocationTxt) {
    global $db;
    
    
    try{
        $query = 'UPDATE Content SET text = :bannerTxt WHERE content_id = 3;';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':bannerTxt', $inputLocationTxt);
        return $stmt->execute();
    } catch (\Exception $e){
        throw $e;
    }
    
}

function getLocationTxt() {
    global $db;
    
    
    try{
        $query = 'SELECT text FROM Content WHERE content_id = 3';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e){
        throw $e;
    }
    
    return $output['text'];
}

function updatePhoneTxt($inputPhoneTxt) {
    global $db;
    
    
    try{
        $query = 'UPDATE Content SET text = :bannerTxt WHERE content_id = 4;';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':bannerTxt', $inputPhoneTxt);
        return $stmt->execute();
    } catch (\Exception $e){
        throw $e;
    }
    
}

function getPhoneTxt() {
    global $db;
    
    
    try{
        $query = 'SELECT text FROM Content WHERE content_id = 4';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e){
        throw $e;
    }
    
    return $output['text'];
}

function updateEmailTxt($inputEmailTxt) {
    global $db;
    
    
    try{
        $query = 'UPDATE Content SET text = :bannerTxt WHERE content_id = 5;';
        $stmt = $db->prepare($query);
        $stmt->bindParam(':bannerTxt', $inputEmailTxt);
        return $stmt->execute();
    } catch (\Exception $e){
        throw $e;
    }
    
}

function getEmailTxt() {
    global $db;
    
    
    try{
        $query = 'SELECT text FROM Content WHERE content_id = 5';
        $stmt = $db->prepare($query);
        $stmt->execute();
        $output = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (\Exception $e){
        throw $e;
    }
    
    return $output['text'];
}


function display_success() {
    global $session;
    
    if (!$session->getFlashBag()->has('success')) {
        return;
    }
    
    $messages = $session->getFlashBag()->get('success');
    
    $response = '<div class="alert alert-success alert-dismissible">';
    foreach ($messages as $message) {
        $response .= "{$message}<br />";
    }
    $response.= '</div>';
    
    return $response;
}

function display_errors() {
    global $session;
    
    if (!$session->getFlashBag()->has('error')) {
        return;
    }
    
    $messages = $session->getFlashBag()->get('error');
    
    $response = '<div class="alert alert-danger alert-dismissible">';
    foreach ($messages as $message) {
        $response .= "{$message}<br />";
    }
    $response.= '</div>';
    
    return $response;
}

function display_neutral() {
    global $session;
    
    if (!$session->getFlashBag()->has('neutral')) {
        return;
    }
    
    $messages = $session->getFlashBag()->get('neutral');
    
    $response = '<div class="alert alert-warning alert-dismissible">';
    foreach ($messages as $message) {
        $response .= "{$message}<br />";
    }
    $response.= '</div>';
    
    return $response;
}