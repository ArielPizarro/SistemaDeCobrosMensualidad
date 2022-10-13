<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <div>
                <p>
                    
                    <a href="<?php echo base_url(); ?>/categorias" class="btn btn-warning">Unidades</a>
                </p>
            </div>


            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Reingresar</th>
                        
                        
                    </tr>
                </thead>
            
                <tbody>
                    <?php foreach ($datos as $dato) { ?>
                        <tr>
                            <td><?php echo $dato['id']; ?></td>
                            <td><?php echo $dato['nombre']; ?></td>
                           

                            <td><a href="<?php echo base_url(). '/categorias/reingresar/'. $dato['id']; ?>" class="btn btn-info"><i class="fas 
                            fa-arrow-alt-circle-up"></i></a></td>

                           

                           
                        </tr>



                    <?php } ?>

                </tbody>
            </table>
        </div>

    </main>