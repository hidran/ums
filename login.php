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