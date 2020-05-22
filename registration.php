<?php 
 session_start();
 include 'library/configServer.php';
 include 'library/consulSQL.php'; 
?>

<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Registrarse</title>
    <?php include './inc/link.php';    ?>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-156978057-2');
</script>  
</head>
<body id="container-page-registration">
    <?php include './inc/navbar.php'; ?>
    <section id="form-registration">
        <div class="container">
            <div class="row">
                <div class="page-header">
                <h1 style="font-family: sans-serif;color: #a6704c;"><strong>Registro</strong> <small style="color: #a6704c;">Nuevo Usuario</small></h1>
                </div>
                <div class="col-xs-12 col-sm-6 text-center" style="padding: 0px;background: url(./assets/img/img-login.jpg);height: 725px;margin-top: 3.6%;background-repeat: round;">
                </div>
                <div class="col-xs-12 col-sm-6" style="padding: 0px;">
                   <br><br>
                    <div id="container-form" style="height: 725px;">
                       <form class="form-horizontal FormCatElec" action="process/regclien.php" role="form" method="post" data-form="save">
                           <div class="form-group" style="display:none">
                              <div class="input-group" >
                                <div class="input-group-addon"><i class="fa fa-credit-card"></i></div>
                                <input class="form-control all-elements-tooltip" type="hidden" placeholder="<?php echo $nit; ?>" required name="clien-nit" data-toggle="tooltip" data-placement="top" title="<?php echo $nit_err; ?>" maxlength="30" pattern="[0-9-]{14,30}" value="12345678998765">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon" style="display:none"><i class="fa fa-user"></i></div>
                                <label for="clien-name" style="color: white;font-family: sans-serif;font-size: 20px;font-weight: 100;">Nombre</label><br>
                                <input class="form-control all-elements-tooltip" type="text"  required name="clien-name" data-toggle="tooltip" data-placement="top" title="<?php echo $Inusuario_err; ?>" pattern="[a-zA-Z]{1,9}" maxlength="9">
                              </div>
                            </div>                         
                            <div class="form-group" style="display:none">
                              <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input class="form-control all-elements-tooltip" type="text" placeholder="<?php echo $Innombre; ?>" name="clien-fullname" data-toggle="tooltip" data-placement="top" title="<?php echo $Innombre_err; ?>" pattern="[a-zA-Z ]{1,50}" maxlength="50">
                              </div>
                            </div>                       
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon" style="display:none"><i class="fa fa-user"></i></div>
                                <label for="clien-lastname" style="color: white;font-family: sans-serif;font-size: 20px;font-weight: 100;">Apellido</label><br>
                                <input class="form-control all-elements-tooltip" type="text" placeholder="<?php echo $Inapellido; ?>" required name="clien-lastname" data-toggle="tooltip" data-placement="top" title="<?php echo $Inapellido_err; ?>" pattern="[a-zA-Z ]{1,50}" maxlength="50">
                              </div>
                            </div>
                            
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon" style="display:none"><i class="fa fa-lock"></i></div>
                                <label for="clien-pass" style="color: white;font-family: sans-serif;font-size: 20px;font-weight: 100;">Contraseña</label><br>
                                <input class="form-control all-elements-tooltip" type="password" placeholder="<?php echo $Incontrase単a; ?>" required name="clien-pass" data-toggle="tooltip" data-placement="top" title="<?php echo $Incontrase単a_err; ?>">
                              </div>
                            </div>
                        
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon" style="display:none"><i class="fa fa-home"></i></div>
                                <label for="clien-dir" style="color: white;font-family: sans-serif;font-size: 20px;font-weight: 100;">Dirección</label><br>
                                <input class="form-control all-elements-tooltip" type="text" placeholder="<?php echo $Indireccion; ?>" required name="clien-dir" data-toggle="tooltip" data-placement="top" title="<?php echo $Indireccion_err; ?>" maxlength="100">
                              </div>
                            </div>
                         
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon" style="display:none"><i class="fa fa-mobile"></i></div>
                                <label for="clien-phone" style="color: white;font-family: sans-serif;font-size: 20px;font-weight: 100;">Teléfono</label><br>
                                <input class="form-control all-elements-tooltip" type="tel" placeholder="<?php echo $Intelefono; ?>" required name="clien-phone" maxlength="11" pattern="[0-9]{8,11}" data-toggle="tooltip" data-placement="top" title="<?php echo $Intelefono_err; ?>">
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-addon" style="display:none"><i class="fa fa-at"></i></div>
                                <label for="clien-email" style="color: white;font-family: sans-serif;font-size: 20px;font-weight: 100;">Correo</label><br>
                                <input class="form-control all-elements-tooltip" type="email" placeholder="<?php echo $Inemail; ?>" required name="clien-email" data-toggle="tooltip" data-placement="top" title="<?php echo $Inemail_err; ?>" maxlength="50">
                              </div>
                            </div>
                            <br>
                            <p><button type="submit" class="btn btn-success btn-block"><i class="fa fa-pencil"></i>Resgistrarme</button></p>
                            <div class="ResForm" style="width: 100%; color: #fff; text-align: center; margin: 0;"></div>
                        </form> 
                    </div> 
                </div>
            </div>
        </div>
    </section>

<?php 
	
	
	if ($_SESSION['nombreUser'] != "")
		$usuario = $_SESSION['nombreUser'];
	else if ($_SESSION['nombreAdmin'] != "")
		$usuario = $_SESSION['nombreAdmin'];

	
	$codigo = "INGRESO_OK_REGISTRO";
	$curPageName = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1); 
	$tipoAccion = "INGRESO";
	$mensaje = "USUARIO INGRESO CORRECTAMENTE A REGISTRO[".$tipoAccion.": ".$codigo."]";
	ejecutarSQL::consultar("insert ACCIONES values ('$codigo','$usuario','$tipoAccion','$mensaje','$curPageName',CURRENT_TIMESTAMP) ");

  
  
?>	
	
	
    <?php include './inc/footer.php'; ?>
</body>
</html>