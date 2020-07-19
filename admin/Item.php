<?php
class Item extends GvdItem{
//Generic Layout for website - 1
public static function showAll1($category='' , $limit=''){
	$items = self::list($category);	
	$count = 1;
	echo '<div class="row justify-content-center">';
	foreach($items as $item){
		extract($item);
		?>		     		
		<div class="text-center col-4">
			<a alt='<?php echo "$category-$title"?>'  href='<?php echo "single.php?&c=$category&id=$id"?>'>
			<h3><?php echo $title ?></h3>
			<?php if($mainImg !== ''){
				$img = self::mainImage($id);
				echo "<img class='img-fluid' src='$img' alt='$title'>";}?>
		    </a>
		    <p><?php echo $description ?></p>
		</div>	
		<?php	
	if($count == $limit)
		break;
	$count++;
	}
	echo '</div>';	
}
//Generic Layout (content with extra data) for website - 1 
public static function showExtra1($category='' , $limit=''){
	$items = self::list($category);	
	$count = 1;
	echo '<div class="row justify-content-center">';
	foreach($items as $item){
		extract($item);
		?>		     		
		<div class="text-center col-4">
			<a alt='<?php echo "$category-$title"?>'  href='<?php echo "single.php?&c=$category&id=$id"?>'>
			<h3><?php echo $title ?></h3>
			<?php if($mainImg !== ''){
				$img = self::mainImage($id);
				echo "<img class='img-fluid' src='$img' alt='$title'>";}?>
		    </a>
		    <h5><?php echo $description ?></h5>
		    <?php 
		    $extra = explode("|" , $extra);
		    if($category === 'extra'){ 
		    	echo "<p style='line-height: 1em;color : red'>$extra[0]</p>";
		    	echo "<p style='line-height: 1em'>$extra[1]</p>";
		    }?>
		</div>	
		<?php	
	if($count == $limit)
		break;
	$count++;
	}
	echo '</div>';	
}
//Single item show 1 -layout
public function showSingle1(){
$images = $this->allImages();
$galery = '';
for($i = 0 ; $i < count($images) ; $i++){
$galery .= "<div class='col-4 p-0'><img class='img-fluid' alt='$this->title' src='" .  $images[$i] . "'></div>" ;	
}
?>
<h1><?php echo $this->title ;?></h1>
<section class="row">
<div class="col-md-6 p-0">
<img class="img-fluid " alt="imagem" src='<?php echo $this->mainImage($this->id)?>'>
</div>
<div class="col-md-6">
<p><?php echo $this->description ;?></p>	
</div>
</section>
<section class="row my-5">
<?php echo $galery; ?>
</section>	
<?php
} 
}
?>