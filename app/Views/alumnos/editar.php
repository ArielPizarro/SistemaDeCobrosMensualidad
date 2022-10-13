<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <?php if (isset($validation)) { ?>
                <div class="alert alert-danger">
                    <?php echo $validation->listErrors(); ?>
                    
                </div>
            <?php } ?>

            <form method="post" action="<?php echo base_url(); ?>/alumnos/actualizar" autocomplete="off">
                <?php csrf_field(); ?>

                <input type= "hidden" id="id" name="id" value="<?php echo $alumno['id']; ?>" />
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Nombres</label>
                            <input class="form-control" id="nombres" name="nombres" type="text" autofocus value="<?php echo $alumno['nombres']; ?>" required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Apellido Paterno</label>
                            <input class="form-control" id="apellido_paterno" name="apellido_paterno" type="text" value="<?php echo $alumno['apellido_paterno']; ?>" required />
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Apellido Materno</label>
                            <input class="form-control" id="apellido_materno" name="apellido_materno" type="text" autofocus value="<?php echo $alumno['apellido_materno']; ?>" requerided/>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Rut</label>
                            <input class="form-control" id="rut" name="rut" type="text" required value="<?php echo $alumno['rut']; ?>" readonly/>
                        </div>
                    </div>
                </div>
               

                <div class="form-group">
                    <div class="row">
                        

                        <div class="col-12 col-sm-6">
                            <label>Beneficio</label>
                            <select class="form-control" id="beneficio" name="beneficio" required>
                            <option value=""> Seleccionar Beneficio</option>

                            <option value="Prioritario"<?php if($alumno['beneficio'] == "Prioritario"){ echo 
                                    'selected'; }?>>Prioritario</option>

                            <option value="Preferente"<?php if($alumno['beneficio'] == "Preferente"){ echo 
                                    'selected'; }?>>Preferente</option>

                            <option value="Hijo Funcionario"<?php if($alumno['beneficio'] == "Hijo Funcionario"){ echo 
                                    'selected'; }?>>Hijo Funcionario</option>

                            <option value="Pro-Retención"<?php if($alumno['beneficio'] == "Pro-Retención"){ echo 
                                    'selected'; }?>>Pro-Retención</option>

                            <option value="Hermano"<?php if($alumno['beneficio'] == "Hermano"){ echo 
                                    'selected'; }?>>Hermano</option>

                            <option value="Sin Beneficio"<?php if($alumno['beneficio'] == "Sin Beneficio"){ echo 
                                    'selected'; }?>>Sin Beneficio</option>

                            <option value="Sin Verificar"<?php if($alumno['beneficio'] == "Sin Verificar"){ echo 
                                    'selected'; }?>>Sin Verificar</option>

                      
                               

                            </select>
                        </div>


                        <div class="col-12 col-sm-6">
                            <label>Curso</label>
                            <select id="curso" name="curso" class="form-control">
                                <option value="Segundo Nivel Transición A"<?php if($alumno['curso'] == "Segundo Nivel Transición A"){ echo 
                                    'selected'; }?>>Segundo Nivel Transición A</option>

                                <option value="1º Básico A" <?php if($alumno['curso'] == "1º Básico A"	){ echo 
                                    'selected'; }?>>1º Básico A</option>

                                    <option value="1º Básico B" <?php if($alumno['curso'] == "1º Básico B"	){ echo 
                                    'selected'; }?>>1º Básico B</option>

                                    <option value="2º Básico A" <?php if($alumno['curso'] == "2º Básico A"){ echo 
                                    'selected'; }?>>2º Básico A</option>

                                    <option value="2º Básico B" <?php if($alumno['curso'] == "2º Básico B"){ echo 
                                    'selected'; }?>>2º Básico B</option>

                                    <option value="3º Básico A" <?php if($alumno['curso'] == "3º Básico A"){ echo 
                                    'selected'; }?>>3º Básico A</option>

                                    <option value="3º Básico B" <?php if($alumno['curso'] == "3º Básico B"){ echo 
                                    'selected'; }?>>3º Básico B</option>

                                    <option value="4º Básico A" <?php if($alumno['curso'] == "4º Básico A"){ echo 
                                    'selected'; }?>>4º Básico A</option>
                                    
                                    <option value="4º Básico B" <?php if($alumno['curso'] == "4º Básico B"){ echo 
                                    'selected'; }?>>4º Básico B</option>

                                    <option value="5º Básico A" <?php if($alumno['curso'] == "5º Básico A"){ echo 
                                    'selected'; }?>>5º Básico A</option>

                                    <option value="5º Básico B" <?php if($alumno['curso'] == "5º Básico B"){ echo 
                                    'selected'; }?>>5º Básico B</option>

                                    <option value="6º Básico A" <?php if($alumno['curso'] == "6º Básico A"){ echo 
                                    'selected'; }?>>6º Básico A</option>

                                    <option value="6º Básico B" <?php if($alumno['curso'] == "6º Básico B"){ echo 
                                    'selected'; }?>>6º Básico B</option>

                                    <option value="7º Básico A" <?php if($alumno['curso'] == "7º Básico A"){ echo 
                                    'selected'; }?>>7º Básico A</option>

                                    <option value="7º Básico B" <?php if($alumno['curso'] == "7º Básico B"){ echo 
                                    'selected'; }?>>7º Básico B</option>

                                    <option value="8º Básico A" <?php if($alumno['curso'] == "8º Básico A"){ echo 
                                    'selected'; }?>>8º Básico A</option>

                                    <option value="8º Básico B" <?php if($alumno['curso'] == "8º Básico B"){ echo 
                                    'selected'; }?>>8º Básico B</option>

                                    <option value="1º Medio A" <?php if($alumno['curso'] == "1º Medio A"){ echo 
                                    'selected'; }?>>1º Medio A</option>

                                    <option value="1º Medio B" <?php if($alumno['curso'] == "1º Medio B"){ echo 
                                    'selected'; }?>>1º Medio B</option>

                                    <option value="1º Medio C" <?php if($alumno['curso'] == "1º Medio C"){ echo 
                                    'selected'; }?>>1º Medio C</option>

                                    <option value="1º Medio D" <?php if($alumno['curso'] == "1º Medio D"){ echo 
                                    'selected'; }?>>1º Medio D</option>

                                    <option value="1º Medio E" <?php if($alumno['curso'] == "1º Medio E"){ echo 
                                    'selected'; }?>>2º Medio E</option>

                                    <option value="2º Medio A" <?php if($alumno['curso'] == "2º Medio A"){ echo 
                                    'selected'; }?>>2º Medio A</option>

                                    <option value="2º Medio B" <?php if($alumno['curso'] == "2º Medio B"){ echo 
                                    'selected'; }?>>2º Medio B</option>

                                    <option value="2º Medio C" <?php if($alumno['curso'] == "2º Medio C"){ echo 
                                    'selected'; }?>>2º Medio C</option>

                                    <option value="2º Medio D" <?php if($alumno['curso'] == "2º Medio D"){ echo 
                                    'selected'; }?>>2º Medio D</option>

                                    <option value="2º Medio E" <?php if($alumno['curso'] == "2º Medio E"){ echo 
                                    'selected'; }?>>2º Medio E</option>

                                    <option value="3º Medio A" <?php if($alumno['curso'] == "3º Medio A"){ echo 
                                    'selected'; }?>>3º Medio A</option>

                                    <option value="3º Medio B" <?php if($alumno['curso'] == "3º Medio B"){ echo 
                                    'selected'; }?>>3º Medio B</option>

                                    <option value="3º Medio C" <?php if($alumno['curso'] == "3º Medio C"){ echo 
                                    'selected'; }?>>3º Medio C</option>

                                    <option value="3º Medio A TP" <?php if($alumno['curso'] == "3º Medio A TP"){ echo 
                                    'selected'; }?>>3º Medio A TP</option>

                                    <option value="3º Medio B TP" <?php if($alumno['curso'] == "3º Medio B TP"){ echo 
                                    'selected'; }?>>3º Medio B TP</option>

                                    <option value="4º Medio A" <?php if($alumno['curso'] == "4º Medio A"){ echo 
                                    'selected'; }?>>4º Medio A</option>

                                    <option value="4º Medio B" <?php if($alumno['curso'] == "4º Medio B"){ echo 
                                    'selected'; }?>>4º Medio B</option>

                                    <option value="4º Medio C" <?php if($alumno['curso'] == "4º Medio C"){ echo 
                                    'selected'; }?>>4º Medio C</option>

                                    <option value="4º Medio D" <?php if($alumno['curso'] == "4º Medio D"){ echo 
                                    'selected'; }?>>4º Medio D</option>

                                    <option value="4º Medio E" <?php if($alumno['curso'] == "4º Medio E"){ echo 
                                    'selected'; }?>>4º Medio E</option>

                                    <option value="4º Medio A" <?php if($alumno['curso'] == "4º Medio A"){ echo 
                                    'selected'; }?>>4º Medio A</option>

                                    <option value="4º Medio A TP" <?php if($alumno['curso'] == "4º Medio A TP"){ echo 
                                    'selected'; }?>>4º Medio A TP</option>

                                    <option value="4º Medio B TP" <?php if($alumno['curso'] == "4º Medio B TP"){ echo 
                                    'selected'; }?>>4º Medio B TP</option>

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