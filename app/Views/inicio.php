<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <br />
            <div class="row">
                <div class="col-4">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                           <?php echo $total; ?> Total de productos
                        </div>
                            <a class="card-footer text-white" href="<?php echo base_url(); ?>/productos">Ver detalles</a>

                    </div>

                </div>
          
                <div class="col-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                           <?php echo  number_format($totalPagosMensualidad['monto'], 0, ',', '.'); ?> Pagos concepto mensualidad
                        </div>
                            <a class="card-footer text-white" href="<?php echo base_url(); ?>/ventas">Ver detalles</a>

                    </div>

                </div>

               



                <div class="col-4">
                    <div class="card text-white bg-primary">
                        <div class="card-body">
                           <?php echo number_format($total, 0, ',', '.');    ?> Total recaudado en el mes:
                        </div>
                            <a class="card-footer text-white" href="<?php echo base_url(); ?>/productos">Ver detalles</a>

                    </div>

                </div>

                
            </div>



            

        </div>
<label>Información del dia:</label>

        <div class="container-fluid px-4">
            <br />
            <div class="row">
              


                <div class="col-4">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                        <?php echo   number_format($totalPagos['monto'], 0, ',', '.');   ?> Total recaudado en el año:
                        </div>
                            <a class="card-footer text-white" href="<?php echo base_url(); ?>/pagos/">Ver detalles</a>

                    </div>

                </div>
          
                <div class="col-4">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                           <?php echo  number_format($totalMes['monto'], 0, ',', '.');   ?> Total recaudado en el mes.:
                        </div>
                            <a class="card-footer text-white" href="<?php echo base_url(); ?>/pagos">Ver detalles</a>

                    </div>

                </div>

                <div class="col-4">
                    <div class="card text-white bg-danger">
                        <div class="card-body">
                           <?php echo number_format($totalDia['montoDia'], 0, ',', '.');  ?> Total recaudado hoy:
                        </div>
                            <a class="card-footer text-white" href="<?php echo base_url(); ?>/productos/mostrarMinimos">Ver detalles</a>

                    </div>

                </div>

                
            </div>



            

        </div>

    </main>