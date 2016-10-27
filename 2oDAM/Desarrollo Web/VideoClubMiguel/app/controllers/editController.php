<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/FilmDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Film.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Llamo que hace la edición contra BD
    editAction();
}

function editAction() {
    $id = $_POST["idfilm"];
    $title = $_POST["title"];
    $synopsis = $_POST["synopsis"];
    $cover = $_POST["cover"];

    $film = new Film();
    $film->setIdFilm($id);
    $film->setTitle($title);
    $film->setSynopsis($synopsis);
    $film->setCover($cover);

    //Creamos un objeto CreatureDAO para hacer las llamadas a la BD
    $filmDAO = new FilmDAO();
    $filmDAO->update($film);

    header('Location: ../../index.php');
}

?>

