<?php
include(HTML_DIR.'overall/header.php');
?>

<body>
<?php
include(HTML_DIR.'overall/topnav.php');

?>

<section class="mbr-section mbr-after-navbar" id="content1-10">




    <div class="mbr-section__container container mbr-section__container--isolated">


<div class="alert alert-dismissible alert-success">
      <strong>Senha Atualizada!</strong> foi gerada uma nova senha <strong><?php echo $password ?></strong> , use esta senha <a data-toggle="modal" data-target="#Login">iniciar sessão</a> com ela poderá logar e trocar sua senha para outra de sua preferência.
  </div>

        <div class="row">
            <div class="mbr-article mbr-article--wysiwyg col-sm-8 col-sm-offset-2">
            <p>
               
            </p>
          </div>
        </div>
    </div>
</section>



<?php
include(HTML_DIR.'overall/footer.php');
?>