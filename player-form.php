<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">   
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="jug_nom" name="jug_nom" class="form-control" placeholder="Ingrese Nombre" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="nombre">Apellido Paterno</label>
                            <input type="text" id="jug_appat" name="jug_appat" class="form-control" placeholder="Ingrese Apellido Paterno" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="nombre">Apellido Materno</label>
                            <input type="text" id="jug_apmat" name="jug_apmat" class="form-control" placeholder="Ingrese Apellido Materno" required>
                        </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="jug_genero">Genero</label>
                            <select id="jug_genero" name="jug_genero" class="form-control">
                                <option value="">Selecciona Genero</option>
                                    <option value="1">Hombre</option>
                                    <option value="2">Mujer</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                        <label for="estado">Ciudad o Estado de Nacimiento</label>
                            <select id="edo_id" name="edo_id" class="form-control">
                                <option value="">Selecciona Estado</option>
                                <?php 
                                $sqlestado = "SELECT edo_nom,edo_id FROM estados ";
                                $resultEstado = mysqli_query($conexion, $sqlestado);
                                while ($rowE =  mysqli_fetch_array($resultEstado)) { 
                                    $edo_nom = $rowE['edo_nom'];
                                    $edo_id = $rowE['edo_id'];
                                    ?>
                                    <option value="<?php echo $edo_id; ?>"><?php echo $edo_nom; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date" id="jug_fecha_nac" name="jug_fecha_nac" class="form-control" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="categoria">Categoría</label>
                            <select id="cat_id" name="cat_id" class="form-control" required>
                                <option value="">Selecciona categoría</option>
                                <?php 
                                $sqlcate = "SELECT cat_id,cat_nom FROM categorias ";
                                $resultCate = mysqli_query($conexion, $sqlcate);
                                while ($rowc =  mysqli_fetch_array($resultCate)) { 
                                    $cat_id = $rowc['cat_id'];
                                    $cat_nom = $rowc['cat_nom'];
                                    ?>
                                    <option value="<?php echo $cat_id; ?>"><?php echo $cat_nom; ?> </option>
                                <?php } ?>
                            </select> 
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="sede_id">Sede</label>
                            <select id="sede_id" name="sede_id" class="form-control" required>
                                <option value="">Selecciona Sede</option>
                                <?php 
                                $sqlsede = "SELECT sede_id,sede_nom FROM sedes ";
                                $resultSede = mysqli_query($conexion, $sqlsede);
                                while ($rows =  mysqli_fetch_array($resultSede)) { 
                                    $sede_id = $rows['sede_id'];
                                    $sede_nom = $rows['sede_nom'];
                                    ?>
                                    <option value="<?php echo $sede_id; ?>"><?php echo $sede_nom; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="hora_id">Horario</label>
                            <select id="hora_id" name="hora_id" class="form-control" required>
                                <option value="">Selecciona horario</option>
                                <?php 
                                $sqlhora = "SELECT hora_id,hora_nom FROM horarios ";
                                $resultHora = mysqli_query($conexion, $sqlhora);
                                while ($rowh =  mysqli_fetch_array($resultHora)) { 
                                    $hora_id = $rowh['hora_id'];
                                    $hora_nom = $rowh['hora_nom'];
                                    ?>
                                    <option value="<?php echo $hora_id; ?>"><?php echo $hora_nom; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="form-group col-lg-4">
                        <label for="tp_id">Temporalidad de pago</label>
                            <select id="tp_id" name="tp_id" class="form-control">
                                <option value="">Selecciona Temporalidad de pago</option>
                                <?php 
                                $sqltemp = "SELECT tp_id,tp_nom FROM temporalidad_pago ";
                                $resultTemp = mysqli_query($conexion, $sqltemp);
                                while ($rowt =  mysqli_fetch_array($resultTemp)) { 
                                    $tp_id = $rowt['tp_id'];
                                    $tp_nom = $rowt['tp_nom'];
                                    ?>
                                    <option value="<?php echo $tp_id; ?>"><?php echo $tp_nom; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group col-lg-4">
                        <label for="mon_id">Monto de pago</label>
                            <select id="mon_id" name="mon_id" class="form-control">
                                <option value="">Selecciona Monto</option>
                                <?php 
                                $sqlmonto = "SELECT mon_id,mon_nom FROM monto_pago ";
                                $resultMonto = mysqli_query($conexion, $sqlmonto);
                                while ($rowm =  mysqli_fetch_array($resultMonto)) { 
                                    $mon_id = $rowm['mon_id'];
                                    $mon_nom = $rowm['mon_nom'];
                                    ?>
                                    <option value="<?php echo $mon_id; ?>"><?php echo $mon_nom; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                        <label for="fep_id">Día de pago</label>
                            <select id="fep_id" name="fep_id" class="form-control">
                                <option value="">Selecciona dia de pago</option>
                                <?php 
                                $sqldia = "SELECT fep_id,fep_nom FROM fecha_pago ";
                                $resultDia = mysqli_query($conexion, $sqldia);
                                while ($rowd =  mysqli_fetch_array($resultDia)) { 
                                    $fep_id = $rowd['fep_id'];
                                    $fep_nom = $rowd['fep_nom'];
                                    ?>
                                    <option value="<?php echo $fep_id; ?>"><?php echo $fep_nom; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col --> 
</div>    
