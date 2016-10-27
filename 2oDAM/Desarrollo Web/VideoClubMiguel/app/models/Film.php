<?php

/**
 * Description of film
 *
 * @author Eugenia
 */
class film {

    private $idFilm;
    private $title;
    private $synopsis;
    private $cover;
    
    public function __construct() {
        
    }

    function getIdFilm() {
        return $this->idFilm;
    }

    function getTitle() {
        return $this->title;
    }

    function getSynopsis() {
        return $this->synopsis;
    }

    function getCover() {
        return $this->cover;
    }

    function setIdFilm($idFilm) {
        $this->idFilm = $idFilm;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setSynopsis($synopsis) {
        $this->synopsis = $synopsis;
    }

    function setCover($cover) {
        $this->cover = $cover;
    }

  

//Función para pintar cada pelicula
    function film2HTML() {
        $result = '<div class="col-md-4">';
        $result .= '<h2>' . $this->getTitle() . '</h2>';
        $result .= '<p class="description">'.$this->getSynopsis().'</p>';
        $result .= '<img src="'.$this->getCover().'"></img>';
        $result .= ' <div class="actions">';
        $result .= '<a class="btn btn-default" href="app/views/detail.php?id='.$this->getIdFilm().'">Más información</a> ';
        $result .= '<a class="btn btn-success" href="app/views/edit.php?id='.$this->getIdFilm().'">Modificar</a> ';
        $result .= '<a class="btn btn-danger" href="app/controllers/deleteController.php?id='.$this->getIdFilm().'">Eliminar</a> ';
        $result .= ' </div>';
        $result .= '</div>';
        
        return $result;
    }

}
