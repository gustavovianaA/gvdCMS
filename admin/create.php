<?php 
function getForm($targetCat){
	$item = AdmItem::validateForm(); 
	if( $item != false ){	
		extract($item);		
		if($mainImg !== '') include('imgUpload.php');
		$item = new AdmItem($title,$description,$imgPath,$mainImg,$targetCat,$extra);
		$item->create();
		echo "<script>window.location.href = 'restrict.php'</script>";	
	}
}
require_once('../config.php');
include(HEADER); 
if(isset($_POST['create']))
getForm($_GET['category']);
if(isset($_GET['category'])){
$targetCat = $_GET['category'];
?>
<div class="container">
<div class="row">
 <div class="col-md-6"><?php AdmItem::createForm(); ?></div>  
</div>
</div>
<?php }else{
$categories = Category::list();
echo "<div class='container'><div class='row px-5'>";
foreach($categories as $cat){
		extract($cat);	
		echo "<a href='create.php?category=$category'   class='my-1 btn btn-info btn-block adm-cat' cat='$category' >$category</a>
		";
}
echo "</div></div>";	
} 
include(FOOTER); ?>