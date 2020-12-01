<?php

//define('DB_PATH', $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/admin_db.db');

define('DB_PATH', $_SERVER['DOCUMENT_ROOT'] . '/admin/inc/admin_db.db');

try {
    $db = new PDO('sqlite:' . DB_PATH);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(Exception $e) {
    echo $e->getMessage();
}

?>