<?php

include_once('db/db_Facturas.php');

$con = new LocalConector();
$conex=$con->conectar();

$folio = $_POST['txtFolioModal'];
$folioWere = $_POST['txtFolioWere'];
$nombre = $_POST['txtNombreAprobador'];
$estatus = $_POST['txtEstatus'];


$Object = new DateTime();
$Object->setTimezone(new DateTimeZone('America/Denver'));
$DateAndTime = $Object->format("Y/m/d H:i:s");

if ($estatus == "1"){
    $insertDocumento= "UPDATE `Facturas` SET `Aprobacion`='$nombre',`FolioWere`='$folioWere',`Estatus`='1',`FechaAprobacion`='$DateAndTime',`Comentarios`='' WHERE `IdFactura` = '$folio'";
}else{
    $insertDocumento= "UPDATE `Facturas` SET `Aprobacion`='$nombre',`FolioWere`='',`Estatus`='2',`FechaAprobacion`='$DateAndTime',`Comentarios`='$folioWere' WHERE `IdFactura` = '$folio'";
}


$rsinsertDocu=mysqli_query($conex,$insertDocumento);

mysqli_close($conex);

echo '<script type="text/javascript">
           window.location = "../listas_pendientes.php"
      </script>';

?>