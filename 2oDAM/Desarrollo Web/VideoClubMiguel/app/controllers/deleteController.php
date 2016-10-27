<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/FilmDAO.php');
require_once(dirname(__FILE__) . '/../../app/models/Film.php');


//Creamos un objeto CreatureDAO para hacer las llamadas a la BD
$filmDAO = new FilmDAO();

if ($_SERVER["REQUEST_METHOD"] == "GET") {
//Llamo que hace la edición contra BD
    deleteAction();
}

function deleteAction() {
    $id = $_GET["id"];

    //Creamos un objeto CreatureDAO para hacer las llamadas a la BD
    $filmDAO = new FilmDAO();
    $filmDAO->delete($id);

    header('Location: ../../index.php');
}
?>

