<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-5">
        <h1 class="h3 mb-0 text-gray-800">Formulir Job Order</h1>
            <a href="<?=base_url("index.php/form/joborder/x")?>" class="btn btn-secondary btn-icon-split" data-toggle='modal' data-target='#popup-customer'>
            <span class="icon text-white-100">
                <i class="fas fa-plus"></i> 
            </span>
                <span class="text">
                     Tambah Customer Baru
                </span>
            </a>
    </div> 


        <!-- Card Formulir JO -->
        <div class="card shadow mb-4">
            <div class="card-header py-">
                <h6 class="m-0 font-weight-bold text-primary">Form Buat Job Order</h6>
            </div>
            <div class="card-body">
                <!-- form Job Order Baru -->
                <form action="<?=base_url("index.php/form/insert_JO")?>" method="POST" class="row">
                    <div class="col-md-6">
                    <label class="form-label font-weight-bold " for="Customer">Customer</label>
                        <select name="Customer" id="Customer" class="form-control selectpicker" data-live-search="true" required>
                            <?php if(count($customer_by_name)==0){?>
                                <option class="font-w700" disabled="disabled" selected value="">Customer</option>
                            <?php }else{?>
                                <option class="font-w700" selected value="<?=$customer_by_name["customer_id"]?>"><?=$customer_by_name["customer_name"]?></option>
                            <?php }?>
                            <?php foreach($customer as $value){?>
                                <option value="<?=$value["customer_id"]?>"><?=$value["customer_name"]?></option>
                            <?php } ?>
                        </select>
                    <label for="Muatan" class="form-label font-weight-bold">Muatan</label>
                    <input autocomplete="off" type="text" class="form-control" id="Muatan" name="Muatan" required>
                </div>

                
                <div class="col-md-4">
                    <label class="form-label font-weight-bold" for="Kendaraan">Kendaraan</label>
                    <select name="Kendaraan" id="Kendaraan" class="form-control selectpicker" data-live-search="true" required>
                        <option class="font-w700 font-weight-bold" disabled="disabled" selected value="">Kendaraan Pengiriman</option>
                        <?php foreach($mobil as $value){
                            if($value["status_jalan"]!="Jalan"){?>
                            <option value="<?=$value["mobil_no"]?>"><?=$value["mobil_no"]."  ||  ".$value["mobil_max_load"]." Ton  ||  ".$value["mobil_jenis"]?></option>
                        <?php }
                        } ?>
                    </select>
                </div>

                

                <div class="col-md-7">
                    <label class="form-label font-weight-bold" for="Asal ">Asal</label>
                    <input autocomplete="off" type="text" class="form-control" id="Asal" name="Asal" required>
                </div>
                <div class="col-md-7">
                    <label class="form-label font-weight-bold" for="Tujuan">Tujuan</label>
                    <input autocomplete="off" type="text" class="form-control" id="Tujuan" name="Tujuan" required>
                </div>
               

                
                <div class="col-md-7">
                    <label for="Uang" class="form-label font-weight-bold">Uang Jalan</label>
                    <input autocomplete="off" type="text" class="form-control" id="Uang" name="Uang" required onkeyup="terbilang()">
                </div>
                <div class="col-md-7">
                    <label for="Terbilang" class="form-label font-weight-bold">Terbilang</label>
                    <input autocomplete="off" type="text" class="form-control" id="Terbilang" name="Terbilang" required readonly>
                </div>

                <div class="col-md-7">
                    <label for="Keterangan" class="form-label font-weight-bold">Keterangan/Catatan</label>
                    <textarea class="form-control" name="Keterangan" id="Keterangan" rows="4"></textarea>
                </div>

                <div class="col-md-7 mt-5" >
                <button type="reset" class="btn btn-danger mb-3  float-md-left">Reset</button>
                <button type="submit" class="btn btn-success mb-3 ml-4 float-md-left">Simpan Dan Cetak JO</button>
                    
                   
                    
                </div>
            </form>
            <!-- end form Job Order Baru -->



                                </div>
                            </div>

    
</div>

<!-- pop up add cutomer -->
<div class="modal fade" id="popup-customer" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-dark">
                <h5 class="font-weight-bold">Menambah Customer Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="font-size-sm m-3 text-justify">
                <form action="<?= base_url("index.php/form/insert_customer")?>" method="POST">
                    <div class="form-group">
                        <label for="Customer" class="form-label">Nama Customer</label>
                        <input autocomplete="off" type="text" class="form-control" id="Customer" name="Customer" required>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-success mb-3 float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end pop up add cutomer -->

<script>
    function terbilang(){
        var uang = $('#Uang').val();
        $( '#Uang' ).mask('000.000.000', {reverse: true});
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('index.php/form/generate_terbilang_fix/') ?>"+uang,
            dataType: "text",
            success: function(data) {
                $('#Terbilang').val(data);
            }
        });
    }
</script>