<?php 
include("assets/includes/mysql.php");

//Paso 1: Verificar el tipo de pago de cada jugador
    //caso 1: Por clase
    //caso 2: Semanal
    //caso 3: Mensual
    //caso 4: Anual

    $sql_verify_tempay = "SELECT jug_id,tp_id,mon_nom FROM jugador_has_datospago LEFT JOIN monto_pago USING (mon_id)";
    //echo $sql_verify_tempay;
    $resultTemp = mysqli_query($conexion,$sql_verify_tempay);
        while($rtm = mysqli_fetch_array($resultTemp)){
            $jug_id = $rtm['jug_id'];
            $tp_id = $rtm['tp_id'];
            $mon_nom = $rtm['mon_nom'];

            //Paso 2: Tomando en cuenta el tipo de pago, validar con fechas e insertar el registro correspondiente en la tabla jugador_has_pago
            switch ($tp_id) {
                case 1: //por clase
                    echo "i equals 0";
                    break;
                case 2: //semanal
                    echo "i equals 1";
                    break;
                case 3: //mensual
                    // $dayP = date('d');
                    $dayP = 1;
                    $monthP = date('m');
                    $yearP = date('Y');
                    if($dayP == 1){
                        $sql_duplicate_pay = "SELECT * FROM jugador_has_pago WHERE jpago_anio = '".$yearP."' AND jpago_mes = '".$monthP."' AND jug_id = '".$jug_id."'";
                        echo $sql_duplicate_pay."<br>";
                        $resultDuplicatePay = mysqli_query($conexion,$sql_duplicate_pay);
                                $numRowsP = mysqli_num_rows($resultDuplicatePay); echo "Reg:".$numRowsP."<br>";
                                    if($numRowsP == 0) {
                                    $sql_insert_paymonth = "INSERT INTO jugador_has_pago (jug_id,jpago_anio,jpago_mes,jpago_monto,jpago_pagado)
                                    VALUES ('".$jug_id."','".$yearP."','".$monthP."','".$mon_nom."','0')";
                                        echo $sql_insert_paymonth."<br>";
                                        $resultInsertPay = mysqli_query($conexion,$sql_insert_paymonth);
                                }

                    }
                    break;
                case 4: //anual
                    echo "i equals 2";
                    break;    
            }
        }



?>