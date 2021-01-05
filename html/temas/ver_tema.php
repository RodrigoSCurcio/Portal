<?php include(HTML_DIR . 'overall/header.php'); ?>

<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

<?php include(HTML_DIR . '/overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar">
<div class="mbr-section__container container mbr-section__container--isolated">

  

<div class="row container">
   <div class="pull-right">

   <?php
   $permissoes_do_dono = ($users[$_SESSION['app_id']]['permissoes'] > 0 or $tema['id_dono'] == $_SESSION['app_id']);

    if($permissoes_do_dono){
        if($tema['estado']==1){
      echo '<div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
            <a class="mbr-buttons__btn btn btn-danger" href="?view=temas&mode=close&id='. $_GET['id'].'&id_forum=' .$_GET['id_forum'] .'&estado=0">FECHAR </a>
        </li></ul>
        </div>';
      }else{
        echo '<div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
              <a class="mbr-buttons__btn btn btn-danger" href="?view=temas&mode=delete&id='. $_GET['id'].'&id_forum=' .$_GET['id_forum'] .'">DELETAR </a>
          </li></ul>
          </div>';
      }
    }

    if($tema['estado']==1){
    echo '
       <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
            <a class="mbr-buttons__btn btn btn-danger" href="?view=temas&mode=responder&id='. $_GET['id'].'&id_forum=' .$_GET['id_forum'] .'">RESPONDER </a>
        </li></ul>
        </div>';
   }else if($permissoes_do_dono and $tema['estado']==0){
      echo '
       <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
            <a class="mbr-buttons__btn btn btn-danger" href="?view=temas&mode=close&id='. $_GET['id'].'&id_forum=' .$_GET['id_forum'] .'&estado=1">ABRIR </a>
        </li></ul>
        </div>';
   }

   ?>
      
       
       
     </div>

    <ol class="breadcrumb">
      <li><a href="?view=index"><i class="fa fa-tags"></i> Usuário -  <?php echo $users[$tema['id_dono']]['user']; ?></a></li>
    </ol>
</div>


<div class="row categorias_con_foros">
  <div class="col-sm-12">
      <div class="row titulo_categoria"><?php echo $tema['titulo']; ?></div>

      <div class="row cajas">
        <div class="col-md-2">
          <center>

            <img src="views/app/images/users/default.jpg" class="thumbnail" height="120" />

            <strong><?php echo $users[$tema['id_dono']]['user']; ?> </strong>
            <img src="views/app/images/<?php echo GetUserStatus($users[$tema['id_dono']]['ultima_conexao']); ?>" />

            <br />
            <b style="color: green;">**<?php echo $users[$tema['id_dono']]['categoria']; ?>**</b>
            <br /><br />
        </center>

            <ul style="list-style:none; padding-left: 4px;">
              <li><b></b>  </li>
              <li><b><?php echo $users[$tema['id_dono']]['mensagens']; ?></b> mensagens</li>
              <li><b><?php echo $users[$tema['id_dono']]['idade']; ?></b> anos</li>
              <li>Registrado em <b><?php echo $users[$tema['id_dono']]['data_registro']; ?></b></li>
            </ul>


        </div>
        <div class="col-md-10">
          <blockquote>
            <?php echo BBcode($tema['conteudo']); ?>
          </blockquote>

          <?php 
            if($permissoes_do_dono){
               echo '<a href="?view=temas&mode=edit&id='. $_GET['id'].'&id_forum=' .$_GET['id_forum'] .'" class="btn btn-primary">EDITAR </a>';
            }
          ?>

          <hr />
          <p>
           <?php echo BBcode($users[$tema['id_dono']]['empresa']); ?>
          </p>

        </div>

      </div>

 <br> <br>

  </div>



<?php
if(false != $respostas){
   foreach($respostas as $resp){
    echo '
    <div class="col-sm-12">
  <br>
        <div class="row titulo_categoria">Respostas</div>

        <div class="row cajas">
          <div class="col-md-2">
            <center>

              <img src="views/app/images/users/default.jpg" class="thumbnail" height="120" />

              <strong>'. $users[$resp['id_dono']]['user'] .' </strong>
              <img src="views/app/images/'.  GetUserStatus($users[$resp['id_dono']]['ultima_conexao']) .'" />

              <br />
              <b style="color: green;">**'.  $users[$resp['id_dono']]['categoria'] .'**</b>
              <br /><br />
          </center>

              


          </div>
          <div class="col-md-10">
            <blockquote>
              '.BBcode($resp['conteudo']).'
            </blockquote>
            <hr />
            <p>
             '.BBcode($users[$resp['id_dono']]['empresa']).'
            </p>
          </div>
        </div>
    </div>';

  }
}

?>


</div>

</div>
</section>


<?php include(HTML_DIR . 'overall/footer.php'); ?>

</body>
</html>
