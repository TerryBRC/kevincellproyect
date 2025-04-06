<?php
class Inventario {
    private $conn;
    private $table_name = "inventario";

    public $id;
    public $nombre_producto;
    public $descripcion;
    public $precio_venta;
    public $precio_compra;
    public $stock;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read($search = '') {
        $query = "SELECT * FROM " . $this->table_name;
        
        if (!empty($search)) {
            $query .= " WHERE Nombre_Producto LIKE :search 
                       OR Descripcion LIKE :search";
        }
        
        $stmt = $this->conn->prepare($query);
        
        if (!empty($search)) {
            $searchTerm = "%{$search}%";
            $stmt->bindParam(":search", $searchTerm);
        }
        
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . "
                SET
                    Nombre_Producto = :nombre_producto,
                    Descripcion = :descripcion,
                    Precio_Venta = :precio_venta,
                    Precio_Compra = :precio_compra,
                    Stock = :stock";

        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->nombre_producto = htmlspecialchars(strip_tags($this->nombre_producto));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->precio_venta = htmlspecialchars(strip_tags($this->precio_venta));
        $this->precio_compra = htmlspecialchars(strip_tags($this->precio_compra));
        $this->stock = htmlspecialchars(strip_tags($this->stock));

        // Bind values
        $stmt->bindParam(":nombre_producto", $this->nombre_producto);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":precio_venta", $this->precio_venta);
        $stmt->bindParam(":precio_compra", $this->precio_compra);
        $stmt->bindParam(":stock", $this->stock);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readOne($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE Id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . "
                SET
                    Nombre_Producto = :nombre_producto,
                    Descripcion = :descripcion,
                    Precio_Venta = :precio_venta,
                    Precio_Compra = :precio_compra,
                    Stock = :stock
                WHERE Id = :id";
    
        $stmt = $this->conn->prepare($query);
    
        // Sanitize inputs
        $this->nombre_producto = htmlspecialchars(strip_tags($this->nombre_producto));
        $this->descripcion = htmlspecialchars(strip_tags($this->descripcion));
        $this->precio_venta = htmlspecialchars(strip_tags($this->precio_venta));
        $this->precio_compra = htmlspecialchars(strip_tags($this->precio_compra));
        $this->stock = htmlspecialchars(strip_tags($this->stock));
    
        // Bind values
        $stmt->bindParam(":nombre_producto", $this->nombre_producto);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":precio_venta", $this->precio_venta);
        $stmt->bindParam(":precio_compra", $this->precio_compra);
        $stmt->bindParam(":stock", $this->stock);
        $stmt->bindParam(":id", $this->id);
    
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE Id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }
}
?>