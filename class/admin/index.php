<?php require_once('config.php'); 
include(HEADER);
?>
<main>
<div class="container" id="itemsAdm">
<section class="gvd_link gvd_content produtos" id="produtos">
<h2 class="text-center">Categoria 1</h2>
<a href="categoria1.php"><p class="text-center">Veja mais...</p></a>
<?php Item::showAll1('categoria1' , 3) ?>
</section>
<section class="gvd_link gvd_content servicos" id="servicos">
<h2 class="text-center">Categoria 2</h2>
<?php Item::showAll1('categoria2' , 3) ?>		
</section>
<section class="gvd_link gvd_content servicos" id="extra1">
<h2 class="text-center">Extra 1</h2>
<?php Item::showExtra1('extra' , 3) ?>		
</div>
</section>
</main>
<?php include(FOOTER); ?>
<ol>
<li><strong>OK : CRUD em itens</strong></li>
<li><strong>OK : Área restrita</strong></li>
<li><strong>OK : Criar createbycat para ser possível modificar o form de acordo com a categoria</strong>></li>
<li><strong>OK : criar coluna extra, concatenar extras e salvar</strong></li>
<li>Front-end painel de login</li>
<li>Na single colocar um modal para visualização única de imagem</li>
<li>Upload de imagem gera um thumb, index carrega só thumbs</li>
<li>Mudar a ordem de objetos da categoria</li>
<li>Negar acesso direto à arquivos de classe e pasta app</li>
<li>métodos mágicos nas classes</li>
<li>Segurança do app</li>
<li>Quando deletar o item, deletar também suas imagens</li>
</ol>
