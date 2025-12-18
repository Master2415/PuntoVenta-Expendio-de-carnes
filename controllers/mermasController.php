<?php
$option = (empty($_GET['option'])) ? '' : $_GET['option'];
require_once __DIR__ . '/../models/mermas.php';
require_once __DIR__ . '/../models/productos.php';

$mermasModel = new Mermas();
$productosModel = new Productos();

$id_user = $_SESSION['idusuario'];

switch ($option) {
    case 'save':
        require 'check_csrf.php';

        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $motivo = $_POST['motivo'];

        if (empty($id_producto) || empty($cantidad) || empty($motivo)) {
            $res = array('tipo' => 'error', 'mensaje' => 'TODO LOS CAMPOS SON REQUERIDOS');
        } else {
            // Guardar merma
            $result = $mermasModel->saveMerma($id_producto, $cantidad, $motivo, $id_user);
            if ($result) {
                // Actualizar stock del producto
                $producto = $productosModel->getProduct($id_producto);
                $nuevo_stock = $producto['existencia'] - $cantidad;
                $productosModel->updateProduct(
                    $producto['codigo'],
                    $producto['descripcion'],
                    $producto['precio'],
                    $nuevo_stock,
                    $producto['stock_minimo'],
                    $id_producto
                );
                $res = array('tipo' => 'success', 'mensaje' => 'MERMA REGISTRADA Y STOCK ACTUALIZADO');
            } else {
                $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL REGISTRAR');
            }
        }
        echo json_encode($res);
        break;

    case 'listar':
        $result = $mermasModel->getMermas();
        echo json_encode($result);
        break;

    default:
        break;
}
?>