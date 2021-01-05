<?php include(HTML_DIR . 'overall/header.php'); ?>

 <body>
 <section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

 <?php include(HTML_DIR . '/overall/topnav.php'); ?>

 <section class="mbr-section mbr-after-navbar">
 <div class="mbr-section__container container mbr-section__container--isolated">

   <?php
   if(isset($_GET['success'])) {
     echo '<div class="alert alert-dismissible alert-success">
       <strong>Listado!</strong> Categorias listadas corretamente.
     </div>';
   }

   if(isset($_GET['error'])) {
     echo '<div class="alert alert-dismissible alert-danger">
       <strong>Erro!</strong></strong> Erro ao listar categorias.
     </div>';
   }
   ?>

 <div class="row container">
    <div class="pull-right">
      <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
           <a class="mbr-buttons__btn btn btn-danger" href="?view=configForuns">FÓRUNS</a>
       </li></ul></div>
        <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
            <a class="mbr-buttons__btn btn btn-danger active" href="?view=categorias">CATEGORIAS</a>
        </li></ul></div>
        <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
            <a class="mbr-buttons__btn btn btn-danger" href="?view=categorias&mode=add">CRIAR CATEGORIA</a>
        </li></ul></div>
      </div>

     <ol class="breadcrumb">
       <li><a href="?view=categorias"><i class="fa fa-tags"></i> Categorias</a></li>
         

     </ol>
 </div>

 <div class="row categorias_con_foros">
   <div class="col-sm-12">
       <div class="row titulo_categoria">Lista de Categorias</div>

       <div class="row cajas">
         <div class="col-md-12">
           <?php

           if(false != $_categorias) {
            $HTML = '<table class="table">
            <thead><tr>
            <th style="width: 10%">Id</th>
            <th style="width: 70%">Nome de categoria</th>
            <th style="width: 20%">Ações</th>
            </tr></thead>
            <tbody>';
             foreach($_categorias as $id_categoria => $categoria_array) {
                 $HTML .= '<tr>
                   <td>'.$_categorias[$id_categoria]['id'].'</td>
                   <td>'.$_categorias[$id_categoria]['nome'].'</td>
                   <td>
                     <div class="btn-group">
                      <a href="#" class="btn btn-primary">Ações</a>
                      <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="?view=categorias&mode=edit&id='.$_categorias[$id_categoria]['id'].'">Editar</a></li>
                        <li><a onclick="DeleteItem(\'Tem certeza que deseja excluir a categoria?\',\'?view=categorias&mode=delete&id='.$_categorias[$id_categoria]['id'].'\')">Excluir</a></li>
                      </ul>
                    </div>
                   </td>
                 </tr>';
             }
             $HTML .= '</tbody></table>';
           } else {
             $HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMACÃO: </strong> Não existem categorias a serem mostradas.</div>';
           }

           echo $HTML;
           ?>
         </div>
       </div>
   </div>
 </div>

 </div>
 </section>

 <?php include(HTML_DIR . 'overall/footer.php'); ?>

 </body>
 </html>
