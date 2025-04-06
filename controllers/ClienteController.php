<?php
require_once 'models/Cliente.php';
require_once 'config/Database.php';

class ClienteController {
    private $db;
    private $cliente;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->cliente = new Cliente($this->db);
    }

    public function index() {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $result = $this->cliente->read($search);
        include_once 'views/clientes/index.php';
    }

    public function create() {
        if($_POST) {
            $this->cliente->nombre_completo = $_POST['nombre_completo'];
            $this->cliente->identificacion = $_POST['identificacion'];
            $this->cliente->tel = $_POST['tel'];

            if($this->cliente->create()) {
                header("Location: index.php?action=index");
            }
        }
        include_once 'views/clientes/create.php';
    }

    public function edit() {
        // Get ID from URL
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if ($id) {
            $cliente = $this->cliente->readOne($id);
            if ($cliente) {
                include_once 'views/clientes/edit.php';
            } else {
                header('Location: /kevincell/cliente');
            }
        } else {
            header('Location: /kevincell/cliente');
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->cliente->id_cliente = $_GET['id'];
            $this->cliente->nombre_completo = $_POST['nombre_completo'];
            $this->cliente->identificacion = $_POST['identificacion'];
            $this->cliente->tel = $_POST['tel'];
            
            if ($this->cliente->update()) {
                header('Location: /kevincell/cliente');
            }
        }
    }
}
?>