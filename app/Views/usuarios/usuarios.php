<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/usuarios/nuevo" class="btn btn-info">Agregar</a>
                    <a href="<?php echo base_url(); ?>/usuarios/eliminados" class="btn btn-warning">Eliminados</a>
                </p>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Usuarios
                </div>
                <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Nombre Corto</th>
                        <th>Editar</th>
                        <th>Deshabilitar</th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($datos as $dato) { ?>
                        <tr>
                            <td><?php echo $dato['id']; ?></td>
                            <td><?php echo $dato['usuario']; ?></td>
                            <td><?php echo $dato['nombre']; ?></td>

                            <td><a href="<?php echo base_url() . '/usuarios/editar/' . $dato['id']; ?>" class="btn btn-info"><i class="fas 
                            fa-pencil-alt"></i></a></td>

                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarModal" data-bs-whatever="<?= base_url('/usuarios/eliminar/' . $dato['id']) ?>"><i class="far fa-trash-alt"></i></td>


                        </tr>



                    <?php } ?>

                </tbody>
            </table>
        </div>

    </main>

    <!--- Inicio Modal -->
    <div class="modal fade " id="EliminarModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Deseas Eliminar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="#" class="modal-btn-ok btn btn-primary">Aceptar</a>
                </div>
            </div>
        </div>
    </div>
    <!--- Fin Modal -->