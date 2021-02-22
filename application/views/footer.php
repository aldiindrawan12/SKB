        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; 2021 PT.Sumber Karya Berkah</span>
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
                    <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">X</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="#">Log Out</a>
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
    
    <!-- kendaraan -->
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
                        "data": "mobil_max_load",
                        className: 'text-center'
                    },
                    {
                        "data": "mobil_no",
                        className: 'text-center font-weight-bold',
                        "orderable": false,
                        render: function(data, type, row) {
                            let html ="<a class='btn btn-light btn-delete-truck' href='javascript:void(0)' data-pk='"+data+"'><i class='fas fa-trash-alt'></i></a>";
                            return html;
                        }
                    }
                ],
                drawCallback: function() {
                    $('.btn-delete-truck').click(function() {
                        let pk = $(this).data('pk');
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url('index.php/form/deletetruck') ?>",
                            dataType: "text",
                            data: {
                                id: pk
                            },
                            success: function(data) {
                                location.reload();
                            }
                        });
                    });
                }
            });
        });
    </script>
    <!-- end kendaraan -->

    <!-- JO -->
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
                        data.status_JO = $('#status-JO').val();
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
                $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
                $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            });
            $("#Bulan").change(function() {
                // alert($('#Bulan').val());   
                table.ajax.reload();
                $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
                $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            });
            $("#Tahun").change(function() {
                // alert($('#Tahun').val());   
                table.ajax.reload();
                $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
                $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            });
            $("#status-JO").change(function() {
                // alert($("#status-JO").val())
                table.ajax.reload();
                $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
                $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            });
        });
    </script>
    <!-- end JO -->

    <!-- bon -->
    <script> //script datatables bon
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
                        "data": "bon_nominal",
                        render: function(data, type, row) {
                            let html = 'Rp.'+rupiah(data);
                            return html;
                        }
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
    <!-- end bon -->

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
                        "data": "customer_id",
                        className: 'text-center',
                        "orderable": false,
                        render: function(data, type, row) {
                            let html = "<a class='btn btn-light' href='<?= base_url('index.php/detail/detail_customer/"+data+"')?>'><i class='fas fa-eye'></i></a>";
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
                        "data": "supir_kasbon",
                        render: function(data, type, row) {
                            let html = 'Rp.'+rupiah(data);
                            return html;
                        }
                    },
                    {
                        "data": "status_jalan",
                        className: 'text-center',
                        "orderable": false,
                            render: function(data, type, row) {
                                if (data == "Jalan") {
                                    let html = "<span class='btn-sm btn-block btn-success'><i class='fa fa-fw fa-check mr-2'></i>" + data + "</span>";
                                    return html;
                                } else {
                                    let html = "<span class='btn-sm btn-block btn-warning'><i class='fa fa-fw fa-exclamation-circle mr-2'></i>" + data + "</span>";
                                    return html;
                                }
                            }

                    },
                    {
                        "data": "supir_id",
                        className: 'text-center font-weight-bold',
                        "orderable": false,
                        render: function(data, type, row) {
                            let html = "<a class='btn btn-light' href='<?= base_url('index.php/detail/detail_penggajian/"+data+"')?>'><i class='fas fa-eye'></i></a> || "+
                            "<a class='btn btn-light btn-update-supir' data-toggle='modal' data-target='#popup-update-supir' href='javascript:void(0)' data-pk="+data+"><i class='fas fa-pen-square'></i></a> || "+
                            "<a class='btn btn-light btn-delete-supir' href='javascript:void(0)' data-pk="+data+"><i class='fas fa-trash-alt'></i></a>";
                            return html;
                        }
                    }
                ],
                drawCallback: function() {
                    $('.btn-update-supir').click(function() {
                        let pk = $(this).data('pk');
                        $("#supir_id").val(pk);
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url('index.php/form/getsupirname') ?>",
                            dataType: "text",
                            data: {
                                id: pk
                            },
                            success: function(data) {
                                $("#supir_name").val(data);
                            }
                        });
                    });
                    $('.btn-delete-supir').click(function() {
                        let pk = $(this).data('pk');
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url('index.php/form/deletesupir') ?>",
                            dataType: "text",
                            data: {
                                id: pk
                            },
                            success: function(data) {
                                location.reload();
                            }
                        });
                    });
                }
            });
        });
    </script>
    <!-- End Supir -->

    <!-- invoice -->
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
                    'data': function(data) {
                        data.status_bayar = $('#status-invoice').val();
                    }
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
                        "data": "customer_name"
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
                        "data": "status_bayar",
                        className: 'text-center',
                        render: function(data, type, row) {
                            if (data == "Belum Lunas") {
                                    let html = "<span class='btn-sm btn-block btn-danger'></i>" + data + "</span>";
                                    return html;
                                } else {
                                    let html = "<span class='btn-sm btn-block btn-success'>" + data + "</span>";
                                    return html;
                                }
                        }
                    },
                    {
                        "data": "grand_total",
                        render: function(data, type, row) {
                            let html = 'Rp.'+rupiah(data);
                            return html;
                        }
                    },
                    {
                        "data": "invoice_kode",
                        className: 'text-center',
                        "orderable": false,
                        render: function(data, type, row) {
                            let html = "<a class='btn btn-light' href='<?= base_url('index.php/detail/detail_invoice/"+data+"')?>'><i class='fas fa-eye'></i></a>";
                            return html;
                        }
                    }
                ]
            });
            $("#status-invoice").change(function() {
                table.ajax.reload();
            });
        });
    </script>
    <!-- End Invoice -->

    <!-- JO Sampai-->
    <script> //script datatables job order
        $(document).ready(function() {
            var table = null;
            table = $('#Table-Job-Order-Sampai').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "order": [
                    [0, 'asc']
                ],
                "ajax": {
                    "url": "<?php echo base_url('index.php/detail/view_JO_Sampai/') ?>",
                    "type": "POST",
                    'data': function(data) {
                        // data.tanggal = $('#Tanggal').val();
                        // data.bulan = $('#Bulan').val();
                        // data.tahun = $('#Tahun').val();
                        data.customer_id = $('#customer-id').val();
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
            // $("#Tanggal").change(function() {
            //     // alert($('#Tanggal').val());   
            //     table.ajax.reload();
            //     $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            //     $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            // });
            // $("#Bulan").change(function() {
            //     // alert($('#Bulan').val());   
            //     table.ajax.reload();
            //     $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            //     $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            // });
            // $("#Tahun").change(function() {
            //     // alert($('#Tahun').val());   
            //     table.ajax.reload();
            //     $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            //     $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            // });
            // $("#status-JO").change(function() {
            //     // alert($("#status-JO").val())
            //     table.ajax.reload();
            //     $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            //     $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            // });
        });
    </script>
    <!-- end JO Sampai-->

    <!-- JO Perjalanan-->
    <script> //script datatables job order
        $(document).ready(function() {
            var table = null;
            table = $('#Table-Job-Order-Perjalanan').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "order": [
                    [0, 'asc']
                ],
                "ajax": {
                    "url": "<?php echo base_url('index.php/detail/view_JO_Perjalanan/') ?>",
                    "type": "POST",
                    'data': function(data) {
                        // data.tanggal = $('#Tanggal').val();
                        // data.bulan = $('#Bulan').val();
                        // data.tahun = $('#Tahun').val();
                        data.customer_id = $('#customer-id').val();
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
            // $("#Tanggal").change(function() {
            //     // alert($('#Tanggal').val());   
            //     table.ajax.reload();
            //     $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            //     $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            // });
            // $("#Bulan").change(function() {
            //     // alert($('#Bulan').val());   
            //     table.ajax.reload();
            //     $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            //     $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            // });
            // $("#Tahun").change(function() {
            //     // alert($('#Tahun').val());   
            //     table.ajax.reload();
            //     $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            //     $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            // });
            // $("#status-JO").change(function() {
            //     // alert($("#status-JO").val())
            //     table.ajax.reload();
            //     $('#link_cetaklaporanpdf').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanpdf/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            //     $('#link_cetaklaporanexcel').attr('href','<?=base_url("index.php/print_berkas/cetaklaporanexcel/")?>'+$('#Tanggal').val()+'/'+$('#Bulan').val()+'/'+$('#Tahun').val()+'/'+$('#status-JO').val());
            // });
        });
    </script>
    <!-- end JO Perjalanan-->

    <!-- scrip angka rupiah -->
    <script>
            function rupiah(uang){
            var bilangan = uang;
            var	number_string = bilangan.toString(),
                sisa 	= number_string.length % 3,
                rupiah 	= number_string.substr(0, sisa),
                ribuan 	= number_string.substr(sisa).match(/\d{3}/g);
                    
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            // alert(rupiah);
            return rupiah;
        }
    </script>
    <!-- end script angka rupiah -->

     <!-- Akun -->
     <script> //script datatables customer
        $(document).ready(function() {
            var table = null;
            table = $('#Table-Akun').DataTable({
                "processing": true,
                "serverSide": true,
                "ordering": true,
                "order": [
                    [0, 'asc']
                ],
                "ajax": {
                    "url": "<?php echo base_url('index.php/home/view_akun/') ?>",
                    "type": "POST",
                    
                },
                "deferRender": true,
                "aLengthMenu": [
                    [5, 10, 30, 50, 100],
                    [5, 10, 30, 50, 100]
                ],
                "columns": [
                    {
                        "data": "akun_id",
                        className: 'text-center'
                    },
                    {
                        "data": "akun_name"
                    },
                    {
                        "data": "akun_role",
                        className: 'text-center',
                        "orderable": true,
                        render: function(data, type, row) {
                            if (data == "Super User") {
                                    let html = "<span class='btn-sm btn-block btn-dark'></i>" + data + "</span>";
                                    return html;
                                } else {
                                    let html = "<span class='btn-sm btn-block btn-light'>" + data + "</span>";
                                    return html;
                                }
                        }
                    }
                ]
            });
        });
    </script>
    <!-- end Akun --> 


    
</body>

</html>