<?php
require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/conexion.php';
class Productos
{
    private $pdo, $con;
    public function __construct()
    {
        $this->con = new Conexion();
        $this->pdo = $this->con->conectar();
    }
    public function getProducts()
    {
        $consult = $this->pdo->prepare("SELECT * FROM producto WHERE status = 1");
        $consult->execute();
        return $consult->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProduct($id)
    {
        $consult = $this->pdo->prepare("SELECT * FROM producto WHERE codproducto = ?");
        $consult->execute([$id]);
        return $consult->fetch(PDO::FETCH_ASSOC);
    }

    public function comprobarBarcode($barcode)
    {
        $consult = $this->pdo->prepare("SELECT * FROM producto WHERE codigo = ?");
        $consult->execute([$barcode]);
        return $consult->fetch(PDO::FETCH_ASSOC);
    }

    public function saveProduct($barcode, $nombre, $precio, $stock, $stock_minimo)
    {
        $consult = $this->pdo->prepare("INSERT INTO producto (codigo, descripcion, precio, existencia, stock_minimo) VALUES (?,?,?,?,?)");
        return $consult->execute([$barcode, $nombre, $precio, $stock, $stock_minimo]);
    }

    public function deleteProducto($id)
    {
        $consult = $this->pdo->prepare("UPDATE producto SET status = ? WHERE codproducto = ?");
        return $consult->execute([0, $id]);
    }

    public function updateProduct($barcode, $nombre, $precio, $stock, $stock_minimo, $id)
    {
        $consult = $this->pdo->prepare("UPDATE producto SET codigo=?, descripcion=?, precio=?, existencia=?, stock_minimo=? WHERE codproducto=?");
        return $consult->execute([$barcode, $nombre, $precio, $stock, $stock_minimo, $id]);
    }
}

?>