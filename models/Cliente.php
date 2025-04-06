<?php
class Cliente {
    private $conn;
    private $table_name = "clientes";

    public $id_cliente;
    public $nombre_completo;
    public $identificacion;
    public $tel;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read($search = '') {
        $query = "SELECT * FROM " . $this->table_name;
        
        if (!empty($search)) {
            $query .= " WHERE Nombre_Completo LIKE :search 
                       OR Identificacion LIKE :search 
                       OR Tel LIKE :search";
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
                    Nombre_Completo = :nombre_completo,
                    Identificacion = :identificacion,
                    Tel = :tel";

        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->nombre_completo = htmlspecialchars(strip_tags($this->nombre_completo));
        $this->identificacion = htmlspecialchars(strip_tags($this->identificacion));
        $this->tel = htmlspecialchars(strip_tags($this->tel));

        // Bind values
        $stmt->bindParam(":nombre_completo", $this->nombre_completo);
        $stmt->bindParam(":identificacion", $this->identificacion);
        $stmt->bindParam(":tel", $this->tel);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . "
                SET
                    Nombre_Completo = :nombre_completo,
                    Identificacion = :identificacion,
                    Tel = :tel
                WHERE Id_Cliente = :id_cliente";

        $stmt = $this->conn->prepare($query);

        // Sanitize inputs
        $this->nombre_completo = htmlspecialchars(strip_tags($this->nombre_completo));
        $this->identificacion = htmlspecialchars(strip_tags($this->identificacion));
        $this->tel = htmlspecialchars(strip_tags($this->tel));

        // Bind values
        $stmt->bindParam(":nombre_completo", $this->nombre_completo);
        $stmt->bindParam(":identificacion", $this->identificacion);
        $stmt->bindParam(":tel", $this->tel);
        $stmt->bindParam(":id_cliente", $this->id_cliente);

        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE Id_Cliente = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        return $stmt->execute();
    }

    public function readOne($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE Id_Cliente = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>