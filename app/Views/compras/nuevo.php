<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <form method="POST" action="<?php echo base_url(); ?>/compras/guarda" autocomplete="off">

                <?php csrf_field(); ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="">Codigo</label>
                            <input type="text" class="form-control" id="codigo" name="codigo" autofocus>
                        </div>

                        <div class="col-12 col-sm-4">
                            <label for="">Nombre del producto</label>
                            <input type="text" class=" form-control" id="nombre" name="nombre" disabled>
                        </div>

                        <div class="col-12 col-sm-4">
                            <label for="">Cantidad</label>
                            <input type="text" class="form-control" id="cantidad" name="cantidad" autofocus>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label for="">Precio de compra</label>
                            <input type="text" class="form-control" id="precio_compra" name="precio_compra">
                        </div>

                        <div class="col-12 col-sm-4">
                            <label for="">Sub-Total</label>
                            <input type="text" class=" form-control" id="subtotal" name="subtotal" disabled>
                        </div>

                        <div class="col-12 col-sm-4">
                            <label for=""><br>&nbsp;</label>
                            <button id="agregar_producto" name="agregar_producto" class="btn btn-primary" type="button">Agregar producto</button>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <table class="table table-dark">
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>total</th>
                                <th width="1%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6 offset-md-6">
                        <label style="font-weight: bold; font-size: 30px; text-align: center;">
                            Total $</label>
                        <input type="text" id="total" name="total" size="7" readonly="true" value="0.00" style="font-weight: bold; font-size: 30px; text-align: center;">
                        <button class="btn btn-success" type="button" id="completa_compra" name="completa_compra">Completar</button>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </main>