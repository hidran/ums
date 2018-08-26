<?php
require_once 'headerInclude.php';
?>
<main role="main" class="container">
    <h1 class="text-center p-2">USER MANAGEMENT SYSTEM </h1>
    <?php
      $id = getParam('id', 0);
      $action = getParam('action','');
      if($id){
          $user = getUser($id);
      } else {
          $user = [
              'username' => '',
              'email' => '',
              'age' => '',
              'fiscalcode' => '',
              'id' => '',
          ];
      }

      // var_dump($user);die;
        require_once 'view/formUpdate.php';
?>
</main>
<?php
require_once 'view/footer.php';