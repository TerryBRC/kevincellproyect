<?php
require_once 'models/Credito.php';
require_once 'models/Cliente.php';
require_once 'models/Inventario.php';
require_once 'config/Database.php';

class CreditoController {
    private $db;
    private $credito;
    private $cliente;
    private $inventario;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->credito = new Credito($this->db);
        $this->cliente = new Cliente($this->db);
        $this->inventario = new Inventario($this->db);
    }

    public function index() {
        $result = $this->credito->read();
        include_once 'views/creditos/index.php';
    }

    public function create() {
        $database = new Database();
        $db = $database->getConnection();
        
        // Get list of clients
        $cliente = new Cliente($db);
        $clientes = $cliente->read();
        
        // Get list of products
        $inventario = new Inventario($db);
        $productos = $inventario->read();
        
        include_once 'views/creditos/create.php';
    }

    public function view() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if ($id) {
            $credito = $this->credito->readOne($id);
            $abonos = $this->credito->getAbonos($id);
            if ($credito) {
                include_once 'views/creditos/view.php';
            } else {
                header('Location: /kevincell/credito');
            }
        } else {
            header('Location: /kevincell/credito');
        }
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->credito->id_cliente = $_POST['id_cliente'];
            $this->credito->id_inventario = $_POST['id_inventario'];
            $this->credito->cantidad = $_POST['cantidad'];
            $this->credito->precio = $_POST['precio'];
            $this->credito->total = $_POST['total'];
            $this->credito->saldo = $_POST['total']; // Initial saldo equals total
            $this->credito->fecha = date('Y-m-d');

            if ($this->credito->create()) {
                header('Location: /kevincell/credito');
                exit();
            } else {
                // If creation fails, go back to form
                $_SESSION['error'] = "Error al crear el crédito";
                header('Location: /kevincell/credito/create');
                exit();
            }
        }
    }
}
?>