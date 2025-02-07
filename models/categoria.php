<?php

class Categoria{
    private $id;
    private $nombre;
    private $db;

    public function __construct() {
        $this->db = Connect::connect();
    }

    // Getter para $id
    public function getId() {
        return $this->id;
    }

    // Setter para $id
    public function setId($id) {
        $this->id = $id;
    }

    // Getter para $nombre
    public function getNombre() {
        return $this->nombre;
    }

    // Setter para $nombre
    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    // Getter para $db
    public function getDb() {
        return $this->db;
    }

    // Setter para $db
    public function setDb($db) {
        $this->db = $db;
    }

    // método para listar todas las categorias
    public function getAll(){
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY id ASC;");
        return $categorias;
    }

    public function getOne(){
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id={$this->getId()}");
        return $categoria->fetch_object();
    }


    public function save(){
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}')";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
        }
        return $result;
    }

}// fin de clase