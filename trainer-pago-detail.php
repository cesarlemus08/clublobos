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
if($_GET['pago_id']!="") {  $pago_id = $_GET['pago_id']; }
if($_POST['pago_id']!="") {  $pago_id = $_POST['pago_id']; }
//actualizamos los parámetros de pago
if(isset($_POST['actualiza-pago']) && $_POST['actualiza-pago'] == "upda100"){
    $descuentos = $_POST['desc_faltas_total'] + $_POST['desc_adicional']; 
    $subtotal = $_POST['monto_base'] + $_POST['bono_extra']; 
    $total = $subtotal - $descuentos;
    $sql_upda_pago = "UPDATE pagos_entrenador SET bono_extra = '".$_POST['bono_extra']."', desc_adicional = '".$_POST['desc_adicional']."', desc_motivo = '".$_POST['desc_motivo']."', bono_justify = '".$_POST['bono_justify']."', total = '".$total."' WHERE pago_id = '".$_POST['pago_id']."' ";
    //echo $sql_upda_pago;
    $updatePago = mysqli_query($conexion, $sql_upda_pago);
}
//terminamos actualización de los parámetros de pago

//agregamos registro de pago
if(isset($_POST['pagarAdd']) && $_POST['pagarAdd'] == "ph100"){
    
                    $dateinto = date("Y-m-d H:m:s");
                    $sql_insert_pago = "INSERT INTO pagos_entrenador_historico (pago_id,peh_pagado,peh_dateinto) VALUES ('".$pago_id."', '".$_POST['peh_pagado']."','".$dateinto."')";
                    //echo $sql_upda_pago;
                    $insertPago = mysqli_query($conexion, $sql_insert_pago);

                    if($_POST['sumaPagos']!=""){
                        $sumPago = $_POST['sumaPagos'] + $_POST['peh_pagado'];
                        $updaadeudo = "pagado = '".$sumPago."'";
                    } else {
                        $updaadeudo = "pagado = '".$_POST['peh_pagado']."'";
                    }
                    $sql_upda_pago_main = "UPDATE pagos_entrenador SET ".$updaadeudo." WHERE pago_id = '".$pago_id."'";
                    //echo $sql_upda_pago_main;
                    $updatePagoMain = mysqli_query($conexion, $sql_upda_pago_main);
}                   
//terminamos registro de pago

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
                                            <h4 class="card-title">Entrenador / <?php echo $ent_nom." ".$ent_appat." ".$ent_apmat?></h4>
                                        </div>
                                        <div class="col col-lg-1 mb-3" >
                                            <a href="trainers-pagos.php?ent_id=<?php echo $_GET['ent_id']?>&anio_id=<?php echo $_GET['anio_id'];?>" class="btn btn-secondary">Regresar</a>
                                        </div>
                                        
                                    </div>
                                    <?php
                                            $sql_trainers = "SELECT anio_id,num_sem,monto_base,eclas_clasificacion,bono_extra,num_faltas,costo_falta,desc_adicional,pagado,adeudado,pg_estatus,desc_motivo,bono_justify,pg_dateinto,pg_dateupda FROM pagos_entrenador LEFT JOIN entrenador_clasificacion USING(eclas_id) WHERE pago_id = '".$pago_id."'";
                                            //echo $sql_trainers;
                                            $resultTrainer = mysqli_query($conexion, $sql_trainers);
                                            while ($row = mysqli_fetch_array($resultTrainer)) {
                                                $anio_id = $row['anio_id'];
                                                $num_sem = $row['num_sem'];
                                                $monto_base = $row['monto_base'];
                                                $clasificacion = $row['eclas_clasificacion'];
                                                $bono_extra = $row['bono_extra'];
                                                $num_faltas = $row['num_faltas'];
                                                $costo_falta = $row['costo_falta'];
                                                $desc_adicional = $row['desc_adicional'];
                                                $pagado = $row['pagado'];
                                                $adeudado = $row['adeudado'];
                                                $pg_estatus = $row['pg_estatus'];
                                                $desc_motivo = $row['desc_motivo'];
                                                $bono_justify = $row['bono_justify'];
                                            }
                                            ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <form name="actualiza-pago" action="" method="post" class="form-horizontal">
                                                    <div class="form-group row mb-3">
                                                        <label for="inputEmail3" class="col-2 col-form-label">No. Semana: <?php echo $num_sem;?></label>
                                                        <label for="inputEmail3" class="col-3 col-form-label">Clasificación: <?php echo $clasificacion;?></label>
                                                        <label for="inputEmail3" class="col-3 col-form-label">Pago semanal base: <?php echo "$ ". $monto_base;?></label>
                                                        <label for="inputEmail3" class="col-2 col-form-label">No. Faltas: <?php echo $num_faltas;?></label>
                                                        <label for="inputEmail3" class="col-2 col-form-label">Costo por falta: <?php echo "$ ". $costo_falta;?></label>                                                        
                                                    </div>    
                                                    <div class="form-group row mb-3">
                                                        <label for="inputEmail3" class="col-2 col-form-label">
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Agregue el monto a descontar.">
                                                                Descuento adicional:
                                                            </a>    
                                                            <input type="text" name="desc_adicional" value="<?php echo $desc_adicional;?>"></label>
                                                        <label for="inputEmail3" class="col-2 col-form-label">
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Anote el texto que justifica el descuento.">
                                                                Comentario:
                                                            </a>
                                                            <br> <input type="text" name="desc_motivo" value="<?php echo $desc_motivo;?>"></label>
                                                        <label for="inputEmail3" class="col-3 col-form-label"></label>
                                                        <label for="inputEmail3" class="col-3 col-form-label">Descuento total por faltas: <?php $desc_faltas_total = $num_faltas * $costo_falta; echo "$ ". $desc_faltas_total;?></label>
                                                        <label for="inputEmail3" class="col-2 col-form-label"></label>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label for="inputEmail3" class="col-2 col-form-label">
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Si agregas un extra en el pago, aqui lo puedes anexar.">
                                                                Bono extra:
                                                            </a>
                                                            <input type="text" name="bono_extra" value="<?php echo $bono_extra;?>"></label>
                                                        <label for="inputEmail3" class="col-2 col-form-label">
                                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Anota el texto que justifica el pago adicional.">
                                                                Comentario:
                                                            </a>
                                                            <input type="text" name="bono_justify" value="<?php echo $bono_justify;?>"></label>
                                                        <label for="inputEmail3" class="col-3 col-form-label"></label>
                                                        <label for="inputEmail3" class="col-4 col-form-label" style="background-color:#C8FCEA; color:green; font-size:22px">
                                                                <?php
                                                                $descuentos = $desc_faltas_total + $desc_adicional; 
                                                                $subtotal = $monto_base + $bono_extra; 
                                                                $total = $subtotal - $descuentos;
                                                                ?>
                                                                Monto total a Pagar: <?php echo "$ ". $total;?>
                                                        </label>
                                                        <label for="inputEmail3" class="col-1 col-form-label"></label>
                                                    </div>

                                                    
                                                    <div style="text-align:right">
                                                        <input type="hidden" name="pago_id" value="<?php echo $pago_id;?>">
                                                        <input type="hidden" name="desc_faltas_total" value="<?php echo $desc_faltas_total;?>">
                                                        <input type="hidden" name="monto_base" value="<?php echo $monto_base;?>">
                                                        <input type="hidden" name="actualiza-pago" value="upda100">
                                                        <button class="btn btn-primary">Actualizar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                                                                    
                                    <table id="datatable" class="table ">
                                        <thead>
                                            <tr>
                                                <th># Pago</th>
                                                <th>Pagado</th>
                                                <th>Por pagar</th>
                                                <th>Fecha de pago</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $sql_pays = "SELECT peh_id,peh_pagado,peh_dateinto FROM pagos_entrenador_historico WHERE pago_id = '".$pago_id."'";
                                             //echo $sql_pays;
                                             $resultPays = mysqli_query($conexion, $sql_pays);
                                             $i=0;
                                             while ($row = mysqli_fetch_array($resultPays)) {
                                                 $peh_id = $row['peh_id'];
                                                 $peh_pagado = $row['peh_pagado'];
                                                 $peh_dateinto = $row['peh_dateinto'];
                                                 $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo "$ ". $peh_pagado; ?></td>
                                                    <td><?php 
                                                    $sumaPagos += $peh_pagado;
                                                    $subTotalPay = $total - $sumaPagos; echo "$ ". $subTotalPay;?></td>
                                                    <td><?php echo $peh_dateinto;?></td>
                                                    <td><a href="#" class="btn btn-danger"><i class="feather-trash"></i></a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            <tr>
                                            <td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>     
                                            <td colspan="2" style="text-align:right">

                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#pagarEntrenador" 
                                            <?php if($sumaPagos >= $total) { ?>
                                                disabled
                                            <?php } ?>
                                            >
                                            Pagar
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="pagarEntrenador" tabindex="-1" role="dialog" aria-labelledby="pagarEntrenadorLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="" name="formPagoTrainer" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="pagarEntrenadorLabel">Generar Pago</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="text-align:left">
                                                                    Pagar: $ <input type="text" name="peh_pagado" 
                                                                    value="<?php 
                                                                    if($subTotalPay==""){ echo $total; } else {
                                                                        echo $subTotalPay;
                                                                    } 
                                                                    ?>">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-success">Pagar</button>
                                                                <input type="hidden" name="pagarAdd" value="ph100">
                                                                <input type="hidden" name="pago_id" value="<?php echo $pago_id;?>">
                                                                <input type="hidden" name="sumaPagos" value="<?php echo $sumaPagos; ?>">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> <!-- end modal -->
                                            
                                            </td>
                                                
                                            </tr>
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