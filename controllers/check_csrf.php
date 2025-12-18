<?php
if (empty($_SERVER['HTTP_X_CSRF_TOKEN']) || empty($_SESSION['csrf_token']) || $_SERVER['HTTP_X_CSRF_TOKEN'] !== $_SESSION['csrf_token']) {
    echo json_encode(['tipo' => 'error', 'mensaje' => 'Error de seguridad (Token inválido)']);
    exit;
}
?>