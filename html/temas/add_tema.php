<?php include(HTML_DIR . 'overall/header.php'); ?>

<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

<?php include(HTML_DIR . '/overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar">
<div class="mbr-section__container container mbr-section__container--isolated">

  <?php
  if(isset($_GET['error'])){
    if($_GET['error'] == 1) {
      echo '<div class="alert alert-dismissible alert-danger">
        <strong>Erro!</strong></strong> Os campos do tema não podem está vazios.
      </div>';
    }else if($_GET['error'] == 2) {
      echo '<div class="alert alert-dismissible alert-danger">
            <strong>Erro!</strong></strong> O titulo tem que ter pelo menos ' . MIN_TITULO_TEMAS . ' caracteres.
          </div>';
    }else{
      echo '<div class="alert alert-dismissible alert-danger">
            <strong>Erro!</strong></strong> O conteudo tem que ter pelo menos ' . MIN_CONTEUDO_TEMAS . ' caracteres.
          </div>';
    }
  }
  ?>

<div class="row container">
   

    <ol class="breadcrumb">
      <li><a href="?view=index"><i class="fa fa-tags"></i> Temas</a></li>
      <li><a href="?view=index"><i class="fa fa-tags"></i> <?php echo $_foruns[$id_forum]['nome'] ?></a></li>
    </ol>
</div>

<div class="row categorias_con_foros">
  <div class="col-sm-12">
      <div class="row titulo_categoria">Criar Tema no Fórum - <?php echo $_foruns[$id_forum]['nome'] ?></div>

      <div class="row cajas">
        <div class="col-md-9">
          <form class="form-horizontal" action="?view=temas&mode=add&id_forum=<?php echo $id_forum ?>" method="POST" enctype="application/x-www-form-urlencoded">
            <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Título</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="titulo" placeholder="Título para o tema">
                </div>
              </div>


              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Conteúdo</label>
                <div class="col-lg-10">
                  <textarea class="form-control tema_texarea" name="conteudo" placeholder="Conteúdo (aceita HTML)"></textarea>
                </div>
              </div>
             
             <?php if($users[$_SESSION['app_id']]['permissoes']>0){
              echo ' <div class="form-group">
                <label class="col-lg-2">&nbsp;</label>
                <label class="col-lg-10">
                  
                  <input type="checkbox" value="1" name="anuncio"/>
                  Criar tema como anúncio
                </label>

                
             </div>';
             }
             ?>
            

              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Criar</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>

        <div class="col-md-3">
          <div class="resaltado_caja">
            <strong><center>BBCode</center></strong>
            <ul class="no_style_list">
              <li>[b]Negrito[/b]</li>
              <li>[i]Italico[/i]</li>
              <li>[u]Sublinhado[/u]</li>
              <li>[s]Tachado[/s]</li>
              <li>[img]URL imagem[/img]</li>
              <li>[center]Centralizar[/center]</li>
              <li>[h1]Titulo grande[/h1]</li>
              <li>[h2]Titulo medio grande[/h2]</li>
              <li>[h3]Titulo medio[/h3]</li>
              <li>[h4]Titulo normal[/h4]</li>
              <li>[h5]Titulo pequeno[/h5]</li>
              <li>[h6]Titulo muito pequeno[/h6]</li>
              <li>[quote]Marcador[/quote]</li>
              <li>[size=20]Texto em 20px[/size]</li>
              <li>[url=URL LINK]Texto para link[/url]</li>
              <li>[font=Arial]Texto arial[/font]</li>
              <li>[bgimage=URL IMAGEN]Texto com imagem de fundo[/bgimage]</li>
              <li>[color=red]Cor vermelho[/color]</li>
              <li>[bgcolor=red]Cor de fundo vermelha[/bgcolor]</li>
            </ul>
          </div>
        </div>


      </div>
  </div>
</div>

</div>
</section>

<?php include(HTML_DIR . 'overall/footer.php'); ?>

</body>
</html>
