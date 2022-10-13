<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <div>
                <p>
                    
                    <a href="<?php echo base_url(); ?>/alumnos" class="btn btn-warning">Alumnos</a>
                </p>
            </div>


            <table id="datatablesSimple">
                <thead>
                <tr>
                <th>Id</th>
                        <th>Nombres</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Rut</th>
                        <th>Curso</th>
                        <th>Beneficio</th>
                        <th>Habilitar</th>
                        

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($datos as $dato) { ?>
                        <tr>
                        <td><?php echo $dato['id']; ?></td>
                            <td><?php echo $dato['nombres']; ?></td>
                            <td><?php echo $dato['apellido_paterno']; ?></td>
                            <td><?php echo $dato['apellido_materno']; ?></td>
                            <td><?php echo $dato['rut']; ?></td>
                            <td><?php echo $dato['curso']; ?></td>
                            <td><?php echo $dato['beneficio']; ?></td>

                          

                            <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#EliminarModal" data-bs-whatever="<?= 
                            base_url('/alumnos/reingresar/' . $dato['id']) ?>"><i class="fas fa-arrow-alt-circle-up"></i></td>

                           
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