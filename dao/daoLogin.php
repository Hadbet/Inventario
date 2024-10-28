<?php

require 'consultaEmpleado.php';
try {
session_start();
$nomina = $_POST['nomina'];
$password = $_POST['password'];
$nombre = $_POST['usuario'];

if (strlen($nomina) == 1) {
    $nomina = "0000000" . $nomina;
}
if (strlen($nomina) == 2) {
    $nomina = "000000" . $nomina;
}
if (strlen($nomina) == 3) {
    $nomina = "00000" . $nomina;
}
if (strlen($nomina) == 4) {
    $nomina = "0000" . $nomina;
}
if (strlen($nomina) == 5) {
    $nomina = "000" . $nomina;
}
if (strlen($nomina) == 6) {
    $nomina = "00" . $nomina;
}
if (strlen($nomina) == 7) {
    $nomina = "0" . $nomina;
}

$nomina = str_pad($nomina, 8, "0", STR_PAD_LEFT);
$statusLogin = verificacionUsuario($nomina, $password,$nombre);

if ($statusLogin == 1) {
    $_SESSION['nominaFacturas'] = $nomina;
    $_SESSION['passwordFacturas'] = $password;
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../form_registro.php'>";
} else if ($statusLogin == 0) {
    echo "<script>alert('Ocurrio un error')</script>";
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1; URL=../form_registro.php'>";
}
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>