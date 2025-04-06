<?php
class DashboardController {
    private $db;
    private $cliente;
    private $inventario;
    private $credito;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->cliente = new Cliente($this->db);
        $this->inventario = new Inventario($this->db);
        $this->credito = new Credito($this->db);
    }

    public function index() {
        // Get total clients
        $query = "SELECT COUNT(*) as total FROM clientes";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $total_clientes = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Get total products
        $query = "SELECT COUNT(*) as total FROM inventario";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $total_productos = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Get active credits
        $query = "SELECT COUNT(*) as total FROM creditos WHERE Saldo > 0";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $creditos_activos = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Get total amount to collect
        $query = "SELECT SUM(Saldo) as total FROM creditos WHERE Saldo > 0";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $total_por_cobrar = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

        // Get latest credits
        $query = "SELECT c.*, cl.Nombre_Completo 
                 FROM creditos c 
                 JOIN clientes cl ON c.Id_Cliente = cl.Id_Cliente 
                 ORDER BY c.Id DESC LIMIT 5";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $ultimos_creditos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Get low stock products (less than 5 units)
        $query = "SELECT * FROM inventario WHERE Stock < 5 ORDER BY Stock ASC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $productos_bajo_stock = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include_once 'views/dashboard/index.php';
    }
}
?>