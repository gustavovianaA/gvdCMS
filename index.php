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
</section>
<section>
<h2 class="text-center">Contato</h2>
<form id="form_msg_client" class="mx-5 px-4 py-5">
   <div class="form-group">
    <label for="contact-name">Nome</label>
    <input type="text" class="form-control" id="contact-name">
  </div>
  <div class="form-group">
    <label for="contact-phone">Telefone</label>
    <input type="text" class="form-control" id="contact-phone">
  </div>
   <div class="form-group">
    <label for="contact-mail">E-mail</label>
    <input type="text" class="form-control" id="contact-mail">
  </div>
  <div class="form-group">
    <label for="contact-msg">Mensagem</label>
    <textarea class="form-control" id="contact-msg" rows="3"></textarea>
  </div>
  <div id="form_msg_client_send" class="btn btn-block btn-primary">
    Enviar
  </div>
  <p id="form_msg_client_feedback"></p>
</form>
</section>
</div>
</main>
<?php include(FOOTER); ?>
<ol>
<li>--- 0.1</li>
<li><strong>OK : CRUD em itens</strong></li>
<li><strong>OK : Área restrita</strong></li>
<li><strong>OK : Criar createbycat para ser possível modificar o form de acordo com a categoria</strong>></li>
<li><strong>OK : criar coluna extra, concatenar extras e salvar</strong></li>
<li><strong>OK : Front-end painel de login</strong></li>
<li><strong>OK : Github</strong></li>
<li><strong>OK BUG : as imagens não estão indo para as pastas de categoria</strong></li>
<li><strong>OK : Trabalhar melhor os itens extra , mandar a categoria pro validateForm() e modificar edit, create .php</strong></li>
<li><strong>OK: Negar acesso direto à arquivos de classe e pasta app</strong></li>
<li>Upload de imagem gera um thumb, index carrega só thumbs</li>
<li>Corrigir bugs</li>
<li>Segurança do app</li>
<li>--- 0.2</li>
<li>Na single colocar um modal para visualização única de imagem</li>
<li>Mudar a ordem de objetos da categoria</li>
<li>métodos mágicos nas classes</li>
<li>Quando deletar o item, deletar também suas imagens</li>
</ol>
