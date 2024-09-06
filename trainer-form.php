<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs mb-3">
                    <li class="nav-item">
                        <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link">
                            <i class="mdi mdi-home-variant d-lg-none d-block"></i>
                            <span class="d-none d-lg-block">Entrenador</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#profile" data-toggle="tab" aria-expanded="true" class="nav-link active">
                            <i class="mdi mdi-account-circle d-lg-none d-block"></i>
                            <span class="d-none d-lg-block">Contacto Entrenador</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <!---- Datos del Entrenador---->
                    <div class="tab-pane" id="home">
                            <div class="form-group">
                                <label for="Nombre" class="">Nombre</label>
                                <div class="">
                                    <input type="text" name="ent_nom" class="form-control" id="ent_nom" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Apellido Paterno" class="">Apellido Paterno</label>
                                <div class="">
                                    <input type="text" name="ent_appat" class="form-control" id="ent_appat" placeholder="Apellido Paterno">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Apellido Materno" class="">Apellido Materno</label>
                                <div class="">
                                    <input type="text" name="ent_apmat" class="form-control" id="ent_apmat" placeholder="Apellido Materno">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Teléfono" class="">Teléfono</label>
                                <div class="">
                                    <input type="text" name="ent_tel" class="form-control" id="ent_tel" placeholder="Teléfono">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Email" class="">Email</label>
                                <div class="">
                                    <input type="email" name="ent_mail" class="form-control" id="ent_mail" placeholder="Email">
                                </div>
                            </div>
                    </div>
                    <!----End Datos del Entrenador ---->
                    <!---- Datos del Contacto Entrenador ---->
                    <div class="tab-pane show active" id="profile">
                        <form id="" class="" action="" method="post">
                            <div class="form-group">
                                <label for="Colonia" class="">Colonia</label>
                                <div class="">
                                    <input type="text" name="ent_col" class="form-control" id="ent_col" placeholder="Colonia">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="CP" class="">CP</label>
                                <div class="">
                                    <input type="text" name="ent_cp" class="form-control" id="ent_cp" placeholder="CP">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Calle" class="">Calle</label>
                                <div class="">
                                    <input type="text" name="ent_calle" class="form-control" id="ent_calle" placeholder="Calle">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="No. Exterior" class="">No. Exterior</label>
                                <div class="">
                                    <input type="text" name="ent_no_ext" class="form-control" id="ent_no_ext" placeholder="No. Exterior">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="No. Interior" class="">No. Interior</label>
                                <div class="">
                                    <input type="text" name="ent_no_int" class="form-control" id="ent_no_int" placeholder="No. Exterior">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Estado" class="">Estado</label>
                                <div class="">
                                    <select id="ent_edo" name="ent_edo" class="custom-select">
                                        <!-- <option value="">Selecciona Estado</option> -->
                                        <option value="Ciudad de Mexico" selected>Ciudad de Mexico</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Municipio/Alcaldía" class="">Municipio/Alcaldía</label>
                                <div class="">
                                    <select id="ent_mun" name="ent_mun" class="custom-select">
                                        <option value="">Selecciona Municipio/Alcaldía</option>
                                        <option value="1">VALOR 1</option>
                                        <option value="2">VALOR 2</option>
                                    </select>
                                </div>
                            </div>
                    </div>
                    <!---- End Datos del Contacto Entrenador ---->
                </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
<!----  end row ---->