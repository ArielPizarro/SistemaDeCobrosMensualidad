<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/unidades/nuevo" class="btn btn-info">Agregar</a>
                    <a href="<?php echo base_url(); ?>/unidades/eliminados" class="btn btn-warning">Eliminados</a>
                </p>
            </div>


            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Folio</th>
                        <th>Total</th>
                        <th>Fecha</th>
                        <th></th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($compras as $compra) { ?>
                        <tr>
                            <td><?php echo $compra['id']; ?></td>
                            <td><?php echo $compra['folio']; ?></td>
                            <td><?php echo $compra['total']; ?></td>
                            

                            <td><a href="<?php echo base_url() . '/compras/muestraCompraPdf/' . $compra['id']; ?>" class="btn btn-primary"><i class="fas
                                fa-file-alt"></i></a></td>
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