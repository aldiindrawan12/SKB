<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sumber Karya Berkah</title>
    <!-- Custom styles for this template-->
    <style>
        table,th,td{
            border: 1px solid black;
            text-align:center;
        }
        .judul{
            text-align:center;
            font-size:24px;
        }
        .tanggal{
            font-size:18px;
        }
    </style>
</head>
<body>
    <div class="judul">
        <span>Data Laporan Job Order</span>
        <hr>
    </div>
    <div class="tanggal">
        <span>Tanggal : <?=$tanggal?></span>
    </div>
    <div>
                <table  id="" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No JO</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Muatan</th>
                            <th scope="col">Asal</th>
                            <th scope="col">Tujuan</th>
                            <th scope="col">Tgl Muat</th>
                            <th scope="col">Tgl Bongkar</th>
                            <th scope="col">Uang Jalan</th>
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
</body>
</html>