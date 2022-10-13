<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/pagos" class="btn btn-info">Volver</a>
                    <a href="<?php echo base_url(); ?>/pagos/eliminados" class="btn btn-warning">Eliminados</a>
                </p>
            </div>


            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Alumno:</th>
                        <th>Monto Cancelado</th>
                        <th>Descuento</th>
                        <th>Forma de pago</th>
                        <th>Folio de boleta</th>
                        <th>Año de deuda</th>
                        <th>Fecha de pago</th>
                        <th>Fecha de ingreso</th>
                        <th>Fue Atendido por:</th>
                        <th>Comentario</th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($datos as $dato) { ?>
                        <tr>
                            <td><?php echo $dato['id']; ?></td>
                            <td><?php echo $dato['alumno']; ?> <?php echo $dato['apellidos']; ?> <?php echo $dato['apematerno']; ?></td> 
                            <td><?php echo $dato['monto']; ?></td>
                            <td><?php echo $dato['beneficio']; ?></td>
                            <td><?php echo $dato['forma_pago']; ?></td>
                            <td><?php echo $dato['folio_boleta']; ?></td>
                            <td><?php echo $dato['ano_deuda']; ?></td>
                            <td><?php echo $dato['fecha_pago']; ?></td>
                            <td><?php echo $dato['fecha_alta']; ?></td>
                            <td><?php echo $dato['cajero']; ?></td>
                            <td><?php echo $dato['comentario']; ?></td>
                            
                            
                            

                            

                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarModal" data-bs-whatever="<?= base_url('/pagos/reingresar/' . $dato['id']) ?>"><i class="far fa-success"></i></td>
                            

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
                    <h5 class="modal-title">Reintegrar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Deseas reintegrar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="#" class="modal-btn-ok btn btn-primary">Aceptar</a>
                </div>
            </div>
        </div>
    </div>
    <!--- Fin Modal -->