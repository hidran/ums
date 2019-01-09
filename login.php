<?php
session_start();
require_once 'functions.php';
if(isUserLoggedin()){
    header('Location: index.php');
    exit;
}
$bytes =random_bytes(32);
$token = bin2hex($bytes);
$_SESSION['csrf'] = $token;
require_once 'view/top.php';

?>
<section class="container">
    <div id="loginform">
<h1>PLEASE LOGIN</h1>
        <?php
        if(!empty($_SESSION['message'])){ ?>
           <div class="alert alert-info" id="message">
               <?=$_SESSION['message']?>
           </div>
     <?php
            $_SESSION['message'] = '';
        }
        ?>
    <form action="verify-login.php" method="post">
        <input type="hidden" name="_csrf" value="<?=$token?>">
        <div class="form-group">
            <label for="email">Email address</label>
            <input required type="email" class="form-control" id="email"
                   name="email"
                   aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" required class="form-control"
                   name="password"
                   id="password" placeholder="Password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="rememberme" id="rememberme" class="form-check-input">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
        </div>
        <div class="form-group text-center btn-lg">
        <button type="submit" class="btn btn-primary">LOGIN</button>
        </div>
    </form>
    </div>
</section>
<?php

require_once 'view/footer.php';
?>
<script>
$(
  function (){
 $('form').on('submit', function (evt) {
    evt.preventDefault();
    const  data = $(this).serialize();
    $.ajax({
        method:'post',
        data : data,
        url : 'verify-login-ajax.php',
          success : function (response) {

             const data = JSON.parse(response);
             if(data){
                 alert(data.message);
                 if(data.success){

                     location.href = 'index.php';

                 }
             }

        },
        failure : function () {
            alert('PROBLEM CONTACTING SERVER')
        },
    })
 })
}
);
</script>