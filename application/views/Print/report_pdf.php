<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sumber Karya Berkah</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url("assets/vendor/fontawesome-free/css/all.min.css")?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.css') ?>">
    <!-- Custom styles for this template-->
    <link href="<?=base_url("assets/css/sb-admin-2.min.css")?>" rel="stylesheet">
</head>
<body>
    <div class="body-card text-center">
        <span class="h3">Data Laporan Job Order</span>
        <hr>
    </div>
    <div class="card-body">
        <span class="h5">Tanggal : <?=$tanggal?></span>
    </div>
    <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center" width="12,5%"  scope="col">No JO</th>
                            <th class="text-center" width="12,5%" scope="col">Customer</th>
                            <th class="text-center" width="12,5%" scope="col">Muatan</th>
                            <th class="text-center" width="12,5%" scope="col">Asal</th>
                            <th class="text-center" width="12,5%" scope="col">Tujuan</th>
                            <th class="text-center" width="12,5%" scope="col">Tgl Muat</th>
                            <th class="text-center" width="12,5%" scope="col">Tgl Bongkar</th>
                            <th class="text-center" width="12,5%"  scope="col">Uang Jalan</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($jo as $value){ ?>
                        <tr>
                            <th ><?= $value["Jo_id"]?></th>
                            <th ><?= $value["customer_name"]?></th>
                            <th ><?= $value["muatan"]?></th>
                            <th ><?= $value["asal"]?></th>
                            <th ><?= $value["tujuan"]?></th>
                            <th ><?= $value["tanggal_surat"]?></th>
                            <th ><?= $value["tanggal_bongkar"]?></th>
                            <th >Rp.<?= $value["uang_jalan"]?></th>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
    </div>
</body>
</html>