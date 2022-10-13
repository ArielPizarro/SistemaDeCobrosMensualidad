<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <div class="row">
                <div class="col-12 col-sm-6">
                    <label>Alumno: <?php echo $alumno['nombres']; ?> <?php echo $alumno['apellido_paterno']; ?> <?php echo $alumno['apellido_materno']; ?> - <?php echo $alumno['curso']; ?> - <?php echo $alumno['beneficio']; ?></label>
                    <label>Este alumno debe cancelar en el año la suma de: $<?php echo number_format($debe, 0, ',', '.');      ?>, en 10 cuotas mensuales de : $<?php echo number_format($debe / 10, 0, ',', '.');  ?></label>
                </div>

                <div class="col-12 col-sm-6">

                    <label>Este alumno ha cancelado en el año la suma de: $<?php echo number_format($totalPagado['monto'], 0, ',', '.');  ?></label>

                </div>


            </div>

            <form method="post" action="<?php echo base_url(); ?>/pagos/insertar" autocomplete="off">


              
                <div class="form-group">
                    <div class="row">
                        
                        <div class="col-12 col-sm-12">
                            <label style="font-weight: bold; font-size: 30px; text-align: center;">Ingrese Los detalles del nuevo abono:</label>
                        </div>
                        <div class="col-12 col-sm-6">
                            

                            <label>Seleccione forma de pago</label>
                            <select class="form-control" id="forma_pago" name="forma_pago" required>
                                <option value="Debito">Debito</option>
                                <option value="002">Transferencia</option>
                                <option value="Transferencia">Efectivo</option>
                                <option value="Credito">Credito</option>
                                <option value="Cheque al Dia">Cheque al Dia</option>
                                <option value="Cheque a Fecha">Cheque a Fecha</option>
                                <option value="Letras-Pagare">Letras-Pagare</option>
                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Digite el folio del SII</label>
                            <input class="form-control" id="folio_boleta" name="folio_boleta" type="text" value="<?php echo set_value('folio_boleta') ?>" required />
                            <input class="form-control" id="idalumno" name="idalumno" type="hidden" value="<?php echo $alumno['rutSinDiv']; ?>"  />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Seleccione a que año pertenece la deuda a abonar:</label>
                            <select class="form-control" id="ano_deuda" name="ano_deuda">
                                <option value="2022">2022</option>
                                <option value="2021">2021</option>
                                <option value="2020">2020</option>
                            </select>

                            
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>A que se debe el abono:</label>
                            <select class="form-control" id="razon_pago" name="razon_pago">
                                <option value="Pago mensualidad año en curso">Pago mensualidad año en curso</option>
                                <option value="Pago matrícula">Pago matrícula</option>
                                <option value="Pago Práctica">Pago Práctica</option>
                                <option value="Abono pagaré">Abono pagaré</option>
                            </select>

                            
                        </div>
                        <div class="col-12 col-sm-6">
                            <label>Ingrese la fecha en que realizaron la transferencia, recibo efectivo o pago redbank:</label>
                            <input class="form-control" id="fecha_pago" name="fecha_pago" type="text" value="<?php echo set_value('fecha_pago') ?>" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Ingrese un detalle de la transaccion (descripción):</label>
                            <input class="form-control" id="comentario" name="comentario" type="text" value="<?php echo set_value('comentario') ?>" autofocus required />
                        </div>

                        <div class="col-12 col-sm-3">
                            <label>Ingrese el Monto Cancelado:</label>
                            $<input class="form-control" id="monto" name="monto" type="text" value="<?php echo set_value('monto') ?>" required />
                        </div>
                    </div>
                </div>


                <a href="<?php echo base_url(); ?>/alumnos/indexAbono" class="btn btn-primary ">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>





            </form>
        </div>

    </main>

    