<?php include(HTML_DIR . 'overall/header.php'); ?>

 <body>
 <section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE ?></a></section>

 <?php include(HTML_DIR . '/overall/topnav.php'); ?>

 <section class="mbr-section mbr-after-navbar">
 <div class="mbr-section__container container mbr-section__container--isolated">

   <?php
   if(isset($_GET['success'])) {
     echo '<div class="alert alert-dismissible alert-success">
       <strong>Listado!</strong> Fóruns listadas corretamente.
     </div>';
   }

   
   ?>

 <div class="row container">
    <div class="pull-right">
      <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
           <a class="mbr-buttons__btn btn btn-danger active" href="?view=configForuns">FÓRUNS</a>
       </li></ul></div>
        <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
            <a class="mbr-buttons__btn btn btn-danger " href="?view=categorias">CATEGORIAS</a>
        </li></ul></div>
        <div class="mbr-navbar__column"><ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item">
            <a class="mbr-buttons__btn btn btn-danger" href="?view=configForuns&mode=add">CRIAR FÓRUNS</a>
        </li></ul></div>
      </div>

     <ol class="breadcrumb">
       <li><a href="?view=configForuns"><i class="fa fa-tags"></i> Lista de Fóruns</a></li>
         

     </ol>
 </div>

 <div class="row categorias_con_foros">
   <div class="col-sm-12">
       <div class="row titulo_categoria">Lista de Fóruns</div>

       <div class="row cajas">
         <div class="col-md-12">
           <?php

           if(false != $_foruns) {
            $HTML = '<table class="table">
            <thead><tr>
            <th style="width: 10%">Id</th>
           <th>Forum</th>
           <th>Mensagens</th>
           <th>Temas</th>
           <th>Categoria</th>
           <th>Estado</th>
           <th style="width: 20%">Açoes</th>
           </tr></thead>
            <tbody>';
             foreach($_foruns as $id_forum => $forum_array) {
                $estado = $_foruns[$id_forum]['estado'] == 1 ? 'Aberto' : 'Fechado';
                 $HTML .= '<tr>
                  <td>'.$_foruns[$id_forum]['id'].'</td>
                  <td>'.$_foruns[$id_forum]['nome'].'</td>
                  <td>'.$_foruns[$id_forum]['quantidade_mensagens'].'</td>
                  <td>'.$_foruns[$id_forum]['quantidade_temas'].'</td>
                  <td>'.$_categorias[$_foruns[$id_forum]['id_categoria']]['nome'].'</td>
                  <td>'. $estado .'</td>
                  <td>
                     <div class="btn-group">
                      <a href="#" class="btn btn-primary">Ações</a>
                      <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="?view=configForuns&mode=edit&id='.$_foruns[$id_forum]['id'].'">Editar</a></li>
                        <li><a onclick="DeleteItem(\'Tem certeza que deseja excluir o Fórum?\',\'?view=configForuns&mode=delete&id='.$_foruns[$id_forum]['id'].'\')">Excluir</a></li>
                      </ul>
                    </div>
                   </td>
                 </tr>';
             }
             $HTML .= '</tbody></table>';
           } else {
             $HTML = '<div class="alert alert-dismissible alert-info"><strong>INFORMACÃO: </strong> Não existem fóruns a serem mostradas.</div>';
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
