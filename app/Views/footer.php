<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Arzocom Group <?php echo date('Y'); ?>
                <div>
                    <a href="http://www.arzocom.cl" target="_blank">Privacy Policy</a>
                    &middot;
                    <a href="http://www.arzocom.cl">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
</footer>
</div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?> /js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>

<!--<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> -->
<script src="<?php echo base_url(); ?> /js/simple-datatables@latest.js"></script>
<script src="<?php echo base_url(); ?> /js/datatables-simple-demo.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/fixedheader/3.1.6/js/dataTables.fixedHeader.min.js"></script> 


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

<script type="text/javascript">
    $(function() {
        $('#fecha_pago').datetimepicker({
            locale: 'es',
            format: 'YYYY-MM-DD'

        });
    });



    $("#monto").on({
        "focus": function(event) {
            $(event.target).select();
        },
        "keyup": function(event) {
            $(event.target).val(function(index, value) {
                return value.replace(/\D/g, "")
                    .replace(/([0-9])([0-9]{3})$/, '$1.$2')
                    .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
            });
        }
    });
</script>



</body>

</html>