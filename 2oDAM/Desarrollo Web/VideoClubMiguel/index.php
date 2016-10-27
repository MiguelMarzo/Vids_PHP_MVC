<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/app/controllers/indexController.php');

$films = indexAction();
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>VideoClub</title>
        <!-- Bootstrap Core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="assets/css/small-business.css" rel="stylesheet">

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img class="img-rounded" src="assets/img/small-logo.png" alt="" width="161">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="app/views/insert.php">¡Añade un película!</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">

            <!-- Heading Row -->
            <div class="row">
                <div class="col-md-8">
                    <img class="img-responsive img-rounded" src="assets/img/main-logo.jpg" alt="">
                </div>
                <!-- /.col-md-8 -->
                <div class="col-md-4">
                    <h1 class="">Comunidad de cinéfilos</h1>
                    <p>Descubre las peliculas favoritas del público</p>
                    <!--<a class="btn btn-primary btn-lg" href="http://cla.heroes-online.com/es-ES">Juega ahora!</a> -->
                </div>
                <!-- /.col-md-4 -->
            </div>
            <!-- /.row -->

            <hr>

            <!-- Content Row -->
            <?php for ($i = 0; $i < sizeof($films); $i+=3) { ?>
                <div class="row">                   
                <?php
                for ($j = $i; $j < ($i + 3); $j++) {
                   if (isset($films[$j])) {
                        echo $films[$j]->film2HTML();
                    }
                }
                ?>
                </div>
                    <!-- /.row -->
             <?php } ?>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>&copy;Miguel Marzo - 2ºDAM Cautrovientos</p>
                    </div>
                </div>
            </footer>

        </div>
        <!-- /.container -->

        <!-- jQuery -->
        <script src="assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="assets/js/bootstrap.min.js"></script>

    </body>

</html>
