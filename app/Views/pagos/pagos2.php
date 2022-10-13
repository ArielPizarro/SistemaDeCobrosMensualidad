<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--  Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  

    <style>
    .table thead, .table tfoot{
        background-color: #455a64;
        color:azure;
    }
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Alumno:</th>
                        <th>Monto Cancelado</th>
                        <th>Descuento</th>
                        <th>Forma de pago</th>
                        <th>Folio de boleta</th>
                        <th>Año de deuda</th>
                        <th>Fecha de pago</th>
                        <th>Fecha de ingreso</th>
                        <th>Cajero:</th>
                        <th>Comentario</th>
                        <th>Concepto:</th>
                        <th>Opciones:</th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($datos as $dato) { ?>
                        <tr>
                            <td><?php echo $dato['id']; ?></td>
                            <td><?php echo $dato['alumno']; ?> <?php echo $dato['apellidos']; ?> <?php echo $dato['apematerno']; ?></td>
                            <td><?php echo number_format($dato['monto'], 0, ',', '.');  ?></td>
                            <td><?php echo $dato['beneficio']; ?></td>
                            <td><?php echo $dato['forma_pago']; ?></td>
                            <td><?php echo $dato['folio_boleta']; ?></td>
                            <td><?php echo $dato['ano_deuda']; ?></td>
                            <td><?php echo $dato['fecha_pago']; ?></td>
                            <td><?php echo $dato['fecha_alta']; ?></td>
                            <td><?php echo $dato['cajero']; ?></td>
                            <td><?php echo $dato['comentario']; ?></td>
                            <td><?php echo $dato['razon_pago']; ?></td>

                           <td><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#EliminarModal" data-bs-whatever="<?= base_url('/pagos/eliminar/' . $dato['id']) ?>"><i class="far fa-trash-alt"></i></td>
                        </tr>
                    <?php } ?>

                </tbody>
                            <tfoot>
                                <tr>
                                    <th>Totales:</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                </table> 
            </div>
        </div>
    </div>
     
   <div class="container">
    <div class="row">
        <div class="col">
          <button type="button" class="btn btn-primary">
            Total: <span id="total" class="badge badge-light"></span>
            </button>    
        </div>
    </div>
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

    <script>
    $(document).ready(function(){
        var tabla = $("#example").DataTable({
               "createdRow":function(row,data,index){                   
                   //pintar una celda
                   if(data[3] == "Prioritario"){
                       /* $('td', row).eq(5).css({
                           'background-color':'#ff5252',
                           'color':'white', 
                       }); */
                   
                    //pintar una fila
                    $('td', row).css({
                           'background-color':'#ff5252',
                           'color':'white',
                           'border-style':'solid',
                           'border-color':'#bdbdbd' 
                       });
                   }
               }, 
                "drawCallback":function(){
                      //alert("La tabla se está recargando"); 
                      var api = this.api();
                      $(api.column(2).footer()).html(
                          'Total: ' +  (api.column(2, {page:'current'}).data().sum() * 1000).toLocaleString('es-ES', { style: 'currency', currency: 'CLP' })
                      )
                }
        });

        //1era forma para sum()
        //var tot = tabla.column(5).data().sum();
        //$("#total").text(tot);
    });
    </script>



</body>

    <script>
    var exampleModal = document.getElementById('EliminarModal')
    EliminarModal.addEventListener('show.bs.modal', function(event) {
        // Botón que activó el modal 
        var button = event.relatedTarget
        var recipient = button.getAttribute('data-bs-whatever')
        var modalBoton = EliminarModal.querySelector('.modal-btn-ok')
        modalBoton.href = recipient
    })




</script>
</html>


