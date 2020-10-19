<?php
require_once('../../config.php');
include('../' . HEADER);
$clients = Client::list();
var_dump($clients);
?>