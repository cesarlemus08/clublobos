<div class="card">
  <h5 class="card-header"><?php echo $jug_nom." ".$jug_appat." ".$jug_apmat;?></h5>
  <div class="card-body">
    <p class="card-text">Tipo de pago: <strong><?php echo $tp_nom;?></strong> | Fecha de pago: <strong><?php echo $fep_nom;?></strong> | Monto de pago: <strong><?php echo "$ ". $monto_f;?></strong></p>
    1. Verifica el monto de pago. 2. Confirma marcando el checkbox. 3. Da clic en pagar. <br><br>   
            
        <div style="text-align:right">
        <form action="#" name="form-pago-nuevo<?php echo $jug_id;?>" method="post">
          <input type="hidden" id="jug_id<?php echo $jug_id;?>" value="<?php echo $jug_id;?>">
          <input type="hidden" id="jp_id<?php echo $jp_id;?>" value="<?php echo $jp_id;?>">
          <button type="button" id="btn-pago-nuevo<?php echo $jug_id;?>" name="btn-pago-nuevo<?php echo $jug_id;?>" onclick="nuevopago<?php echo $jug_id;?>();" class="btn btn-primary">Agregar pago <?php echo $jug_id;?></button>
        </form>
        </div>
        <br>
        <div id="mostrar_nuevo_pago<?php echo $jug_id;?>"></div>
        <div id="mensaje_confirmacion_pago<?php echo $jpago_id;?>"></div>
        <table>
          <tr>
            <th>Año</th><th>Mes</th><th>Monto</th><th>Confirmar</th><th>Aplicar</th><th>Fecha pago</th><th>Comentario</th>
          </tr>
          <?php 
            $sql_pago = "SELECT jpago_id,jpago_anio,jpago_mes,jpago_monto,jpago_fecha,jpago_comentarios,jpago_pagado FROM jugador_has_pago WHERE jug_id = '".$jug_id."' ORDER BY jpago_id DESC LIMIT 3 ";
            //echo $sql_pago;
            $resultPago = mysqli_query($conexion, $sql_pago);
              while ($rowP =  mysqli_fetch_array($resultPago)){
                  $jpago_id = $rowP['jpago_id'];
                  $jpago_anio = $rowP['jpago_anio'];
                  $jpago_mes = $rowP['jpago_mes'];
                  $jpago_monto = $rowP['jpago_monto'];
                  $jpago_fecha = $rowP['jpago_fecha'];
                  $jpago_comentarios = $rowP['jpago_comentarios'];
                  $jpago_pagado = $rowP['jpago_pagado'];    
          ?>
          <?php if($jpago_pagado == 0) { ?>
        <script>
            function habilitar<?php echo $jpago_id;?>(obj)
            {
              if (obj.checked)
                  document.getElementById('submitButton<?php echo $jpago_id;?>').disabled = false;
              else
                  document.getElementById('submitButton<?php echo $jpago_id;?>').disabled = true;
            }
        </script> 
        
          <form name="form-pay-player<?php echo $jpago_id;?>" method="post" action="#"></form>
            <tr>
              <td><?php echo $jpago_anio;?></td>
              <td>
                <?php 
                $sql_mes = "SELECT mes_nom FROM meses WHERE mes_id = '".$jpago_mes."'";
                $resultMes = mysqli_query($conexion,$sql_mes);
                  while($rm = mysqli_fetch_array($resultMes)){
                    $mes_nom = $rm['mes_nom'];
                    echo $mes_nom;
                  }
                ?>
              </td>
              <td><input type="text" name="jpago_monto<?php echo $jpago_id;?>" value="<?php echo $jpago_monto;?>" style="width:40px">&nbsp;</td>
              <td style="text-align:center"><input type="checkbox" name="jpago_pagado<?php echo $jpago_id;?>" id="jpago_pagado<?php echo $jpago_id;?>" value="1" onchange="habilitar<?php echo $jpago_id;?>(this)"></td>
              <td>
                <button type="button" class="btn btn-primary" id="submitButton<?php echo $jpago_id;?>" name="submitButton<?php echo $jpago_id;?>" disabled onclick="aplicarpago<?php echo $jpago_id;?>();">Pagar <?php echo $jpago_id;?></button>
                
                <input type="hidden" name="jpago_id" value="<?php echo $jpago_id;?>">
              </td>
              <td><span style="color:gray">---</span></td>
              <td>
                <textarea name="jpago_comentarios<?php echo $jpago_id;?>" style="width:100%"><?php echo $jpago_comentarios;?></textarea>
              </td>
            </tr>
          </form>
        
            <?php } else { ?>
          <tr>
            <td><span style="color:gray"><?php echo $jpago_anio;?></span></td>
            <td><span style="color:gray">
            <?php 
              $sql_mes = "SELECT mes_nom FROM meses WHERE mes_id = '".$jpago_mes."'";
              $resultMes = mysqli_query($conexion,$sql_mes);
                while($rm = mysqli_fetch_array($resultMes)){
                  $mes_nom = $rm['mes_nom'];
                  echo $mes_nom;
                }
              ?>
            </span></td>
            <td><input type="text" name="jpago_monto" value="<?php echo $jpago_monto;?>" style="width:40px" disabled>&nbsp;</td>
            <td style="text-align:center"><input type="checkbox" name="jpago_pagado" value="<?php echo $jpago_pagado;?>" disabled></td>
            <td><i class="feather-check-square" style="color:green;"></i><span style="font-size:12px; color:green;"> PAGADO</span></td>
            <td><span style="color:gray"><?php echo $jpago_fecha;?></span></td>
            <td><span style="color:gray"><?php echo $jpago_comentarios;?></span></td>
          </tr>

          <?php 
              }
          } 
          ?>
          
        </table>

    
  </div>
</div>

<script>
    function nuevopago<?php echo $jug_id;?>(){
        //alert("muestra autos asociados a dependencia");
     jug_id = $("#jug_id<?php echo $jug_id;?>").val();
     jp_id = $("#jp_id<?php echo $jug_id;?>").val();
    var parametros = {
        "jug_id": jug_id,
        "jp_id": jp_id
    };
    $.ajax({
        data: parametros,
        datatype: 'json',
        url: 'pago-jugador-mes-nuevo.php',
        type: 'post',
        success: function(mensaje){
            $("#mostrar_nuevo_pago<?php echo $jug_id;?>").html(mensaje);
        }
        })
    }

    function aplicarpago<?php echo $jpago_id;?>(){
        //alert("mensaje");
     jpago_id = $("#jpago_id<?php echo $jpago_id;?>").val();
     jpago_monto = $("#jpago_monto<?php echo $jpago_monto;?>").val();
     jpago_pagado = $("#jpago_pagado<?php echo $jpago_pagado;?>").val();
     jpago_comentarios = $("#jpago_comentarios<?php echo $jpago_comentarios;?>").val();
    var parametros = {
        "jpago_id": jpago_id,
        "jpago_monto": jpago_monto,
        "jpago_pagado": jpago_pagado,
        "jpago_comentarios": jpago_comentarios
    };
    $.ajax({
        data: parametros,
        datatype: 'json',
        url: 'pago-jugador.php',
        type: 'post',
        success: function(mensaje){
            $("#mensaje_confirmacion_pago<?php echo $jpago_id;?>").html(mensaje);
        }
        })
    }
    </script>