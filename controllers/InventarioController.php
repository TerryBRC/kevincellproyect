<?php
require_once 'models/Inventario.php';
require_once 'config/Database.php';

class InventarioController {
    private $db;
    private $inventario;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->inventario = new Inventario($this->db);
    }

    public function index() {
        $result = $this->inventario->read();
        include_once 'views/inventario/index.php';
    }

    public function create() {
        if($_POST) {
            $this->inventario->nombre_producto = $_POST['nombre_producto'];
            $this->inventario->descripcion = $_POST['descripcion'];
            $this->inventario->precio_venta = $_POST['precio_venta'];
            $this->inventario->precio_compra = $_POST['precio_compra'];
            $this->inventario->stock = $_POST['stock'];

            if($this->inventario->create()) {
                header("Location: /kevincell/inventario");
                exit();
            }
        }
        include_once 'views/inventario/create.php';
    }

    public function edit() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        
        if ($id) {
            $producto = $this->inventario->readOne($id);
            if ($producto) {
                include_once 'views/inventario/edit.php';
            } else {
                header('Location: /kevincell/inventario');
            }
        } else {
            header('Location: /kevincell/inventario');
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->inventario->id = $_GET['id'];
            $this->inventario->nombre_producto = $_POST['nombre_producto'];
            $this->inventario->descripcion = $_POST['descripcion'];
            $this->inventario->precio_venta = $_POST['precio_venta'];
            $this->inventario->precio_compra = $_POST['precio_compra'];
            $this->inventario->stock = $_POST['stock'];
            
            if ($this->inventario->update()) {
                header('Location: /kevincell/inventario');
            }
        }
    }
}
?>