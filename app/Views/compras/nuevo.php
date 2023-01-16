<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">

            <form method="POST" action="<?php echo base_url(); ?>/compras/guarda" autocomplete="off">

                <?php csrf_field(); ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <input type="hidden" id="id_producto" name="id_producto">
                            <label for="">Codigo</label>
                            <input type="text" class="form-control" id="codigo" name="codigo" onkeyup="buscarProducto(event,this,this.value)" autofocus>
                            <label for="codigo" id="resustado_error" style="color: red;"></label>
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
                <br><br>

                <div class="row">
                    <table id="tablaProductos" class="table table-hover table-striped table-sm table-responsive tablaProductos" width="100%">
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
                                <td>111</td>
                                <td>111</td>
                                <td>111</td>
                                <td>111</td>
                                <td>111</td>
                                <td>111</td>
                                <td>111</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-6 offset-md">
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

    <script>
        // estructura jquery
        $(document).ready(function() {

        });

        function buscarProducto(e, tagCodigo, codigo) {
            var enterKey = 13;
            if (codigo != '') {
                if (e.which == enterKey) {
                    $.ajax({
                        url: '<?php echo base_url(); ?>/productos/buscarPorCodigo/' + codigo,
                        dataType: 'json',
                        success: function(resultado) {
                            if (resultado == 0) {
                                $(tagCodigo).val('');

                            } else {
                                $(tagCodigo).removeClass('has-error');

                                $('#resultado_error').html(resultado.error);

                                if (resultado.existe) {
                                    $('#id_producto').val(resultado.datos.id);
                                    $('#nombre').val(resultado.datos.nombre);
                                    $('#cantidad').val(1);
                                    $('#precio_compra').val(resultado.datos.precio_compra);
                                    $('#subtotal').val(resultado.datos.precio_compra);
                                    $('#cantidad').focus();
                                } else {
                                    $('#id_producto').val('');
                                    $('#nombre').val('');
                                    $('#cantidad').val('');
                                    $('#precio_compra').val('');
                                    $('#subtotal').val('');
                                }
                            }
                        }
                    })
                }
            }
        }
    </script>