<?php include(HTML_DIR . 'overall/header.php'); ?>

<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

<?php include(HTML_DIR . '/overall/topnav.php'); ?>

<section class="mbr-section mbr-after-navbar">
<div class="mbr-section__container container mbr-section__container--isolated">

  <?php
  if(isset($_GET['success'])) {
    echo '<div class="alert alert-dismissible alert-success">
      <strong>Editada!</strong> O fórum ' .$_foruns[$_GET['id']]['nome'] . ' foi editado com sucesso.
    </div>';
    echo "<meta HTTP-EQUIV='Refresh' CONTENT='3; URL=?view=configForuns'";
  }

    

  

  if(isset($_GET['error'])) {
    echo '<div class="alert alert-dismissible alert-danger">
      <strong>Erro!</strong></strong> Os campos do fórum não podem está vazios.
    </div>';
  }
  ?>

<div class="row container">
   <div class="pull-right">
     <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
          <a class="mbr-buttons__btn btn btn-danger" href="?view=configForuns">FÓRUNS</a>
      </li></ul></div>
       <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
           <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias">CATEGORIAS</a>
       </li></ul></div>
       <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
           <a class="mbr-buttons__btn btn btn-danger active" href="?view=configForuns&mode=add">CRIAR FÓRUM</a>
       </li></ul></div>
     </div>

    <ol class="breadcrumb">
      <li><a href="?view=index"><i class="fa fa-tags"></i> Fóruns</a></li>
    </ol>
</div>

<div class="row categorias_con_foros">
  <div class="col-sm-12">
      <div class="row titulo_categoria">Criar Fórum</div>

      <div class="row cajas">
        <div class="col-md-12">
          <form class="form-horizontal" action="?view=configForuns&mode=edit&id=<?php echo $_GET['id'] ?>" method="POST" enctype="application/x-www-form-urlencoded">
            <fieldset>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Nome</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="nome" placeholder="Nome para o Fórum" value="<?php echo $_foruns[$_GET['id']]['nome'] ?>">
                </div>
              </div>


              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Descrição</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" maxlength="250" name="descricao" placeholder="Descrição curta (aceita HTML)" value="<?php echo $_foruns[$_GET['id']]['descricao'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-lg-2 control-label">Categoria</label>
                <div class="col-lg-10">
                  <select name="categoria" class="form-control">
                    <?php
                      
                        foreach($_categorias as $id_categoria => $array_categoria) {

                          if($id_categoria == $_foruns[$_GET['id']]['id_categoria']) {
                              echo '<option value="'.$id_categoria.'" selected>'.$_categorias[$id_categoria]['nome'].'</option>';
                             
                             } else {
                                echo '<option value="'.$id_categoria.'">'.$_categorias[$id_categoria]['nome'].'</option>';
                          }
                        }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">Estado do fórum</label>
                <div class="col-lg-10">
                  <div class="radio">
                    <label>
                      <input type="radio" name="estado" value="1" <?php if($_foruns[$_GET['id']]['estado'] == 1) {echo 'checked=""';} ?>>
                      Aberto
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="estado" value="0"
                      <?php if($_foruns[$_GET['id']]['estado'] == 0) {echo 'checked=""';} ?>>
                      Fechado
                    </label>
                  </div>
                </div>
              </div>


              <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">Cancelar</button>
                  <button type="submit" class="btn btn-primary">Editar</button>
                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
  </div>
</div>

</div>
</section>

<?php include(HTML_DIR . 'overall/footer.php'); ?>

</body>
</html>
