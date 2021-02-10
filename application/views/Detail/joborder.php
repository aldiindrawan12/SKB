<div class="container">
    <table class="table table-bordered">
        <tbody>
            <tr>
                <td class="d-none d-sm-table-cell text-center" rowspan="11" style="width: 15%;">
                    <p>Customer</p>
                    <p class="font-size-sm "><?= $customer["customer_name"] ?></p>
                </td>
                <td class="font-weight-bold mt-2" style="width: 20%;">Muatan</td>
                <td width="70%"><?= $jo["muatan"]?> </td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 20%;">Asal-Tujuan</td>
                <td><?= $jo["asal"]."--".$jo["tujuan"] ?></td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 20%;">Tanggal Berangkat</td>
                <td><?= $jo["tanggal_surat"] ?></td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 20%;">Status</td>
                <td><?= $jo["status"] ?></td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 20%;">Supir</td>
                <td><?= $supir["supir_name"] ?></td>
            </tr>
            <tr>
                <td class="font-weight-bold" style="width: 20%;">Kendaraan</td>
                <td><?= $mobil["mobil_no"]." == ".$mobil["mobil_jenis"] ?></td>
            </tr>
            <tr>
                <td class="font-weight-bold " style="width: 20%;">Uang Jalan</td>
                <td><p><?= $jo["uang_jalan"]." (".$jo["terbilang"].")" ?></p></td>
            </tr>
            <?php if($jo["status"]=="Dalam Perjalanan"){?>
            <tr>
                <td>
                    <button class='btn-sm btn-block btn-warning text-dark' data-toggle='modal' data-target='#popup-status-jo' href='' id="<?php echo $jo["Jo_id"] ?>" onclick="datajo(this,<?php echo $jo['supir_id'] ?>,'<?php echo $jo['mobil_no'] ?>')">
                    Konfirmasi Sampai
                    </button>
                </td>
            </tr>
            <?php }else{?>
            <tr>
                <td>
                    <button class='btn-sm btn-block btn-warning text-dark' href='' id="">
                    Cetak Invoice
                    </button>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

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
                    <div style="float:right;margin-bottom:3%">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <button type="#" class="btn btn-primary">Simpan dan Cetak Invoice</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

    function datajo(a,supir,mobil){
        jo_id = a.id;
        $('#jo_id').val(jo_id); //set value
        $('#form-status-jo').attr('action','<?php echo base_url("index.php/detail/updatestatusjo/")?>'+supir+'/'+mobil);
    }
</script>