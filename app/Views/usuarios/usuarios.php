<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4"><?php echo $titulo ?></h3>
            <div>
                <p>
                    <a class="btn btn-success" rel="stylesheet" href="<?php echo base_url(); ?>/usuarios/nuevo"">Agregar <i class=" fa-solid fa-file-circle-plus"></i></a>
                    <a class=" btn btn-secondary" rel="stylesheet" href="<?php echo base_url(); ?>/usuarios/eliminados">Eliminados <i class="fa-solid fa-eraser"></i></a>
                </p>
            </div>
            <table class="table table-bordered" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
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
                                <?php echo $dato['usuario']; ?>
                            </td>
                            <td>
                                <?php echo $dato['nombre']; ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url() . '/usuarios/editar/' . $dato['id']; ?>" class="btn btn-primary"> <i class="fa-solid fa-pen-to-square"></i> </a>
                            </td>
                            <td>
                                <!-- <a class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar" href="#" data-href="<?php echo base_url() . '/unidades/eliminar/' . $dato['id']; ?>"> <i class="fa-solid fa-trash"></i> </a> -->
                                <a onclick="return eliminarRegistro()" href="<?php echo base_url() . '/usuarios/eliminar/' . $dato['id']; ?>" class="btn btn-danger"> <i class="fas fa-solid fa-trash"></i> </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Modal -->
    <!-- <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Eliminar registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        ¿Está seguro que quiere eliminar el registro?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary btn-ok">Aceptar</button>
                </div>
            </div>
        </div>
    </div> -->