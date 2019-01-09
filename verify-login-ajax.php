<?php
session_start();
require_once 'functions.php';
$header = strtoupper($_SERVER['HTTP_X_REQUESTED_WITH'] ?? '');
 /*$headers = getallheaders();
 $header = strtoupper($headers['X-Requested-With']);
 */
if(!empty($_POST) &&  $header  === 'XMLHTTPREQUEST' ){
    $token = $_POST['_csrf'] ?? '';
    $email  = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $result = verifyLogin($email, $password, $token);
    if($result['success']){
        session_regenerate_id();
        $_SESSION['loggedin'] = true;
        unset($result['user']['password']);
        $_SESSION['userData']  = $result['user'];


    }
    //  echo json_encode(getallheaders());
   // exit;
     echo json_encode($result);
}