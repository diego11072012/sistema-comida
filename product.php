<?php
session_start(); 
include './library/configServer.php';
include './library/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Productos</title>
    <?php include './inc/link.php'; ?>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156978057-2');
</script>

</head>
<body id="container-page-product">
    <?php include './inc/navbar.php'; ?>
    <section id="store">
       <br>
        <div class="container-fluid" style="max-width: 1440px;margin: 0 auto;padding: 0px 0px;">
            <div class="page-header" style="text-align:center;margin:0px">
              <img class="product-banner" src="assets/img/product-banner.jpg" style="width: 100%;">
              <h1><strong>PRODUCTOS</strong></h1>
            </div>
            <br><br>
            <div class="row">
                <div class="col-xs-12">
                    <ul id="store-links" class="nav nav-tabs" role="tablist">
                      <li role="presentation"><a href="#all-product" role="tab" data-toggle="tab" aria-controls="all-product" aria-expanded="false"></a></li>
                      <li role="presentation" class="dropdown active" style="display:none">
                        <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents" aria-expanded="false">Categorías <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                          <!-- ==================== Lista categorias =============== -->
                          <?php
                            $categorias=  ejecutarSQL::consultar("select * from categoria");
                            while($cate=mysqli_fetch_array($categorias)){
                                echo '
                                    <li>
                                        <a href="#'.$cate['CodigoCat'].'" tabindex="-1" role="tab" id="'.$cate['CodigoCat'].'-tab" data-toggle="tab" aria-controls="'.$cate['CodigoCat'].'" aria-expanded="false">'.$cate['Nombre'].'
                                        </a>
                                    </li>';
                            }
                          ?>
                          <!-- ==================== Fin lista categorias =============== -->
                        </ul>
                      </li>
                    </ul>
                    <div id="myTabContent" class="tab-content" style="margin-top: -50px;">
                      <div role="tabpanel" class="tab-pane fade" id="all-product" aria-labelledby="all-product-tab">
                          <br><br>
                        <div class="row">
                        <?php
                            $consulta=  ejecutarSQL::consultar("select * from producto where Stock > 0");
                            $totalproductos = mysqli_num_rows($consulta);
                            if($totalproductos>0){
								$nums=1;
                                while($fila=mysqli_fetch_array($consulta)){
                                   echo '
                                  <div class="col-xs-12 col-sm-6 col-md-3">
                                       <div class="thumbnail">
                                         <a href="infoProd.php?from='.$origen.'&CodigoProd='.$fila['CodigoProd'].'"><img src="assets/img-products/'.$fila['Imagen'].'"></a>
                                         <div class="caption">
                                           <p>'.$fila['NombreProd'].'</p>
                                           <p>$'.$fila['Precio'].'</p>
                                           <p class="text-center">
                                               <a href="infoProd.php?from='.$origen.'&CodigoProd='.$fila['CodigoProd'].'" class="btn btn-primary btn-sm">Ver +</a>&nbsp;&nbsp;
                                               <button value="'.$fila['CodigoProd'].'" class="btn btn-success btn-sm botonCarrito">Añadir</button>
                                           </p>

                                         </div>
                                       </div>
                                   </div> 
									
                                   ';
								   
								   if ($nums%4==0){
									   echo '<div class="clearfix"></div>';
								   }
								   $nums++;
                               }   
                            }else{
                                echo '<h2>No hay productos en esta categoria</h2>';
                            }  
                        ?>
                        </div>
                      </div><!-- Fin del contenedor de todos los productos -->
                      
                      <!-- ==================== Contenedores de categorias =============== -->
                      <?php
                        $consultar_categorias= ejecutarSQL::consultar("select * from categoria");
						$nums=1;
					   while($categ=mysqli_fetch_array($consultar_categorias)){
                            echo '<div role="tabpanel" class="tab-pane fade active in" id="'.$categ['CodigoCat'].'" aria-labelledby="'.$categ['CodigoCat'].'-tab"><br>';
                                $consultar_productos= ejecutarSQL::consultar("select * from producto where CodigoCat='".$categ['CodigoCat']."' and Stock > 0");
                                $totalprod = mysqli_num_rows($consultar_productos);
                                if($totalprod>0){
									$nums=1;
                                   while($prod=mysqli_fetch_array($consultar_productos)){
                                      echo '
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                             <div class="thumbnail">
                                               <a href="infoProd.php?CodigoProd='.$prod['CodigoProd'].'"><img src="assets/img-products/'.$prod['Imagen'].'"></a>
                                               <div class="caption">
                                                 <h3>'.$prod['Marca'].'</h3>
                                                 <p>'.$prod['NombreProd'].'</p>
                                                 <p>$'.$prod['Precio'].'</p>
                                                 <p class="text-center">
                                                     <a href="infoProd.php?CodigoProd='.$prod['CodigoProd'].'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;
                                                     <button value="'.$prod['CodigoProd'].'" class="btn btn-success btn-sm botonCarrito"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>
                                                 </p>

                                               </div>
                                             </div>
                                         </div>     
                                         ';    
									 if ($nums%4==0){
									   echo '<div class="clearfix"></div>';
										}
									$nums++;	 
                                   } 
                                } else {
                                   echo '<h2>No hay productos en esta categoría</h2>'; 
                                }
                            echo '</div>'; 
                        }
                      ?>
                      <!-- ==================== Fin contenedores de categorias =============== -->
                    </div>
                </div>
            </div>
        </div>
    </section>
	
<?php
	
    //require 'requirelanguage.php';
	if ($_SESSION['nombreUser'] != "")
			$usuario = $_SESSION['nombreUser'];
		else if ($_SESSION['nombreAdmin'] != "")
			$usuario = $_SESSION['nombreAdmin'];

		
	$codigo = "INGRESO_OK_PRODUCTO";
	$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
	$tipoAccion = "INGRESO";
	$mensaje = "USUARIO INGRESO CORRECTAMENTE A PRODUCTOS[".$tipoAccion.": ".$codigo."]";
	ejecutarSQL::consultar("insert ACCIONES values ('$codigo','$usuario','$tipoAccion','$mensaje','$curPageName',CURRENT_TIMESTAMP) ");
	
	?>
    <?php include './inc/footer.php'; ?>
    <script>
        $(document).ready(function() {
            $('#store-links a:first').tab('show');
        });
    </script>
</body>
</html>
<style>
.row {
margin: 0px !important;
}
</style>




