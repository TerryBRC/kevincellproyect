<?php
class Abono {
    private $conn;
    private $table_name = "abonos_creditos";

    public $id_credito;
    public $abono;
    public $fecha;
    public $metodo_pago;
    public $observaciones;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " 
                 (Id_Credito, Abono, Fecha, Metodo_Pago, Observaciones) 
                 VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id_credito);
        $stmt->bindParam(2, $this->abono);
        $stmt->bindParam(3, $this->fecha);
        $stmt->bindParam(4, $this->metodo_pago);
        $stmt->bindParam(5, $this->observaciones);

        return $stmt->execute();
    }
}
?>