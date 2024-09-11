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
        
        <table>
          <tr>
            <th>Concepto</th><th>Monto</th><th>Confirmar</th><th>Aplicar</th><th>Fecha pago</th>
          </tr>
          <tr>
            <td>Septiembre</td>
            <td><input type="text" name="monto_pago" value="400" style="width:40px">&nbsp;</td>
            <td style="text-align:center"><input type="checkbox" name="pagoaplicado" id="pagoaplicado" value="1" onchange="habilitar(this)"></td>
            <td><input class="btn btn-primary" id="submitButton" type="submit" value="Pagar" disabled/>
            <!-- <a href="#" class="btn btn-primary">Pagar</a> -->
          </td>
            <td><span style="color:gray">---</span></td>
          </tr>
          <tr>
            <td><span style="color:gray">Agosto</span></td>
            <td><input type="text" name="monto_pago" value="400" style="width:40px" disabled>&nbsp;</td>
            <td style="text-align:center"><input type="checkbox" name="pago_aplicado" value="1" disabled></td>
            <td><i class="feather-check-square" style="color:green;"></i><span style="font-size:12px; color:green;"> PAGADO</span></td>
            <td><span style="color:gray">3-Agosto-2024</span></td>
          </tr>
          <tr>
          <td><span style="color:gray">Julio</span></td>
            <td><input type="text" name="monto_pago" value="400" style="width:40px" disabled>&nbsp;</td>
            <td style="text-align:center"><input type="checkbox" name="pago_aplicado" value="1" disabled></td>
            <td><i class="feather-check-square" style="color:green;"></i><span style="font-size:12px; color:green;"> PAGADO</span></td>
            <td><span style="color:gray">3-Julio-2024</span></td>
          </tr>
        </table>

    
  </div>
</div>

