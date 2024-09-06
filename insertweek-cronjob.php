<?php
include("assets/includes/mysql.php");


$anio = date('Y');
$sql_anio = "SELECT anio_id FROM anios WHERE anio_num = '".$anio."'";
//echo $sql_anio."<br>";
    $findAnio = mysqli_query($conexion, $sql_anio);
    while($raw = mysqli_fetch_array($findAnio)){
        $anio_id = $raw['anio_id'];
    }

    
    $num_sem = date('W');
    //$num_sem = "32";
    //aseguramos que no se duplique el insert de semana
    $sql_duplicate_week = "SELECT * FROM pagos_entrenador WHERE num_sem = '".$num_sem."' AND anio_id = '".$anio_id."'";
    //echo $sql_duplicate_week."<br>";
    $duplicaWeek = mysqli_query($conexion, $sql_duplicate_week);
        $row_cnt = mysqli_num_rows($duplicaWeek);
        if ($row_cnt === 0){

            $sql_find_trainer = "SELECT ent_id,eclas_id,eclas_monto_pago,eclas_costo_falta FROM entrenadores LEFT JOIN entrenador_clasificacion USING (eclas_id) WHERE activo = 1";
                //echo $sql_find_trainer."<br>";
                $findTrainer = mysqli_query($conexion, $sql_find_trainer);
                
                //$num_sem = $num_sem_0 + 1;
                $today = date('Y-m-d');
                    while ($row = mysqli_fetch_array($findTrainer)) {
                        $ent_id = $row['ent_id'];
                        $eclas_id = $row['eclas_id'];
                        $eclas_monto_pago = $row['eclas_monto_pago'];
                        $eclas_costo_falta = $row['eclas_costo_falta'];

                                    $sql_insert_week = "INSERT INTO pagos_entrenador 
                                    (ent_id,anio_id,num_sem,monto_base,eclas_id,costo_falta,total,bono_extra,desc_adicional,pagado,pg_dateinto) 
                                    VALUES ('".$ent_id."', '".$anio_id."','".$num_sem."','".$eclas_monto_pago."','".$eclas_id."','".$eclas_costo_falta."','".$eclas_monto_pago."','0','0','0','".$today."')";
                                        echo $sql_insert_week;
                                        $insertWeek = mysqli_query($conexion, $sql_insert_week);
                    }
        } else {
            echo "la semana".$num_sem. "ya existe en la base de datos";
        }
?>