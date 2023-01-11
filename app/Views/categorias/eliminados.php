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

                    <a class=" btn btn-primary" rel="stylesheet" href="<?php echo base_url(); ?>/categorias">Volver</a>
                </p>
            </div>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
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
                                <?php echo $dato['nombre']; ?>
                            </td>
                            <td>
                                <a onclick="return confirmar()" href="<?php echo base_url() . '/categorias/reingresar/' . $dato['id']; ?>" class="btn btn-success"> <i class="fa-solid fa-arrow-up-from-bracket"></i></i> </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>