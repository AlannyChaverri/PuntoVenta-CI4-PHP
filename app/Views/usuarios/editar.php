<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/usuarios/actualizar" autocomplete="off">

                <?php csrf_field(); ?>

                <input type="hidden" name="id" value="<?php echo $datos['id'] ?>">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Usuario</label>
                            <input type="text" value="<?php echo $datos['usuario'] ?>" class="form-control" id="usuario" name="usuario" autofocus required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Password</label>
                            <input type="text" value="<?php echo $datos['password'] ?>" class=" form-control" id="password" name="password" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Nombre</label>
                            <input type="text" value="<?php echo $datos['nombre'] ?>" class="form-control" id="nombre" name="nombre" required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">ID de la Caja</label>
                            <input type="text" value="<?php echo $datos['id_caja'] ?>" class=" form-control" id="id_caja" name="id_caja" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">ID del Rol</label>
                            <input type="text" value="<?php echo $datos['id_rol'] ?>" class="form-control" id="id_rol" name="id_rol" required>
                        </div>
                    </div>
                </div>

                <br>
                <a href="<?php echo base_url(); ?>/usuarios" class="btn btn-primary">Volver</a>
                <button class="btn btn-success" type="submit">Actualizar</button>

            </form>
        </div>
    </main>