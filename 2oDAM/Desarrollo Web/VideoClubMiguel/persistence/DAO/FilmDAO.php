<?php

/* Clase CriatureDAO.php
 * Clase que aplica el Patrón de Diseño DAO para manejar toda la información de un objeto Criature.
 * author Eugenia Pérez
 * mailto eugenia_perez@cuatrovientos.org
 */
//dirname(__FILE__) Es el directorio del archivo actual
require_once(dirname(__FILE__) . '/../conf/PersistentManager.php');

class FilmDAO {

    //Se define una constante con el nombre de la tabla
    const FILM_TABLE = 'film';

    //Conexión a BD
    private $conn = null;

    //Constructor de la clase
    public function __construct() {
        $this->conn = PersistentManager::getInstance()->get_connection();
    }

    /**
     * Retorna todos las peliculas
     */
    public function selectAll() {
        $query = "SELECT * FROM " . FilmDAO::FILM_TABLE;
        $result = mysqli_query($this->conn, $query);
        $films = array();
        while ($filmBD = mysqli_fetch_array($result)) {

            $film = new Film();
            $film->setIdFilm($filmBD["idFilm"]);
            $film->setTitle($filmBD["title"]);
            $film->setSynopsis($filmBD["synopsis"]);
            $film->setCover($filmBD["cover"]);

            array_push($films, $film);
        }
        return $films;
    }

    /*
     * Inserta una pelicula en la base de datos. Como la clave primaria es 
     * autogenerada, no es necesario insertarla.
     * Es importante utilizar PreparedStatements para evitar ataques de SQL Injection.
     * Dentro del mysqli_stmt_bind_param indicamos el tipo del parámetro:
     *  - i: enteros
     *  - d: double
     *  - s: cadenas o fechas
     *  - b: tipo blob o multimedia
     * @param $film la pelicula a insertar
     * @return true si todo ha ido bien
     */

    public function insert($film) {
        $query = "INSERT INTO " . FilmDAO::FILM_TABLE.
                " (title, synopsis, cover) VALUES(?,?,?)";
        $stmt = mysqli_prepare($this->conn, $query);
        $tipos = 'sss';
        $title = $film->getTitle();
        $synopsis = $film->getSynopsis();
        $cover =$film->getCover();
        mysqli_stmt_bind_param($stmt, $tipos, $title, $synopsis, $cover);
        return $stmt->execute();
    }

    /**
     * Selecciona la criatura por ID
     * @param type $id
     * @return film
     */
    public function selectById($id) {
        $query = "SELECT title, synopsis, cover FROM " . FilmDAO::FILM_TABLE . " WHERE idfilm=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $title, $synopsis, $cover);

        $film = new Film();
        while (mysqli_stmt_fetch($stmt)) {
            $film->setIdFilm($id);
            $film->setTitle($title);
            $film->setSynopsis($synopsis);
            $film->setCover($cover);
       }

        return $film;
    }
    
      /*
     * Actualiza una pelicula en la base de datos. 
     * Es importante utilizar PreparedStatements para evitar ataques de SQL Injection.
     */

    public function update($film) {
        $query = "UPDATE " . FilmDAO::FILM_TABLE .
                " SET title=?, synopsis=?, cover=?"." WHERE idFilm=?";
        $title = $film->getTitle();
        $synopsis = $film->getSynopsis();
        $cover =$film->getCover();
        $id = $film->getIdFilm();
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'sssi', $title, $synopsis, $cover, $id);
        return $stmt->execute();
    }

    /**
     * Elimina una pelicula de la BD pasándole el ID
     * @param type $id
     * @return type
     */
    public function delete($id) {
        $query = "DELETE FROM " . FilmDAO::FILM_TABLE . " WHERE idFilm=?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        return $stmt->execute();
    }

        
}

?>
