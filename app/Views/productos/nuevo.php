<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="POST" action="<?php echo base_url(); ?>/productos/insertar" autocomplete="off">

                <?php csrf_field(); ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Codigo</label>
                            <input type="text" value="<?php echo set_value('codigo') ?>" class="form-control" id="codigo" name="codigo" autofocus required>
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
                            <label for="">Unidad</label>
                            <select class="form-control" name="id_unidad" id="id_unidad" required>
                                <option value="">Selecionar Unidad</option>
                                <?php foreach ($unidades as $unidad) { ?>
                                    <option value="<?php echo $unidad['id']; ?>"><?php echo $unidad['nombre']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Categoria</label>
                            <select class="form-control" name="id_categoria" id="id_categoria" required>
                                <option value="">Selecionar Unidad</option>
                                <?php foreach ($categorias as $categoria) { ?>
                                    <option value="<?php echo $categoria['id']; ?>">
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
                            <input type="text" value="<?php echo set_value('precio_venta') ?>" class="form-control" id="precio_venta" name="precio_venta" required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Precio de compra</label>
                            <input type="text" value="<?php echo set_value('precio_compra') ?>" class="form-control" id="precio_compra" name="precio_compra" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label for="">Stock minimo</label>
                            <input type="text" value="<?php echo set_value('stock_minimo') ?>" class="form-control" id="stock_minimo" name="stock_minimo" required>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label for="">Inventariable</label>
                            <select class="form-control" name="inventariable" id="inventariable" required>
                                <option value="1">Si</option>
                                <option value="0">No</option>
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