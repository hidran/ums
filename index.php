<?php
 require_once 'headerInclude.php';
?>


<!-- Begin page content -->
<main  class="container">
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
