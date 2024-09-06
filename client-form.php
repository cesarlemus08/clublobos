
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Crear nuevo cliente</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="AutomecanicA" name="description" />
    <meta content="Ukubus Media" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="plugins/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />
    
    <!-- autocomplete -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">


</head>

<body>
<div class="main-content">    
    <div class="container-fluid">                            
        <form action="operations-client.php" name="form-new-client" method="post" class="needs-validation" novalidate >

            <!--<h6 class="mt-4">Seleccione tipo de cliente</h6> -->

          <!--  <div class="mt-3">
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="particular" value="Particular" name="category" class="custom-control-input" required>
                    <label class="custom-control-label" for="particular">Particular</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input type="radio" id="empresa" value="Empresa" name="category" class="custom-control-input" required>
                    <label class="custom-control-label" for="empresa">Empresa</label>
                </div>
            </div> -->

                    <br>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <ul class="nav nav-tabs mb-3">
                                <li class="nav-item">
                                    <a href="#datos-p-jugador" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                        <i class="mdi mdi-basketball d-lg-none d-block"></i>
                                        <span class="d-non d-lg-block">Jugador</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#datos-c-jugador" data-toggle="tab" aria-expanded="true" class="nav-link">
                                        <i class="mdi mdi-phone d-lg-none d-block"></i>
                                        <span class="d-non d-lg-block">Contacto jugador</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#datos-tutor" data-toggle="tab" aria-expanded="true" class="nav-link">
                                        <i class="mdi mdi-account-supervisor d-lg-none d-block"></i>
                                        <span class="d-non d-lg-block">Tutor</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#datos-equipo" data-toggle="tab" aria-expanded="true" class="nav-link">
                                        <i class="mdi mdi-trophy d-lg-none d-block"></i>
                                        <span class="d-non d-lg-block">Equipo</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#datos-pago" data-toggle="tab" aria-expanded="true" class="nav-link">
                                        <i class="mdi mdi-cash-multiple d-lg-none d-block"></i>
                                        <span class="d-non d-lg-block">Pago</span>
                                    </a>
                                </li>
                            </ul>
                            
                            <!--Datos personales de jugador -->

                            <div class="tab-content">
                                <div class="tab-pane show active" id="datos-p-jugador">
                                <div class="form-group">
                                 <label for="nombre">Nombre</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese Nombre" required>
                             </div>
                             <div class="form-group">
                                 <label for="nombre">Apellido Paterno</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese Nombre" required>
                             </div>

                             <div class="form-group">
                                 <label for="nombre">Apellido Materno</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese Nombre" required>
                             </div>
    

    <div class="form-group">
        <label for="curp">CURP</label>
        <input type="text" id="curp" name="curp" class="form-control" placeholder="Ingrese CURP (18 caracteres)" pattern="[A-Z]{4}[0-9]{6}[H,M][A-Z]{5}[A-Z0-9]{2}" title="Ingrese una CURP válida" required>
    </div>

    <div class="form-group">
        <label for="estatura">Estatura (Cm)</label>
        <input type="number" id="estatura" name="estatura" class="form-control" placeholder="Ingrese Estatura" required>
    </div>

    <div class="form-group">
        <label for="peso">Peso (Kg)</label>
        <input type="number" id="peso" name="peso" class="form-control" placeholder="Ingrese Peso" required>
    </div>

    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de nacimiento</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" required>
    </div>
    <div class="form-group">
                                 <label for="nombre">Lugar de nacimiento</label>
                                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese lugar de nacimiento" required>
                             </div>

    <div class="form-group">
        <label for="genero">Género</label>
        <select id="genero" name="genero" class="form-control" required>
            <option value="">Selecciona Género</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select>
    </div>

    <div class="form-group">
        <label for="grado_escolar">Grado escolar</label>
        <select id="grado_escolar" name="grado_escolar" class="form-control" required>
            <option value="">Selecciona Grado Escolar</option>
            <option value="kinder">Kinder</option>
            <option value="primaria">Primaria</option>
            <option value="secundaria">Secundaria</option>
            <option value="preparatoria">Preparatoria</option>
            <option value="licenciatura">Licenciatura</option>
        </select>
    </div>

    <div class="form-group">
        <label for="nss">NSS</label>
        <input type="text" id="nss" name="nss" class="form-control" placeholder="Ingrese NSS" pattern="[0-9]{11}" title="NSS debe tener 11 dígitos" required>
    </div>
                                        
                                </div>
                                <!--Datos de contacto de jugador -->
                                <div class="tab-pane" id="datos-c-jugador">

                                <div class="form-group">
                                    <label for="phone">Teléfono</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Ingrese teléfono" required>
                                        </div>
                                   
                                        <div class="form-group">
                                    <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Ingrese email" required>
                                        </div>
                                        <div class="form-group">
                                    <label for="name">Colonia</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese Nombre " required>
                                        </div>
                                        <div class="form-group">
                                    <label for="name">CP</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese Nombre " required>
                                        </div>
                                        <div class="form-group">
                                    <label for="name">Calle</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese Nombre " required>
                                        </div>
                                        <div class="form-group">
                                    <label for="name">No. exterior</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese Nombre " required>
                                        </div>
                                        <div class="form-group">
                                    <label for="name">No. interior</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese Nombre " required>
                                        </div>
                                        <div class="form-group">
    <label for="estado">Estado</label>
    <select id="estado" name="estado" class="form-control" required>
        <option value="">Selecciona Estado</option>
        <option value="Aguascalientes">Aguascalientes</option>
        <option value="Baja California">Baja California</option>
        <option value="Baja California Sur">Baja California Sur</option>
        <option value="Campeche">Campeche</option>
        <option value="Chiapas">Chiapas</option>
        <option value="Chihuahua">Chihuahua</option>
        <option value="Coahuila">Coahuila</option>
        <option value="Colima">Colima</option>
        <option value="Ciudad de México" selected>Ciudad de México</option>
        <option value="Durango">Durango</option>
        <option value="Guanajuato">Guanajuato</option>
        <option value="Guerrero">Guerrero</option>
        <option value="Hidalgo">Hidalgo</option>
        <option value="Jalisco">Jalisco</option>
        <option value="México">México</option>
        <option value="Michoacán">Michoacán</option>
        <option value="Morelos">Morelos</option>
        <option value="Nayarit">Nayarit</option>
        <option value="Nuevo León">Nuevo León</option>
        <option value="Oaxaca">Oaxaca</option>
        <option value="Puebla">Puebla</option>
        <option value="Querétaro">Querétaro</option>
        <option value="Quintana Roo">Quintana Roo</option>
        <option value="San Luis Potosí">San Luis Potosí</option>
        <option value="Sinaloa">Sinaloa</option>
        <option value="Sonora">Sonora</option>
        <option value="Tabasco">Tabasco</option>
        <option value="Tamaulipas">Tamaulipas</option>
        <option value="Tlaxcala">Tlaxcala</option>
        <option value="Veracruz">Veracruz</option>
        <option value="Yucatán">Yucatán</option>
        <option value="Zacatecas">Zacatecas</option>
    </select>
