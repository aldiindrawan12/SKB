<div class="container">
    
    <div class="card shadow mb-4">
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
                <!-- <tr>
                    <td width="25%">Bulan</td>
                    <td width="5%">:</td>
                    <td>
                        <select name="Bulan" id="Bulan" class="form-control selectpicker" data-live-search="true" required>
                            <option class="font-w700" selected value="All">Semua</option>
                        <?php 
                            $bulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
                            for($i=0;$i<count($bulan);$i++){
                                echo "<option value='".($i+1)."'>".$bulan[$i]."</option>";
                            }
                        ?>
                        </select>
                    </td>
                </tr> -->
            </tbody>
        </table>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="Table-Penggajian" width="100%" cellspacing="0">
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
                foreach($jo as $value){ 
                    $uang_jalan += $value["uang_jalan"];
                    $upah += $value["upah"];
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
                        <td colspan=6>Jumlah</td>
                        <td>Rp.<?= number_format($uang_jalan,2,',','.')?></td>
                        <td></td>
                        <td>Rp.<?= number_format($upah,2,',','.')?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>