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
                <?php if($_GET['new'] == "success") { ?>
                <div class="alert alert-success" role="alert">
                Se agregó el registro con éxito.
                </div>
                <?php } ?>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col col-lg-10">
                                            <h4 class="card-title">Jugadores Club Lobos</h4>
                                        </div>
                                        <div class="col col-lg-2 mb-3">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#playeradd"><i class="feather-plus-circle"></i>
                                                Nuevo Jugador
                                            </button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="playeradd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                                <form action="acciones-jugadores.php" method="post">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Registrar Nuevo Jugador</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="padding: 1.25rem;">
                                                            <?php include 'player-form.php'; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="hidden" name="jugadd" value="add100">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                            <input type="submit" class="btn btn-primary" name="Guardar">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <!---- End Modal ---->
                                    </div>
                                    <table id="selection-datatable" class="table ">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Sede</th>
                                                <!-- <th>Categoría</th> -->
                                                <!-- <th>Horario</th> -->
                                                <th>Monto</th>
                                                <th>Día</th>
                                                <th>Est. Pago</th>
                                                <th>Pagar</th>
                                                <th>Historial</th>
                                                <th>Editar</th>
                                                <th>Estatus</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $sql_players = "SELECT jug_id,jug_nom,jug_appat,jug_apmat FROM jugador " ;
                                            $resultPlayer = mysqli_query($conexion, $sql_players);
                                            while ($row = mysqli_fetch_array($resultPlayer)) {
                                                $jug_id = $row['jug_id'];
                                                $jug_nom = $row['jug_nom'];
                                                $jug_appat = $row['jug_appat'];
                                                $jug_apmat = $row['jug_apmat'];

                                                $sql_players2 = "SELECT cat_id,sede_id,hora_id,est_id FROM jugador_has_equipo WHERE jug_id = '".$jug_id."'" ;
                                                    $resultPlayer2 = mysqli_query($conexion, $sql_players2);
                                                    while ($row2 = mysqli_fetch_array($resultPlayer2)) {
                                                        $cat_id = $row2['cat_id'];
                                                        $sede_id = $row2['sede_id'];
                                                        $hora_id = $row2['hora_id'];
                                                        $est_id = $row2['est_id'];

                                                            $sql_players3 = "SELECT mon_id,tp_id,fep_id FROM jugador_has_pago WHERE jug_id = '".$jug_id."'" ;
                                                            $resultPlayer3 = mysqli_query($conexion, $sql_players3);
                                                            while ($row3 = mysqli_fetch_array($resultPlayer3)) {
                                                                $mon_id = $row3['mon_id'];
                                                                $tp_id = $row3['tp_id'];
                                                                $fep_id = $row3['fep_id'];
                                            ?>
                                                <tr>
                                                    <td><?php echo $jug_nom.'&nbsp;'.$jug_appat.'&nbsp;'.$jug_apmat; ?></td>
                                                    <td><?php
                                                    $sqlsede = "SELECT sede_nom FROM sedes WHERE sede_id = $sede_id";
                                                    $resultSede = mysqli_query($conexion, $sqlsede);
                                                    while ($rowS =  mysqli_fetch_array($resultSede)){
                                                        $sede_nom = $rowS['sede_nom'];
                                                        echo $sede_nom;

                                                    }

                                                    ?></td>

                                                    <!-- <td><?php
                                                    // $sqlcat = "SELECT cat_nom FROM categorias WHERE cat_id = $cat_id ";
                                                    // $resultCat = mysqli_query($conexion, $sqlcat);
                                                    // while ($rowC =  mysqli_fetch_array($resultCat)){
                                                    //     $cat_nom = $rowC['cat_nom'];
                                                    //     echo $cat_nom;
                                                    //     }
                                                    ?></td> -->
                                                    <!-- <td><?php
                                                    // $sqlhora = "SELECT hora_nom FROM horarios WHERE hora_id = $hora_id ";
                                                    // $resultHora = mysqli_query($conexion, $sqlhora);
                                                    // while ($rowH =  mysqli_fetch_array($resultHora)){
                                                    //     $hora_nom = $rowH['hora_nom'];
                                                    //     echo $hora_nom;
                                                    // }
                                                    ?></td> -->

                                                    <td><?php
                                                     $sqlmontoP = "SELECT mon_nom FROM monto_pago WHERE mon_id = $mon_id ";

                                                     $resultMontoPago = mysqli_query($conexion, $sqlmontoP);
                                                     while ($rowM =  mysqli_fetch_array($resultMontoPago)){
                                                         $mon_nom = $rowM['mon_nom'];
                                                         $monto_f = number_format($mon_nom, 2, '.', '');
                                                         echo "$ ". $monto_f;
                                                     }
                                                     ?></td>

                                                    <td><?php
                                                    $sqlfep = "SELECT fep_nom FROM fecha_pago WHERE fep_id = $fep_id ";

                                                    $resultFepPago = mysqli_query($conexion, $sqlfep);
                                                    while ($rowF =  mysqli_fetch_array($resultFepPago)){
                                                        $fep_nom = $rowF['fep_nom'];
                                                        echo $fep_nom;

                                                    }
                                                    ?></td>
                                                    <td style="text-align:center"><i class="feather-check-square" style="color:green;"></i></td>

                                                    <div>
                                                <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalP"><i class="feather-dollar-sign"></i></button></td>
                                                <?php include 'payment-form.php'; ?>
                                                </div>
                                                <div>
                                                <td><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModalCenter3"><i class="feather-file-text"></i></button></td>

                                                </div>


                                                    <td>
                                                        <!-- <button type="button" class="btn btn-warning">
                                                            <i class="feather-edit-3"></i>
                                                        </button> -->
                                                        <a href="players-detail.php?jug_id=<?php echo $jug_id;?>" class="btn btn-warning"><i class="feather-edit-3"></i></a>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#player<?php echo $ent_id; ?>"><i class="feather-info"></i></button>
                                                    </td>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="player<?php echo $ent_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        Borrar
                                                                        Entrenador
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" style="padding: 1.25rem;">
                                                                    <?php include 'player-form-delete.php'; ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            <?php
                                                    }
                                                }
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

</body>

</html>