</div>
<div class="form-group">
    <label for="municipio">Municipio/Alcaldía</label>
    <select id="municipio" name="municipio" class="form-control" required>
        <option value="">Selecciona Municipio/Alcaldía</option>
        <option value="Álvaro Obregón">Álvaro Obregón</option>
        <option value="Azcapotzalco">Azcapotzalco</option>
        <option value="Benito Juárez">Benito Juárez</option>
        <option value="Coyoacán">Coyoacán</option>
        <option value="Cuajimalpa de Morelos">Cuajimalpa de Morelos</option>
        <option value="Cuauhtémoc">Cuauhtémoc</option>
        <option value="Gustavo A. Madero">Gustavo A. Madero</option>
        <option value="Iztacalco">Iztacalco</option>
        <option value="Iztapalapa">Iztapalapa</option>
        <option value="Magdalena Contreras">Magdalena Contreras</option>
        <option value="Miguel Hidalgo">Miguel Hidalgo</option>
        <option value="Milpa Alta">Milpa Alta</option>
        <option value="Tláhuac">Tláhuac</option>
        <option value="Tlalpan">Tlalpan</option>
        <option value="Venustiano Carranza">Venustiano Carranza</option>
        <option value="Xochimilco">Xochimilco</option>
    </select>
</div>


                                    </div>
                                

                                    <!-- Datos del tutor-->
                                <div class="tab-pane" id="datos-tutor">
                                    <div class="form-group">
                                    <label for="name">Nombre</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese nombre completo" required>
                                        </div>
                                        <div class="form-group">
                                    <label for="name">Apellido Paterno</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese nombre completo" required>
                                        </div>
                                        <div class="form-group">
                                    <label for="phone">Apellido Materno</label>
                                        <input type="text" id="phone" name="phone" class="form-control" placeholder="Ingrese teléfono" required>
                                        </div>
                                        <div class="form-group">
    <label for="phone">Teléfono</label>
    <input type="tel" id="phone" name="phone" class="form-control" placeholder="Ingrese teléfono" pattern="[0-9]{10}" title="Ingrese un número de teléfono válido (10 dígitos)" required>
