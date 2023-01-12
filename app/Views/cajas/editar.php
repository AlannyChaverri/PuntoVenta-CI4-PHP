<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/cajas/actualizar" autocomplete="off">

                <?php csrf_field(); ?>

                <input type="hidden" name="id" value="<?php echo $datos['id'] ?>">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Numero de cajas</label>
                            <input value="<?php echo $datos['numero_caja'] ?>" type="text" class="form-control" id="numero_caja" name="numero_caja" autofocus required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Nombre de caja</label>
                            <input value="<?php echo $datos['nombre_caja'] ?>" type="text" class="form-control" id="nombre_caja" name="nombre_caja" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Folio</label>
                            <input value="<?php echo $datos['folio'] ?>" type="text" class="form-control" id="folio" name="folio" required>
                        </div>
                    </div>
                </div>
                <br>
                <a href="<?php echo base_url(); ?>/cajas" class="btn btn-primary">Volver</a>
                <button class="btn btn-success" type="submit">Actualizar</button>

            </form>
        </div>
    </main>