<?php include(HTML_DIR . 'overall/header.php'); ?>

<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

<?php include(HTML_DIR . '/overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar">
<div class="mbr-section__container container mbr-section__container--isolated">

  

<div class="row container">
   <div class="pull-right">
     <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
          <a class="mbr-buttons__btn btn btn-danger" href="">EDITAR PERFIL</a>
      </li></ul></div>
       
     </div>

    <ol class="breadcrumb">
      <li><a href="?view=index"><i class="fa fa-tags"></i> Usuário -  <?php echo $users[$id_usuario]['user']; ?></a></li>
    </ol>
</div>


<div class="row categorias_con_foros">
  <div class="col-sm-12">
      <div class="row titulo_categoria">Perfil de Usuários</div>

      <div class="row cajas">
        <div class="col-md-2">
          <center>

            <img src="views/app/images/users/default.jpg" class="thumbnail" height="120" />

            <strong><?php echo $users[$id_usuario]['user']; ?> </strong>
            <img src="views/app/images/<?php echo GetUserStatus($users[$id_usuario]['ultima_conexao']); ?>" />

            <br />
            <b style="color: green;">**<?php echo $users[$id_usuario]['categoria']; ?>**</b>
            <br /><br />
        </center>

            <ul style="list-style:none; padding-left: 4px;">
              <li><b><?php echo $db->recorrer($sql)[0]; ?></b> temas </li>
              <li><b><?php echo $users[$id_usuario]['mensagens']; ?></b> mensagens</li>
              <li><b><?php echo $users[$id_usuario]['idade']; ?></b> anos</li>
              <li>Registrado em <b><?php echo $users[$id_usuario]['data_registro']; ?></b></li>
            </ul>


        </div>
        <div class="col-md-10">
          <blockquote>
            <?php echo $users[$id_usuario]['biografia']; ?>
          </blockquote>
          <hr />
          <p>
           <?php echo BBcode($users[$id_usuario]['empresa']); ?>
          </p>
        </div>
      </div>
  </div>
</div>

</div>
</section>


<?php include(HTML_DIR . 'overall/footer.php'); ?>

</body>
</html>
