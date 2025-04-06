<?php
require_once 'models/Abono.php';
require_once 'models/Credito.php';
require_once 'config/Database.php';

class AbonoController {
    private $abono;
    private $credito;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        
        $this->abono = new Abono();
        $this->credito = new Credito($db);
    }

    public function create() {
        $id_credito = isset($_GET['id']) ? $_GET['id'] : null;
        
        if ($id_credito) {
            $credito = $this->credito->readOne($id_credito);
            include_once 'views/abonos/create.php';
        } else {
            header('Location: /kevincell/credito');
        }
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->abono->id_credito = $_POST['id_credito'];
            $this->abono->abono = $_POST['abono'];
            $this->abono->metodo_pago = $_POST['metodo_pago'];
            $this->abono->observaciones = $_POST['observaciones'];
            $this->abono->fecha = date('Y-m-d H:i:s');

            if ($this->abono->create()) {
                header('Location: /kevincell/credito/view/' . $_POST['id_credito']);
            }
        }
    }
}
?>