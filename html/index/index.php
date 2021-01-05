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

  <?php if(isset($_SESSION['app_id']) and $users[$_SESSION['app_id']]['permissoes'] >= 2){
    echo '<div class="row_container">
        <div class="pull-right">
            <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
              <a class="mbr-buttons__btn btn btn-danger" href="?view=configForuns">GESTÃO DE FÓRUNS</a>
            </li></ul></div>
            <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
              <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias">GESTÃO DE CATEGORIAS</a>
            </li></ul></div>
 </div>';
  }
  ?>






       <ol class="breadcrumb">
          <li><a href="?view=index"><i class="fa fa-home"></i> Inicio</a></li>
        </ol>



       <?php if(false != $_categorias){
        $prepare_sql = $db->prepare("SELECT id FROM foruns WHERE id_categoria = ? ;");
        $prepare_sql->bind_param('i', $id_categoria);
        foreach($_categorias as $id_categoria => $array_categoria){
          $prepare_sql->execute();
          $prepare_sql->store_result();



           echo '<div class="row categorias_con_foros">
              <div class="col-sm-12">
                  <div class="row titulo_categoria">'.$_categorias[$id_categoria]['nome'].
                  
                 '</div>';

                 if($prepare_sql->num_rows > 0){
                  $prepare_sql->bind_result($id_do_forum);
                  while($prepare_sql->fetch()){
                  if($_foruns[$id_do_forum]['estado'] == 1){
                    $extensao = '.png';
                  }else{
                    $extensao = '_bloqueado.png';
                  }

                  if($_foruns[$id_do_forum]['ultimo_tema'] == ''){
                    $ultimo_tema = '<a href=""> Não há temas Criado!</a>';
                  }else{
                    $ultimo_tema = '<a href="temas/' . UrlAmigavel($_foruns[$id_do_forum]['id_ultimo_tema'], $_foruns[$id_do_forum]['ultimo_tema'], $id_do_forum).'">'. $_foruns[$id_do_forum]['ultimo_tema'] .'</a>';
                  }
                  

                  echo '<div class="row foros">
                        <div class="col-md-1" style="height:50px;line-height: 37px;">
                          <img src="views/app/images/foros/foro_leido'.$extensao.'" />
                        </div>
                        <div class="col-md-7 puntitos" style="padding-left: 0px;">
                          <a href="foruns/'.UrlAmigavel($id_do_forum, $_foruns[$id_do_forum]['nome']).'">'. $_foruns[$id_do_forum]['nome'] .'</a><br />
                          '. $_foruns[$id_do_forum]['descricao'] .'
                          </div>


            <div class="col-md-2 left_border" style="text-align: center;font-weight: bold;">
            '. number_format($_foruns[$id_do_forum]['quantidade_temas'], 0, ',', '.') .' - Temas<br>
            '. number_format($_foruns[$id_do_forum]['quantidade_mensagens'], 0, ',', '.') .' - Mensagens <br>

          </div>
          <div class="col-md-2 left_border puntitos" style="line-height: 37px;">
            '. $ultimo_tema .'
          </div>
        </div>
';
                 
              
        }

                 }else{
                  echo '<div class="row foros">
          <div class="col-md-12" style="height:50px;line-height: 37px;">
            Não possuem fóruns nesta categoria.
          </div>
        </div>';
                 }
                 
    }
           
        }else{
          echo '
           <div class="row categorias_con_foros">
    <div class="col-sm-12">
        <div class="row titulo_categoria">'. APP_TITLE . '</div>
          <div class="row foros">
          <div class="col-md-12" style="height:50px;line-height: 37px;">
            Não possuem fóruns.
          </div>
        </div>
      

      </div>

       
    </div>';
        } ?>
        


</div>
    
</section>


 



<?php
include(HTML_DIR.'overall/footer.php');
?>