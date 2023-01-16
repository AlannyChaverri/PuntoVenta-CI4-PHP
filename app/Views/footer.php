<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Alanny Chaverri <?php echo date('Y') ?></div>
            <div>
                <a target="_blank" href="https://github.com/AlannyChaverri">GitHub</a>
                &middot;
                <a target="_blank" href="https://www.linkedin.com/in/alanny-chaverri-molina/">linkedIn</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<!-- pie b4-->
<script src="<?php echo base_url() ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url() ?>/js/scripts.js"></script>
<script src="<?php echo base_url() ?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url() ?>/assets/demo/datatables-demo.js"></script>

<script>
    $('#modalEliminar').on('shown.bs.modal', function(event) {
        $(this).find('.btn-ok').attr('href', $(event.relatedTarget).data('href'));
    });

    function eliminarRegistro() {
        return confirm("¿Está seguro que quiere eliminar el registro?")
    }
</script>

</body>

</html>