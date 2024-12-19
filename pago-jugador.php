<?php 
// echo $_POST['jpago_monto']."<br>";
// echo $_POST['jpago_comentarios']."<br>";
// echo $_POST['jpago_pagado']."<br>";
// echo $_POST['jpago_id']."<br>";

 include("assets/includes/mysql.php");

 $today = date('Y-m-d H:m:s');
 $sql_confirm_pay = "UPDATE jugador_has_pago SET jpago_monto = '".$_POST['jpago_monto']."', jpago_fecha = '".$today."',
 jpago_comentarios = '".$_POST['jpago_comentarios']."', jpago_pagado = '".$_POST['jpago_pagado']."' 
 WHERE jpago_id = '".$_POST['jpago_id']."'";
// echo $sql_confirm_pay;
 $resultConfirm = mysqli_query($conexion,$sql_confirm_pay);

  $sql_pago2 = "SELECT jpago_anio,jpago_mes,jpago_semana,jpago_monto,jpago_fecha,jpago_comentarios,jpago_pagado FROM jugador_has_pago WHERE jpago_id = '".$_POST['jpago_id']."' ";
//  //echo $sql_pago;
  $resultPago = mysqli_query($conexion, $sql_pago2);
    while ($rowP =  mysqli_fetch_array($resultPago)){
        $jpago_anio = $rowP['jpago_anio'];
        $jpago_mes = $rowP['jpago_mes'];
        $jpago_semana = $rowP['jpago_semana'];
        $jpago_monto = $rowP['jpago_monto'];
        $jpago_fecha = $rowP['jpago_fecha'];
        $jpago_comentarios = $rowP['jpago_comentarios'];
        $jpago_pagado = $rowP['jpago_pagado']; 
    }
?>
          <div class="row" style="padding:5px">
            <div class="col-lg-1"><span style="color:gray"><?php echo $jpago_anio;?></span></div>
            <div class="col-lg-2"><span style="color:gray">
            <?php 
                $sql_mes = "SELECT mes_nom FROM meses WHERE mes_id = '".$jpago_mes."'";
                $resultMes = mysqli_query($conexion,$sql_mes);
                  while($rm = mysqli_fetch_array($resultMes)){
                    $mes_nom = $rm['mes_nom'];
                    echo $mes_nom;
                    if($_POST['tp_id'] == 2) { echo "&nbsp;&nbsp;&nbsp;&nbsp; - ".$jpago_semana; }
                  }
              ?>
            </span></div>
            <div class="col-lg-1"><input type="text" name="jpago_monto" value="<?php echo $jpago_monto;?>" style="width:40px" disabled>&nbsp;</div>
            <div class="col-lg-1" style="text-align:center"><input type="checkbox" name="jpago_pagado" value="<?php echo $jpago_pagado;?>" disabled></div>
            <div class="col-lg-2"><i class="feather-check-square" style="color:green;"></i><span style="font-size:12px; color:green;"> PAGADO</span></div>
            <div class="col-lg-2"><span style="color:gray"><?php echo $jpago_fecha;?></span></div>
            <div class="col-lg-3"><span style="color:gray"><?php echo $jpago_comentarios;?></span></div>
            
          </div>