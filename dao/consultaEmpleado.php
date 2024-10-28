<?php

include_once('db/db_Facturas.php');

function verificacionUsuario($user, $contra, $nombre){

    $con = new LocalConector();
    $conexion=$con->conectar();

    $consP="SELECT * FROM `Usuarios` WHERE `Nomina` = '$user' and `Password` = '$contra';";
    $rsconsPro=mysqli_query($conexion,$consP);

    if(mysqli_num_rows($rsconsPro) == 1){
        $row = mysqli_fetch_assoc($rsconsPro);
        if (password_verify($contra, $row['Password'])) {
            mysqli_close($conexion);
            return 2;
        } else {
            // La contraseña es incorrecta
            return 0;
        }
    }else{
        $contra_encriptada = password_hash($contra, PASSWORD_DEFAULT);

        $consI="INSERT INTO `Usuarios`(`Nomina`, `Nombre`, `Rol`, `Password`) VALUES ('$user','$nombre','2','$contra_encriptada')";
        $insert=mysqli_query($conexion,$consI);

        if($insert){
            mysqli_close($conexion);
            return 1;
        }


    }
}


?>