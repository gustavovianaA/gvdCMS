<?php 
error_reporting(E_ALL); ini_set('display_errors', 'On'); 
$pathCorrection = function(){
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\'); 
$add = (strpos($uri, 'admin')) ? '../' : '';
return $add;
}; 
// if is a subfolder, add ../ to path 
define("ADD", $pathCorrection());
//classes
spl_autoload_register(function($class_name){
	$classes = ADD . "class".DIRECTORY_SEPARATOR.$class_name.".php";
	$admclasses = ADD . "class".DIRECTORY_SEPARATOR."admin".DIRECTORY_SEPARATOR.$class_name.".php";
	if (file_exists(($classes))) {
		require_once($classes);
	}
	if (file_exists(($admclasses))) {
		require_once($admclasses);
	}
});
//path constants
define("HEADER"  , "inc" . DIRECTORY_SEPARATOR  . "header.php");
define("FOOTER"  , "inc" . DIRECTORY_SEPARATOR  . "footer.php");
?>