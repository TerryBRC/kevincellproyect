<?php
class Credito {
    private $conn;
    private $table_name = "creditos";

    public $id;
    public $id_cliente;
    public $id_inventario;
    public $precio;
    public $cantidad;
    public $total;
    public $saldo;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read($search = '') {
        $query = "SELECT c.*, cl.Nombre_Completo, i.Nombre_Producto 
                 FROM " . $this->table_name . " c
                 JOIN clientes cl ON c.Id_Cliente = cl.Id_Cliente
                 JOIN inventario i ON c.Id_Inventario = i.Id";
        
        if (!empty($search)) {
            $query .= " WHERE cl.Nombre_Completo LIKE :search 
                       OR i.Nombre_Producto LIKE :search";
        }
        
        $query .= " ORDER BY c.Id DESC";
        
        $stmt = $this->conn->prepare($query);
        
        if (!empty($search)) {
            $searchTerm = "%{$search}%";
            $stmt->bindParam(":search", $searchTerm);
        }
        
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO creditos 
                 (Id_Cliente, Id_Inventario, Cantidad, Precio, Total, Saldo) 
                 VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $this->saldo = $this->total;

        $stmt->bindParam(1, $this->id_cliente);
        $stmt->bindParam(2, $this->id_inventario);
        $stmt->bindParam(3, $this->cantidad);
        $stmt->bindParam(4, $this->precio);
        $stmt->bindParam(5, $this->total);
        $stmt->bindParam(6, $this->saldo);

        return $stmt->execute();
    }

    public function readOne($id) {
        $query = "SELECT c.*, cl.Nombre_Completo, i.Nombre_Producto, i.Precio_Venta 
                 FROM " . $this->table_name . " c
                 JOIN clientes cl ON c.Id_Cliente = cl.Id_Cliente
                 JOIN inventario i ON c.Id_Inventario = i.Id
                 WHERE c.Id = ?";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . "
                SET
                    Id_Cliente = :id_cliente,
                    Id_Inventario = :id_inventario,
                    Precio = :precio,
                    Cantidad = :cantidad,
                    Total = :total,
                    Saldo = :saldo
                WHERE Id = :id";
    
        $stmt = $this->conn->prepare($query);
    
        // Calculate total
        $this->total = $this->precio * $this->cantidad;
    
        // Bind values
        $stmt->bindParam(":id_cliente", $this->id_cliente);
        $stmt->bindParam(":id_inventario", $this->id_inventario);
        $stmt->bindParam(":precio", $this->precio);
        $stmt->bindParam(":cantidad", $this->cantidad);
        $stmt->bindParam(":total", $this->total);
        $stmt->bindParam(":saldo", $this->saldo);
        $stmt->bindParam(":id", $this->id);
    
        return $stmt->execute();
    }

    public function delete($id) {
        // Check if there are any payments before deleting
        $query = "SELECT COUNT(*) FROM abonos_creditos WHERE Id_Credito = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        
        if($stmt->fetchColumn() > 0) {
            return false; // Cannot delete credit with existing payments
        }
    
        $query = "DELETE FROM " . $this->table_name . " WHERE Id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    public function getAbonos($id_credito) {
        $query = "SELECT Id, Id_Credito, Fecha, Abono as Monto, Metodo_Pago, Observaciones 
                 FROM abonos_creditos 
                 WHERE Id_Credito = ? 
                 ORDER BY Fecha DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id_credito);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>