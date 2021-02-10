    <!-- Footer -->
    <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; PT.Sumber Karya Berkah</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin LogOut?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="#">LogOut</a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url("assets/vendor/jquery/jquery.min.js")?>"></script>
    <script src="<?=base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url("assets/vendor/jquery-easing/jquery.easing.min.js")?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url("assets/js/sb-admin-2.min.js")?>"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url("assets/vendor/chart.js/Chart.min.js")?>"></script>
    <script src="<?=base_url("assets/vendor/datatables/jquery.dataTables.min.js")?>"></script>
    <script src="<?=base_url("assets/vendor/datatables/dataTables.bootstrap4.min.js")?>"></script>
    
    <script> //script datatables kendaraan
    $(document).ready(function() {
        var table = null;
        table = $('#Table-Truck').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": "<?php echo base_url('index.php/home/view_truck/') ?>",
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [
                [5, 10, 30, 50, 100],
                [5, 10, 30, 50, 100]
            ],
            "columns": [
                {
                    "data": "mobil_no"
                },
                {
                    "data": "mobil_jenis"
                },
                {
                    "data": "mobil_max_load"
                }
            ]
        });
    });
    </script>
    <script> //script datatables kendaraan
    $(document).ready(function() {
        var table = null;
        table = $('#Table-Job-Order').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": "<?php echo base_url('index.php/home/view_JO/') ?>",
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [
                [5, 10, 30, 50, 100],
                [5, 10, 30, 50, 100]
            ],
            "columns": [
                {
                    "data": "Jo_id"
                },
                {
                    "data": "customer_name"
                },
                {
                    "data": "muatan"
                },
                {
                    "data": "asal"
                },
                {
                    "data": "tujuan"
                },
                {
                    "data": "tanggal_surat"
                },
                {
                    "data": "status",
                    "orderable": false
                },
                {
                    "data": "Jo_id",
                    "orderable": false,
                    render: function(data, type, row) {
                        let html = "<a class='btn btn-light' href='<?= base_url('index.php/detail/detail_jo/"+data+"')?>'><i class='fas fa-eye'></i></a>";
                        return html;
                    }
                }
            ]
        });
    });
    </script>
</body>

</html>