<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>
            
            <?php if(isset($validation)){ ?>
                <div class="alert alert-danger">
                <?php echo $validation->listErrors(); ?>
            </div>
            <?php } ?>

            <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>/productos/insertar" autocomplete="off">
                
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Código</label>
                            <input class="form-control" id="codigo" name="codigo" type="text" autofocus required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Nombre</label>
                            <input class="form-control" id="nombre" name="nombre" type="text" value="<?php echo set_value('nombre') ?>" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Unidad</label>
                            <select class="form-control" id="id_unidad" name="id_unidad"  required>
                                <option value=""> Seleccionar unidad</option>
                                <?php foreach ($unidades as $unidad) { ?>

                                    <option value="<?php echo $unidad['id']; ?>"><?php echo $unidad['nombre']; ?></option>

                                <?php }  ?>

                            </select>
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Categorías</label>
                            <select class="form-control" id="id_unidad" name="id_categoria" required>
                                <option value=""> Seleccionar categoría</option>
                                <?php foreach ($categorias as $categoria) { ?>

                                    <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nombre']; ?></option>

                                <?php }  ?>

                            </select>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Precio Venta</label>
                            <input class="form-control" id="precio_venta" name="precio_venta" type="text" autofocus required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Precio compra</label>
                            <input class="form-control" id="precio_compra" name="precio_compra" type="text" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Stock minimo</label>
                            <input class="form-control" id="stock_minimo" name="stock_minimo" type="text" autofocus required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Es inventariable </label>
                            <select id="inventariable" name="inventariable" class="form-control">

                                <option value="1">Si</option>
                                <option value="0">No</option>
                            </select>
                        </div>

                        
                    </div>
                </div>

                <label><br>&nbsp;</label>

                <label><br>&nbsp;</label>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Imagen</label> <br  />
                            
                            <br  />
                            <input type="file" id="img_producto" name="img_producto" accept="image/*" />
                           <p class= "text-danger" >Cargar imagen en formato png de 150x150 pixeles</p> 
                        </div>
                    </div>
                </div>
                <label><br>&nbsp;</label>

               

                <a href="<?php echo base_url(); ?>/productos" class="btn btn-primary ">Regresar</a>
                <button type="submit" class="btn btn-success">Guardar</button>





            </form>
        </div>

    </main>