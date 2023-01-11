<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/clientes/actualizar" autocomplete="off">

                <?php csrf_field(); ?>

                <input type="hidden" id="id" name="id" value="<?php echo $cliente['id']; ?>">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Nombre</label>
                            <input type="text" value="<?php echo $cliente['nombre']; ?>" class="form-control" id="nombre" name="nombre" autofocus required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Direccion</label>
                            <input type="text" value="<?php echo $cliente['direccion']; ?>" class="form-control" id="direccion" name="direccion">
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Telefono</label>
                            <input type="text" value="<?php echo $cliente['telefono']; ?>" class="form-control" id="telefono" name="telefono">
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Correo</label>
                            <input type="text" value="<?php echo $cliente['correo']; ?>" class="form-control" id="correo" name="correo">
                        </div>
                    </div>
                </div>

                <br>
                <a href="<?php echo base_url(); ?>/clientes" class="btn btn-primary">Volver</a>
                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div>
    </main>