        <script>
            function habilitar(obj)
            {
              if (obj.checked)
                  document.getElementById('submitButton').disabled = false;
              else
                  document.getElementById('submitButton').disabled = true;
            }
        </script>

<div class="card">
  <h5 class="card-header"><?php echo $jug_nom." ".$jug_appat." ".$jug_apmat;?></h5>
  <div class="card-body">
    <p class="card-text">Tipo de pago: <strong><?php echo $tp_nom;?></strong> | Fecha de pago: <strong><?php echo $fep_nom;?></strong> | Monto de pago: <strong><?php echo "$ ". $monto_f;?></strong></p>
    Verifica el monto de pago, confirma marcando el checkbox y da clic en pagar. <br><br>   
            
        <div style="text-align:right">
        <form action="#" name="form-pago-nuevo<?php echo $jug_id;?>" method="post">
          <input type="hidden" id="jug_id<?php echo $jug_id;?>" value="<?php echo $jug_id;?>">
          <input type="hidden" id="jp_id<?php echo $jug_id;?>" value="<?php echo $jp_id;?>">
          <button type="button" id="btn-pago-nuevo<?php echo $jug_id;?>" name="btn-pago-nuevo<?php echo $jug_id;?>" onclick="nuevopago<?php echo $jug_id;?>();" class="btn btn-primary">Agregar pago <?php echo $jug_id;?></button>
        </form>
        </div>
        <div id="mostrar_nuevo_pago<?php echo $jug_id;?>"></div>
        <table>
          <tr>
            <th>Año</th><th>Mes</th><th>Monto</th><th>Confirmar</th><th>Aplicar</th><th>Fecha pago</th><th>Comentario</th>
          </tr>
          <tr>
            <td>2024</td>
            <td>Septiembre</td>
            <td><input type="text" name="monto_pago" value="400" style="width:40px">&nbsp;</td>
            <td style="text-align:center"><input type="checkbox" name="pagoaplicado" id="pagoaplicado" value="1" onchange="habilitar(this)"></td>
            <td><input class="btn btn-primary" id="submitButton" type="submit" value="Pagar" disabled/></td>
            <td><span style="color:gray">---</span></td>
            <td><textarea name="comentario_pago" style="width:100%"></textarea></td>
          </tr>
          <tr>
            <td><span style="color:gray">2024</span></td>
            <td><span style="color:gray">Agosto</span></td>
            <td><input type="text" name="monto_pago" value="400" style="width:40px" disabled>&nbsp;</td>
            <td style="text-align:center"><input type="checkbox" name="pago_aplicado" value="1" disabled></td>
            <td><i class="feather-check-square" style="color:green;"></i><span style="font-size:12px; color:green;"> PAGADO</span></td>
            <td><span style="color:gray">4-Agosto-2024</span></td>
            <td><span style="color:gray">Se pagó con un día de retraso</span></td>
          </tr>
          <tr>
            <td><span style="color:gray">2024</span></td>
            <td><span style="color:gray">Julio</span></td>
            <td><input type="text" name="monto_pago" value="400" style="width:40px" disabled>&nbsp;</td>
            <td style="text-align:center"><input type="checkbox" name="pago_aplicado" value="1" disabled></td>
            <td><i class="feather-check-square" style="color:green;"></i><span style="font-size:12px; color:green;"> PAGADO</span></td>
            <td><span style="color:gray">3-Julio-2024</span></td>
            <td>---</td>
          </tr>
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
    </script>