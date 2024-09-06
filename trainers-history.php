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
                                        <div class="col col-lg-10">
                                            <h4 class="card-title">Entrenadores</h4>
                                        </div>
                                        <div class="col col-lg-2 mb-3">
                                            <a href="trainers.php" class="btn btn-primary">Regresar</a>
                                        </div>
                                    </div>
                                    <table id="selection-datatable" class="table ">
                                        <thead>
                                            <tr>
                                                <th>Horas</th>
                                                <th>Fecha</th>
                                                <th>Monto</th>
                                                <th>Estatus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_trainers = "SELECT * FROM pagos_entrenador WHERE ent_id = '".$_GET['ent_id']."'";
                                            $resultTrainer = mysqli_query($conexion, $sql_trainers);
                                            while ($row = mysqli_fetch_array($resultTrainer)) {
                                                $pago_id = $row['pago_id'];
                                                $horas = $row['horas'];
                                                $fecha = $row['fecha'];
                                                $monto = $row['monto'];

                                            ?>
                                                <tr>
                                                    <td><?php echo $horas; ?></td>
                                                    <td><?php echo $fecha; ?></td>
                                                    <td><?php echo $monto; ?></td>
                                                   
                                                 
                                                    <td>
                                                    <a class="btn btn-danger" href="javascript:void(0);" onClick="loadDynamicContentModalBaja('<?php echo $pago_id; ?>')"><i class="feather-trash"></i></a>
    
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
			function loadDynamicContentModalBaja(id){
				alert(id);
				var options = {
						modal: true,
						height:300,
						width:600
					};
				$('#conte-modal-baja').load('ObtenerDatosPaymentTrainerHistory.php?id='+id, function() {
					$('#bootstrap-modal-baja').modal('show');
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