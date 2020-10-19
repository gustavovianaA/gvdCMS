<?php require_once('../config.php');
$categories = Category::list() ;  
include(HEADER); ?>
<main>
<div class="container-fluid" id="itemsSite">
<div class="row">
<a href='index.php' class='my-3 mx-2 btn btn-info adm-cat' cat='todas' >Todas categorias</a>
<?php foreach($categories as $cat){
		extract($cat);	
		echo "<a href='restrict.php?category=$category'   class='my-3 mx-2 btn btn-info adm-cat' cat='$category' >$category</a>";
}?>
</div>
 <section class="row">
<article class="px-4 col-12 col-lg-3 text-center" id="adm-user-info">
<!-- pre-user -->
<h2>'Website_name' - Admin</h2>
<p>User_name</p>	
<img style="max-width: 200px" class="pb-3 img-fluid rounded-circle" src="img/user.jpg">
<p class="btn btn-info btn-block">Trocar senha</p>
<p class="btn btn-info btn-block">Trocar foto</p>
<p class="btn btn-danger btn-block">Sair</p>
</article>
<article class="col12 col-lg-9 px-5" id="adm-display-cat"> 
	<?php  
	if(isset($_GET['category'])) 
 		AdmItem::showAdm1($_GET['category']); 
    else   
 		AdmItem::showAdm1(); ?>
 </article>	
</section>
</div>
</main>
<?php include(FOOTER); ?>

 	