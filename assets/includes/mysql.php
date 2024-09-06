<?php 
    $host = "mysql.clublobos-system.com"; 
    $user = "usrl0b0s";
    $pass = "L0b0s#Clu8.456";
    $bd = "db_lobos_club";

        $conexion = new mysqli($host,$user,$pass,$bd);

        if($conexion->connect_errno){
            die("La conexión ha fallado" . $conexion->connect_errno);
        } 
       // echo "Conexión ha sido satisfactoria";
        //mysqli_close($conexion);
?>