<?php 
include("assets/includes/mysql.php");

if($_POST['jugadd'] == "add100"){
    $sqlJug = "INSERT INTO jugador (jug_nom, jug_appat, jug_apmat, jug_fecha_nac, edo_id, jug_genero) 
               VALUES ('".$_POST['jug_nom']."','".$_POST['jug_appat']."','".$_POST['jug_apmat']."',
               '".$_POST['jug_fecha_nac']."','".$_POST['edo_id']."','".$_POST['jug_genero']."') ";
    $resultjug = mysqli_query($conexion, $sqlJug);

    if($resultjug) {
        $jug_id = mysqli_insert_id($conexion);
        $fecha_in = date("Y-m-d");

        $sqlInsertEquipo = "INSERT INTO jugador_has_equipo (jug_id, cat_id, sede_id, hora_id, est_id, jhe_fecha_in) 
                            VALUES ('$jug_id','".$_POST['cat_id']."','".$_POST['sede_id']."','".$_POST['hora_id']."','1',
                            '$fecha_in')";
        $resultEquipo = mysqli_query($conexion, $sqlInsertEquipo);
        
        $sqlInsertPago = "INSERT INTO jugador_has_pago (jug_id, mon_id, tp_id, fep_id, jp_fecha_in) 
                          VALUES ('$jug_id','".$_POST['mon_id']."','".$_POST['tp_id']."','".$_POST['fep_id']."','$fecha_in')";
        $resultPago = mysqli_query($conexion, $sqlInsertPago);

        header("Location: https://clublobos-system.com/players.php?new=success");
        exit;
    } else {
        echo "Error al agregar el jugador: " . mysqli_error($conexion);
    }
}

if ($_POST['action'] == "edit") {
    $jug_id = $_POST['jug_id'];
    
    $jug_nom = $_POST['jug_nom'];
    $jug_appat = $_POST['jug_appat'];
    $jug_apmat = $_POST['jug_apmat'];
    $jug_curp = $_POST['jug_curp'];
    $jug_fecha_nac = $_POST['jug_fecha_nac'];
    $edo_id = $_POST['edo_id'];
    $jug_genero = $_POST['jug_genero'];
    $jug_nss = $_POST['jug_nss'];
    $jug_fecha_in = $_POST['jug_fecha_in'];
    $jug_fecha_up = $_POST['jug_fecha_up'];

    $mysqlJugadorupdate = "UPDATE jugador 
                           SET jug_nom = '$jug_nom',  
                               jug_appat = '$jug_appat', 
                               jug_apmat = '$jug_apmat', 
                               jug_curp = '$jug_curp', 
                               jug_fecha_nac = '$jug_fecha_nac', 
                               edo_id = '$edo_id', 
                               jug_genero = '$jug_genero', 
                               jug_nss = '$jug_nss', 
                               jug_fecha_in = '$jug_fecha_in', 
                               jug_fecha_up = '$jug_fecha_up'
                           WHERE jug_id = '$jug_id'";


    $resultjugadorupdate = mysqli_query($conexion, $mysqlJugadorupdate);
    
    if ($resultjugadorupdate) {
        header("Location: players.php?edit=success&cache = " .$cache);
       
        exit;
    } else {
        echo "Error al actualizar el jugador: " . mysqli_error($conexion);
    }
}


if ($_POST['action'] == "edit2") {
    $jug_id = $_POST['jug_id'];
    
    $jht_nom = $_POST['jht_nom'];
    $jht_tel = $_POST['jht_tel'];
    $jht_email = $_POST['jht_email'];
    $jht_col = $_POST['jht_col'];
    $jht_cp = $_POST['jht_cp'];
    $jht_calle = $_POST['jht_calle'];
    $jht_no_ext = $_POST['jht_no_ext'];
    $jht_no_int = $_POST['jht_no_int'];
    $edo_id = $_POST['edo_id'];
    $mun_id = $_POST['mun_id'];


    $mysqlTutorupdate = "UPDATE jugador_has_tutor 
                           SET jht_nom = '$jht_nom',  
                               jht_tel = '$jht_tel', 
                               jht_email = '$jht_email', 
                               jht_col = '$jht_col', 
                               jht_cp = '$jht_cp', 
                               jht_calle = '$jht_calle', 
                               jht_no_ext = '$jht_no_ext', 
                               jht_no_int = '$jht_no_int',
                               edo_id = '$edo_id',
                               mun_id='$mun_id' 
                               
                              
                           WHERE jug_id = '$jug_id'";

    $resulttutoresupdate = mysqli_query($conexion, $mysqlTutorupdate);
    
    if ($resulttutoresupdate) {
        header("Location: players.php?edit=success&cache = " .$cache);
         
        exit;
    } else {
        echo "Error al actualizar el jugador: " . mysqli_error($conexion);
    }
}



