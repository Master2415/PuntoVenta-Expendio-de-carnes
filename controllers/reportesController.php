<?php
$option = (empty($_GET['option'])) ? '' : $_GET['option'];
require_once __DIR__ . '/../models/reportes.php';

$reportes = new ReportesModel();

switch ($option) {
    case 'balance':
        $desde = isset($_POST['desde']) ? $_POST['desde'] : date('Y-m-01');
        $hasta = isset($_POST['hasta']) ? $_POST['hasta'] : date('Y-m-d');

        $data = array(
            'ventas' => $reportes->getVentasTotal($desde, $hasta),
            'compras' => $reportes->getComprasTotal($desde, $hasta),
            'mermas' => $reportes->getMermasTotal($desde, $hasta),
            'inventario' => $reportes->getInventarioValor(),
            'desde' => $desde,
            'hasta' => $hasta
        );
        echo json_encode($data);
        break;

    default:
        break;
}
?>