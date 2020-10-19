<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location: index.php");
  die();}
if(isset($_POST['logout'])){
  session_destroy();
  header('Location: index.php');}
?>
<!doctype html>
<html lang="pt-br">
<meta charset="utf-8">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Admin</title>
  </head>
  <body>

  <header>
  	<nav class="navbar navbar-expand-lg navbar-light bg-light"> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="create.php">Criar Item</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" target="_blank" href="../index.php">Visitar site</a>
      </li>

      <li class="nav-item active">
        <a class="nav-link"  href="system/clients.php">Sistema - Clientes</a>
      </li>

      <li class="nav-item active">
        <form method="post">
        <input type="submit" name="logout" value="Sair" class="btn btn-danger">
        </form>
      </li>

    </ul>
  </div>
</nav>
</header>


