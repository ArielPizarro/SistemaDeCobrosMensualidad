<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <div>
                <p>
                    
                    <a href="<?php echo base_url(); ?>/productos" class="btn btn-warning">Productos</a>
                </p>
            </div>


            <table id="datatablesSimple">
                <thead>
                <tr>
                        <th>Id</th>
                        <th>Código</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Existencias</th>
                        <th>Editar</th>
                       

                    </tr>
                </thead>
            
                <tbody>
                    <?php foreach ($datos as $dato) { ?>
                        <tr>
                        <td><?php echo $dato['id']; ?></td>
                            <td><?php echo $dato['codigo']; ?></td>
                            <td><?php echo $dato['nombre']; ?></td>
                            <td><?php echo $dato['precio_venta']; ?></td>
                            <td><?php echo $dato['existencias']; ?></td>

                          

                            <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarModal" data-bs-whatever="<?= base_url('/productos/reingresar/' . $dato['id']) ?>"><i class="fas fa-arrow-alt-circle-up"></i></td>

                           
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
                    <h5 class="modal-title">Reingresar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Deseas Reingresar este registro?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <a href="#" class="modal-btn-ok btn btn-primary">Aceptar</a>
                </div>
            </div>
        </div>
    </div>
    <!--- Fin Modal -->