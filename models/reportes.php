<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/conexion.php';

class ReportesModel
{
    private $pdo, $con;

    public function __construct()
    {
        $this->con = new Conexion();
        $this->pdo = $this->con->conectar();
    }

    public function getVentasTotal($desde, $hasta)
    {
        $sql = "SELECT SUM(total) AS total FROM ventas WHERE fecha BETWEEN ? AND ?";
        $consult = $this->pdo->prepare($sql);
        $consult->execute([$desde, $hasta]);
        $res = $consult->fetch(PDO::FETCH_ASSOC);
        return $res['total'] ? $res['total'] : 0;
    }

    public function getComprasTotal($desde, $hasta)
    {
        $sql = "SELECT SUM(total) AS total FROM compras WHERE fecha BETWEEN ? AND ?";
        $consult = $this->pdo->prepare($sql);
        $consult->execute([$desde, $hasta]);
        $res = $consult->fetch(PDO::FETCH_ASSOC);
        return $res['total'] ? $res['total'] : 0;
    }

    public function getInventarioValor()
    {
        // Asumiendo que 'precio' es el valor de referencia. Si existiera 'precio_compra', se usaría ese.
        $sql = "SELECT SUM(precio * existencia) AS total FROM producto WHERE status = 1";
        $consult = $this->pdo->prepare($sql);
        $consult->execute();
        $res = $consult->fetch(PDO::FETCH_ASSOC);
        return $res['total'] ? $res['total'] : 0;
    }

    public function getMermasTotal($desde, $hasta)
    {
        // Calcula valor perdido: cantidad merma * precio producto
        $sql = "SELECT SUM(m.cantidad * p.precio) AS total 
                FROM mermas m 
                INNER JOIN producto p ON m.id_producto = p.codproducto 
                WHERE m.fecha BETWEEN ? AND ?";
        $consult = $this->pdo->prepare($sql);
        $consult->execute([$desde, $hasta]);
        $res = $consult->fetch(PDO::FETCH_ASSOC);
        return $res['total'] ? $res['total'] : 0;
    }
}
?>