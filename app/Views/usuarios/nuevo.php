<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>


            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="post" action="<?php echo base_url(); ?>/usuarios/insertar" autocomplete="off">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Usuario</label>
                            <input type="text" value="<?php echo set_value('usuario') ?>" class="form-control" id="usuario" name="usuario" autofocus required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Nombre</label>
                            <input type="text" value="<?php echo set_value('nombre') ?>" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Password</label>
                            <input type="password" value="<?php echo set_value('password') ?>" class=" form-control" id="password" name="password" required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Repite el password</label>
                            <input type="password" value="<?php echo set_value('repassword') ?>" class=" form-control" id="repassword" name="repassword" required>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Rol</label>
                            <select class="form-control" name="id_rol" id="id_rol" required>
                                <option value="">Selecionar caja</option>
                                <?php foreach ($roles as $rol) { ?>
                                    <option value="<?php echo $rol['id']; ?>">
                                        <?php echo $rol['nombre']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Caja</label>
                            <select class="form-control" name="id_caja" id="id_caja" required>
                                <option value="">Selecionar caja</option>
                                <?php foreach ($cajas as $caja) { ?>
                                    <option value="<?php echo $caja['id']; ?>">
                                        <?php echo $caja['nombre_caja']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <br>
                <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-primary">Volver</a>
                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div>
    </main>