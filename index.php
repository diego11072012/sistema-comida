<?php
session_start();
include 'library/configServer.php';
include 'library/consulSQL.php';
$_SESSION['t-index'] = date('s');
include './inc/link.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-156978057-2');
    </script>
    <title>Inicio</title>
</head>

<body id="container-page-index">
    <?php include './inc/navbar.php'; ?>
    <div class="jumbotron" id="jumbotron-index">
        <h1><span class="tittles-pages-logo"></span></h1>
        <p>
            <br><?php echo $Bienvenido; ?>
        </p>
    </div>
    <section id="new-prod-index">
        <div class="container">
        </div>
    </section>
    <section id="reg-info-index">
        <div class="container">
            <div class="row info-cafe" style="display: flex;align-items: center;">
                <div class="col-md-6"><img src="assets/img/info-principal.jpg" style="max-width: 100%;border-radius: 10px;"></div>
                <div class="col-md-6">
                    <h2 style="font-family:sans-serif;color:#a6704c"><strong>Origen del café</strong></h2>
                    <p style="text-align: justify;font-size: 15px;color: #676767;font-family: sans-serif;">Establecer los orígenes del café, en cuanto a fechas específicas, es una tarea que puede generar varios debates. No obstante, es el siglo VI d.E.C. que se indica con más frecuencia para establecer el origen del café como bebida gracias a un pastor de Etiopía. Posteriormente, ya en el siglo XV se pueden obtener pruebas irrefutables de su cultivo en Yemen y Abisinia.</p>
                    <p style="text-align: justify;font-size: 15px;color: #676767;font-family: sans-serif;">Fue gracias a los árabes que el café se expandió más allá de África, puesto que lograron en el siglo XVI introducirlo a Siria, Persia, Turquía y, también, a Europa. Para la segunda mitad del siglo XVII el café en el continente europeo se va volviendo cada vez más popular y en 1645 abren las primeras tiendas de esta bebida en Venecia.</p>
                </div>
            </div>
<div class="row" style="margin: 50px 0;">
    <div class="col-md-12">
    <h2 style="font-family:sans-serif;color:#a6704c;text-align: center;"><strong>PRODUCTOS DESTACADOS</strong></h2>
    </div>
</div>
            <div class="row">
                <div class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="text-align:center">
                        <div class="item active">
                            <div class="row">
                                <div class="col-md-4"><img src="assets/img-products/1.jpg" width="300" alt="1 slide"></div>
                                <div class="col-md-4"><img src="assets/img-products/2.jpg" width="300" alt="2 slide"></div>
                                <div class="col-md-4"><img src="assets/img-products/3.jpg" width="300" alt="3 slide"></div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row ">
                                <div class="col-md-4"><img src="assets/img-products/4.jpg" width="300" alt="4 slide"></div>
                                <div class="col-md-4"><img src="assets/img-products/5.jpg" width="300" alt="5 slide"></div>
                                <div class="col-md-4"><img src="assets/img-products/6.jpg" width="300" alt="6 slide"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php include './inc/footer.php'; ?>
</body>

</html>
<?php
if ($_SESSION['nombreUser'] != "")
    $usuario = $_SESSION['nombreUser'];
else if ($_SESSION['nombreAdmin'] != "")
    $usuario = $_SESSION['nombreAdmin'];
$codigo = "INGRESO_OK_INDEX";
$curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
$tipoAccion = "INGRESO";
$mensaje = "USUARIO INGRESO CORRECTAMENTE A INDEX[" . $tipoAccion . ": " . $codigo . "]";
ejecutarSQL::consultar("insert ACCIONES values ('$codigo','$usuario','$tipoAccion','$mensaje','$curPageName',CURRENT_TIMESTAMP) ");
?>