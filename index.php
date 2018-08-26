<?php
session_start();

require_once 'functions.php';
require_once 'view/top.php';

$pageUrl = $_SERVER['PHP_SELF'];

$updateUrl = 'controller/updateRecord.php';
$orderDir = getParam('orderDir', 'ASC');

$orderBy = getParam('orderBy', 'id');

$orderByColumns =  getConfig('orderByColumns',['id','lastname','email','fiscalcode','age']);

$recordsPerPage = getParam('recordsPerPage', getConfig('recordsPerPage'));

$recordsPerPageOptions = getConfig('recordsPerPageOptions',[5,10,20,30,50]);

$search = getParam('search' ,'') ;

$page = getParam('page',1);


require_once 'view/navbar.php';
?>


<!-- Begin page content -->
<main role="main" class="container">
    <h1 class="text-center p-2">USER MANAGEMENT SYSTEM </h1>
    <?php

       if(!empty($_SESSION['message'])){
           $message = $_SESSION['message'];
           $alertType = $_SESSION['success'] ? 'success':'danger';
           require 'view/message.php';
           unset($_SESSION['message'], $_SESSION['success']);
       }


       require_once 'controller/displayUsers.php';

    ?>
</main>

<?php
require_once 'view/footer.php';
?>
