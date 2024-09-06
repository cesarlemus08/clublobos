?<?php

    include 'assets/includes/mysql.php';

    ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>Elaboracion - Lobos System - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="MyraStudio" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <?php include 'menu-left.php'; ?>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <?php require 'header.php'; ?>

            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Default Tabs</h4>
                                    <p class="card-subtitle mb-4">Example of basic tabs.</p>

                                    <ul class="nav nav-tabs mb-3">
                                        <li class="nav-item">
                                            <a href="#home" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                <i class="mdi mdi-home-variant d-lg-none d-block"></i>
                                                <!-- <span class="d-none d-lg-block">Home</span> -->
                                                <span class="d-none d-lg-block">Sede</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#profile" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                <i class="mdi mdi-account-circle d-lg-none d-block"></i>
                                                <!-- <span class="d-none d-lg-block">Profile</span> -->
                                                <span class="d-none d-lg-block">Categorías</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#settings" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                <i class="mdi mdi-settings-outline d-lg-none d-block"></i>
                                                <!-- <span class="d-none d-lg-block">Settings</span> -->
                                                <span class="d-none d-lg-block">Horarios</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <!---- Inicia Tab Content ---->
                                    <div class="tab-content">
                                        <!---- Sede ---->
                                        <div class="tab-pane show active" id="home">
                                            <!-- <p>Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                                <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p> -->
                                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#agrsede"><i class="feather-plus-circle"> Nueva Sede</i></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="agrsede" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Agregar
                                                                Sede</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php include 'sede-form.php'; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!---- End Modal ---->

                                            <br><br>

                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th colspan="5">Nombre de Sede</th>
                                                            <!-- <th>Last Name</th>
                                                                <th>Username</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $mysql_sede = "SELECT sede_id, sede_nom, sede_ubicacion  FROM sedes";
                                                        echo $mysql_sede;
                                                        $resultSede = mysqli_query($conexion, $mysql_sede);
                                                        $i = 0;
                                                        while ($row = mysqli_fetch_array($resultSede)) {
                                                            $i++;
                                                            $sede_id = $row['sede_id'];
                                                            $sede_nom = $row['sede_nom'];
                                                            $sede_ubicacion = $row['sede_ubicacion'];
                                                        ?>
                                                            <tr>
                                                                <th scope="row"><?php echo $i; ?></th>
                                                                <td><?php echo $sede_nom; ?></td>
                                                                <td>
                                                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editsede"><i class="feather-edit-3"> Editar</i></button>
                                                                </td>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="editsede" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Editar Sede</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?php include 'sede-form.php';  ?>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!---- End Modal ---->
                                                                <td>
                                                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletsede"><i class="feather-trash-2">
                                                                            Borrar</i></button>
                                                                </td>

                                                                <!-- Modal -->
                                                                <div class="modal fade" id="deletsede" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="exampleModalLabel">Borrar Sede</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <?php include 'sede-form-delete.php'; ?>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!---- End Modal ---->
                                                            </tr>
                                                        <?php

                                                        }

                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!---End Sede ---->
                                        <!---- Categoría ---->
                                        <div class="tab-pane" id="profile">
                                            <!-- <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                                <p class="mb-0">Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p> -->
                                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#agrcat"><i class="feather-plus-circle"> Nueva Categoría</i></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="agrcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Agregar
                                                                Categoría</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php include 'cate-form-add.php'; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <br><br>

                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col" colspan="5">Nombre de la Categoría</th>
                                                            </tr>
                                                        </thead>
                                                    <tbody>
                                                        <tr align="center">
                                                            <th scope="row">1</th>
                                                            <td></td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editcate"><i class="feather-edit-3"> Editar</i></button></td>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="editcate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Editar Categoría</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php include 'cate-form-edit.php'; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---- End Modal ---->
                                                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletcate"><i class="feather-trash-2">
                                                                        Borrar</i></button></td>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="deletcate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Borrar
                                                                                Categoría</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php include 'cate-form-delete.php'; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---- End Modal ---->
                                                        </tr>
                                                        <tr align="center">
                                                            <th scope="row">2</th>
                                                            <td></td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editcate"><i class="feather-edit-3"> Editar</i></button></td>
                                                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletcate"><i class="feather-trash-2"> Borrar</i></button>
                                                            </td>
                                                        </tr>
                                                        <tr align="center">
                                                            <th scope="row">3</th>
                                                            <td></td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editcate"><i class="feather-edit-3"> Editar</i></button></td>
                                                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletcate"><i class="feather-trash-2"> Borrar</i></button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <!---- End Categoría ---->
                                        <!---- Horarios ---->
                                        <div class="tab-pane" id="settings">
                                            <!-- <p>Food truck quinoa dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.</p>
                                                <p class="mb-0">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p> -->
                                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#agrhor"><i class="feather-plus-circle"> Nuevo Horario</i></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="agrhor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Nuevo Horario
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php include 'horario-form-add.php'; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--- End Modal --->

                                            <br><br>

                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col" colspan="5">Horario</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr align="center">
                                                            <th scope="row">1</th>
                                                            <td></td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edithor"><i class="feather-edit-3"> Editar</i></button></td>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="edithor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Editar Horario</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php include 'horario-form-edit.php'; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delethor"><i class="feather-trash-2">
                                                                        Borrar</i></button>
                                                            </td>
                                                            <!----Modal ---->
                                                            <div class="modal fade" id="delethor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Borrar
                                                                                Horario</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php include 'horario-form-delete.php'; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---- End Modal ---->
                                                        </tr>
                                                        <tr align="center">
                                                            <th scope="row">2</th>
                                                            <td></td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edithor"><i class="feather-edit-3"> Editar</i></button></td>
                                                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delethor"><i class="feather-trash-2"> Borrar</i></button>
                                                            </td>
                                                        </tr>
                                                        <tr align="center">
                                                            <th scope="row">3</th>
                                                            <td colspan="0"></td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edithor"><i class="feather-edit-3"> Editar</i></button></td>
                                                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delethor"><i class="feather-trash-2"> Borrar</i></button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <!---- End Horarios ---->
                                    </div>
                                    <!---- End Tab Content ---->
                                </div> <!-- end card-body-->
                            </div> <!-- end card-->
                        </div> <!-- end col -->

                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Tabs Justified</h4>
                                    <p class="card-subtitle mb-4">Example of justified tabs.</p>

                                    <ul class="nav nav-tabs nav-justified mb-3">
                                        <li class="nav-item">
                                            <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                <i class="mdi mdi-home-variant d-lg-none d-block"></i>
                                                <!-- <span class="d-none d-lg-block">Home</span> -->
                                                <span class="d-none d-lg-block">Montos</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#profile1" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                <i class="mdi mdi-account-circle d-lg-none d-block"></i>
                                                <!-- <span class="d-none d-lg-block">Profile</span> -->
                                                <span class="d-none d-lg-block">Periodicidad</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#settings1" data-toggle="tab" aria-expanded="false" class="nav-link">
                                                <i class="mdi mdi-settings-outline d-lg-none d-block"></i>
                                                <!-- <span class="d-none d-lg-block">Settings</span> -->
                                                <span class="d-none d-lg-block">Días</span>
                                            </a>
                                        </li>
                                    </ul>

                                    <!---- Inicia Tab Content ---->
                                    <div class="tab-content">
                                        <!---- Montos ---->
                                        <div class="tab-pane" id="home1">
                                            <!-- <p>Leggings occaecat dolor sit amet, consectetuer adipiscing elit. Aenean
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
                                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#agrmont"><i class="feather-plus-circle"> Nuevo Horario</i></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="agrmont" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog  modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Agregar Monto
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php include 'monto-form-add.php'; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!---- End Modal ---->

                                            <br><br>

                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th colspan="5">Montos</th>
                                                            <!-- <th>Last Name</th>
                                                            <th>Username</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editmont"><i class="feather-edit-3"> Editar</i></button></td>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="editmont" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Editar Monto</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php include 'monto-form-edit.php'; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---- End Modal ---->
                                                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletmont"><i class="feather-trash-2">
                                                                        Borrar</i></button>
                                                            </td>
                                                            <!----Modal ---->
                                                            <div class="modal fade" id="deletmont" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Borrar
                                                                                Horario</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php include 'monto-form-delete.php'; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---- End Modal ---->
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Jacob</td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editmont"><i class="feather-edit-3"> Editar</i></button></td>
                                                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletmont"><i class="feather-trash-2">
                                                                        Borrar</i></button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>Larry</td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editmont"><i class="feather-edit-3"> Editar</i></button></td>
                                                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletmont"><i class="feather-trash-2">
                                                                        Borrar</i></button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!---- End Montos ---->

                                        <!---- Start Periodicidad ---->
                                        <div class="tab-pane show active" id="profile1">
                                            <!-- <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In
                                                enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam
                                                dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus.
                                                Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean
                                                leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                            <p class="mb-0">Leggings occaecat dolor sit amet, consectetuer adipiscing
                                                elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque
                                                penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec
                                                quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla
                                                consequat massa quis enim.</p> -->
                                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#agrperio"><i class="feather-plus-circle"> Nuevo Periodicidad</i></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="agrperio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog  modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Agregar
                                                                Periodicidad
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php include 'periodicidad-form-add.php'; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!---- End Modal ---->

                                            <br><br>

                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th colspan="5">Periodicidad</th>
                                                            <!-- <th>Last Name</th>
                                                            <th>Username</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editperio"><i class="feather-edit-3"> Editar</i></button></td>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="editperio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Editar
                                                                                Periodicidad</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php include 'periodicidad-form-edit.php'; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---- End Modal ---->
                                                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletperio"><i class="feather-trash-2">
                                                                        Borrar</i></button>
                                                            </td>
                                                            <!----Modal ---->
                                                            <div class="modal fade" id="deletperio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Borrar Periodicidad
                                                                            </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php include 'periodicidad-form-delete.php'; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---- End Modal ---->
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Jacob</td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editperio"><i class="feather-edit-3"> Editar</i></button></td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletperio"><i class="feather-trash-2">
                                                                        Borrar</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>Larry</td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editperio"><i class="feather-edit-3"> Editar</i></button></td>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="editperio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Editar
                                                                                Periodicidad</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php include 'periodicidad-form-edit.php'; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---- End Modal ---->
                                                            <td>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletperio"><i class="feather-trash-2">
                                                                        Borrar</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!---- End Periodicidad ---->

                                        <!---- Inicia Días ---->
                                        <div class="tab-pane" id="settings1">
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
                                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#agrdias"><i class="feather-plus-circle"> Nuevo Día</i></button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="agrdias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog  modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Agregar
                                                                Días
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php include 'dias-form-add.php'; ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!---- End Modal ---->

                                            <br><br>

                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th colspan="5">Días</th>
                                                            <!-- <th>Last Name</th>
                                                            <th>Username</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>Mark</td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editdias"><i class="feather-edit-3"> Editar</i></button></td>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="editdias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Editar
                                                                                Días</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php include 'dias-form-edit.php'; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---- End Modal ---->
                                                            <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletdias"><i class="feather-trash-2">
                                                                        Borrar</i></button>
                                                            </td>
                                                            <!----Modal ---->
                                                            <div class="modal fade" id="deletdias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                                Borrar Días
                                                                            </h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <?php include 'dias-form-delete.php'; ?>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!---- End Modal ---->
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>Jacob</td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editdias"><i class="feather-edit-3"> Editar</i></button></td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletdias"><i class="feather-trash-2">
                                                                        Borrar</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">3</th>
                                                            <td>Larry</td>
                                                            <td><button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editdias"><i class="feather-edit-3"> Editar</i></button></td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletdias"><i class="feather-trash-2">
                                                                        Borrar</i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <!---- End Días ---->
                                    </div>
                                    <!---- End Tab Content ---->
                                </div> <!-- end card-body -->
                            </div> <!-- end card -->
                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->

                    <!-- <div class="row">
                        <div class="col-xl-6">
                            <div class="card">
                                <div class="card-body">

                                    <h4 class="card-title">Tabs Vertical Left</h4>
                                    <p class="card-subtitle mb-4">Example of vertical left side tabs.</p>

                                    <div class="row">
                                        <div class="col-sm-3 mb-2 mb-sm-0">
                                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                                <a class="nav-link active show" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                                    <i class="mdi mdi-home-variant d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">Home</span>
                                                </a>
                                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                                    <i class="mdi mdi-account-circle d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">Profile</span>
                                                </a>
                                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                                    <i class="mdi mdi-settings-outline d-lg-none d-block"></i>
                                                    <span class="d-none d-lg-block">Settings</span>
                                                </a>
                                            </div>
                                        </div>  end col

                                        <div class="col-sm-9">
                                            <div class="tab-content" id="v-pills-tabContent">
                                                <div class="tab-pane fade active show" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                    <p class="mb-0">Cillum ad ut irure tempor velit nostrud occaecat
                                                        ullamco aliqua anim Leggings sint. Veniam sint duis incididunt
                                                        do esse magna mollit excepteur laborum qui. Id id reprehenderit
                                                        sit est eu aliqua occaecat quis et velit
                                                        excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat
                                                        commodo et voluptate minim reprehenderit
                                                        mollit pariatur. Deserunt non laborum enim et cillum eu deserunt
                                                        excepteur ea incididunt minim occaecat.</p>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                                    <p class="mb-0">Culpa dolor voluptate do laboris laboris irure
                                                        reprehenderit id incididunt duis pariatur mollit aute magna
                                                        pariatur consectetur. Eu veniam duis non ut dolor deserunt
                                                        commodo et minim in quis laboris ipsum velit
                                                        id veniam. Quis ut consectetur adipisicing officia excepteur non
                                                        sit. Ut et elit aliquip labore Leggings
                                                        enim eu. Ullamco mollit occaecat dolore ipsum id officia mollit
                                                        qui esse anim eiusmod do sint minim consectetur
                                                        qui.</p>
                                                </div>
                                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                                    <p class="mb-0">Food truck quinoa dolor sit amet, consectetuer
                                                        adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                                                        Cum sociis
                                                        natoque penatibus et magnis dis parturient montes, nascetur
                                                        ridiculus mus. Donec quam felis, ultricies nec, pellentesque
                                                        eu, pretium quis, sem. Nulla consequat massa quis enim. Cillum
                                                        ad ut irure tempor velit nostrud occaecat ullamco
                                                        aliqua anim Leggings sint. Veniam sint duis incididunt do esse
                                                        magna mollit excepteur laborum qui.</p>
                                                </div>
                                            </div> end tab-content
                                        </div> end col
                                    </div>
                                    end row 
                                </div>  end card-body
                            </div> end card
                        </div> end col

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tabs Vertical Right</h4>
                                <p class="card-subtitle mb-4">Example of vertical right tabs.</p>

                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="tab-content" id="v-pills-tabContent-right">
                                            <div class="tab-pane fade active show" id="v-pills-home2" role="tabpanel" aria-labelledby="v-pills-home-tab2">
                                                <p class="mb-0">Cillum ad ut irure tempor velit nostrud occaecat
                                                    ullamco aliqua anim Leggings sint. Veniam sint duis incididunt
                                                    do esse magna mollit excepteur laborum qui. Id id reprehenderit
                                                    sit est eu aliqua occaecat quis et velit
                                                    excepteur laborum mollit dolore eiusmod. Ipsum dolor in occaecat
                                                    commodo et voluptate minim reprehenderit
                                                    mollit pariatur. Deserunt non laborum enim et cillum eu deserunt
                                                    excepteur ea incididunt minim occaecat.</p>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-profile2" role="tabpanel" aria-labelledby="v-pills-profile-tab2">
                                                <p class="mb-0">Culpa dolor voluptate do laboris laboris irure
                                                    reprehenderit id incididunt duis pariatur mollit aute magna
                                                    pariatur consectetur. Eu veniam duis non ut dolor deserunt
                                                    commodo et minim in quis laboris ipsum velit
                                                    id veniam. Quis ut consectetur adipisicing officia excepteur non
                                                    sit. Ut et elit aliquip labore Leggings
                                                    enim eu. Ullamco mollit occaecat dolore ipsum id officia mollit
                                                    qui esse anim eiusmod do sint minim consectetur
                                                    qui.</p>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-settings2" role="tabpanel" aria-labelledby="v-pills-settings-tab2">
                                                <p class="mb-0">Food truck quinoa dolor sit amet, consectetuer
                                                    adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.
                                                    Cum sociis
                                                    natoque penatibus et magnis dis parturient montes, nascetur
                                                    ridiculus mus. Donec quam felis, ultricies nec, pellentesque
                                                    eu, pretium quis, sem. Nulla consequat massa quis enim. Cillum
                                                    ad ut irure tempor velit nostrud occaecat ullamco
                                                    aliqua anim Leggings sint. Veniam sint duis incididunt do esse
                                                    magna mollit excepteur laborum qui.</p>
                                            </div>
                                        </div>  end tabcontent
                                    </div> end col

                                    <div class="col-sm-3 mt-2 mt-sm-0">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab2" role="tablist" aria-orientation="vertical">
                                            <a class="nav-link active show" id="v-pills-home-tab2" data-toggle="pill" href="#v-pills-home2" role="tab" aria-controls="v-pills-home2" aria-selected="true">
                                                <i class="mdi mdi-home-variant d-lg-none d-block"></i>
                                                <span class="d-none d-lg-block">Home</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-profile-tab2" data-toggle="pill" href="#v-pills-profile2" role="tab" aria-controls="v-pills-profile2" aria-selected="false">
                                                <i class="mdi mdi-account-circle d-lg-none d-block"></i>
                                                <span class="d-none d-lg-block">Profile</span>
                                            </a>
                                            <a class="nav-link" id="v-pills-settings-tab2" data-toggle="pill" href="#v-pills-settings2" role="tab" aria-controls="v-pills-settings2" aria-selected="false">
                                                <i class="mdi mdi-settings-outline d-lg-none d-block"></i>
                                                <span class="d-none d-lg-block">Settings</span>
                                            </a>
                                        </div>
                                    </div> end col
                                </div>  end row -->

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end row-->

    <!-- <div class="row">
                        <div class="col-12">
                            <h4 class="mb-4">Accordions</h4>
                        </div>  end col
                    </div> -->
    <!-- end row -->

    <!-- <div class="row">
        <div class="col-lg-6">

            <div id="accordion" class="custom-accordion mb-4">

                <div class="card mb-0">
                    <div class="card-header" id="headingOne">
                        <h5 class="m-0 font-size-15">
                            <a class="d-block pt-2 pb-2 text-dark" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Collapsible Group Item #1 <span class="float-right"><i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                            richardson ad squid. 3 wolf moon officia aute,
                            non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                            eiusmod. Brunch 3 wolf moon
                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                            assumenda shoreditch et. Nihil
                            anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                            sapiente ea proident. Ad vegan
                            excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
                            denim aesthetic synth nesciunt
                            you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>  end card

                <div class="card mb-0">
                    <div class="card-header" id="headingTwo">
                        <h5 class="m-0 font-size-15">
                            <a class="collapsed d-block pt-2 pb-2 text-dark" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Collapsible Group Item #2 <span class="float-right"><i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                            richardson ad squid. 3 wolf moon officia aute,
                            non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                            eiusmod. Brunch 3 wolf moon
                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                            assumenda shoreditch et. Nihil
                            anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                            sapiente ea proident. Ad vegan
                            excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
                            denim aesthetic synth nesciunt
                            you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>  end card

                <div class="card mb-0">
                    <div class="card-header" id="headingThree">
                        <h5 class="m-0 font-size-15">
                            <a class="collapsed d-block pt-2 pb-2 text-dark" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Collapsible Group Item #3 <span class="float-right"><i class="mdi mdi-chevron-down accordion-arrow"></i></span>
                            </a>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                            richardson ad squid. 3 wolf moon officia aute,
                            non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                            eiusmod. Brunch 3 wolf moon
                            tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                            assumenda shoreditch et. Nihil
                            anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                            sapiente ea proident. Ad vegan
                            excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw
                            denim aesthetic synth nesciunt
                            you probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div> end card
            </div>  end custom accordions
        </div>  end col

        <div class="col-lg-6">
            <div class="mb-4">
                <p>
                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Link with href
                    </a>
                    <button class="btn btn-primary ml-1" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Button with data-target
                    </button>
                </p>
                <div class="collapse show" id="collapseExample">
                    <div class="card card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                        richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes
                        anderson cred nesciunt sapiente ea proident.
                    </div>
                </div>
            </div> end .mb-4
        </div> end col
        
    </div>
    end row-->

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


    <!-- App js -->
    <script src="assets/js/theme.js"></script>

</body>

</html>