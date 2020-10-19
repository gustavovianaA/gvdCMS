<?php 
class AdmItem extends GvdItem{
//Admin show 1 - layout
public static function showAdm1($category=''){
	if($category === ''){
		echo '<h2 >Todas Categorias</h2>';
    $showCat = true;
  }else{
		echo "<h2>Categoria $category</h2>";
    $showCat = false;
  }


	$items = self::list($category);	

	foreach($items as $item){
		extract($item);	
		?>
	<h3 class="row"><?php echo $title; ?></h3>
    <?php if($showCat){?> <h5 class="row text-primary">Categoria: <?php echo $category; ?></h5> <?php } ?>
    <div class="row">    
		<div class="col-12 col-lg-4">			
			<?php $mainImage = self::mainImage($id);
			if($mainImage !== ''){ ?>
			<img class="img-fluid" src="../<?php echo self::mainImage($id)?>">
		    <?php }else{ echo '[Item não possui imagem]' ; } ?>
		</div>	
		<div class="col-12 col-lg-6">
			<p><?php echo $description;?></p>
		</div>
		<div class="col-12 col-lg-2">
			<a href="edit.php?id=<?php echo $id?>&category=<?php echo $category?>" class="btn btn-success btn-block" >Editar</a> 
			<a href="delete.php?id=<?php echo $id?>&category=<?php echo $category?>" class="btn btn-danger btn-block" >Deletar</a> 
		</div>	
	</div>
	<hr>
		<?php
	}	
}	
//Create form fuction - object context
public function prepareForm($option){
	self::createForm($option,$this->title, $this->description,$this->imgPath,$this->mainImg,$this->category,$this->id );
}		
//Write the form (create,edit,delete)
public static function createForm($option = 'create', $title = '', $description = '' ,$imgPath = '',$mainImg= '',$category = '',$id = ''){
  if(isset($_GET['category']))
    $targetCat = $_GET['category'];
  $categories = Category::list();	
  $disabled = function($option){
  	if($option === 'delete')
  		echo 'disabled';
  };

  $btnValue = function($option){
  	switch($option){
  		case 'create':
  			$value = 'Criar';
  			break;
  		case 'edit':
  			$value = 'Salvar';
  			break; 
   		case 'delete':
  			$value = 'Deletar';
  			break;
  		default:
  			$value = '';
  	}
  	echo $value;
  };
  ?> 
  <form method="post" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="f-select-category">Categoria </label>
    <input type ="text" name="category" class="form-control" id="f-select-category" value="<?php echo $targetCat?>" disabled>
  </div>

  <div class="form-group">
    <label for="f-section-title">Título</label>
    <input name="title" type="text" class="form-control" id="f-section-title" placeholder="Título do Item" value="<?php echo $title ?>" <?php $disabled($option) ?> required />
  </div>

    <?php if($option !== 'delete'){ ?>
    	<div class="form-group">
    	<label for="f-mainImg">Imagem Principal</label>
    	<input class="form-control" id="f-mainImg" type="file" accept="image/*" name="mainImg"/>
    	</div>

    	<div class="form-group">
    	<label for="f-imgpath">Demais Imagens</label>
    	<input  class="form-control" id="f-imgpath" type="file" accept="image/*" name="imgpath[]" multiple />
    	</div>
    <?php } ?>

 <div class="form-group">
    <label for="f-section-description">Descrição</label>
    <textarea name="description" class="form-control" id="f-section-description" rows="3" <?php $disabled($option) ?> required><?php echo $description ?></textarea>
  </div>
  <?php 
  //extra inputs area
  if($targetCat === 'extra' ){ ?>
  <div class="form-group">
    <label for="f-section-title">Extra 1</label>
    <input name="extra1" type="text" class="form-control" id="f-section-title" placeholder="Título do Item" value="<?php echo $title ?>" <?php $disabled($option) ?> required />
  </div>

  <div class="form-group">
    <label for="f-section-title">Extra 2</label>
    <input name="extra2" type="text" class="form-control" id="f-section-title" placeholder="Título do Item" value="<?php echo $title ?>" <?php $disabled($option) ?> required />
  </div>
  <?php } ?>

  <?php //btn Action-config 
  	if($option==='delete')
  		$btnStyle = 'btn-outline-danger';
  	else
  		$btnStyle = 'btn-outline-info';
  ?>

  <input type="submit" class="btn btn-block <?php echo $btnStyle ?>" name="<?php echo $option ?>" value="<?php $btnValue($option) ?>">
  </form>
<?php }
public static function validateForm(){
	$extra = '';
  $extraElements = ['extra' => 2];

  if($_POST['title'])
		$title = $_POST['title'];
	if($_FILES['imgpath']['name'])
		$imgPath =  $_FILES['imgpath']['name'];
	else
		$imgPath = '';	
    if($_FILES['mainImg']['name'])
		$mainImg =  $_FILES['mainImg']['name'];
	else
		$mainImg = '';
	if($_POST['description'])
		$description = $_POST['description'];
  foreach($extraElements as $extras){
    for($i = 1 ; $i <= $extras ; $i++ )
      $extra .= $_POST["extra$i"] . '|';
  }
    if(isset($title,$imgPath,$mainImg,$description)){
    	return [ 'title' => $title , 'imgPath' => $imgPath , 'mainImg' => $mainImg, 
    	'description' => $description , 'extra' => $extra];	
    }else{
    	return false;
    }
}
}
?>