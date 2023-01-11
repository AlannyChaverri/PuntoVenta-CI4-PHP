<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/categorias/actualizar" autocomplete="off">

                <input type="hidden" name="id" value="<?php echo $datos['id'] ?>">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Nombre</label>
                            <input value="<?php echo $datos['nombre'] ?>" type="text" class="form-control" id="nombre" name="nombre" autofocus require>
                        </div>
                    </div>
                </div>
                <br>
                <a href="<?php echo base_url(); ?>/categorias" class="btn btn-primary">Volver</a>
                <button class="btn btn-success" type="submit">Actualizar</button>

            </form>
        </div>
    </main>