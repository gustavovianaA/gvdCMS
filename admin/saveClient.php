<?php
require_once('../config.php');
include(HEADER); 
//validate client
if(isset($_POST['name'],$_POST['phone'],$_POST['mail'],$_POST['msg'],$_POST['fromSite'])){
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$mail = $_POST['mail'];
	$message = $_POST['msg'];
	$fromSite = $_POST['fromSite'];
	$client = new Client($name,$phone,$mail,$message,$fromSite);
	$client->create();
}
?>
