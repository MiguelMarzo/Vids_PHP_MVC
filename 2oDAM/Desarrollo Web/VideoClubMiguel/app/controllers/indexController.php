<?php

//Es necesario que importemos los ficheros creados con anterioridad porque los vamos a utilizar desde este fichero.
require_once(dirname(__FILE__) . '/../../persistence/DAO/FilmDAO.php');
require_once(dirname(__FILE__) . '/../models/Film.php');

function indexAction() {
//Creamos un objeto CreatureDAO para hacer las llamadas a la BD
    $filmDAO = new FilmDAO();
//Recupero de la BD todas las criaturas
    return $filmDAO->selectAll();
}

?>