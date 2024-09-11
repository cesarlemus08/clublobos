<?php 
include("assets/includes/mysql.php");

 if($_POST['jugadd'] == "add100"){

    $sqlJug = "INSERT INTO jugador (jug_nom,jug_appat,jug_apmat,jug_fecha_nac,edo_id,jug_genero) 
    VALUE ('".$_POST['jug_nom']."','".$_POST['jug_appat']."','".$_POST['jug_apmat']."',
    '".$_POST['jug_fecha_nac']."','".$_POST['edo_id']."','".$_POST['jug_genero']."') ";
    $resultjug = mysqli_query($conexion, $sqlJug);
    //echo "<br>".$sqlJug;

    $sqlfind = "SELECT jug_id FROM jugador WHERE jug_nom = '".$_POST['jug_nom']."' 
    AND jug_appat = '".$_POST['jug_appat']."' AND jug_apmat = '".$_POST['jug_apmat']."'  
    AND jug_fecha_nac = '".$_POST['jug_fecha_nac']."'";
    //echo "<br>".$sqlfind;
    $resultFind = mysqli_query($conexion,$sqlfind);
        while ($row = mysqli_fetch_array($resultFind)) {
            $jug_id = $row['jug_id'];
            $fecha_in = date("Y-m-d");

            $sqlInsertEquipo = "INSERT INTO jugador_has_equipo (jug_id,cat_id,sede_id,hora_id,est_id,jhe_fecha_in) 
            VALUES ('".$jug_id."','".$_POST['cat_id']."','".$_POST['sede_id']."','".$_POST['hora_id']."','1',
            '".$fecha_in."')";
            //echo "<br>".$sqlInsertEquipo;
            $resultEquipo = mysqli_query($conexion,$sqlInsertEquipo);

            $sqlInsertPago = "INSERT INTO jugador_has_pago (jug_id,mon_id,tp_id,fep_id,jp_fecha_in) 
            VALUES ('".$jug_id."','".$_POST['mon_id']."','".$_POST['tp_id']."','".$_POST['fep_id']."','".$fecha_in."')";
            //echo "<br>".$sqlInsertPago;
            $resultPago = mysqli_query($conexion,$sqlInsertPago);
        }
}
$cache= rand(1,9999);
?>
<script lenguage="javascript">
    location.href="https://clublobos-system.com/players.php?new=success&cache=<?php echo $cache;?>";
</script>


