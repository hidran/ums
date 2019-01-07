<?php
session_start();
require_once 'functions.php';
if(!empty($_POST)){

    $token = $_POST['_csrf'] ?? '';
    $email  = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $result = verifyLogin($email, $password, $token);
    print_r($result);
} else {
    header('Location: login.php');
}