if ($_POST['action'] == "edit3") {
    $jug_id = $_POST['jug_id'];
    
    $jhc_tel = $_POST['jhc_tel'];
    $jhc_email = $_POST['jhc_email'];
    $jhc_col = $_POST['jhc_col'];
    $jhc_cp = $_POST['jhc_cp'];
    $jhc_calle = $_POST['jhc_calle'];
    $jhc_no_ext = $_POST['jhc_no_ext'];
    $jhc_no_int = $_POST['jhc_no_int'];
    $edo_id = $_POST['edo_id'];
    $mun_id = $_POST['mun_id'];
   

    $mysqlContactoupdate = "UPDATE jugador_has_datoscontacto 
                           SET jhc_tel = '$jhc_tel',  
                           jhc_email = '$jhc_email', 
                           jhc_col = '$jhc_col', 
                           jhc_cp = '$jhc_cp', 
                           jhc_calle = '$jhc_calle', 
                           jhc_no_ext = '$jhc_no_ext', 
                           jhc_no_ext = '$jhc_no_ext', 
                           jhc_no_int = '$jhc_no_int',
                           edo_id = '$edo_id',
                           mun_id='$mun_id'
                              
                           WHERE jug_id = '$jug_id'";


    $resultcontactoupdate = mysqli_query($conexion, $mysqlContactoupdate);
   
    if ($resultcontactoupdate) {
        header("Location: players.php?edit=success&cache = " .$cache);
       
        exit;
    } else {
        echo "Error al actualizar el jugador: " . mysqli_error($conexion);
    }
}



if ($_POST['action'] == "edit4") {
    $jug_id = $_POST['jug_id'];
    
    $cat_id = $_POST['cat_id'];
    $sede_id = $_POST['sede_id'];
    $hora_id = $_POST['hora_id'];
    $est_id = $_POST['est_id'];
    $jhe_num = $_POST['jhe_num'];

    $mysqlEquipoupdate = "UPDATE jugador_has_equipo
                           SET cat_id = '$cat_id',  
                           sede_id = '$sede_id', 
                           hora_id = '$hora_id', 
                           est_id = '$est_id', 
                           jhe_num = '$jhe_num' 
                           
                              
                           WHERE jug_id = '$jug_id'";

    

    $resultequipoupdate = mysqli_query($conexion, $mysqlEquipoupdate);
    
   
    if ($resultequipoupdate) {
        header("Location: players.php?edit=success&cache = " .$cache);
       
        exit;
    } else {
        echo "Error al actualizar el jugador: " . mysqli_error($conexion);
    }
}


if ($_POST['action'] == "edit5") {
    $jug_id = $_POST['jug_id'];
    
    $tp_id = $_POST['tp_id'];
    $fep_id = $_POST['fep_id'];
    $mon_id = $_POST['mon_id'];
    

    $mysqlPagoupdate = "UPDATE jugador_has_pago
                           SET tp_id = '$tp_id',  
                           fep_id = '$fep_id', 
                           mon_id = '$mon_id'
                              
                           WHERE jug_id = '$jug_id'";

    

    $resultpagoupdate = mysqli_query($conexion, $mysqlPagoupdate);
    
   
    if ($resultpagoupdate) {
        header("Location: players.php?edit=success&cache = " .$cache);
       
        exit;
    } else {
        echo "Error al actualizar el jugador: " . mysqli_error($conexion);
    }
}

$cache= rand(1,9999);
?>
<script lenguage="javascript">
    location.href="https://clublobos-system.com/players.php?new=success&cache=<?php echo $cache;?>";
</script>
