<div id="layoutSidenav_content">
    <main>
        <a href="<?php echo base_url(); ?>/ventas" class="btn btn-success">Volver</a>
        <div class="container-fluid">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="panel">
                    <div class="ratio ratio-16x9" style="margin-top: 30px;">
                        <iframe class="embed-responsive-item" src="<?php echo base_url() . "/ventas/generaTicket/" . $id_venta; ?>"></iframe>

                    </div>
                </div>
            </div>

        </div>
    </main>