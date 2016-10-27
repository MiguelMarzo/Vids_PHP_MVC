<?php
    $error  ="";
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if(isset($_GET["error"])){
            $error = "Only characters and whitespaces are allowed.";
        }
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

        <title>VideoClub - Añadir Peli</title>

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
                            <h2 class="page-title">AÑADIR PELICULA</h2>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
        
        <span class="error">
            <?php echo $error;?></span>

        <!-- Page Content -->
        <div class="container">
            <form class="form-horizontal" method="POST" action="../controllers/insertController.php?"><br/><br/><br/>
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Título</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" id="name">
                    </div>
                </div><br/><br/>
                <div class="form-group">
                    <label for="description" class="col-sm-2 control-label">Synopsis</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="5" name="synopsis"></textarea>
                    </div>
                </div><br/><br/>
                <div class="form-group">
                    <label for="avatar" class="col-sm-2 control-label">Cover</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="avatar" name="cover">
                    </div>
                </div><br/><br/>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Añadir</button>
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


