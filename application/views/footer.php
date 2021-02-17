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
    <script src="<?=base_url("assets/vendor/jquery/jquery.mask.min.js")?>"></script>
    <script src="<?=base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js")?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url("assets/vendor/jquery-easing/jquery.easing.min.js")?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url("assets/js/sb-admin-2.min.js")?>"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url("assets/vendor/chart.js/Chart.min.js")?>"></script>
    <script src="<?=base_url("assets/vendor/datatables/jquery.dataTables.min.js")?>"></script>
    <script src="<?=base_url("assets/vendor/datatables/dataTables.bootstrap4.min.js")?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>
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
    <script> //script datatables job order
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
                "type": "POST",
                'data': function(data) {
                    data.tanggal = $('#Tanggal').val();
                    data.bulan = $('#Bulan').val();
                    data.tahun = $('#Tahun').val();
                }
            },
            "deferRender": true,
            "aLengthMenu": [
                [5, 10, 30, 50, 100],
                [5, 10, 30, 50, 100]
            ],
            "columns": [
                {
                    "data": "Jo_id",
                    className: 'text-center'
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
                    className: 'text-center',
                    "orderable": false,
                        render: function(data, type, row) {
                            if (data == "Sampai Tujuan") {
                                let html = "<span class='btn-sm btn-block btn-success'><i class='fa fa-fw fa-check mr-2'></i>" + data + "</span>";
                                return html;
                            } else {
                                let html = "<span class='btn-sm btn-block btn-warning'><i class='fa fa-fw fa-exclamation-circle mr-2'></i>" + data + "</span>";
                                return html;
                            }
                        }
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
        $("#Tanggal").change(function() {
            // alert($('#Tanggal').val());   
            table.ajax.reload();
            $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val());
            $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val());
        });
        $("#Bulan").change(function() {
            // alert($('#Bulan').val());   
            table.ajax.reload();
            $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val());
            $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val());
        });
        $("#Tahun").change(function() {
            // alert($('#Tahun').val());   
            table.ajax.reload();
            $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val());
            $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val());
        });
    });
    </script>
     <script> //script datatables kendaraan

    $(document).ready(function() {
        var table = null;
        table = $('#Table-Bon').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": "<?php echo base_url('index.php/home/view_bon/') ?>",
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [
                [5, 10, 30, 50, 100],
                [5, 10, 30, 50, 100]
            ],
            "columns": [
                {
                    "data": "bon_id",
                    className: 'text-center'
                },
                {
                    "data": "supir_name"
                },
                {
                    "data": "bon_jenis",
                    "orderable": false,
                        render: function(data, type, row) {
                            if (data == "Pembayaran") {
                                let html = "<span class='btn-sm btn-block btn-success'><i class='fa fa-fw fa-check mr-2'></i>" + data + "</span>";
                                return html;
                            } else {
                                let html = "<span class='btn-sm btn-block btn-warning   '><i class='fa fa-fw fa-exclamation-circle mr-2'></i>" + data + "</span>";
                                return html;
                            }
                        }
                },
                {
                    "data": "bon_nominal"
                },
                {
                    "data": "bon_tanggal"
                },
                {
                    "data": "bon_id",
                    "orderable": false,
                    className: 'text-center',
                    render: function(data, type, row) {
                    let html = "<a class='btn btn-light btn-detail-bon' href='javascript:void(0)' data-toggle='modal' data-target='#popup-bon' data-pk='"+data+"'><i class='fas fa-eye'></i></a>";
                        return html;
                    }
                }
            ],
            drawCallback: function() {
                $('.btn-detail-bon').click(function() {
                    let pk = $(this).data('pk');
                    // alert(pk);
                    $.ajax({ //ajax ambil data bon
                        type: "GET",
                        url: "<?php echo base_url('index.php/detail/getbon') ?>",
                        dataType: "JSON",
                        data: {
                            id: pk
                        },
                        success: function(data) { //jika ambil data sukses
                            $('td[name="id"]').text(data["bon_id"]); //set value
                            $('td[name="supir"]').text(data["supir_name"]); //set value
                            $('td[name="jenis"]').text(data["bon_jenis"]); //set value
                            $('td[name="nominal"]').text(data["bon_nominal"]); //set value
                            $('td[name="tanggal"]').text(data["bon_tanggal"]); //set value
                            $('td[name="keterangan"]').text(data["bon_keterangan"]); //set value
                            // alert(data["supir_id"]+data["supir_name"]+data["bon_id"]+data["bon_jenis"]+data["bon_nominal"]);
                        }
                    });
                });
            }
        });
    });
    </script>