</div>


                                        <div class="form-group">
                                    <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Ingrese email" required>
                                        </div>
                                        <div class="form-group">
                                    <label for="name">Colonia</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese Colonia" required>
                                        </div>
                                        <div class="form-group">
                                    <label for="name">CP</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese CP" required>
                                        </div>
                                        <div class="form-group">
                                    <label for="name">Calle</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese calle" required>
                                        </div>

                                        <div class="form-group">
                                    <label for="name">No. exterior</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese no. Exterior " required>
                                        </div>
                                        <div class="form-group">
                                    <label for="name">No. interior</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Ingrese no. Interior" required>
                                        </div>

                                        <div class="form-group">
    <label for="estado">Estado</label>
    <select id="estado" name="estado" class="form-control" required>
        <option value="">Selecciona Estado</option>
        <option value="Aguascalientes">Aguascalientes</option>
        <option value="Baja California">Baja California</option>
        <option value="Baja California Sur">Baja California Sur</option>
        <option value="Campeche">Campeche</option>
        <option value="Chiapas">Chiapas</option>
        <option value="Chihuahua">Chihuahua</option>
        <option value="Coahuila">Coahuila</option>
        <option value="Colima">Colima</option>
        <option value="Ciudad de México" selected>Ciudad de México</option>
        <option value="Durango">Durango</option>
        <option value="Guanajuato">Guanajuato</option>
        <option value="Guerrero">Guerrero</option>
        <option value="Hidalgo">Hidalgo</option>
        <option value="Jalisco">Jalisco</option>
        <option value="México">México</option>
        <option value="Michoacán">Michoacán</option>
        <option value="Morelos">Morelos</option>
        <option value="Nayarit">Nayarit</option>
        <option value="Nuevo León">Nuevo León</option>
        <option value="Oaxaca">Oaxaca</option>
        <option value="Puebla">Puebla</option>
        <option value="Querétaro">Querétaro</option>
        <option value="Quintana Roo">Quintana Roo</option>
        <option value="San Luis Potosí">San Luis Potosí</option>
        <option value="Sinaloa">Sinaloa</option>
        <option value="Sonora">Sonora</option>
        <option value="Tabasco">Tabasco</option>
        <option value="Tamaulipas">Tamaulipas</option>
        <option value="Tlaxcala">Tlaxcala</option>
        <option value="Veracruz">Veracruz</option>
        <option value="Yucatán">Yucatán</option>
        <option value="Zacatecas">Zacatecas</option>
    </select>
</div>
<div class="form-group">
    <label for="municipio">Municipio/Alcaldía</label>
    <select id="municipio" name="municipio" class="form-control" required>
        <option value="">Selecciona Municipio/Alcaldía</option>
        <option value="Álvaro Obregón">Álvaro Obregón</option>
        <option value="Azcapotzalco">Azcapotzalco</option>
        <option value="Benito Juárez">Benito Juárez</option>
        <option value="Coyoacán">Coyoacán</option>
        <option value="Cuajimalpa de Morelos">Cuajimalpa de Morelos</option>
        <option value="Cuauhtémoc">Cuauhtémoc</option>
        <option value="Gustavo A. Madero">Gustavo A. Madero</option>
        <option value="Iztacalco">Iztacalco</option>
        <option value="Iztapalapa">Iztapalapa</option>
        <option value="Magdalena Contreras">Magdalena Contreras</option>
        <option value="Miguel Hidalgo">Miguel Hidalgo</option>
        <option value="Milpa Alta">Milpa Alta</option>
        <option value="Tláhuac">Tláhuac</option>
        <option value="Tlalpan">Tlalpan</option>
        <option value="Venustiano Carranza">Venustiano Carranza</option>
        <option value="Xochimilco">Xochimilco</option>
    </select>
