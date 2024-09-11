<?php 
session_start();
include("assets/includes/mysql.php");

if(($_SESSION['us3r'])!= "" && $_SESSION['p4ss']!= "" && $_SESSION['n3ws3ssion'] !="") {


$sql_admin = "SELECT admin_session FROM admin WHERE admin_email = '".$_SESSION['us3r']."' AND admin_pass = '".$_SESSION['p4ss']."'";
$resultSede = mysqli_query($conexion, $sql_admin);
$row_cnt = mysqli_num_rows($resultSede);

if ($row_cnt > 0){
        while ($persona = mysqli_fetch_array($resultSede)) {
                    $admin_session = $persona['admin_session'];
                    if($admin_session == $_SESSION['n3ws3ssion']){
                
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Jugadores - Lobos System - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

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

</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- menu izquiero -->
        <?php include 'menu-left.php'; ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <!--header -->
            <?php include 'header.php'; ?>
            <!--end header -->
            <div class="page-content">
                <div class="container-fluid">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col col-lg-10">
                                        <?php
                                        $sql_jugador = "SELECT jug_nom,jug_appat,jug_apmat FROM jugador WHERE jug_id = '" . $_GET['jug_id'] . "' ";
                                        $resultJug = mysqli_query($conexion, $sql_jugador);
                                        while ($row = mysqli_fetch_array($resultJug)) {
                                            $jug_nom = $row['jug_nom'];
                                            $jug_appat = $row['jug_appat'];
                                            $jug_apmat = $row['jug_apmat'];
                                        }
                                        ?>
                                        <h4 class="card-title">Detalles del jugador:
                                            <?php echo $jug_nom . " " . $jug_appat . " " . $jug_apmat; ?></h4>
                                    </div>

                                    <!-- start tabs -->
                                    <ul class="nav nav-tabs mb-3">
                                        <li class="nav-item">
                                            <a href="#personales" data-toggle="tab" aria-expanded="false" class="nav-link active">
                                                <i class="mdi mdi-home-variant d-lg-none d-block"></i>
                                                <span class="d-none d-lg-block">Datos personales</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#contacto" data-toggle="tab" aria-expanded="true" class="nav-link">
                                                <i class="mdi mdi-account-circle d-lg-none d-block"></i>
                                                <span class="d-none d-lg-block">Datos de contacto</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#tutor" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                <i class="mdi mdi-settings-outline d-lg-none d-block"></i>
                                                <span class="d-none d-lg-block">Datos del tutor</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#equipo" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                <i class="mdi mdi-settings-outline d-lg-none d-block"></i>
                                                <span class="d-none d-lg-block">Datos del equipo</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#pago" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                <i class="mdi mdi-settings-outline d-lg-none d-block"></i>
                                                <span class="d-none d-lg-block">Datos de pago</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content container-fluid">
                                        <!----Start Datos Personales---->
                                        <div class="tab-pane show active" id="personales" class="editjug">
                                            <div class="row">

                                                <div class="card col-lg-12">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Datos Personales</h4>
                                                        <!-- <p class="card-subtitle mb-4">Here’s a quick example to
                                                            demonstrate Bootstrap’s form styles. Keep reading for
                                                            documentation on required classes, form layout, and more.
                                                        </p> -->
                                                        <?php
                                                        $sql_jugador = "SELECT jug_nom,jug_appat,jug_apmat,jug_curp,jug_fecha_nac,edo_id,jug_genero,jug_nss,jug_fecha_in,jug_fecha_up FROM jugador WHERE jug_id = '" . $_GET['jug_id'] . "' ";
                                                       
                                                        $resultJug = mysqli_query($conexion, $sql_jugador);
                                                        while ($row = mysqli_fetch_array($resultJug)) {
                                                           
                                                            $jug_nom = $row['jug_nom'];
                                                            $jug_appat = $row['jug_appat'];
                                                            $jug_apmat = $row['jug_apmat'];
                                                            $jug_curp = $row['jug_curp'];
                                                            $jug_fecha_nac = $row['jug_fecha_nac'];
                                                            
                                                            $edo_id = $row['edo_id'];
                                                            $jug_genero = $row['jug_genero'];
                                                            $jug_nss = $row['jug_nss'];
                                                            $jug_fecha_in = $row['jug_fecha_in'];
                                                            $jug_fecha_up = $row['jug_fecha_up'];

                                                        }
                                                        ?>
                              
                                    

                        <form action="acciones-jugadores.php" method="post">
                            <div class="form-group">
                                
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="jug_id" value="<?php echo $_GET['jug_id']; ?>" id="ejug_id" class="form-control">

                                <label for="simpleinput">Nombre(s)</label>
                                <input type="text" name="jug_nom" id="ejug_nom" value="<?php echo $jug_nom; ?>" class="form-control" placeholder="Nombre(s)">
                            </input>
                            </input>
                            </div>
                            <div class="form-group">
                                <label for="simpleinput">Apellido paterno</label>
                                <input type="text" name="jug_appat" id="ejug_appat" value="<?php echo $jug_appat; ?>" class="form-control" placeholder="Apellido paterno">
                            </div>
                            <div class="form-group">
                                <label for="simpleinput">Apellido Materno</label>
                                <input type="text" name="jug_apmat" id="ejug_apmat" value="<?php echo $jug_apmat; ?>" class="form-control" placeholder="Apellido Materno">
                            </div>
                            <div class="form-group">
                                <label for="simpleinput">CURP</label>
                                <input type="text" name="jug_curp" id="ejug_curp" value="<?php echo $jug_curp; ?>" class="form-control" placeholder="CURP">
                            </div>

                            <div class="form-group">
                                <label for="fecha_nacimiento">Fecha de
                                    nacimiento</label>
                                <input type="date" id="jug_fecha_nac" name="jug_fecha_nac"value="<?php echo $jug_fecha_nac; ?>" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="estado">Ciudad o Estado de 
                                    Nacimiento</label> 
                                <select id="edo_id" name="edo_id"  class="form-control">
                                    <option value="">Selecciona Estado</option>
                                    <?php
                                    $sqlestado = "SELECT edo_nom, edo_id FROM estados ";
                                    $resultEstado = mysqli_query($conexion, $sqlestado);
                                    while ($rowE =  mysqli_fetch_array($resultEstado)) {
                                        $edo_nom = $rowE['edo_nom'];
                                        $edo_id2 = $rowE['edo_id'];
                                        
                                    ?>
                                       <option <?php if($edo_id == $edo_id2) { ?>selected<?php } ?> value="<?php echo $edo_id2;?>"><?php echo $edo_nom;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jug_genero">Genero <?php echo $jug_genero; ?> </label> 
                                <select id="jug_genero" name="jug_genero"  class="form-control">
                                    <option value="">Selecciona Genero</option>
                                    <option  <?php if($jug_genero === "2") { ?>selected<?php } ?>value="2" >Mujer <?php echo $jug_genero; ?> </option>
                                    <option <?php if($jug_genero === "1") { ?>selected<?php } ?>  value="1" > Hombre</option>
                                </select>
                            </div>
                            <!-- <div class="form-group">
                                <label for="simpleinput">Nombre(s)</label>
                                <input type="text" id="simpleinput" class="form-control" placeholder="Enter your text">
                            </div> -->
                            <div class="form-group">
                                <label for="jug_nss">NSS</label>
                                <input type="text" name="jug_nss" id="jug_nss" value="<?php echo $jug_nss; ?>" class="form-control" placeholder="NSS">
                            </div>
                            <div class="form-group">
                                <label for="jug_fecha_in">Fecha Inscripción</label>
                                <input type="date" id="jug_fecha_in" value="<?php echo $jug_fecha_in; ?>" name="jug_fecha_in" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="jug_fecha_up">Fecha
                                    Actualización</label>
                                <input type="date" id="jug_fecha_up" value="<?php echo $jug_fecha_up; ?>" name="jug_fecha_up" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary">
                            </div>
                        </form>
                      
                    </div>
                </div>

            </div>
        </div>
                                        <!----End Datos Personales---->
                                        <!----Start Datos de Contacto---->
                                        <div class="tab-pane" id="contacto">
                                            <div class="row">

                                                <div class="card col-lg-12">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Datos de Contacto</h4>
                                                        <!-- <p class="card-subtitle mb-4">Here’s a quick example to
                                                            demonstrate Bootstrap’s form styles. Keep reading for
                                                            documentation on required classes, form layout, and more.
                                                        </p> -->

                                                        <?php
                                                        $sql_jugador_contacto = "SELECT jhc_tel, jhc_email, jhc_col, jhc_cp, jhc_calle, jhc_no_ext, jhc_no_int, edo_id, mun_id FROM jugador_has_datoscontacto WHERE jug_id = '" . $_GET['jug_id'] . "' ";
                                                        
                                                        $resultJugCont = mysqli_query($conexion, $sql_jugador_contacto);
                                                        while ($row = mysqli_fetch_array($resultJugCont)) {
                                                           
                                                            $jhc_tel = $row['jhc_tel'];
                                                            $jhc_email = $row['jhc_email'];
                                                            $jhc_col = $row['jhc_col'];
                                                            $jhc_cp = $row['jhc_cp'];
                                                            $jhc_calle = $row['jhc_calle'];
                                                            $jhc_no_ext = $row['jhc_no_ext'];
                                                            $jhc_no_int = $row['jhc_no_int'];
                                                            $edo_id = $row['edo_id'];
                                                            $mun_id = $row['mun_id'];
                                                            

                                                        }
                                                        ?>
                                                        <form action="acciones-jugadores.php" method="post"> 
                                                            <div class="form-group">

                                                            <input type="hidden" name="action" value="edit3">
                                                            <input type="hidden" name="jug_id" value="<?php echo $_GET['jug_id']; ?>" id="econtacto_id" class="form-control">

                                                                <label for="jhc_tel">Teléfono</label>
                                                                <input type="text" name="jhc_tel" value="<?php echo $jhc_tel; ?>" id="jhc_tel" class="form-control" placeholder="Teléfono">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jhc_email">Email</label>
                                                                <input type="text" name="jhc_email" value="<?php echo $jhc_email; ?>" id="jhc_email" class="form-control" placeholder="Email">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jhc_col">Colonia</label>
                                                                <input type="text" name="jhc_col"  value="<?php echo $jhc_col; ?>" id="jhc_col" class="form-control" placeholder="Colonia">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jhc_calle">Calle</label>
                                                                <input type="text" name="jhc_calle"   value="<?php echo $jhc_calle; ?>"id="jhc_calle" class="form-control" placeholder="Calle">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jhc_no_int">No. Interior</label>
                                                                <input type="text" name="jhc_no_int" value="<?php echo $jhc_no_int; ?>" id="jhc_no_int" class="form-control" placeholder="No. Interior">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jhc_no_ext">No. Exterior</label>
                                                                <input type="text" name="jhc_no_ext" value="<?php echo $jhc_no_ext; ?>" id="jhc_no_ext" class="form-control" placeholder="No. Exterior">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jhc_cp">C.P.</label>
                                                                <input type="text" name="jhc_cp" id="jhc_cp"  value="<?php echo $jhc_cp; ?>" class="form-control" placeholder="C.P">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="estados">Estados</label>
                                                                <select id="edo_id" name="edo_id"  class="form-control">
                                                                    <option value="">Selecciona Estado</option>
                                                                    <?php
                                                                    $sqlestado = "SELECT edo_nom, edo_id FROM estados ";
                                                                    $resultEstado = mysqli_query($conexion, $sqlestado);
                                                                    while ($rowE =  mysqli_fetch_array($resultEstado)) {
                                                                        $edo_nom = $rowE['edo_nom'];
                                                                        $edo_id2 = $rowE['edo_id'];
                                                                        
                                                                    ?>
                                                                    <option <?php if($edo_id == $edo_id2) { ?>selected<?php } ?> value="<?php echo $edo_id2;?>"><?php echo $edo_nom;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="municipio">Municipio</label>
                                                                <select id="mun_id" name="mun_id" class="form-control">
                                                                    <option value="">Selecciona Municipio</option>
                                                                    <?php
                                                                    $sqlmunicipio = "SELECT mun_id, mun_nom FROM municipio";
                                                                    $resultMunicipio = mysqli_query($conexion, $sqlmunicipio);
                                                                    while ($rowM =  mysqli_fetch_array($resultMunicipio)) {
                                                                        $mun_id2 = $rowM['mun_id'];
                                                                        $mun_nom = $rowM['mun_nom'];
                                                                    ?>
                                                                        <option <?php if($mun_id == $mun_id2) { ?>selected<?php } ?> value="<?php echo $mun_id2;?>"><?php echo $mun_nom;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-primary">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>


                                            <!-- <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In
                                                enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
                                                dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus.
                                                Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean
                                                leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                            <p class="mb-0">Food truck quinoa dolor sit amet, consectetuer adipiscing
                                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque
                                                penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
                                                quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
                                                consequat massa quis enim.</p> -->

                                        </div>
                                        <!----End Datos de Contacto---->
                                        <!----Start Tutor---->
                                        <div class="tab-pane" id="tutor">
                                            <!-- <p>Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean
                                                commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et
                                                magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis,
                                                ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                                                quis enim.</p>
                                            <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate
                                                eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae,
                                                justo. Nullam dictum felis eu pede mollis pretium. Integer
                                                tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate
                                                eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae,
                                                eleifend ac, enim.</p> -->

                                            <div class="row">

                                                <div class="card col-lg-12">
                                                    <div class="card-body">
                                                        <h4 class="card-title">Datos del Tutor</h4>
                                                        <!-- <p class="card-subtitle mb-4">Here’s a quick example to
                                                            demonstrate Bootstrap’s form styles. Keep reading for
                                                            documentation on required classes, form layout, and more.
                                                        </p> -->

                                                        <?php
                                                        $sql_jugador_tutor = "SELECT jht_nom, jht_tel, jht_email, jht_col, jht_cp, jht_calle, jht_no_ext, jht_no_int, edo_id, mun_id FROM jugador_has_tutor WHERE jug_id = '" . $_GET['jug_id'] . "' ";
                                                        
                                                        $resultJugTutor = mysqli_query($conexion, $sql_jugador_tutor);
                                                        while ($row = mysqli_fetch_array($resultJugTutor)) {
                                                           
                                                            $jht_nom = $row['jht_nom'];
                                                            $jht_tel = $row['jht_tel'];
                                                            $jht_email = $row['jht_email'];
                                                            $jht_col = $row['jht_col'];
                                                            $jht_cp = $row['jht_cp'];
                                                            $jht_calle = $row['jht_calle'];
                                                            $jht_no_ext = $row['jht_no_ext'];
                                                            $jht_no_int = $row['jht_no_int'];
                                                            $edo_id = $row['edo_id'];
                                                            $mun_id = $row['mun_id'];
                                                            

                                                        }
                                                        
                                                        ?>
                                                        <form action="acciones-jugadores.php" method="post">
                                                            <div class="form-group">

                                                            <input type="hidden" name="action" value="edit2">
                                                            <input type="hidden" name="jug_id" value="<?php echo $_GET['jug_id']; ?>" id="etutor_id" class="form-control">
                                                                <label for="jht_nom">Nombre</label>
                                                                <input type="text" name="jht_nom" value="<?php echo $jht_nom; ?>"  id="jht_nom" class="form-control" placeholder="Nombre">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jht_email">Email</label>
                                                                <input type="text" name="jht_email" value="<?php echo $jht_tel; ?>" id="jhc_email" class="form-control" placeholder="Email">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jht_tel">Teléfono</label>
                                                                <input type="text" name="jht_tel" value="<?php echo $jht_email; ?>" id="jht_tel" class="form-control" placeholder="Colonia">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jht_col">Colonia</label>
                                                                <input type="text" name="jht_col" value="<?php echo $jht_col; ?>"id="jht_col" class="form-control" placeholder="Calle">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jhc_cp">C.P.</label>
                                                                <input type="text" name="jht_cp" value="<?php echo $jht_cp; ?>"id="jht_cp" class="form-control" placeholder="C.P.">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jhc_no_int">No. Interior</label>
                                                                <input type="text" name="jht_no_int"value="<?php echo $jht_no_int; ?>" id="jht_no_int" class="form-control" placeholder="No. Interior">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jhc_no_ext">No. Exterior</label>
                                                                <input type="text" name="jht_no_ext"value="<?php echo $jht_no_ext; ?>" id="jht_no_ext" class="form-control" placeholder="No. Exterior">
                                                            </div>
                                                            <div class=" form-group">
                                                                <label for="estados">Estados</label>
                                                                <select id="edo_id" name="edo_id"  class="form-control">
                                    <option value="">Selecciona Estado</option>
                                    <?php
                                    $sqlestado = "SELECT edo_nom, edo_id FROM estados ";
                                    $resultEstado = mysqli_query($conexion, $sqlestado);
                                    while ($rowE =  mysqli_fetch_array($resultEstado)) {
                                        $edo_nom = $rowE['edo_nom'];
                                        $edo_id2 = $rowE['edo_id'];
                                        
                                    ?>
                                       <option <?php if($edo_id == $edo_id2) { ?>selected<?php } ?> value="<?php echo $edo_id2;?>"><?php echo $edo_nom;?></option>
                                    <?php } ?>
                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="municipio">Municipio</label>
                                                                <select id="mun_id" name="mun_id" class="form-control">
                                                                    <option value="">Selecciona Municipio</option>
                                                                    <?php
                                                                    $sqlmunicipio = "SELECT mun_id, mun_nom FROM municipio";
                                                                    $resultMunicipio = mysqli_query($conexion, $sqlmunicipio);
                                                                    while ($rowM =  mysqli_fetch_array($resultMunicipio)) {
                                                                        $mun_id2 = $rowM['mun_id'];
                                                                        $mun_nom = $rowM['mun_nom'];
                                                                    ?>
                                                                        <option <?php if($mun_id == $mun_id2) { ?>selected<?php } ?> value="<?php echo $mun_id2;?>"><?php echo $mun_nom;?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="submit" class="btn btn-primary">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <!----End Tutor---->
                                        <!----Start Tutor---->
                                        <div class="tab-pane" id="equipo">
                                           

                                        <?php
                                                        $sql_jugador_equipo = "SELECT jug_id, cat_id, sede_id, jhe_num, hora_id, est_id FROM jugador_has_equipo WHERE jug_id = '" . $_GET['jug_id'] . "' ";
                                                        
                                                        $resultJugEquipo = mysqli_query($conexion, $sql_jugador_equipo);
                                                        while ($row = mysqli_fetch_array($resultJugEquipo)) {
                                                           
                                                            $jug_id = $row['jug_id'];
                                                            $cat_id = $row['cat_id'];
                                                            $sede_id = $row['sede_id'];
                                                            $jhe_num = $row['jhe_num'];
                                                            $est_id = $row['est_id'];
                                                            $hora_id = $row['hora_id'];
                                                            
                                                        }
                                                        
                                                        ?>
                                            <form action="acciones-jugadores.php" method="post">
                                                <div class="form-group">

                                                <input type="hidden" name="action" value="edit4">
                                                <input type="hidden" name="jug_id" value="<?php echo $_GET['jug_id']; ?>" id="etutor_id" class="form-control">
                                                    <label for="municipio">Categoría</label>
                                                    <select id="cat_id" name="cat_id" class="form-control">
                                                        <option value="">Selecciona Categoría</option>
                                                        <?php
                                                        $sqlcategorias = "SELECT cat_id, cat_nom FROM categorias";
                                                        $resultCategorias = mysqli_query($conexion, $sqlcategorias);
                                                        while ($rowC =  mysqli_fetch_array($resultCategorias)) {
                                                            $cat_id2 = $rowC['cat_id'];
                                                            $cat_nom = $rowC['cat_nom'];
                                                        ?>
                                                            <option <?php if($cat_id == $cat_id2) { ?>selected<?php } ?> value="<?php echo $cat_id2;?>"><?php echo $cat_nom;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="municipio">Sede</label>
                                                    <select id="sede_id" name="sede_id" class="form-control">
                                                        <option value="">Selecciona Sede</option>
                                                        <?php
                                                        $sqlsede = "SELECT sede_id, sede_nom FROM sedes";
                                                        $resultSede = mysqli_query($conexion, $sqlsede);
                                                        while ($rowS =  mysqli_fetch_array($resultSede)) {
                                                            $sede_id2 = $rowS['sede_id'];
                                                            $sede_nom = $rowS['sede_nom'];

                                                        ?>
                                                            <option <?php if($sede_id == $sede_id2) { ?>selected<?php } ?> value="<?php echo $sede_id2;?>"><?php echo $sede_nom;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="municipio">Horario</label>
                                                    <select id="hora_id" name="hora_id" class="form-control">
                                                        <option value="">Selecciona Horario</option>
                                                        <?php
                                                        $sqlhorario = "SELECT hora_id , hora_nom FROM horarios";
                                                        $resultHorario = mysqli_query($conexion, $sqlhorario);
                                                        while ($rowH =  mysqli_fetch_array($resultHorario)) {
                                                            $hora_id2 = $rowH['hora_id'];
                                                            $hora_nom = $rowH['hora_nom'];

                                                        ?>
                                                             <option <?php if($hora_id == $hora_id2) { ?>selected<?php } ?> value="<?php echo $hora_id2;?>"><?php echo $hora_nom;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="municipio">Estatus</label>
                                                    <select id="est_id" name="est_id" class="form-control">
                                                        <option value="">Selecciona Estatus</option>
                                                        <?php
                                                        $sqlestatus = "SELECT est_id , est_desc FROM estatus_jugador";
                                                        $resultEstatus = mysqli_query($conexion, $sqlestatus);
                                                        while ($rowO =  mysqli_fetch_array($resultEstatus)) {
                                                            $est_id2 = $rowO['est_id'];
                                                            $est_desc = $rowO['est_desc'];

                                                        ?>
                                                             <option <?php if($est_id == $est_id2) { ?>selected<?php } ?> value="<?php echo $est_id2;?>"><?php echo $est_desc;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="jhe_num">No Jersey</label>
                                                    <input type="text" name="jhe_num" value="<?php echo $jhe_num; ?>" id="jhe_num" class="form-control" placeholder="No Jersey">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                        <!---End Equipo---->
                                        <!----Start Pago---->
                                        <div class="tab-pane" id="pago">

                                        <?php
                                                        $sql_jugador_pago = "SELECT  tp_id, mon_id, fep_id FROM jugador_has_pago WHERE jug_id = '" . $_GET['jug_id'] . "' ";
                                                        
                                                        $resultJugPago = mysqli_query($conexion, $sql_jugador_pago);
                                                        while ($row = mysqli_fetch_array($resultJugPago)) {
                                                           
                                                            $jug_id = $row['jug_id'];
                                                            $tp_id = $row['tp_id'];
                                                            $fep_id = $row['fep_id'];
                                                            $mon_id = $row['mon_id'];
                                                           
                                                            
                                                        }
                                                        
                                                        ?>
                                            
                                            <form action="acciones-jugadores.php" method="post">
                                                <div class="form-group">

                                                <input type="hidden" name="action" value="edit5">
                                                <input type="hidden" name="jug_id" value="<?php echo $_GET['jug_id']; ?>" id="emonto_id" class="form-control">
                                                    <label for="municipio">Monto</label>
                                                    <select id="mon_id" name="mon_id" class="form-control">
                                                        <option value="">Selecciona Monto</option>
                                                        <?php
                                                        $sqlmonto = "SELECT mon_id , mon_nom FROM monto_pago";
                                                        $resultMonto = mysqli_query($conexion, $sqlmonto);
                                                        while ($rowMo =  mysqli_fetch_array($resultMonto)) {
                                                            $mon_id2 = $rowMo['mon_id'];
                                                            $mon_nom = $rowMo['mon_nom'];

                                                        ?>
                                                            <option <?php if($mon_id == $mon_id2) { ?>selected<?php } ?> value="<?php echo $mon_id2;?>"><?php echo $mon_nom;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="municipio">Temporalidad</label>
                                                    <select id="tp_id" name="tp_id" class="form-control">
                                                        <option value="">Selecciona Temporalidad</option>
                                                        <?php
                                                        $sqltemporalidad = "SELECT tp_id , tp_nom FROM temporalidad_pago";
                                                        $resultTemporalidad = mysqli_query($conexion, $sqltemporalidad);
                                                        while ($rowT =  mysqli_fetch_array($resultTemporalidad)) {
                                                            $tp_id2 = $rowT['tp_id'];
                                                            $tp_nom = $rowT['tp_nom'];

                                                        ?>
                                                           <option <?php if($tp_id == $tp_id2) { ?>selected<?php } ?> value="<?php echo $tp_id2;?>"><?php echo $tp_nom;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="municipio">Fecha de Pago</label>
                                                    <select id="fep_id" name="fep_id" class="form-control">
                                                        <option value="">Selecciona Fecha de Pago</option>
                                                        <?php
                                                        $sqlfechapago = "SELECT fep_id , fep_nom FROM fecha_pago";
                                                        $resultFechaPago = mysqli_query($conexion, $sqlfechapago);
                                                        while ($rowFp =  mysqli_fetch_array($resultFechaPago)) {
                                                            $fep_id2 = $rowFp['fep_id'];
                                                            $fep_nom = $rowFp['fep_nom'];

                                                        ?>
                                                            <option <?php if($fep_id == $fep_id2) { ?>selected<?php } ?> value="<?php echo $fep_id2;?>"><?php echo $fep_nom;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary">
                                                </div>
                                            </form>
                                        </div>
                                        <!----End Pago---->
                                    </div>
                                    <!-- end tabs-->

                                </div>
                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div><!-- end col-->
                </div>
                <!-- end row-->
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'footer.php'; ?>
    </div>
    <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->
    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
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


    <!-- App js -->
    <script src="assets/js/theme.js"></script>
    
</body>

</html>


<?php //TERMINA CONTENIDO
			} else {
			echo '<script language="javascript">
			location.href="index.php";
			</script>'; 
			}
		}
	} else {
	echo '<script language="javascript">
			location.href="index.php";
			</script>'; 
	}
} else {
echo '<script language="javascript">
			location.href="index.php";
			</script>'; 

 } ?>