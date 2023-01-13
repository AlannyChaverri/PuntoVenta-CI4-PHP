<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>


            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="post" action="<?php echo base_url(); ?>/usuarios/actualizar_password" autocomplete="off">

                <?php csrf_field(); ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Usuario</label>
                            <input type="text" value="<?php echo $usuarios['usuario']; ?>" class="form-control" id="usuario" name="usuario" disabled>
                        </div>
                        <div class="col-12 col-sm-6">
                            <label for="">Nombre</label>
                            <input type="text" value="<?php echo $usuarios['nombre']; ?>" class="form-control" id="nombre" name="nombre" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Password nuevo</label>
                            <input type="password" class=" form-control" id="password" name="password" required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Repite el password</label>
                            <input type="password" class=" form-control" id="repassword" name="repassword" required>
                        </div>
                    </div>
                </div>
                <br>
                <button class="btn btn-success" type="submit">Guardar</button>

                <br><br>

                <?php if (isset($mensaje)) { ?>
                    <div class="alert alert-success">
                        <?php echo $mensaje; ?>
                    </div>
                <?php } ?>

            </form>
        </div>
    </main>