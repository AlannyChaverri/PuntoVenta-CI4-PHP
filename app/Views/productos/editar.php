<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/productos/actualizar" autocomplete="off">

                <?php csrf_field(); ?>

                <input type="hidden" id="id" name="id" value="<?php echo $producto['id']; ?>">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Codigo</label>
                            <input type="text" value="<?php echo $producto['codigo']; ?>" class=" form-control" id="codigo" name="codigo" autofocus required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Nombre</label>
                            <input type="text" value="<?php echo $producto['nombre']; ?>" class=" form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Unidad</label>
                            <select class="form-control" name="id_unidad" id="id_unidad" required>
                                <option value="">Selecionar Unidad</option>
                                <?php foreach ($unidades as $unidad) { ?>
                                    <option value="<?php echo $unidad['id']; ?>" <?php if ($unidad['id'] == $producto['id_unidad']) {
                                                                                        echo 'selected';
                                                                                    } ?>>
                                        <?php echo $unidad['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Categoria</label>
                            <select class="form-control" name="id_categoria" id="id_categoria" required>
                                <option value="">Selecionar Unidad</option>
                                <?php foreach ($categorias as $categoria) { ?>
                                    <option value="<?php echo $categoria['id']; ?>" <?php if ($categoria['id'] == $producto['id_categoria']) {
                                                                                        echo 'selected';
                                                                                    } ?>>
                                        <?php echo $categoria['nombre']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Precio de venta</label>
                            <input type="text" value="<?php echo $producto['precio_venta']; ?>" class=" form-control" id="precio_venta" name="precio_venta" autofocus required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Precio de compra</label>
                            <input type="text" value="<?php echo $producto['precio_compra']; ?>" class=" form-control" id="precio_compra" name="precio_compra" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Stock minimo</label>
                            <input type="text" value="<?php echo $producto['stock_minimo']; ?>" class=" form-control" id="stock_minimo" name="stock_minimo" autofocus required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Inventariable</label>
                            <select class="form-control" value="<?php echo $producto['inventariable']; ?>" name=" inventariable" id="inventariable">
                                <option value="1" <?php
                                                    if ($producto['inventariable'] == 1) {
                                                        echo 'selected';
                                                    }
                                                    ?>>Si
                                </option>
                                <option value="0" <?php
                                                    if ($producto['inventariable'] == 0) {
                                                        echo 'selected';
                                                    }
                                                    ?>>No
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <br>
                <a href="<?php echo base_url(); ?>/productos" class="btn btn-primary">Volver</a>
                <button class="btn btn-success" type="submit">Guardar</button>

            </form>
        </div>
    </main>