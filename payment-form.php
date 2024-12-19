<?php include("assets/includes/mysql.php"); ?>
<div class="card">
  <h5 class="card-header"><?php echo $jug_nom." ".$jug_appat." ".$jug_apmat;?></h5>
  <div class="card-body">
    <p class="card-text">Tipo de pago: <strong><?php echo $tp_nom;?></strong> | Día(s) de pago: <strong><?php echo $fep_nom;?></strong> | Monto de pago: <strong><?php echo "$ ". $monto_f;?></strong></p>
    1. Verifica el monto de pago. 2. Confirma marcando el checkbox. 3. Da clic en pagar. <br><br>   
            
        <div>
          <p style="text-align:right">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $jug_id;?>" aria-expanded="false" aria-controls="collapseExample">
              Generar nuevo pago 
            </button>
          </p>
            <div class="collapse" id="collapseExample<?php echo $jug_id;?>">
              <div class="card card-body">
              <div id="mensaje_confirmacion_pago_extraordinario<?php echo $jug_id;?>">
                <form class="form-horizontal">
                <div class="form-group row mb-3">
                    <label for="jpago_mes<?php echo $jug_id;?>" class="col-3 col-form-label">Mes</label>
                    <div class="col-9">
                          <select name="jpago_mes<?php echo $jug_id;?>" id="jpago_mes<?php echo $jug_id;?>">
                              <option value="#" disabled>Selecciona el mes</option>
                            <?php 
                            $sql_mes = "SELECT mes_id,mes_nom FROM meses";
                            $resultMes = mysqli_query($conexion,$sql_mes);
                              while($rm = mysqli_fetch_array($resultMes)){
                                $mes_id = $rm['mes_id'];
                                $mes_nom = $rm['mes_nom'];
                                //echo $mes_nom;
                            ?>
                              <option value="<?php echo $mes_id;?>"><?php echo $mes_nom;?></option>
                              <?php } ?>
                          </select> 
                    </div>
                </div>  
                
                      <div class="form-group row mb-3">
                          <label for="jpago_monto<?php echo $jug_id;?>" class="col-3 col-form-label">Monto</label>
                          <div class="col-9">
                          <input type="text" class="text" id="jpago_monto<?php echo $jug_id;?>" name="jpago_monto<?php echo $jug_id;?>">
                          </div>
                      </div>
                      <div class="form-group row mb-3">
                          <label for="jpago_comentarios<?php echo $jug_id;?>" class="col-3 col-form-label">Comentario</label>
                          <div class="col-9">
                          <textarea name="jpago_comentarios<?php echo $jug_id;?>" id="jpago_comentarios<?php echo $jug_id;?>" name="jpago_comentarios<?php echo $jug_id;?>"></textarea>
                          </div>
                      </div>
                      <div class="form-group mb-0 justify-content-end row">
                          <div class="col-9">
                          <button type="button" class="btn btn-primary" id="submitButtonExtra<?php echo $jug_id;?>" name="submitButtonExtra<?php echo $jug_id;?>" onclick="pagoextraordinario<?php echo $jug_id;?>();">Pagar</button>
                          <input type="hidden" id="jug_id<?php echo $jug_id;?>" name="jug_id<?php echo $jug_id;?>" value="<?php echo $jug_id;?>">
                          </div>
                      </div>
                
                </form>
                </div>
              </div>
            </div>
        </div>
        
        <script>
                      function pagoextraordinario<?php echo $jug_id;?>(){
                      jug_id = $("#jug_id<?php echo $jug_id;?>").val();  
                      jpago_mes = $("#jpago_mes<?php echo $jug_id;?>").val();
                      jpago_monto = $("#jpago_monto<?php echo $jug_id;?>").val();
                      jpago_comentarios = $("#jpago_comentarios<?php echo $jug_id;?>").val();
                      var parametros = {
                          "jug_id": jug_id,
                          "jpago_mes": jpago_mes,
                          "jpago_monto": jpago_monto,
                          "jpago_comentarios": jpago_comentarios
                      };
                      $.ajax({
                          data: parametros,
                          datatype: 'json',
                          url: 'pago-jugador-extraordinario.php',
                          type: 'post',
                          success: function(mensaje){
                              $("#mensaje_confirmacion_pago_extraordinario<?php echo $jug_id;?>").html(mensaje);
                          }
                          })
                      }
                </script>
        
        
        <div class="container">
          <div class="row" style="background-color:#CCC; padding:5px">
            <div class="col-lg-1">Año</div><div class="col-lg-2">Mes <?php if($tp_id==2){ ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Semana<?php } ?></div><div class="col-lg-1">Monto</div><div class="col-lg-1">Confirma</div><div class="col-lg-2">Aplicar</div><div class="col-lg-2">Fecha pago</div><div class="col-lg-3">Comentario</div>
          </div>
          <?php 
            $sql_pago = "SELECT jpago_id,jpago_anio,jpago_mes,jpago_semana,jpago_monto,jpago_fecha,jpago_comentarios,jpago_pagado FROM jugador_has_pago WHERE jug_id = '".$jug_id."' ORDER BY jpago_id DESC LIMIT 3 ";
            //echo $sql_pago;
            $resultPago = mysqli_query($conexion, $sql_pago);
              while ($rowP =  mysqli_fetch_array($resultPago)){
                  $jpago_id = $rowP['jpago_id'];
                  $jpago_anio = $rowP['jpago_anio'];
                  $jpago_mes = $rowP['jpago_mes'];
                  $jpago_semana = $rowP['jpago_semana'];
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
                      <?php $z="z";?> 
                      <script>
                      function aplicarpago<?php echo $jpago_id.$z;?>(){
                          //alert("mensaje");
                          jpago_id = $("#jpago_id<?php echo $jpago_id.$z;?>").val();
                          jpago_monto = $("#jpago_monto<?php echo $jpago_id.$z;?>").val();
                          jpago_pagado = $("#jpago_pagado<?php echo $jpago_id.$z;?>").val();
                          tp_id = $("#tp_id<?php echo $jpago_id.$z;?>").val();
                          jpago_comentarios = $("#jpago_comentarios<?php echo $jpago_id.$z;?>").val();
                          var parametros = {
                              "jpago_id": jpago_id,
                              "jpago_monto": jpago_monto,
                              "jpago_pagado": jpago_pagado,
                              "tp_id": tp_id,
                              "jpago_comentarios": jpago_comentarios
                          };
                          $.ajax({
                          data: parametros,
                          datatype: 'json',
                          url: 'pago-jugador.php',
                          type: 'post',
                          success: function(mensaje){
                              $("#mensaje_confirmacion_pago<?php echo $jpago_id.$z;?>").html(mensaje);
                          }
                          })
                      }
                      </script>
          <div id="mensaje_confirmacion_pago<?php echo $jpago_id.$z;?>">
          <form name="form-pay-player<?php echo $jpago_id.$z;?>" method="post" action="#">
            <div class="row" style="padding:5px">
              <div class="col-lg-1"><?php echo $jpago_anio;?></div>
              <div class="col-lg-2">
                <?php 
                $sql_mes = "SELECT mes_nom FROM meses WHERE mes_id = '".$jpago_mes."'";
                $resultMes = mysqli_query($conexion,$sql_mes);
                  while($rm = mysqli_fetch_array($resultMes)){
                    $mes_nom = $rm['mes_nom'];
                    echo $mes_nom;
                    if($tp_id==2) { echo "&nbsp;&nbsp;&nbsp;&nbsp; - ".$jpago_semana; }
                  }
                ?>
              </div>
              
              <div class="col-lg-1"><input type="text" id="jpago_monto<?php echo $jpago_id.$z;?>" name="jpago_monto<?php echo $jpago_id.$z;?>" value="<?php echo $jpago_monto;?>" style="width:40px">&nbsp;</div>
              <div class="col-lg-1" style="text-align:center"><input type="checkbox" name="jpago_pagado<?php echo $jpago_id.$z;?>" id="jpago_pagado<?php echo $jpago_id.$z;?>" value="1" onchange="habilitar<?php echo $jpago_id;?>(this)"></div>
              <div class="col-lg-2">
                <button type="button" class="btn btn-primary" id="submitButton<?php echo $jpago_id;?>" name="submitButton<?php echo $jpago_id;?>" disabled onclick="aplicarpago<?php echo $jpago_id.$z;?>();">Pagar</button>
                
                <input type="hidden" name="jpago_id<?php echo $jpago_id.$z;?>" id="jpago_id<?php echo $jpago_id.$z;?>" value="<?php echo $jpago_id;?>">
                <input type="hidden" name="tp_id<?php echo $jpago_id.$z;?>" id="tp_id<?php echo $jpago_id.$z;?>" value="<?php echo $tp_id;?>">
              </div>
              <div class="col-lg-2"><span style="color:gray">---</span></div>
              <div class="col-lg-3">
                <textarea name="jpago_comentarios<?php echo $jpago_id.$z;?>" id="jpago_comentarios<?php echo $jpago_id.$z;?>" style="width:100%"><?php echo $jpago_comentarios;?></textarea>
              </div>
            </div>
          </form>
          </div>
          
            <?php } else { ?>
          
          <div class="row" style="padding:5px">
            <div class="col-lg-1"><span style="color:gray"><?php echo $jpago_anio;?></span></div>
            <div class="col-lg-2"><span style="color:gray">
            <?php 
              $sql_mes = "SELECT mes_nom FROM meses WHERE mes_id = '".$jpago_mes."'";
              $resultMes = mysqli_query($conexion,$sql_mes);
                while($rm = mysqli_fetch_array($resultMes)){
                  $mes_nom = $rm['mes_nom'];
                  echo $mes_nom;
                  if($tp_id==2) { echo "&nbsp;&nbsp;&nbsp;&nbsp; - ".$jpago_semana; }
                }
              ?>
            </span></div>
            <div class="col-lg-1"><input type="text" name="jpago_monto" value="<?php echo $jpago_monto;?>" style="width:40px" disabled>&nbsp;</div>
            <div class="col-lg-1" style="text-align:center"><input type="checkbox" name="jpago_pagado" value="<?php echo $jpago_pagado;?>" disabled></div>
            <div class="col-lg-2"><i class="feather-check-square" style="color:green;"></i><span style="font-size:12px; color:green;"> PAGADO</span></div>
            <div class="col-lg-2"><span style="color:gray"><?php echo $jpago_fecha;?></span></div>
            <div class="col-lg-3"><span style="color:gray"><?php echo $jpago_comentarios;?></span></div>
            
          </div>
          <?php 
              }
          } 
          ?>
          
        </div>

    
  </div>
</div>