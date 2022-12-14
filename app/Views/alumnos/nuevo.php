<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                </div>
            <?php } ?>

            <form method="post" action="<?php echo base_url(); ?>/alumnos/insertar" autocomplete="off">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Nombres</label>
                            <input class="form-control" id="nombres" name="nombres" type="text" autofocus value="<?php echo set_value('nombres') ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Apellido Paterno</label>
                            <input class="form-control" id="apellido_paterno" name="apellido_paterno" type="text" value="<?php echo set_value('apellido_paterno') ?>" required />
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Apellido Materno</label>
                            <input class="form-control" id="apellido_materno" name="apellido_materno" type="text" autofocus value="<?php echo set_value('apellido_materno') ?>" requerided/>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Rut</label>
                            <input class="form-control" id="rut" name="rut" type="text" required value="<?php echo set_value('rut') ?>"/>
                        </div>
                    </div>
                </div>
               

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Curso</label>
                            <select class="form-control" id="curso" name="curso"  value="<?php echo set_value('curso') ?>" required >
                                <option value=""> Seleccionar curso</option>
                                

                                    <option value="Segundo Nivel Transici??n A">Segundo Nivel Transici??n A</option>
                                    <option value="1?? B??sico A">1?? B??sico A</option>
                                    <option value="1?? B??sico B">1?? B??sico B</option>
                                    <option value="2?? B??sico A">2?? B??sico A</option>
                                    <option value="2?? B??sico B">2?? B??sico B</option>
                                    <option value="3?? B??sico A">3?? B??sico A</option>
                                    <option value="3?? B??sico B">3?? B??sico B</option>
                                    <option value="4?? B??sico A">4?? B??sico A</option>
                                    <option value="4?? B??sico B">4?? B??sico B</option>
                                    <option value="5?? B??sico A">5?? B??sico A</option>
                                    <option value="5?? B??sico B">5?? B??sico B</option>
                                    <option value="6?? B??sico A">6?? B??sico A</option>
                                    <option value="6?? B??sico B">6?? B??sico B</option>
                                    <option value="7?? B??sico A">7?? B??sico A</option>
                                    <option value="7?? B??sico B">7?? B??sico B</option>
                                    <option value="8?? B??sico A">8?? B??sico A</option>
                                    <option value="8?? B??sico B">8?? B??sico B</option>
                                    <option value="1?? Medio A">1?? Medio A</option>
                                    <option value="1?? Medio B">1?? Medio B</option>
                                    <option value="1?? Medio C">1?? Medio C</option>
                                    <option value="1?? Medio D">1?? Medio D</option>
                                    <option value="1?? Medio E">1?? Medio E</option>
                                    <option value="2?? Medio A">2?? Medio A</option>
                                    <option value="2?? Medio B">2?? Medio B</option>
                                    <option value="2?? Medio C">2?? Medio C</option>
                                    <option value="2?? Medio D">2?? Medio D</option>
                                    <option value="2?? Medio E">2?? Medio E</option>
                                    <option value="3?? Medio A">3?? Medio A</option>
                                    <option value="3?? Medio B">3?? Medio B</option>
                                    <option value="3?? Medio C">3?? Medio C</option>
                                    <option value="3?? Medio A TP">3?? Medio A TP</option>
                                    <option value="3?? Medio B TP">3?? Medio B TP</option>
                                    <option value="4?? Medio A">4?? Medio A</option>
                                    <option value="4?? Medio B">4?? Medio B</option>
                                    <option value="4?? Medio C">4?? Medio C</option>
                                    <option value="4?? Medio D">4?? Medio D</option>
                                    <option value="4?? Medio E">4?? Medio E</option>
                                    <option value="4?? Medio A">4?? Medio A</option>
                                    <option value="4?? Medio A TP">4?? Medio A TP</option>
                                    <option value="4?? Medio B TP">4?? Medio B TP</option>
                                  


                               

                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Beneficio</label>
                            <select class="form-control" id="beneficio" name="beneficio" required>
                            <option value=""> Seleccionar Beneficio</option>
                            <option value="Prioritario">Prioritario</option>
                            <option value="Preferente">Preferente</option>
                            <option value="Hijo Funcionario">Hijo Funcionario</option>
                            <option value="Pro-Retenci??n">Pro-Retenci??n</option>
                            <option value="Hermano">Hermano</option>
                            <option value="Sin Verificar">Sin Verificar</option>
                            <option value="Sin Beneficio">Sin Beneficio</option>
                               

                            </select>
                        </div>
                    </div>
                </div>


                <label><br>&nbsp;</label>

                <a href="<?php echo base_url(); ?>/alumnos" class="btn btn-primary ">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>





            </form>
        </div>

    </main>