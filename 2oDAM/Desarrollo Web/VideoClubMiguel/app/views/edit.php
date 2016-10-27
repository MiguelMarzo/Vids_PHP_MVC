<?php
//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/FilmDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Film.php');


//Compruebo que me llega por GET el parámetro
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    //Creamos un objeto FilmDAO para hacer las llamadas a la BD
    $filmDAO = new FilmDAO();
    $film = $filmDAO->selectById($id);
    
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>VideoClub - Modificar Peliculas</title>

        <!-- Bootstrap Core CSS -->
        <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../../assets/css/small-business.css" rel="stylesheet">

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
                    <a class="navbar-brand" href="../../index.php">
                        <img src="../../assets/img/small-logo.png" alt="" width="161">
                    </a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <h2 class="page-title">Crear criatura</h2>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>

        <!-- Page Content -->
        <div class="container">
            <form class="form-horizontal" method="post" action="../controllers/editController.php">
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Título</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" value="<?php echo $film->getTitle();?>">
                    </div>
                </div><br/><br/>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Synopsis</label>
                    <div class="col-sm-10">
                        <input class="form-control" rows="5" name="synopsis" value="<?php echo $film->getSynopsis();?>"></textarea>
                    </div>
                </div><br/><br/>
                <div class="form-group">
                    <label for="avatar" class="col-sm-2 control-label">Cover</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $film->getCover();?>"name="cover">
                    </div>
                </div><br/><br/>
                <input type="hidden" name="idfilm" value="<?php echo $film->getIdFilm(); ?>"
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Actualizar</button>
                    </div>
                </div>
                
            </form>

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
        <script src="../../assets/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../assets/js/bootstrap.min.js"></script>
    </body>

</html>