<!-- Customer -->
<script> //script datatables customer
    $(document).ready(function() {
        var table = null;
        table = $('#Table-Customer').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": "<?php echo base_url('index.php/home/view_Customer/') ?>",
                "type": "POST",
                
            },
            "deferRender": true,
            "aLengthMenu": [
                [5, 10, 30, 50, 100],
                [5, 10, 30, 50, 100]
            ],
            "columns": [
                {
                    "data": "customer_id",
                    className: 'text-center'
                },
                {
                    "data": "customer_name"
                },
                {
                    "data": "Customer_id",
                    className: 'text-center',
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
    <!-- end Customer -->

<!-- Supir -->
<script> //script datatables Supir
    $(document).ready(function() {
        var table = null;
        table = $('#Table-Supir').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": "<?php echo base_url('index.php/home/view_Supir/') ?>",
                "type": "POST",
                
            },
            "deferRender": true,
            "aLengthMenu": [
                [5, 10, 30, 50, 100],
                [5, 10, 30, 50, 100]
            ],
            "columns": [
                {
                    "data": "supir_id",
                    className: 'text-center'
                },
                {
                    "data": "supir_name",
                    
                },
                {
                    "data": "supir_kasbon"
                },
                {
                    "data": "status_jalan",
                    className: 'text-center font-weight-bold',
                    "orderable": false,
                        render: function(data, type, row) {
                            if (data == "Jalan") {
                                let html = "<span class='btn-sm btn-block btn-success'><i class='fa fa-fw fa-check'></i>" + data + "</span>";
                                return html;
                            } else {
                                let html = "<span class='btn-sm btn-block btn-warning'><i class='fa fa-fw fa-exclamation-circle'></i>" + data + "</span>";
                                return html;
                            }
                        }

                },
                {
                    "data": "supir_id",
                    className: 'text-center font-weight-bold',
                    "orderable": false,
                    render: function(data, type, row) {
                        let html = "<a class='btn btn-light' href='<?= base_url('index.php/detail/detail_penggajian/"+data+"')?>'><i class='fas fa-eye'></i></a>";
                        return html;
                    }
                }
            ]
        });

    });
    </script>
    <!-- End Supir -->


<script> //script datatables Invoice
    $(document).ready(function() {
        var table = null;
        table = $('#Table-Invoice').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": "<?php echo base_url('index.php/home/view_Invoice') ?>",
                "type": "POST",
                
            },
            "deferRender": true,
            "aLengthMenu": [
                [5, 10, 30, 50, 100],
                [5, 10, 30, 50, 100]
            ],
            "columns": [
                {
                    "data": "invoice_kode",
                    className: 'text-center'
                },
                {
                    "data": "jo_id",
                    className: 'text-center'
                },
                {
                    "data": "customer_id",
                    className: 'text-center'
                },
                {
                    "data": "tanggal_invoice",
                    className: 'text-center'
                },
                {
                    "data": "batas_pembayaran",
                    className: 'text-center'
                },
                {
                    "data": "grand_total"
                },
                {
                    "data": "Customer_id",
                    className: 'text-center',
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
    <!-- End Invoice -->


</body>

</html>