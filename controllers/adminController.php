<?php
require_once __DIR__ . '/../models/admin.php';
$option = (empty($_GET['option'])) ? '' : $_GET['option'];
$admin = new AdminModel();
$id_user = $_SESSION['idusuario'];
switch ($option) {
    case 'totales':
        $data['usuario'] = $admin->getDatos('usuario');
        $data['cliente'] = $admin->getDatos('cliente');
        $data['producto'] = $admin->getDatos('producto');
        $data['venta'] = $admin->getVentas($id_user);
        $data['stock_bajo'] = $admin->getProductosMinimo();
        echo json_encode($data);
        break;

    case 'topClientes':
        $data = $admin->topClientes($id_user);
        echo json_encode($data);
        break;

    case 'topStockBajo':
        $data = $admin->getProductosStockBajo();
        echo json_encode($data);
        break;

    case 'ventasSemana':
        $actual = date('Y-m-d');
        $fecha = date("Y-m-d", strtotime($actual . '-7 day'));
        $data = $admin->ventasSemana($fecha, $actual, $id_user);
        echo json_encode($data);
        break;
    case 'datos':
        $data = $admin->getDato();
        echo json_encode($data);
        break;
    case 'save':
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];
        $moneda = $_POST['moneda'];
        $mensaje = $_POST['mensaje'];
        $id = $_POST['id'];
        if (empty($id) || empty($nombre) || empty($telefono) || empty($direccion) || empty($correo) || empty($moneda) || empty($mensaje)) {
            $res = array('tipo' => 'error', 'mensaje' => 'TODO LOS CAMPOS SON REQUERIDOS');
        } else {
            $result = $admin->saveDatos($nombre, $telefono, $correo, $direccion, $moneda, $mensaje, $id);
            if ($result) {
                $res = array('tipo' => 'success', 'mensaje' => 'REGISTRO MODIFICADO');
            } else {
                $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL MODIFICAR');
            }
        }
        echo json_encode($res);
        break;
    default:
        # code...
        break;
}
