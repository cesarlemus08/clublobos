<?php include("assets/includes/mysql.php"); ?>
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
                                                $sql_jugador = "SELECT jug_nom,jug_appat,jug_apmat FROM jugador WHERE jug_id = '".$_GET['jug_id']."' ";
                                                $resultJug = mysqli_query($conexion,$sql_jugador);
                                                while($row = mysqli_fetch_array($resultJug)){
                                                    $jug_nom = $row['jug_nom'];
                                                    $jug_appat = $row['jug_appat'];
                                                    $jug_apmat = $row['jug_apmat'];
                                                }
                                            ?>
                                            <h4 class="card-title">Detalles del jugador: <?php echo $jug_nom." ".$jug_appat." ".$jug_apmat;?></h4>
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

                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="personales">
                                            <div class="row">
                                                
                                                    <div class="card">
                                                        <div class="card-body">   
                                                        <h4 class="card-title">Basic Forms</h4>
                                        <p class="card-subtitle mb-4">Here’s a quick example to demonstrate Bootstrap’s form styles. Keep reading for documentation on required classes, form layout, and more.</p>
                                                            <form>
                                                                <div class="form-group">
                                                                    <label for="simpleinput">Nombre(s)</label>
                                                                    <input type="text" id="simpleinput" class="form-control" placeholder="Enter your text">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="simpleinput">Apellido paterno</label>
                                                                    <input type="text" id="simpleinput" class="form-control" placeholder="Enter your text">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="simpleinput">Apellido Materno</label>
                                                                    <input type="text" id="simpleinput" class="form-control" placeholder="Enter your text">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="simpleinput">CURP</label>
                                                                    <input type="text" id="simpleinput" class="form-control" placeholder="Enter your text">
                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                                                                    <input type="date" id="jug_fecha_nac" name="jug_fecha_nac" class="form-control" required>
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
                                                                <label for="jug_genero">Genero</label>
                                                                    <select id="jug_genero" name="jug_genero" class="form-control">
                                                                        <option value="">Selecciona Genero</option>
                                                                            <option value="1">Hombre</option>
                                                                            <option value="2">Mujer</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="simpleinput">Nombre(s)</label>
                                                                    <input type="text" id="simpleinput" class="form-control" placeholder="Enter your text">
                                                                </div> 
                                                            </form>
                                                        </div>
                                                    </div>
                                                
                                            </div>
                                        </div>                
                                        <div class="tab-pane" id="contacto">
                                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                            <p class="mb-0">Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                        </div>
                                        <div class="tab-pane" id="tutor">
                                            <p>Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                            <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        </div>
                                        <div class="tab-pane" id="equipo">
                                            <p>Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                            <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        </div>
                                        <div class="tab-pane" id="pago">
                                            <p>Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                            <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                        </div>
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