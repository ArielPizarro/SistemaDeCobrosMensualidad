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

                            <option value="Pro-Retenci??n"<?php if($alumno['beneficio'] == "Pro-Retenci??n"){ echo 
                                    'selected'; }?>>Pro-Retenci??n</option>

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
                                <option value="Segundo Nivel Transici??n A"<?php if($alumno['curso'] == "Segundo Nivel Transici??n A"){ echo 
                                    'selected'; }?>>Segundo Nivel Transici??n A</option>

                                <option value="1?? B??sico A" <?php if($alumno['curso'] == "1?? B??sico A"	){ echo 
                                    'selected'; }?>>1?? B??sico A</option>

                                    <option value="1?? B??sico B" <?php if($alumno['curso'] == "1?? B??sico B"	){ echo 
                                    'selected'; }?>>1?? B??sico B</option>

                                    <option value="2?? B??sico A" <?php if($alumno['curso'] == "2?? B??sico A"){ echo 
                                    'selected'; }?>>2?? B??sico A</option>

                                    <option value="2?? B??sico B" <?php if($alumno['curso'] == "2?? B??sico B"){ echo 
                                    'selected'; }?>>2?? B??sico B</option>

                                    <option value="3?? B??sico A" <?php if($alumno['curso'] == "3?? B??sico A"){ echo 
                                    'selected'; }?>>3?? B??sico A</option>

                                    <option value="3?? B??sico B" <?php if($alumno['curso'] == "3?? B??sico B"){ echo 
                                    'selected'; }?>>3?? B??sico B</option>

                                    <option value="4?? B??sico A" <?php if($alumno['curso'] == "4?? B??sico A"){ echo 
                                    'selected'; }?>>4?? B??sico A</option>
                                    
                                    <option value="4?? B??sico B" <?php if($alumno['curso'] == "4?? B??sico B"){ echo 
                                    'selected'; }?>>4?? B??sico B</option>

                                    <option value="5?? B??sico A" <?php if($alumno['curso'] == "5?? B??sico A"){ echo 
                                    'selected'; }?>>5?? B??sico A</option>

                                    <option value="5?? B??sico B" <?php if($alumno['curso'] == "5?? B??sico B"){ echo 
                                    'selected'; }?>>5?? B??sico B</option>

                                    <option value="6?? B??sico A" <?php if($alumno['curso'] == "6?? B??sico A"){ echo 
                                    'selected'; }?>>6?? B??sico A</option>

                                    <option value="6?? B??sico B" <?php if($alumno['curso'] == "6?? B??sico B"){ echo 
                                    'selected'; }?>>6?? B??sico B</option>

                                    <option value="7?? B??sico A" <?php if($alumno['curso'] == "7?? B??sico A"){ echo 
                                    'selected'; }?>>7?? B??sico A</option>

                                    <option value="7?? B??sico B" <?php if($alumno['curso'] == "7?? B??sico B"){ echo 
                                    'selected'; }?>>7?? B??sico B</option>

                                    <option value="8?? B??sico A" <?php if($alumno['curso'] == "8?? B??sico A"){ echo 
                                    'selected'; }?>>8?? B??sico A</option>

                                    <option value="8?? B??sico B" <?php if($alumno['curso'] == "8?? B??sico B"){ echo 
                                    'selected'; }?>>8?? B??sico B</option>

                                    <option value="1?? Medio A" <?php if($alumno['curso'] == "1?? Medio A"){ echo 
                                    'selected'; }?>>1?? Medio A</option>

                                    <option value="1?? Medio B" <?php if($alumno['curso'] == "1?? Medio B"){ echo 
                                    'selected'; }?>>1?? Medio B</option>

                                    <option value="1?? Medio C" <?php if($alumno['curso'] == "1?? Medio C"){ echo 
                                    'selected'; }?>>1?? Medio C</option>

                                    <option value="1?? Medio D" <?php if($alumno['curso'] == "1?? Medio D"){ echo 
                                    'selected'; }?>>1?? Medio D</option>

                                    <option value="1?? Medio E" <?php if($alumno['curso'] == "1?? Medio E"){ echo 
                                    'selected'; }?>>2?? Medio E</option>

                                    <option value="2?? Medio A" <?php if($alumno['curso'] == "2?? Medio A"){ echo 
                                    'selected'; }?>>2?? Medio A</option>

                                    <option value="2?? Medio B" <?php if($alumno['curso'] == "2?? Medio B"){ echo 
                                    'selected'; }?>>2?? Medio B</option>

                                    <option value="2?? Medio C" <?php if($alumno['curso'] == "2?? Medio C"){ echo 
                                    'selected'; }?>>2?? Medio C</option>

                                    <option value="2?? Medio D" <?php if($alumno['curso'] == "2?? Medio D"){ echo 
                                    'selected'; }?>>2?? Medio D</option>

                                    <option value="2?? Medio E" <?php if($alumno['curso'] == "2?? Medio E"){ echo 
                                    'selected'; }?>>2?? Medio E</option>

                                    <option value="3?? Medio A" <?php if($alumno['curso'] == "3?? Medio A"){ echo 
                                    'selected'; }?>>3?? Medio A</option>

                                    <option value="3?? Medio B" <?php if($alumno['curso'] == "3?? Medio B"){ echo 
                                    'selected'; }?>>3?? Medio B</option>

                                    <option value="3?? Medio C" <?php if($alumno['curso'] == "3?? Medio C"){ echo 
                                    'selected'; }?>>3?? Medio C</option>

                                    <option value="3?? Medio A TP" <?php if($alumno['curso'] == "3?? Medio A TP"){ echo 
                                    'selected'; }?>>3?? Medio A TP</option>

                                    <option value="3?? Medio B TP" <?php if($alumno['curso'] == "3?? Medio B TP"){ echo 
                                    'selected'; }?>>3?? Medio B TP</option>

                                    <option value="4?? Medio A" <?php if($alumno['curso'] == "4?? Medio A"){ echo 
                                    'selected'; }?>>4?? Medio A</option>

                                    <option value="4?? Medio B" <?php if($alumno['curso'] == "4?? Medio B"){ echo 
                                    'selected'; }?>>4?? Medio B</option>

                                    <option value="4?? Medio C" <?php if($alumno['curso'] == "4?? Medio C"){ echo 
                                    'selected'; }?>>4?? Medio C</option>

                                    <option value="4?? Medio D" <?php if($alumno['curso'] == "4?? Medio D"){ echo 
                                    'selected'; }?>>4?? Medio D</option>

                                    <option value="4?? Medio E" <?php if($alumno['curso'] == "4?? Medio E"){ echo 
                                    'selected'; }?>>4?? Medio E</option>

                                    <option value="4?? Medio A" <?php if($alumno['curso'] == "4?? Medio A"){ echo 
                                    'selected'; }?>>4?? Medio A</option>

                                    <option value="4?? Medio A TP" <?php if($alumno['curso'] == "4?? Medio A TP"){ echo 
                                    'selected'; }?>>4?? Medio A TP</option>

                                    <option value="4?? Medio B TP" <?php if($alumno['curso'] == "4?? Medio B TP"){ echo 
                                    'selected'; }?>>4?? Medio B TP</option>

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