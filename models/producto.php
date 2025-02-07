<?php


class Producto{
    private $id ;
    private $categoria_id ;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    private $db;

    public function __construct(){
        $this->db = Connect::connect();
    }

     // Getter y Setter para $id
     public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter y Setter para $categoria_id
    public function getCategoriaId() {
        return $this->categoria_id;
    }

    public function setCategoriaId($categoria_id) {
        $this->categoria_id = $categoria_id;
    }

    // Getter y Setter para $nombre
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    // Getter y Setter para $descripcion
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    // Getter y Setter para $precio
    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $this->db->real_escape_string($precio);
    }

    // Getter y Setter para $stock
    public function getStock() {
        return $this->stock;
    }

    public function setStock($stock) {
        $this->stock = $this->db->real_escape_string($stock);
    }

    // Getter y Setter para $oferta
    public function getOferta() {
        return $this->oferta;
    }

    public function setOferta($oferta) {
        $this->oferta = $oferta;
    }

    // Getter y Setter para $fecha
    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    // Getter y Setter para $imagen
    public function getImagen() {
        return $this->imagen;
    }

    public function setImagen($imagen) {
        $this->imagen = $imagen;
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
        return $productos;
    }
    
    public function getAllCategory(){
        $sql = "SELECT p.*, c.nombre AS 'catnombre' FROM productos p "
        . "INNER JOIN categorias c ON c.id = p.categoria_id "
        . "WHERE p.categoria_id = {$this->getCategoriaId()} "
        . "ORDER BY id DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getOne(){
        $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
        return $producto->fetch_object();
    }


    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function save(){
        $sql = "INSERT INTO productos VALUES(
        NULL, 
        '{$this->getCategoriaId()}',
        '{$this->getNombre()}',
        '{$this->getDescripcion()}', 
        {$this->getPrecio()}, 
        {$this->getStock()},
        NULL, 
        CURDATE(), 
        '{$this->getImagen()}'
        )";

        $save = $this->db->query($sql);
        $result= false;
        if($save){
            $result = true;
        }
        return $result;
    }

    public function edit() {
        // Construye la consulta base
        $sql = "UPDATE productos SET nombre='{$this->getNombre()}', 
                descripcion='{$this->getDescripcion()}', 
                precio={$this->getPrecio()}, 
                stock={$this->getStock()}, categoria_id={$this->getCategoria_id()}";
    
        // Agrega la imagen si está presente
        if ($this->getImagen() != null) {
            $sql .= ", imagen='{$this->getImagen()}'";
        }
    
        // Agrega la condición WHERE
        $sql .= " WHERE id={$this->id()};";
    
        // Ejecuta la consulta
        $save = $this->db->query($sql);
    
        // Verifica si la consulta se ejecutó correctamente
        $result = false;
        if ($save) {
            $result = true;
        }
    
        return $result;
    }

    public function delete(){
        $sql = "DELETE FROM productos WHERE id =($this->id)";
        $delete = $this->db->query($sql);

        $result= false;
        if($delete){
            $result = true;
        }
        return $result;

    }
}