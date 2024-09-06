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
    <title>Entrenadores - Lobos System - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
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
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col col-lg-8">
                                            <h4 class="card-title">Entrenadores</h4>
                                        </div>
                                        <div class="col col-lg-2 mb-3" style="text-align:right">
                                            <a href="trainers-add.php" class="btn btn-primary"><i class="feather-plus-circle"></i> Nuevo</a>
                                        </div>
                                        <div class="col col-lg-2 mb-3">
                                            <!-- Button trigger modal -->
                                                <a href="trainers-config-pay.php" class="btn btn-secondary">
                                                    <i class="feather-settings"></i> Configuración
                                                </a>
                                        </div>
                                    </div>
                                    <table id="datatable" class="table ">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Ap. Paterno</th>
                                                <th>Ap. Materno</th>
                                                <th>Clasificación</th>
                                                <th>Detalle</th>
                                                <th>Editar</th>
                                                <th>Estatus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_trainers = "SELECT ent_id,eclas_clasificacion,ent_nom,ent_appat,ent_apmat,ent_tel,ent_mail FROM entrenadores LEFT JOIN entrenador_clasificacion USING (eclas_id) WHERE activo = '1'";
                                            $resultTrainer = mysqli_query($conexion, $sql_trainers);
                                            while ($row = mysqli_fetch_array($resultTrainer)) {
                                                $ent_id = $row['ent_id'];
                                                $eclas_clasificacion = $row['eclas_clasificacion'];
                                                $ent_nom = $row['ent_nom'];
                                                $ent_appat = $row['ent_appat'];
                                                $ent_apmat = $row['ent_apmat'];
                                                $ent_tel = $row['ent_tel'];
                                                $ent_mail = $row['ent_mail'];

                                            ?>
                                                <tr>
                                                    <td><?php echo $ent_nom; ?></td>
                                                    <td><?php echo $ent_appat; ?></td>
                                                    <td><?php echo $ent_apmat; ?></td>
                                                    <td><?php echo $eclas_clasificacion; ?></td>
                                                    <td>
                                                    <a href="trainers-pagos.php?ent_id=<?php echo $ent_id; ?>&anio_id=3" class="btn btn-secondary"><i class="feather-zoom-in"></i></a>
                                                    </td>
                                                    
                                                    <?php include 'historial-modal-trainer.php'; ?>
                                                    <td>
                                                        <a href="trainers-detail.php?ent_id=<?php echo $ent_id; ?>" class="btn btn-warning"><i class="feather-edit-3"></i></a>
                                                    </td>
                                            
                                                    <td>
                                                    <a class="btn btn-danger" href="javascript:void(0);" onClick="loadDynamicContentModalBaja('<?php echo $ent_id; ?>')"><i class="feather-info"></i></a>
    
                                                    </td>
                                                    <?php include 'payment-form-trainer-baja.php'; ?>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

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

    <script>
			function loadDynamicContentModal(id){
				
				var options = {
						modal: true,
						height:300,
						width:600
					};
				$('#conte-modal').load('ObtenerDatosPaymentTrainer.php?id='+id, function() {
					$('#bootstrap-modal').modal('show');
				});    
			}

            
            function loadDynamicContentModalBaja(id){
				
				var options = {
						modal: true,
						height:300,
						width:600
					};
				$('#conte-modal-baja').load('ObtenerDatosPaymentTrainerBaja.php?id='+id, function() {
					$('#bootstrap-modal-baja').modal('show');
				});    
			}


            function loadDynamicContentHistorial(id){
				
				var options = {
						modal: true,
						height:300,
						width:600
					};
				$('#conte-modal-3').load('ObtenerDatosHistorialTrainer.php?id='+id, function() {
					$('#bootstrap-modal-3').modal('show');
				});    
                
                
			}
		</script> 

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