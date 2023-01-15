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

                    <a class=" btn btn-primary" rel="stylesheet" href="<?php echo base_url(); ?>/usuarios"><i class="fas fa-arrow-left"></i> Volver</a>
                </p>
            </div>
            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Nombre</th>
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
                                <?php echo $dato['usuario']; ?>
                            </td>
                            <td>
                                <?php echo $dato['nombre']; ?>
                            </td>
                            <td>
                                <a onclick="return confirmar()" href="<?php echo base_url() . '/usuarios/reingresar/' . $dato['id']; ?>" class="btn btn-success"> <i class="  fa-solid fa-arrow-up-from-bracket"></i></a>
                                <!-- <a data-bs-toggle="modal" data-bs-target="#modal-reactivar" href="<?php echo base_url() . '/usuarios/reingresar/' . $dato['id']; ?>" class="btn btn-success"> <i class="fa-solid fa-arrow-up-from-bracket"></i></i> </a> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>