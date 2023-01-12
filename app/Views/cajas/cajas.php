<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>
            <div>
                <p>
                    <a class="btn btn-success" rel="stylesheet" href="<?php echo base_url(); ?>/cajas/nuevo"">Agregar <i class=" fa-solid fa-file-circle-plus"></i></a>
                    <a class=" btn btn-secondary" rel="stylesheet" href="<?php echo base_url(); ?>/cajas/eliminados">Eliminados <i class="fa-solid fa-eraser"></i></a>
                </p>
            </div>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Numero de caja</th>
                        <th>Nombre de la caja</th>
                        <th>Folio</th>
                        <th></th>
                        <th></th>
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
                                <a href="<?php echo base_url() . '/cajas/editar/' . $dato['id']; ?>" class="btn btn-primary"> <i class="fa-solid fa-pen-to-square"></i> </a>
                            </td>
                            <td>
                                <!-- <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEliminar" href="<?php echo base_url() . '/unidades/eliminar/' . $dato['id']; ?>" class="btn btn-danger"> <i class="fa-solid fa-trash"></i> </a> -->
                                <a onclick="return eliminarRegistro()" href="<?php echo base_url() . '/cajas/eliminar/' . $dato['id']; ?>" class="btn btn-danger"> <i class="fa-solid fa-trash"></i> </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>