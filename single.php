<?php 
if(!isset($_GET['c'] , $_GET['id'])){
	header('Location: index.php');
}
else{
	require_once('config.php'); 
	define('CATEGORY' , $_GET['c']);
	define('ID' , $_GET['id']);
}
include(HEADER);
?>
<main>
<div class="container" id="itemsAdm">
<section class="gvd_link gvd_content">
<?php 
//load item and instantiate object, default
$item = Item::loadByid(ID); 
extract($item);
$item = New Item($title,$description,$imgPath,$mainImg,$category,$extra,$id);
//Choose the layout
$item->showSingle1();
?></section>	
</div>
</main>
<?php include(FOOTER); ?>
