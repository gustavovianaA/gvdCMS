# gvdCMS 
## Gerenciar conteúdo em sites simples
## Por enquanto - Rodando sem enrolação...
<ol>
<li>Crie suas categorias manualmente na base de dados 'categories'</li>
<li>acesse 'pasta_raiz'/admin/create.php, e crie um item.</li>
<li>No index.php da pasta raiz edite <pre>Item::showSite1('Isira uma categora' , Insira o número máximo de itens )</pre></li>  
  <li>Na página exemplo(produtos.php) edite <pre>Item::showSite1('Isira uma categora')</pre></li>
</ol>

## Detalhes técnicos 
<ul>
<li>O método para exibir os itens recebe categoria e número máximo de itens: showSite1($category='' , $limit='')</li> 
<li>Sim, as páginas de categorias de item devem ser criadas manualmente.</li>
<li>Sem imagens,git: < 100kB</li>  
</ul>


