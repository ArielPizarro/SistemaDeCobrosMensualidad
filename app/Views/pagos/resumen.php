<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <div>
                <p>
                    <a href="<?php echo base_url(); ?>/alumnos/indexAbono" class="btn btn-info">Agregar</a>
                    <a href="<?php echo base_url(); ?>/pagos/eliminados" class="btn btn-warning">Eliminados</a>
                </p>
            </div>


            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
            <!--  Datatables CSS -->
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />

            <style>
                .table thead,
                .table tfoot {
                    background-color: #455a64;
                    color: azure;
                }
            </style>
            </head>

            <body>


                <div class="row">
                    <div class="col">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                  
                                    
                                    <th>Rut</th>
                                    <th>Alumno:</th>
                          
                                    <th>Monto Total Cancelado</th>

                                </tr>
                            </thead>


                            <tbody>
                                <?php foreach ($datos as $dato) { ?>
                                    
                                  

                                    <tr>
                                        
                                        
                                        <td><?php echo $dato['idalumno']; ?></td>
                                        <td><?php echo $dato['alumno']; ?> <?php echo $dato['apellidos']; ?> <?php echo $dato['apematerno']; ?></td>
                                        <td><?php echo $dato['monto']; ?></td>
                                        
                           
                                   
                                       
                                     


                                    </tr>
                                <?php } ?>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                  
                                    
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </body>
        </div>
    </main>





    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Arzocom Group <?php echo date('Y'); ?>
                    <div>
                        <a href="http://www.arzocom.cl" target="_blank">Privacy Policy</a>
                        &middot;
                        <a href="http://www.arzocom.cl">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>











<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<!--  Datatables JS-->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<!-- SUM()  Datatables-->
<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>





<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url(); ?> /js/scripts.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>








</html>