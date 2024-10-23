<?php 
include("assets/includes/mysql.php");
// echo "Success!<br>";
// echo $_POST['jug_id']."<br>";
// echo $_POST['jpago_mes']."<br>";
// echo $_POST['jpago_monto']."<br>";
// echo $_POST['jpago_comentarios'];

$anio = date('Y');
$today = date('Y-m-d H:m:s');
$sql_new_pay_extra = "INSERT INTO jugador_has_pago (jug_id,jpago_anio,jpago_mes,jpago_monto,jpago_fecha,jpago_comentarios,jpago_pagado) 
VALUES ('".$_POST['jug_id']."','".$anio."','".$_POST['jpago_mes']."','".$_POST['jpago_monto']."','".$today."','".$_POST['jpago_comentarios']."','1' )";
//echo $sql_new_pay_extra;
$resultExtra = mysqli_query($conexion,$sql_new_pay_extra);
?>
<div class="row" style="padding:5px">
            <div class="col-lg-1"><span style="color:gray"><?php echo $anio;?></span></div>
            <div class="col-lg-2"><span style="color:gray">
            <?php 
               $sql_mes = "SELECT mes_nom FROM meses WHERE mes_id = '".$_POST['jpago_mes']."'";
               $resultMes = mysqli_query($conexion,$sql_mes);
                 while($rm = mysqli_fetch_array($resultMes)){
                   $mes_nom = $rm['mes_nom'];
                   echo $mes_nom;
                 }
              ?>
            </span></div>
            <div class="col-lg-1"><input type="text" name="jpago_monto" value="<?php echo $_POST['jpago_monto'];?>" style="width:40px" disabled>&nbsp;</div>
            <div class="col-lg-1" style="text-align:center"><input type="checkbox" name="jpago_pagado" value="<?php echo $jpago_pagado;?>" disabled></div>
            <div class="col-lg-2"><i class="feather-check-square" style="color:green;"></i><span style="font-size:12px; color:green;"> PAGADO</span></div>
            <div class="col-lg-2"><span style="color:gray"><?php echo $today;?></span></div>
            <div class="col-lg-3"><span style="color:gray"><?php echo $_POST['jpago_comentarios'];?></span></div>
            
          </div>