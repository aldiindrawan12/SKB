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
    <div class="container w-50">
        <div class="body-card text-center">
            <span class="h3">Kwitansi Transaksi BON</span>
            <hr>
        </div>
        <div class="card-body">
                <div class="table-responsive">
                    <table class="" id="" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <td colspan=3>Bandar Lampung,<?= $data["bon_tanggal"]?></td>
                            </tr>
                            <tr>
                                <td colspan=3>#no transaksi</td>
                            </tr>
                            <tr>
                                <td colspan=3><hr></td>
                            </tr>
                            <tr>
                                <td width="30%">Telah Terima Dari</td>
                                <td width="5%">:</td>
                                <?php if($data["bon_jenis"]=="Pengajuan"){ ?>
                                    <td>Sumber Berkah Jaya</td>
                                <?php }else{ ?>
                                    <td><?= $supir["supir_name"]?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <td width="30%">Sebesar</td>
                                <td width="5%">:</td>
                                <td>Rp.<?= number_format($data["bon_nominal"],2,',','.')?></td>
                            </tr>
                            <tr>
                                <td width="30%">Jenis Transaksi</td>
                                <td width="5%">:</td>
                                <td><?= $data["bon_jenis"]?> BON</td>
                            </tr>
                            <tr>
                                <td width="30%">Keterangan</td>
                                <td width="5%">:</td>
                                <td><?= $data["bon_keterangan"]?></td>
                            </tr>
                            <tr>
                                <td colspan=3><hr></td>
                            </tr>
                        </tbody>
                    </table>
                    <table width="100%">
                        <tbody>
                            <tr class="text-center">
                                <td width="30%">Yang Menyerahkan,</td>
                                <td width="30%">Mengetahui,</td>
                                <td width="30%" >Yang Menerima</td>
                            </tr>
                            <tr class="text-center" style="height:200px">
                                <td width="30%">('''kasir''')</td>
                                <td width="30%">(bag.operasional)</td>
                                <td width="30%" >('''supir''')</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
</body>
<script>
    window.print();
</script>
</html>