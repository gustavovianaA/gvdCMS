<?php
require_once('../config.php');
session_start();
if(isset($_SESSION['user'])){
	header('Location: restrict.php');
	die();
}else{
	if(isset($_POST['user'],$_POST['password'])){
	$user = $_POST['user'];
	$password = $_POST['password'];
	User::authUser($user,$password); 
	}	
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>

   <div class="container">
   <div class="row justify-content-center">
  	<div class="col-md-4 mt-md-5 pt-3 pb-5" style="border: 1px solid gray; border-radius: 20px; background:rgba(0,0,0,0.2)">
  	<h1 class="text-center">Login</h1>
  	<img class="mx-auto d-block my-3" src="img/website-logo.png" style="width : 150px ; height : 150px ; border-radius: 100%">
  	<form method="post">
  <div class="form-group">
    <label for="login-user" style="font-weight: 700">Usuário</label>
    <input name="user" type="text" class="form-control" id="login-user">
  </div>
  <div class="form-group">
    <label for="login-user" style="font-weight: 700">Senha</label>
    <input name="password" type="password" class="form-control" id="login-pass">
  </div>
  <button type="submit" class="btn btn-primary btn-block">Entrar</button>
	</form>
	</div>
    </div>
	</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>   
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>




