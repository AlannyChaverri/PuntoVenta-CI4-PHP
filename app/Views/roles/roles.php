<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>
            <div>
                <p>
                    <a class="btn btn-success" rel="stylesheet" href="<?php echo base_url(); ?>/roles/nuevo"">Agregar <i class=" fa-solid fa-file-circle-plus"></i></a>
                    <a class=" btn btn-secondary" rel="stylesheet" href="<?php echo base_url(); ?>/roles/eliminados">Eliminados <i class="fa-solid fa-eraser"></i></a>
                </p>
            </div>
            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
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
                                <?php echo $dato['nombre']; ?>
                            </td>

                            <td>
                                <a href="<?php echo base_url() . '/roles/editar/' . $dato['id']; ?>" class="btn btn-primary"> <i class="fa-solid fa-pen-to-square"></i> </a>
                            </td>
                            <td>
                                <!-- <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEliminar" href="<?php echo base_url() . '/unidades/eliminar/' . $dato['id']; ?>" class="btn btn-danger"> <i class="fa-solid fa-trash"></i> </a> -->
                                <a onclick="return eliminarRegistro()" href="<?php echo base_url() . '/roles/eliminar/' . $dato['id']; ?>" class="btn btn-danger"> <i class="fa-solid fa-trash"></i> </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>