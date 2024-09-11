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
<?php
$sql_trainers = "SELECT ent_id,eclas_clasificacion,ent_nom,ent_appat,ent_apmat,ent_tel,ent_mail FROM entrenadores LEFT JOIN entrenador_clasificacion USING (eclas_id) WHERE ent_id = '".$_GET['ent_id']."' AND activo = '1'";
$resultTrainer = mysqli_query($conexion, $sql_trainers);
while ($row = mysqli_fetch_array($resultTrainer)) {
    $ent_id = $row['ent_id'];
    $eclas_clasificacion = $row['eclas_clasificacion'];
    $ent_nom = $row['ent_nom'];
    $ent_appat = $row['ent_appat'];
    $ent_apmat = $row['ent_apmat'];
    $ent_tel = $row['ent_tel'];
    $ent_mail = $row['ent_mail'];
}

if($_POST['asis'] == "asis100"){
        if($_POST['faltatoday'] != ""){
            $dateinto = date("Y-m-d H:m:s");
                $sql_insert_asistencia = "INSERT INTO asistencias (ent_id,anio_id,num_sem,fecha_falta,asis_dateinto)
                VALUES ('".$_POST['ent_id']."','".$_POST['anio_id']."','".$_POST['num_sem']."',
                '".$_POST['faltatoday']."','".$dateinto."')";
                $resultAsistencia = mysqli_query($conexion, $sql_insert_asistencia);
        }
        if($_POST['fecha'] != ""){
            $dateinto = date("Y-m-d H:m:s");
                $sql_insert_asistencia = "INSERT INTO asistencias (ent_id,anio_id,num_sem,fecha_falta,asis_dateinto)
                VALUES ('".$_POST['ent_id']."','".$_POST['anio_id']."','".$_POST['num_sem']."',
                '".$_POST['fecha']."','".$dateinto."')";
                $resultAsistencia = mysqli_query($conexion, $sql_insert_asistencia);
        }
        $sql_search_faltas = "SELECT * FROM asistencias WHERE ent_id = '".$_POST['ent_id']."' AND anio_id = '".$_POST['anio_id']."' AND num_sem = '".$_POST['num_sem']."'";
            $resultFaltas = mysqli_query($conexion, $sql_search_faltas);
            $row_cnt = mysqli_num_rows($resultFaltas);
                if ($row_cnt > 0){
                    $actualizaTotal = $_POST['monto_base'] - ($_POST['costo_falta'] * $row_cnt);
                    $descuentos = $actualizaTotal - $_POST['desc_adicional']; 
                    $subtotal = $descuentos + $_POST['bono_extra']; 
                    //$total = $subtotal - $descuentos;
                    $sql_upda_faltas = "UPDATE pagos_entrenador SET num_faltas = '".$row_cnt."', total = '".$subtotal."' WHERE ent_id = '".$_POST['ent_id']."' AND anio_id = '".$_POST['anio_id']."' AND num_sem = '".$_POST['num_sem']."'";
                    //echo $sql_upda_pago_main;
                    $updateFaltas = mysqli_query($conexion, $sql_upda_faltas);
                }
}
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
                                            <h4 class="card-title">Pago entrenador / <?php echo $ent_nom." ".$ent_appat." ".$ent_apmat?> / Clasificación: <?php echo $eclas_clasificacion; echo date("H:i:s");?></h4>
                                        </div>
                                        <div class="col col-lg-2 mb-3">
                                            <a href="trainers.php" class="btn btn-primary">Regresar</a>
                                        </div>
                                    </div>
                                    <table id="datatable" class="table">
                                    
                                        <thead>
                                            <tr>
                                                <th># semana</th>
                                                <th>Pago base</th>
                                                <th>Ajuste</th>
                                                <th>Pagado</th>
                                                <th>Por pagar</th>
                                                <th>Detalle</th>
                                                <th>Faltas</th>


                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_trainers = "SELECT pago_id,anio_id,num_sem,monto_base,eclas_id,bono_extra,num_faltas,costo_falta,desc_adicional,pagado,pg_estatus,total,pg_dateinto,pg_dateupda FROM pagos_entrenador WHERE ent_id = '".$_GET['ent_id']."' AND anio_id = '".$_GET['anio_id']."' ORDER BY num_sem DESC";
                                            //echo $sql_trainers;
                                            $resultTrainer = mysqli_query($conexion, $sql_trainers);
                                            $i=0;
                                            while ($row = mysqli_fetch_array($resultTrainer)) {
                                                $pago_id = $row['pago_id'];
                                                $anio_id = $row['anio_id'];
                                                $num_sem = $row['num_sem'];
                                                $monto_base = $row['monto_base'];
                                                $eclas_id = $row['eclas_id'];
                                                $bono_extra = $row['bono_extra'];
                                                $num_faltas = $row['num_faltas'];
                                                $costo_falta = $row['costo_falta'];
                                                $desc_adicional = $row['desc_adicional'];
                                                $pagado = $row['pagado'];
                                                
                                                $pg_estatus = $row['pg_estatus'];
                                                $total = $row['total'];
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $num_sem; ?></td>
                                                    <td><?php echo "$ ". $monto_base; ?></td>
                                                    <td><?php echo "$ ". $total; ?></td>
                                                    <td><?php echo "$ ". $pagado; ?></td>
                                                    <td><?php $adeudado = $total - $pagado; echo "$ ". $adeudado; ?></td>
                                                    <td>
                                                        <?php if($pg_estatus == 0){ ?>
                                                            
                                                            <a href="trainer-pago-detail.php?pago_id=<?php echo $pago_id;?>&ent_id=<?php echo $_GET['ent_id']?>&anio_id=<?php echo $_GET['anio_id'];?>" class="btn btn-primary">
                                                                <i class="feather-zoom-in"></i> Ver
                                                            </a>
                                                        
                                                        <?php } else { ?>
                                                            <a href="#"><i class="feather-check-square"></i> Pagado</a>
                                                        <?php } ?>    
                                                    </td>
                                                    <td>
                                                    <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#asistencia<?php echo $i;?>">
                                                        <i class="feather-user-x"></i> <?php echo $num_faltas;?>
                                                        </button>

                                                        <!-- Modal -->
                                                        <div class="modal fade" id="asistencia<?php echo $i;?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticasistencia<?php echo $i;?>" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <form action="" name="formAsistencia" method="post">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="staticasistencia<?php echo $i;?>">Asistencia de la semana <?php echo $num_sem;?></h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                       Hoy es: <?php echo date("Y-m-d");?> Marcar como falta <input type="checkbox" class="checkbox" name="faltatoday" value="<?php echo date("Y-m-d");?>"> <br>
                                                                       Marcar otro día de la semana como falta: <input type="date" name="fecha" id="fecha" placeholder="Introduce una fecha" />
                                                                    <table>
                                                                        <tr>
                                                                            <th>Fecha de falta</th>
                                                                            <th>Eliminar</th>
                                                                        </tr>
                                                                        <?php 
                                                                            $sql_asistencia = "SELECT asis_id,fecha_falta FROM asistencias WHERE ent_id = '".$_GET['ent_id']."' AND anio_id = '".$anio_id."' AND num_sem = '".$num_sem."'";
                                                                            //echo $sql_asistencia;
                                                                            $resultFaltas = mysqli_query($conexion, $sql_asistencia);
                                                                            $row_cnt = mysqli_num_rows($resultFaltas);
                                                                                if ($row_cnt > 0){
                                                                                    while ($row = mysqli_fetch_array($resultFaltas)) {
                                                                                        $asis_id = $row['asis_id'];
                                                                                        $fecha_falta = $row['fecha_falta'];
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $fecha_falta;?></td>
                                                                            <td>x</td>
                                                                        </tr>
                                                                        <?php 
                                                                                    } 
                                                                                } else { 
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td colspan="2">No existen faltas </td>
                                                                                    </tr>
                                                                                    <?php
                                                                                }
                                                                        ?>
                                                                    </table>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                                                        <input type="hidden" name="asis" value="asis100">
                                                                        <input type="hidden" name="ent_id" value="<?php echo $ent_id;?>">
                                                                        <input type="hidden" name="anio_id" value="<?php echo $anio_id;?>">
                                                                        <input type="hidden" name="num_sem" value="<?php echo $num_sem;?>">
                                                                        <input type="hidden" name="costo_falta" value="<?php echo $costo_falta;?>">
                                                                        <input type="hidden" name="monto_base" value="<?php echo $monto_base;?>">
                                                                        <input type="hidden" name="desc_adicional" value="<?php echo $desc_adicional;?>">
                                                                        <input type="hidden" name="bono_extra" value="<?php echo $bono_extra;?>">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        </div>    
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