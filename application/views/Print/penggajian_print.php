<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sumber Karya Berkah</title>

    <link href="<?=base_url("assets/css/sb-admin-2.min.css")?>" rel="stylesheet">
</head>
<body class="text-dark small">
    <div class="container">
        <div class="mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-center">Data Upah Supir</h6>
            </div>
            <div class="card-body">
                <table class="w-50">
                    <tbody>
                        <tr>
                            <td width="25%">Id Supir</td>
                            <td width="5%">:</td>
                            <td><?= $supir["supir_id"]?></td>
                        </tr>
                        <tr>
                            <td width="25%">Nama Supir</td>
                            <td width="5%">:</td>
                            <td><?= $supir["supir_name"]?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center" width="10%" scope="col">JO ID</th>
                                <th class="text-center" width="10%" scope="col">Tgl Keluar</th>
                                <th class="text-center" width="13%" scope="col">Tgl Bongkar</th>
                                <th class="text-center" width="10%" scope="col">Muatan</th>
                                <th class="text-center" width="10%" scope="col">Dari</th>
                                <th class="text-center" width="10%" scope="col">Ke</th>
                                <th class="text-center" width="10%" scope="col">Uang Jalan</th>
                                <th class="text-center" width="8%" scope="col">Tonase</th>
                                <th class="text-center" width="10%" scope="col">Upah</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $uang_jalan = 0;
                        $upah = 0;
                        $data_jo_id = [];
                        foreach($jo as $value){ 
                            $uang_jalan += $value["uang_jalan"];
                            $upah += $value["upah"];
                            $data_jo_id[] = $value["Jo_id"];
                            ?>
                            <tr>
                                <td><?= $value["Jo_id"]?></td>
                                <td><?= $value["tanggal_surat"]?></td>
                                <td><?= $value["tanggal_bongkar"]?></td>
                                <td><?= $value["muatan"]?></td>
                                <td><?= $value["asal"]?></td>
                                <td><?= $value["tujuan"]?></td>
                                <td>Rp.<?= number_format($value["uang_jalan"],2,',','.') ?></td>
                                <td><?= $value["tonase"]?> Ton</td>
                                <td>Rp.<?= number_format($value["upah"],2,',','.')?></td>
                            </tr>
                        <?php } ?>
                            <tr>
                                <td colspan=6>Total</td>
                                <td>Rp.<?= number_format($uang_jalan,2,',','.')?></td>
                                <td></td>
                                <td>Rp.<?= number_format($upah,2,',','.')?></td>
                            </tr>
                            <tr>
                                <td colspan=8>Total Bon Terhutang</td>
                                <td>Rp.<?= number_format($supir["supir_kasbon"],2,',','.')?></td>
                            </tr>
                            <tr>
                                <td colspan=8>Grand Total Upah</td>
                                <td>Rp.<?= number_format($upah-$supir["supir_kasbon"],2,',','.')?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    window.print();
    window.location.replace("<?= base_url("index.php/detail/detail_penggajian/".$supir["supir_id"])?>");
</script>
</html>