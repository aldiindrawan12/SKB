<!-- tampilan detail penggajian supir -->
<div class="container" id="print-penggajian">
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
<!-- end tampilan detail penggajian supir -->


<div class="conatiner ml-4">
    <!-- button print daftar gaji -->
    <button onclick="print_gaji()" class="btn btn-primary">Cetak Bukti Upah</button>
    <!-- end button print daftar gaji -->

    <!-- button print memo tunai -->
    <button onclick="print_memo_tunai(),update_upah()" class="btn btn-primary">Cetak Memo Tunai</button>
    <!-- end button print memo tunai -->
</div>

<!-- form rekening supir -->
<div class="container mt-5 row">
        <div class="form-group col-md-6">
            <label for="Bank" class="form-label">Bank</label>
            <input autocomplete="off" type="text" class="form-control" id="Bank" name="Bank" required>
            <label for="AN" class="form-label">A.N.</label>
            <input autocomplete="off" type="text" class="form-control" id="AN" name="AN" required>
            <label for="Norek" class="form-label">No Rek</label>
            <input autocomplete="off" type="text" class="form-control" id="Norek" name="Norek" required>
        </div>
        <div class="col-md-5 form-group">
            <label for="Keterangan" class="form-label">Keterangan</label>
            <textarea class="form-control" name="Keterangan" id="Keterangan" rows="3"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary mb-3" onclick="print_memo_tf(),update_upah()" type="reset">Cetak Memo Transfer</button>
        </div>
</div>
<!-- end form rekening supir -->

<!-- memo transfer -->
<div class="container" id="print-memo-tf" style="display:none">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-center">Memo Transfer</h6>
        </div>
        <div class="card-body row">
            <div class="col-md-5">
                <table>
                    <tbody>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td><?= date("Y-m-d")?></td>
                        </tr>
                        <tr>
                            <td>Bank</td>
                            <td>:</td>
                            <td id="isi_bank">ISI BANK</td>
                        </tr>
                        <tr>
                            <td>Rekening</td>
                            <td>:</td>
                            <td id="isi_rek">ISI REK</td>
                        </tr>
                        <tr>
                            <td>A.N.</td>
                            <td>:</td>
                            <td id="isi_an">NAMA REKENING</td>
                        </tr>
                        <tr>
                            <td>Nominal</td>
                            <td>:</td>
                            <td>Rp. <span id="upah_print"><?= number_format($upah-$supir["supir_kasbon"],2,",",".")?></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-5">
                <table>
                    <tbody>
                        <tr>
                            <td>Keterangan : </td>
                        </tr>
                        <tr>
                            <td id="isi_ket"></td>
                        </tr>
                        <tr>
                            <td style="height:100px">(<?= $supir["supir_name"]?>)</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <table class="w-100 mt-5">
                <tbody>
                    <tr class="text-center">
                        <td width="30%">Mengetahui,</td>
                        <td width="30%">Menyetujui,</td>
                        <td width="30%" >Kasir</td>
                    </tr>
                    <tr class="text-center" style="height:200px">
                        <td width="30%">(.................)</td>
                        <td width="30%">(.................)</td>
                        <td width="30%" >(.................)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end memo transfer -->

<!-- memo tunai -->
<div class="container w-50" id="print-memo-tunai" style="display:none">
    <div class="body-card text-center">
        <span class="h3">Memo Tunai</span>
        <hr>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="" id="" width="100%" cellspacing="0">
                <tbody>
                    <tr>
                        <td colspan=3>Bandar Lampung,<?= date("Y-m-d")?></td>
                    </tr>
                    <tr>
                        <td width="30%">Telah Terima Dari</td>
                        <td width="5%">:</td>
                        <td>Sumber Berkah Jaya</td>
                    </tr>
                    <tr>
                        <td width="30%">Sebesar</td>
                        <td width="5%">:</td>
                        <td>Rp.<?= number_format($upah-$supir["supir_kasbon"],2,',','.')?></td>
                    </tr>
                    <tr>
                        <td width="30%">Untuk</td>
                        <td width="5%">:</td>
                        <td>Pembayaran Gaji/Upah tunai</td>
                    </tr>
                    <tr>
                        <td colspan=3><hr></td>
                    </tr>
                </tbody>
            </table>
            <table width="100%">
                <tbody>
                    <tr class="text-center">
                        <td width="25%">Mengetahui,</td>
                        <td width="25%">Menyetujui,</td>
                        <td width="25%">Kasir,</td>
                        <td width="25%" >Supir</td>
                    </tr>
                    <tr class="text-center" style="height:200px">
                        <td width="25%">(...............)</td>
                        <td width="25%">(...............)</td>
                        <td width="25%">(...............)</td>
                        <td width="25%">(<?= $supir["supir_name"]?>)</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- end memo tunai -->

<script>
    function print_gaji(){
        var restore = document.body.innerHTML;
        var print = document.getElementById('print-penggajian').innerHTML;
        // alert(print);
        document.body.innerHTML = print;
        window.print();
        document.body.innerHTML = restore;
    }

    function print_memo_tunai(){
        var restore = document.body.innerHTML;
        var print = document.getElementById('print-memo-tunai').innerHTML;
        // alert(print);
        document.body.innerHTML = print;
        window.print();
        document.body.innerHTML = restore;
    }

    function print_memo_tf(){
        $('#isi_bank').text($('#Bank').val());
        $('#isi_rek').text($('#Norek').val());
        $('#isi_an').text($('#AN').val());
        $('#isi_ket').text($('#Keterangan').val());
        var restore = document.body.innerHTML;
        var print = document.getElementById('print-memo-tf').innerHTML;
        // alert(print);
        document.body.innerHTML = print;
        window.print();
        document.body.innerHTML = restore;
    }

    function update_upah(){
        var data_jo_id = [];
        <?php for($i=0;$i<count($data_jo_id);$i++){?>
            data_jo_id.push(<?= $data_jo_id[$i]?>)
        <?php }?>
        // alert('<?= $supir["supir_id"]."==".$upah?>'+'=='+'<?= $supir["supir_kasbon"]?>');
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('index.php/detail/update_upah') ?>",
            dataType: "text",
            data: {
                upah:<?= $upah?>,
                supir_id:<?= $supir["supir_id"]?>,
                supir_kasbon:<?= $supir["supir_kasbon"]?>,
                jo_id:data_jo_id
            },
            success: function(data) {
                // $('#Terbilang').val(data);
                alert(data);
            }
        });
    }
</script>