</div>
                                </div>

                                <!-- Datos de equipo-->
                                <div class="tab-pane" id="datos-equipo">
                                <div class="form-group">
    <label for="categoria">Categoría</label>
    <select id="categoria" name="categoria" class="form-control" required>
        <option value="">Selecciona Categoría</option>
        <!-- Opciones de categoría -->
        <option value="infantil">Infantil</option>
        <option value="juvenil">Juvenil</option>
        <option value="adulto">Adulto</option>
    </select>
</div>

<div class="form-group">
    <label for="sede">Sede</label>
    <select id="sede" name="sede" class="form-control" required>
        <option value="">Selecciona Sede</option>
        <!-- Opciones de sedes -->
        <option value="sede1">Sede 1</option>
        <option value="sede2">Sede 2</option>
        <option value="sede3">Sede 3</option>
    </select>
</div>

<div class="form-group">
    <label for="horario">Horario</label>
    <select id="horario" name="horario" class="form-control" required>
        <option value="">Selecciona Horario</option>
        <!-- Opciones de horarios -->
        <option value="manana">Mañana</option>
        <option value="tarde">Tarde</option>
        <option value="noche">Noche</option>
    </select>
</div>

<div class="form-group">
    <label for="estatus">Estatus de jugador</label>
    <select id="estatus" name="estatus" class="form-control" required>
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
        <option value="suspendido">Suspendido</option>
    </select>
</div>

<div class="form-group">
    <label for="jersey">No. de Jersey</label>
    <input type="text" id="jersey" name="jersey" class="form-control" placeholder="Ingrese número de jersey" required>
</div>
</div>
                                        <!-- Datos de pago-->
                                <div class="tab-pane" id="datos-pago">
                                <div class="form-group">
    <label for="tiempoPago">Tiempo (temporalidad de pago)</label>
    <select id="tiempoPago" name="tiempoPago" class="form-control" required>
        <option value="">Selecciona temporalidad de pago</option>
        <!-- Opciones de tiempo de pago -->
        <option value="mensual">Mensual</option>
        <option value="trimestral">Trimestral</option>
        <option value="semestral">Semestral</option>
    </select>
</div>

<div class="form-group">
    <label for="diaPago">Día de pago</label>
    <select id="diaPago" name="diaPago" class="form-control" required>
        <option value="">Selecciona día de pago</option>
        <!-- Opciones de día de pago -->
        <option value="1">1</option>
        <option value="15">15</option>
        <option value="30">30</option>
    </select>
</div>

<div class="form-group">
    <label for="montoPago">Monto de pago</label>
    <select id="montoPago" name="montoPago" class="form-control" required>
        <option value="">Selecciona monto de pago</option>
        <!-- Opciones de montos de pago -->
        <option value="100">100</option>
        <option value="200">200</option>
        <option value="500">500</option>
    </select>
</div>
    
                            </div>

                            <div class="form-group mb-0 justify-content-end row">
                                <div class="col-12">
                                    <input type="hidden" name="addclient" value="add100">
                                    <button type="submit" class="btn btn-info">Guardar</button>
                                </div>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col --> 
            </div>    
        </form>
    </div> 
</div>
    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script> <!-- add to autocomplete-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/simplebar.min.js"></script>

    <!-- third party js -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap4.js"></script>
    <script src="plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="plugins/datatables/buttons.html5.min.js"></script>
    <script src="plugins/datatables/buttons.flash.min.js"></script>
    <script src="plugins/datatables/buttons.print.min.js"></script>
    <script src="plugins/datatables/dataTables.keyTable.min.js"></script>
    <script src="plugins/datatables/dataTables.select.min.js"></script>
    <script src="plugins/datatables/pdfmake.min.js"></script>
    <script src="plugins/datatables/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables init -->
    <script src="assets/pages/datatables-demo.js"></script>

    <!-- Validation custom js-->
    <script src="assets/pages/validation-demo.js"></script>


    <!-- App js -->
    <script src="assets/js/theme.js"></script>
</body>
</html>
           

