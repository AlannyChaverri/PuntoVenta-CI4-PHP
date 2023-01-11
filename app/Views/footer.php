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
<!-- pie -->
<script src="<?php echo base_url(); ?>/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>/js/scripts.js"></script>
<script src="<?php echo base_url(); ?>/js/simple-datatables@latest.js"></script>
<script src="<?php echo base_url(); ?>/js/datatables-simple-demo.js"></script>


<script>
    function eliminarRegistro() {
        return confirm("¿Está seguro que quiere eliminar el registro?")
    }
</script>

<!-- <script>
    var modalEliminar = document.getElementById('modalEliminar')
    var btnEliminar = document.getElementById('btnEliminar')

    modalEliminar.addEventListener('show.bs.modal', function() {
        btnEliminar.focus()
    })
</script> -->

</body>

</html>