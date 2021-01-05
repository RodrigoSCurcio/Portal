<?php
include(HTML_DIR.'overall/header.php');
?>

<body>
<?php
include(HTML_DIR.'overall/topnav.php');

?>

<section class="mbr-section mbr-after-navbar" id="content1-10">




    <div class="mbr-section__container container mbr-section__container--isolated">


<?php
  if(isset($_GET['success'])) {
    echo '<div class="alert alert-dismissible alert-success">
      <strong>Ativado!</strong> Usuário ativado corretamente.
    </div>';
  }

   if(isset($_GET['error'])) {
    echo '<div class="alert alert-dismissible alert-danger">
      <strong>Erro!</strong></strong>Não se pode ativar o usuário.
    </div>';
  } 
  ?>



  <?php if(isset($_SESSION['app_id']) and ($_foruns[$id_forum]['estado'] == 1 or $users[$_SESSION['app_id']]['permissoes'] == 2)){
    echo '<div class="row_container">
        <div class="pull-right">
            <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
              <a class="mbr-buttons__btn btn btn-danger" href="?view=temas&mode=add&id_forum='. $id_forum . '">NOVO TEMA</a>
            </li></ul></div>
 </div>';
  }
  ?>






       <ol class="breadcrumb">
          <li><a href="?view=index"><i class="fa fa-home"></i> Inicio</a></li>
          <li><a href=""><i class="fa fa-home"></i> <?php echo $_foruns[$id_forum]['nome'] ?></a></li>
        </ol>



        <div class="row categorias_con_foros">
      <div class="col-sm-12">
            <div class="row titulo_categoria">Anuncios</div>

            <?php
              if($db->rows($sql_anuncios) > 0){
                while($anuncio = $db->recorrer($sql_anuncios)){
                  if($anuncio['estado'] == 1){
                    $extensao = '.png';
                  }else{
                    $extensao = '_bloqueado.png';
                  }

                  echo '<div class="row foros">
                <div class="col-md-1" style="height:50px;line-height: 37px;">
                  <img src="views/app/images/foros/foro_leido'. $extensao.'" />
                </div>
                <div class="col-md-7 puntitos" style="padding-left: 0px;line-height: 37px;">
                <a href="temas/'. UrlAmigavel($anuncio['id'], $anuncio['titulo'], $id_forum) .'"> '. $anuncio['titulo'] .'  </a>
                </div>
                <div class="col-md-2 left_border" style="text-align: center;font-weight: bold;">
            '.number_format($anuncio['visitas'], 0, ',', '.').' Visitas <br>
                  '.number_format($anuncio['respostas'], 0, ',', '.').' Respostas 
                </div>
                <div class="col-md-2 left_border puntitos" style="">
                  Por <a href="?view=perfil&id='.$anuncio['id_ultimo'].'">'.$users[$anuncio['id_ultimo']]['user'].'</a><br />
                  '.$anuncio['ultima_data'].'
                </div>
              
          </div>';
                }
              }else{
                echo '<div class="row foros">
              <div class="col-md-12" style="height:50px;line-height: 37px;">
                Não existem temas.
              </div>
            </div>';
              }
            ?>

            
      </div>
 </div>


 <div class="row categorias_con_foros">
      <div class="col-sm-12">
          <div class="row titulo_categoria">Foruns</div>
          
          <?php
              if($db->rows($sql_nao_anuncios) > 0){
                while($anuncio = $db->recorrer($sql_nao_anuncios)){
                  if($anuncio['estado'] == 1){
                    $extensao = '.png';
                  }else{
                    $extensao = '_bloqueado.png';
                  }

                  echo '<div class="row foros">
                <div class="col-md-1" style="height:50px;line-height: 37px;">
                  <img src="views/app/images/foros/foro_leido'. $extensao.'" />
                </div>
                <div class="col-md-7 puntitos" style="padding-left: 0px;line-height: 37px;">
                <a href="temas/'. UrlAmigavel($anuncio['id'], $anuncio['titulo'], $id_forum) .'"> '. $anuncio['titulo'] .'  </a>
                </div>
                <div class="col-md-2 left_border" style="text-align: center;font-weight: bold;">
            '.number_format($anuncio['visitas'], 0, ',', '.').' Visitas <br>
                  '.number_format($anuncio['respostas'], 0, ',', '.').' Respostas 
                </div>
                <div class="col-md-2 left_border puntitos" style="">
                  Por <a href="?view=perfil&id='.$anuncio['id_ultimo'].'">'.$users[$anuncio['id_ultimo']]['user'].'</a><br />
                  '.$anuncio['ultima_data'].'
                </div>
              
          </div>';
                }
              }else{
                echo '<div class="row foros">
              <div class="col-md-12" style="height:50px;line-height: 37px;">
                Não existem temas.
              </div>
            </div>';
              }
            ?>


      </div>
 </div>





</div>
    
</section>


 



<?php
include(HTML_DIR.'overall/footer.php');
?>