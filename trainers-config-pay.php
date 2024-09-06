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

//insertamos una nueva clasificacion de entrenador
if($_POST['addclas'] === "clas100") {
        $sql_duplicate_clasify = "SELECT * FROM entrenador_clasificacion 
        WHERE eclas_clasificacion = '".$_POST['eclas_clasificacion']."' AND eclas_monto_pago = '".$_POST['eclas_monto_pago']."'
        AND eclas_costo_falta = '".$_POST['eclas_costo_falta']."' ";
        $resultClasify = mysqli_query($conexion, $sql_duplicate_clasify);
        $row_cnt_clas = mysqli_num_rows($resultClasify);
            if ($row_cnt_clas === 0){
                $dateinto = date('Y-m-d');
                $sql_insert_clasify = "INSERT INTO entrenador_clasificacion 
                (eclas_clasificacion, eclas_monto_pago, eclas_costo_falta,eclas_dateinto) VALUES 
                ( '".$_POST['eclas_clasificacion']."', '".$_POST['eclas_monto_pago']."', '".$_POST['eclas_costo_falta']."'
                , '".$dateinto."')";
                $resultIntoClasify = mysqli_query($conexion, $sql_insert_clasify);
            }
}

//terminamos insert de clasificación
                 
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
                                            <h4 class="card-title">Configuración pagos a entrenadores</h4>
                                        </div>
                                        <div class="col col-lg-2 mb-3" style="text-align:right;">
                                            <a href="trainers.php" class="btn btn-secondary">Regresar</a>
                                        </div>
                                        <div class="col col-lg-2 mb-3">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalClasificacion">
                                            <i class="feather-plus-circle"></i> Nuevo
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modalClasificacion" tabindex="-1" aria-labelledby="ModalLabelClasificacion" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form class="form-horizontal" name="form-config-pago" method="post" action="">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title card-title" id="ModalLabelClasificacion">Agregar clasificación</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                <div class="card">
                                                                    <div class="card-body">
                                                                        
                                                                        
                                                                            <div class="form-group row mb-4">
                                                                                <label for="inputclasify" class="col-4 col-form-label">Clasificación</label>
                                                                                <div class="col-8">
                                                                                    <input type="text" class="form-control" name="eclas_clasificacion" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row mb-4">
                                                                                <label for="inputpago" class="col-4 col-form-label">Monto de Pago</label>
                                                                                <div class="col-8">
                                                                                    <input type="text" class="form-control" name="eclas_monto_pago" >
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row mb-4">
                                                                                <label for="inputfalta" class="col-4 col-form-label">Descuento x falta</label>
                                                                                <div class="col-8">
                                                                                    <input type="text" class="form-control" name="eclas_costo_falta" >
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            
                                                                    </div> <!-- end card-body-->
                                                                </div> <!-- end card-->

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                <button type="submit" class="btn btn-primary">Guardar</button>
                                                                <input type="hidden" name="addclas" value="clas100">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end modal-->
                                        </div>
                                    </div>
                                    <table id="datatable" class="table ">
                                        <thead>
                                            <tr>
                                                <th>Clasificación</th>
                                                <th>Monto de pago</th>
                                                <th>Costo por falta</th>
                                                <th>Editar</th>
                                                <th>Estatus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_trainers = "SELECT eclas_id,eclas_clasificacion,eclas_monto_pago,eclas_costo_falta FROM entrenador_clasificacion";
                                            $resultTrainer = mysqli_query($conexion, $sql_trainers);
                                            while ($row = mysqli_fetch_array($resultTrainer)) {
                                                $eclas_id = $row['ent_id'];
                                                $eclas_clasificacion = $row['eclas_clasificacion'];
                                                $eclas_monto_pago = $row['eclas_monto_pago'];
                                                $eclas_costo_falta = $row['eclas_costo_falta'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $eclas_clasificacion; ?></td>
                                                    <td><?php echo "$ ". $eclas_monto_pago; ?></td>
                                                    <td><?php echo "$ ". $eclas_costo_falta; ?></td> 
                                                    <td>
                                                    <a class="btn btn-warning" href="javascript:void(0);" onClick="loadDynamicContentModalBaja('<?php echo $ent_id; ?>')"><i class="feather-info"></i></a>
                                                    </td>
                                                    <td>
                                                    <a class="btn btn-danger" href="javascript:void(0);" onClick="loadDynamicContentModalBaja('<?php echo $ent_id; ?>')"><i class="feather-info"></i></a>
                                                    </td>
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