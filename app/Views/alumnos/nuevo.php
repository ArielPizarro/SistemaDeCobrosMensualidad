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
                                

                                    <option value="Segundo Nivel Transición A">Segundo Nivel Transición A</option>
                                    <option value="1º Básico A">1º Básico A</option>
                                    <option value="1º Básico B">1º Básico B</option>
                                    <option value="2º Básico A">2º Básico A</option>
                                    <option value="2º Básico B">2º Básico B</option>
                                    <option value="3º Básico A">3º Básico A</option>
                                    <option value="3º Básico B">3º Básico B</option>
                                    <option value="4º Básico A">4º Básico A</option>
                                    <option value="4º Básico B">4º Básico B</option>
                                    <option value="5º Básico A">5º Básico A</option>
                                    <option value="5º Básico B">5º Básico B</option>
                                    <option value="6º Básico A">6º Básico A</option>
                                    <option value="6º Básico B">6º Básico B</option>
                                    <option value="7º Básico A">7º Básico A</option>
                                    <option value="7º Básico B">7º Básico B</option>
                                    <option value="8º Básico A">8º Básico A</option>
                                    <option value="8º Básico B">8º Básico B</option>
                                    <option value="1º Medio A">1º Medio A</option>
                                    <option value="1º Medio B">1º Medio B</option>
                                    <option value="1º Medio C">1º Medio C</option>
                                    <option value="1º Medio D">1º Medio D</option>
                                    <option value="1º Medio E">1º Medio E</option>
                                    <option value="2º Medio A">2º Medio A</option>
                                    <option value="2º Medio B">2º Medio B</option>
                                    <option value="2º Medio C">2º Medio C</option>
                                    <option value="2º Medio D">2º Medio D</option>
                                    <option value="2º Medio E">2º Medio E</option>
                                    <option value="3º Medio A">3º Medio A</option>
                                    <option value="3º Medio B">3º Medio B</option>
                                    <option value="3º Medio C">3º Medio C</option>
                                    <option value="3º Medio A TP">3º Medio A TP</option>
                                    <option value="3º Medio B TP">3º Medio B TP</option>
                                    <option value="4º Medio A">4º Medio A</option>
                                    <option value="4º Medio B">4º Medio B</option>
                                    <option value="4º Medio C">4º Medio C</option>
                                    <option value="4º Medio D">4º Medio D</option>
                                    <option value="4º Medio E">4º Medio E</option>
                                    <option value="4º Medio A">4º Medio A</option>
                                    <option value="4º Medio A TP">4º Medio A TP</option>
                                    <option value="4º Medio B TP">4º Medio B TP</option>
                                  


                               

                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Beneficio</label>
                            <select class="form-control" id="beneficio" name="beneficio" required>
                            <option value=""> Seleccionar Beneficio</option>
                            <option value="Prioritario">Prioritario</option>
                            <option value="Preferente">Preferente</option>
                            <option value="Hijo Funcionario">Hijo Funcionario</option>
                            <option value="Pro-Retención">Pro-Retención</option>
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