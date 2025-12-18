<?php
class Conexion
{
    public function conectar()
    {
        $pdo = null;
        try {
            $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            error_log("Error de conexión: " . $e->getMessage());
            die("Error de conexión a la base de datos.");
        }
    }
}

?>