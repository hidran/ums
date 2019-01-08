<?php
session_start();
require_once 'functions.php';
if(!isUserLoggedin() ){
    header('Location: login.php');
    exit;
}
if(!userCanUpdate()){
    header('Location: index.php');
    exit;
}
require_once 'headerInclude.php';
?>
<main role="main" class="container">
    <h1 class="text-center p-2">USER MANAGEMENT SYSTEM </h1>
    <?php
      $id = getParam('id', 0);
      $action = getParam('action','');
      $orderDir = getParam('orderDir', 'ASC');
      $search = getParam('search' ,'') ;
      $page = getParam('page',1);
       $paramsArray = compact('orderBy','orderDir','page','search');
      $defaultParams = http_build_query($paramsArray, '','&amp;');

    $orderBy = getParam('orderBy', 'id');
      if($id){
          $user = getUser($id);
      } else {
          $user = [
              'username' => '',
              'email' => '',
              'age' => '',
              'fiscalcode' => '',
              'id' => '',
              'avatar' => '',
              'password' => '',
              'roletype' => 'user'
          ];
      }

      // var_dump($user);die;
        require_once 'view/formUpdate.php';
?>
</main>
<?php
require_once 'view/footer.php';