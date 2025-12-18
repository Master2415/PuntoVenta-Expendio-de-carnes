<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/conexion.php';

class Mermas
{
    private $pdo, $con;

    public function __construct()
    {
        $this->con = new Conexion();
        $this->pdo = $this->con->conectar();
    }

    public function saveMerma($id_producto, $cantidad, $motivo, $id_user)
    {
        $fecha = date('Y-m-d');
        $consult = $this->pdo->prepare("INSERT INTO mermas (id_producto, cantidad, motivo, fecha, id_usuario) VALUES (?,?,?,?,?)");
        return $consult->execute([$id_producto, $cantidad, $motivo, $fecha, $id_user]);
    }

    public function getMermas()
    {
        $consult = $this->pdo->prepare("SELECT m.*, p.descripcion, u.nombre AS usuario FROM mermas m 
            INNER JOIN producto p ON m.id_producto = p.codproducto 
            INNER JOIN usuario u ON m.id_usuario = u.idusuario 
            ORDER BY m.id DESC");
        $consult->execute();
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>