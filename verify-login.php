<?php
session_start();
require_once 'functions.php';
if(!empty($_POST)){
    if(!empty($_POST['action']) && $_POST['action'] === 'logout'){
        $_SESSION = [];
        header('Location:login.php');
        exit;
    }
    $token = $_POST['_csrf'] ?? '';
    $email  = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $result = verifyLogin($email, $password, $token);
    unset($_SESSION['csrf']);
    if($result['success']){
        session_regenerate_id();
       $_SESSION['loggedin'] = true;
       unset($result['user']['password']);
       $_SESSION['userData']  = $result['user'];
       header('Location:index.php');
       exit;

    } else {
        $_SESSION['message'] = $result['message'];
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
}