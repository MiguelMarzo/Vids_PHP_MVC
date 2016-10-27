<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/FilmDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Film.php');
require_once(dirname(__FILE__) . '/../../app/models/validations/ValidationsRules.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Llamo a la función en cuanto se redirija el action a esta página
    createAction();
}

function createAction() {
    $error = false;
    //$title = ValidationsRules::test_input($_POST["title"]);
    //if (!preg_match("/^[a-zA-Z ]*$/", $title)) {
    //    $error = true;
    //}

    $title = ValidationsRules::test_input($_POST["title"]);
    $synopsis = ValidationsRules::test_input($_POST["synopsis"]);
    $cover = ValidationsRules::test_input($_POST["cover"]);


    $film = new Film();
    $film->setTitle($title);
    $film->setSynopsis($synopsis);
    $film->setCover($cover);

    //Creamos un objeto FilmDAO para hacer las llamadas a la BD
    $filmDAO = new FilmDAO();
    $filmDAO->insert($film);

    if($error) {
        header('Location: ../views/insert.php?error=1');
    } else {
        header('Location: ../../index.php');
    }
}
?>

