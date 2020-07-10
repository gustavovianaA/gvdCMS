<?php 
if(isset($_GET['id' ]) && $_GET['id' ] != '' )
$itemId = $_GET['id'];
else
header('Location: index.php');
function saveEdit($itemId , $targetCat){
	$item = AdmItem::validateForm();	
	extract($item);	
	if($mainImg !== '' || $imgPath !== '') include('imgUpload.php');
	$edited = new AdmItem($title,$description,$imgPath,$mainImg,$targetCat,$extra,$itemId);	
	$edited->edit();
	echo "<script>window.location.href = 'restrict.php'</script>";
}
require_once('../config.php');
include(HEADER); 
if(isset($_POST['edit']))
	saveEdit($itemId, $_GET['category']);
$item = AdmItem::loadById($itemId);   
extract($item);
$item = new AdmItem($title,$description,$imgPath,$mainImg,$category,$id);
?>
<div class="container">
<div class="row"> 
 <div class="col-md-6"><?php $item->prepareForm('edit');  ?></div>    
<!-- Display item images -->
<div class="col-md-6">
<h2> Imagens do item </h2> 	
 <?php   
    $mainImg = $item->mainImage($id);
    echo "<div class='row'><div style='width: 33% ; display: inline-block' class='p-0' id='adm-mainimg'><img class='img-fluid' alt='imagem' src='../" . $mainImg . "'>PRINCIPAL</div></div>";
    $images = $item->allImages();
	$galery = '';
	for($i = 0 ; $i < count($images) ; $i++){
	$galery .= "<div style='width: 33% ; display: inline-block' class='  p-0'><img class='img-fluid' alt='imagem' src='../" . $images[$i] . "'></div>" ;	
} ?>
 <?php echo $galery; ?>
 </div>
</div>
</div>
<?php include(FOOTER); ?>