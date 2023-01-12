<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/configuracion/actualizar" autocomplete="off">

                <?php csrf_field(); ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Nombre de la tienda</label>
                            <input type="text" value="<?php echo $nombre['valor']; ?>" class="form-control" id="tienda_nombre" name="tienda_nombre" autofocus required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">RFC</label>
                            <input type="text" value="<?php echo $rfc['valor']; ?>" class=" form-control" id="tienda_rfc" name="tienda_rfc" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Telefono de la tienda</label>
                            <input type="text" value="<?php echo $telefono['valor']; ?>" class="form-control" id="tienda_telefono" name="tienda_telefono" required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Correo de la tienda</label>
                            <input type="text" value="<?php echo $email['valor']; ?>" class=" form-control" id="tienda_email" name="tienda_email" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Direccion</label>
                            <textarea type="text" class="form-control" id="tienda_direccion" name="tienda_direccion" required><?php echo $direccion['valor']; ?></textarea>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Leyenda del ticket</label>
                            <textarea type="text" class=" form-control" id="tienda_ticket" name="tienda_ticket" required><?php echo $leyenda['valor']; ?></textarea>
                        </div>
                    </div>
                </div>

                <br>
                <!-- <a href="<?php echo base_url(); ?>/configuracion" class="btn btn-primary">Volver</a> -->
                <button class="btn btn-success" type="submit">Guardar</button>

            </form>

        </div>
    </main>