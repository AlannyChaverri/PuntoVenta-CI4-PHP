<script>
    function confirmar() {
        return confirm("¿Está seguro que quiere reactivar el registro?")
    }
</script>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>
            <div>
                <p>

                    <a class=" btn btn-primary" rel="stylesheet" href="<?php echo base_url(); ?>/cajas"> <i class="fas fa-arrow-left"></i> Volver</a>
                </p>
            </div>
            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numero de caja</th>
                        <th>Nombre de caja</th>
                        <th>Folio</th>
                        <th>Activar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos as $dato) { ?>
                        <tr>
                            <td>
                                <?php echo $dato['id']; ?>
                            </td>
                            <td>
                                <?php echo $dato['numero_caja']; ?>
                            </td>
                            <td>
                                <?php echo $dato['nombre_caja']; ?>
                            </td>
                            <td>
                                <?php echo $dato['folio']; ?>
                            </td>
                            <td>
                                <a onclick="return confirmar()" href="<?php echo base_url() . '/cajas/reingresar/' . $dato['id']; ?>" class="btn btn-success"> <i class="  fa-solid fa-arrow-up-from-bracket"></i></a>
                                <!-- <a data-bs-toggle="modal" data-bs-target="#modal-reactivar" href="<?php echo base_url() . '/unidades/reingresar/' . $dato['id']; ?>" class="btn btn-success"> <i class="fa-solid fa-arrow-up-from-bracket"></i></i> </a> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>