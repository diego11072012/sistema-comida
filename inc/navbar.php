<?php
error_reporting(E_PARSE);
?>
<section id="container-carrito-compras">
    <div class="container" style="width: 100%;">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <div id="carrito-compras-tienda"></div>
            </div>
            <div class="col-xs-12 col-sm-12">
                <p class="text-center" style="font-size: 80px;">
                    
                </p>
                <p class="text-center">
                    <a href="pedido.php" class="btn btn-success btn-block" style="float: right;">Ir a Caja</a>
                    <a href="process/vaciarcarrito.php" class="btn btn-danger btn-block">Vaciar carrito</a>
                </p>
            </div>
        </div>
    </div>
</section>
<nav id="navbar-auto-hidden">
    <div class="row hidden-xs">
        <!-- Menu Alimentos Registrados -->
        <div class="col-xs-4">
            <figure class="logo-navbar"></figure>
        </div>
        <div class="col-xs-8">
            <div class="contenedor-tabla pull-right">
                <div class="contenedor-tr">
                    <a accesskey="n" href="index.php" class="table-cell-td">Inicio</a>
                    <a accesskey="p" href="product.php" class="table-cell-td">Productos</a>
                    <?php
                    if (!$_SESSION['nombreAdmin'] == "") {
                        
                        echo ' <script>$(document).ready(function(){
                            $(".carrito-button-nav").hide();
                        });</script>
                                    <a href="configAdmin.php" class="table-cell-td">Administrar</a>
                                    <a href="#" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="' . $verccom . '">
                                        <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                                    </a>
                                    <a href="#" class="table-cell-td" data-toggle="modal" data-target=".modal-logout">
                                        <i class="fa fa-user"></i>&nbsp;&nbsp;' . $_SESSION['nombreAdmin'] . '
                                    </a>
                                 ';
                    } else if (!$_SESSION['nombreUser'] == "") {
                        echo ' 
                                    <a href="pedido.php" class="table-cell-td" style="display:none">' . $ped . '</a>
                                    <a href="#" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="' . $verccom . '">
                                        <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                                    </a>
                                    <a href="#" class="table-cell-td" data-toggle="modal" data-target=".modal-logout">
                                        <i class="fa fa-user"></i>&nbsp;&nbsp;' . $_SESSION['nombreUser'] . '
                                    </a>
                                 ';
                    } else {
                        echo ' 
                                    <a href="registration.php" class="table-cell-td">Registro</a>
                                    <a href="#" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="' . $verccom . '">
                                        <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                                    </a>
                                    <a href="#" class="table-cell-td" data-toggle="modal" data-target=".modal-login">
                                        <i class="fa fa-user"></i>&nbsp;&nbsp;Login
                                    </a>
                                 ';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row visible-xs">
        <!-- Mobile menu navbar -->
        <div class="col-xs-12">
            <button class="btn btn-default pull-left button-mobile-menu" id="btn-mobile-menu">
                <i class="fa fa-th-list"></i></button>
            <a href="#" id="button-shopping-cart-xs" class="elements-nav-xs all-elements-tooltip carrito-button-nav" data-toggle="tooltip" data-placement="bottom" title="<?php echo $verccom; ?>">
                <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
            </a>
            <?php
            if (!$_SESSION['nombreAdmin'] == "") {
                echo '
                    <a href="#"  id="button-login-xs" class="elements-nav-xs" data-toggle="modal" data-target=".modal-logout">
                        <i class="fa fa-user"></i>&nbsp; ' . $_SESSION['nombreAdmin'] . ' 
                    </a>';
            } else if (!$_SESSION['nombreUser'] == "") {
                echo '
                    <a href="#"  id="button-login-xs" class="elements-nav-xs" data-toggle="modal" data-target=".modal-logout">
                        <i class="fa fa-user"></i>&nbsp; ' . $_SESSION['nombreUser'] . ' 
                    </a>';
            } else {
                echo '
                       <a href="#" data-toggle="modal" data-target=".modal-login" id="button-login-xs" class="elements-nav-xs">
                        <i class="fa fa-user"></i>&nbsp;</a> 
                   ';
            }
            ?>
        </div>
    </div>
</nav>
<!-- Modal login -->
<div class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="modal-form-login">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center text-primary" id="myModalLabel"><?php echo $inise; ?></h4>
            </div>
            <form action="process/login.php" method="post" role="form" style="margin: 20px;" class="FormCatElec" data-form="login">
                <div class="form-group">
                    <label><span class="glyphicon glyphicon-user"></span>&nbsp;<?php echo $nob; ?></label>
                    <input type="text" class="form-control" name="nombre-login" placeholder="<?php echo $esnob; ?>" required="" />
                </div>
                <div class="form-group">
                    <label><span class="glyphicon glyphicon-lock"></span>&nbsp;<?php echo $contr; ?></label>
                    <input type="password" class="form-control" name="clave-login" placeholder="<?php echo $escontr; ?>" required="" />
                </div>
                <!--Como iniciaras session?-->
                <div class="" style="">
                    <p><?php echo $como; ?></p>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" value="option1" checked>
                            Usuario
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" value="option2">
                            Administrador
                        </label>
                    </div>
                </div>
                <!--Como iniciaras session?-->
                <div class="modal-footer" style="text-align:center !important;">
                    <button type="submit" class="btn btn-primary btn-sm">Iniciar Sesión</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
                <div class="ResFormL" style="width: 100%; text-align: center; margin: 0;"></div>
            </form>
        </div>
    </div>
</div>
<!-- Fin Modal login -->
<div id="mobile-menu-list" class="hidden-sm hidden-md hidden-lg">
    <br>
    <h3 class="text-center" style="font-family: sans-serif;">Menú Principal</h3>
    <button class="btn btn-default button-mobile-menu" id="button-close-mobile-menu">
        <i class="fa fa-times"></i>
    </button>
    <br><br>
    <ul class="list-unstyled text-center">
        <li><a href="index.php">Inicio</a></li>
        <li><a href="product.php">Productos</a></li>
        <?php
        if (!$_SESSION['nombreAdmin'] == "") {
            echo '<li><a href="configAdmin.php">' . $admntra . '</a></li>';
        } elseif (!$_SESSION['nombreUser'] == "") {
            echo '<li><a href="pedido.php">' . $ped . '</a></li>';
        } else {
            echo '<li><a href="registration.php">' . $regt . '</a></li>';
        }
        ?>
    </ul>
</div>
<!-- Modal carrito -->
<div class="modal fade modal-carrito" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <p class="text-center"><i class="fa fa-shopping-cart fa-5x"></i></p>
            <p class="text-center"><?php echo $elpr; ?></p>
            <p class="text-center"><button type="button" class="btn btn-primary btn-sm" data-dismiss="modal"><?php echo $acep; ?></button></p>
        </div>
    </div>
</div>
<!-- Fin Modal carrito -->

<!-- Modal logout -->
<div class="modal fade modal-logout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <p class="text-center"><?php echo $qcers; ?></p>
            <p class="text-center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
            <p class="text-center">
                <a href="process/logout.php" class="btn btn-primary btn-sm">Cerrar Sesión</a>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
            </p>
        </div>
    </div>
</div>
<!-- Fin Modal logout -->