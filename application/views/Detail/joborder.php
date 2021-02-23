<!-- Basic Card Example -->
<div class="card shadow mb-4 ml-5 mr-5 py-2 px-2">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Job Order</h6>
                                </div>
                                <div class="card-body">
                                    <!-- tampilan detail jo -->
                    <div class="container" id="detail-jo">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td class="d-none d-sm-table-cell text-center " rowspan="15" style="width: 15%;">
                                        <p class="font-weight-bold">Customer</p>
                                        <p class="font-size-sm "><?= $customer["customer_name"] ?></p>
                                        <hr>
                                        <p class="font-weight-bold">ID JO</p>
                                        <p class="font-size-sm "><?= $jo["Jo_id"] ?></p>
                                    </td>
                                    <td class="font-weight-bold mt-2" style="width: 20%;">Muatan</td>
                                    <td colspan=3 width="70%"><?= $jo["muatan"]?> </td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" style="width: 20%;">Asal-Tujuan</td>
                                    <td colspan=3><?= $jo["asal"]."--".$jo["tujuan"] ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" style="width: 20%;">Tanggal Berangkat</td>
                                    <td colspan=3><?= $jo["tanggal_surat"] ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" style="width: 20%;">Tanggal Bongkar</td>
                                    <td colspan=3><?= $jo["tanggal_bongkar"] ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" style="width: 20%;">Status</td>
                                    <td colspan=3><?= $jo["status"] ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" style="width: 20%;">Supir</td>
                                    <td colspan=3><?= $supir["supir_name"] ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" style="width: 20%;">Kendaraan</td>
                                    <td colspan=3><?= $mobil["mobil_no"]." == ".$mobil["mobil_jenis"] ?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold " style="width: 20%;">Uang Jalan</td>
                                    <td colspan=3><p>Rp.<?= number_format($jo["uang_jalan"],2,',','.')." (".$jo["terbilang"].")" ?></p></td>
                                </tr>
                                <tr class="text-center">
                                    <td colspan=3><strong>Detail Muatan</strong></td>
                                </tr>
                                <tr>
                                    <td>Tonase : <?= $jo["tonase"]?> Ton</td>
                                    <td>Harga : <?= $jo["harga/kg"]?> / KG</td>
                                    <td>Jumlah : Rp.<?= number_format($jo["tonase"]*$jo["harga/kg"]*1000,2,',','.')?></td>
                                </tr>
                                <tr class="text-center">
                                    <td colspan=3><strong>Upah Supir</strong></td>
                                </tr>
                                <tr>
                                    <td>Upah : Rp.<?= number_format($jo["upah"],2,',','.')?></td>
                                    <td>Berat : Rp.<?= number_format($jo["bonus"],2,',','.')?></td>
                                    <td>Jumlah : Rp.<?= number_format($jo["bonus"]+$jo["upah"],2,',','.')?></td>
                                </tr>
                                <tr>
                                    <td class="font-weight-bold" style="width: 20%;">Catatan/Keterangan</td>
                                    <td colspan=3><?= $jo["keterangan"]?></td>
                                </tr>
                                <?php if($jo["status"]=="Dalam Perjalanan"){?>
                                <tr>
                                    <td colspan=3>
                                        <button class='btn-sm btn-block btn-warning text-dark' data-toggle='modal' data-target='#popup-status-jo' href='' id="<?php echo $jo["Jo_id"] ?>" onclick="datajo(this,<?php echo $jo['supir_id'] ?>,'<?php echo $jo['mobil_no'] ?>')">
                                        Konfirmasi Sampai
                                        </button>
                                    </td>
                                </tr>
                                <?php }else{?>
                                <tr>
                                    <td colspan=3>
                                        <button class='btn-sm btn-block btn-success text-light' href='' id="" onclick="cetak_invoice()">
                                        Cetak Invoice
                                        </button>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end tampilan detail jo -->
                                </div>
                            </div>



<!-- pop up update status jo -->
<div class="modal fade" id="popup-status-jo" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-dark">
                <h5 class="block-title">KONFIRMASI JOB ORDER</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="font-size-sm m-3 text-justify">
                <p>Isi Data Dengan Lengkap</p>
                <form id="form-status-jo"  method="POST" id="status_supir">
                    <input type="text" name="jo_id" id="jo_id" hidden>
                    <div class="mb-3 row">
                        <label for="tonase" class="col-sm-5 col-form-label">Tonase akhir (Ton)</label>
                        <div class="col-sm-6">
                            <input autocomplete="off" class="form-control" type="number" name="tonase" id="tonase" required>    
                        </div>
                    </div>
                     <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label" for="harga">Harga/kg</label>
                        <div class="col-sm-6">
                            <input autocomplete="off" class="form-control" type="number" name="harga" id="harga" required>
                        </div>
                    </div>
                     <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label" for="upah">Upah Supir</label>
                        <div class="col-sm-6">
                            <input autocomplete="off" class="form-control" type="number" name="upah" id="upah" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label" for="bonus">Bonus Supir</label>
                        <div class="col-sm-6">
                            <input autocomplete="off" class="form-control" type="number" name="bonus" id="bonus" required>
                        </div>
                    </div>
                     <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label" for="Keterangan" class="form-label">Keterangan/Catatan Tambahan</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" name="Keterangan" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label" for="TOD">Batas Waktu Pembayaran Invoice (hari)</label>
                        <div class="col-sm-6">
                            <input autocomplete="off" class="form-control" type="number" name="TOD" id="TOD" required>
                        </div>
                    </div>
                    <div style="float:right;margin-bottom:3%">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end pop up update status jo -->

<script>

    function datajo(a,supir,mobil){
        jo_id = a.id;
        $('#jo_id').val(jo_id); //set value
        $('#form-status-jo').attr('action','<?php echo base_url("index.php/detail/updatestatusjo/")?>'+supir+'/'+mobil);
    }

    function cetak_invoice(){
        window.location.replace("<?= base_url("index.php/print_berkas/invoice/".$jo["Jo_id"]."/JO")?>");    
    }
</script>