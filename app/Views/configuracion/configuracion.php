<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h4 class="mt-4"><?php echo $titulo; ?></h4>

            <form method="post" enctype="multipart/form-data" action="<?php echo base_url(); ?>/configuracion/actualizar" autocomplete="off">

                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Nombre de la tienda</label>
                            <input class="form-control" id="tienda_nombre" name="tienda_nombre" type="text" value="<?php echo $nombre['valor']; ?>" autofocus required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>RFC</label>
                            <input class="form-control" id="tienda_rfc" name="tienda_rfc" type="text" value="<?php echo $rfc['valor']; ?>" />
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Teléfono de la tienda</label>
                            <input class="form-control" id="tienda_telefono" name="tienda_telefono" type="text" value="<?php echo $telefono['valor']; ?>" autofocus required />
                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Correo de la tienda</label>
                            <input class="form-control" id="tienda_email" name="tienda_email" type="text" value="<?php echo $email['valor']; ?>" />
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="row">

                        <div class="col-12 col-sm-6">
                            <label>Dirección de la tienda</label>
                            <textarea class="form-control" id="tienda_direccion" name="tienda_direccion" required>  <?php echo $direccion['valor']; ?>   </textarea>


                        </div>

                        <div class="col-12 col-sm-6">
                            <label>Leyenda del ticket</label>
                            <textarea class="form-control" id="ticket_leyenda" name="ticket_leyenda" required>  <?php echo $leyenda['valor']; ?> </textarea>
                        </div>
                    </div>
                </div>
                <label><br>&nbsp;</label>
                <div class="form-group">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <label>Logotipo</label> <br  />
                            <img src="<?php echo base_url() . '/images/logo.png'; ?>" class="img-responsive" width="200" />
                            <br  />
                            <input type="file" id="tienda_logo" name="tienda_logo" accept="image/png" />
                           <p class= "text-danger" >Cargar imagen en formato png de 150x150 pixeles</p> 
                        </div>
                    </div>
                </div>
                <label><br>&nbsp;</label>

                <button type="submit" class="btn btn-success">Guardar</button>
            </form>



        </div>

    </main>