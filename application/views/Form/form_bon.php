<!-- form transaksi bon -->
<div class="container">
    <form action="<?=base_url("index.php/form/insert_bon")?>" method="POST" class="row">
        <div class="col-md-5">
            <label class="form-label" for="Supir_bon">Supir</label>
            <select name="Supir_bon" id="Supir_bon" class="form-control selectpicker" data-live-search="true" required onchange="bon_user()">
                <option class="font-w700" disabled="disabled" selected value="">Supir Pengiriman</option>
                <?php foreach($supir as $value){ ?>
                    <option value="<?=$value["supir_id"]?>"><?=$value["supir_name"]?></option>
                <?php } ?>
            </select>
            <label for="" class="form-label">Bon Terhutang Saat Ini</label>
            <input autocomplete="off" type="text" class="form-control" id="bon-saat-ini-tampilan" name="" disabled>
            <input autocomplete="off" type="text" class="form-control" id="bon-saat-ini" name="" required hidden>
            <label class="form-label" for="Jenis">Jenis Transaksi</label>
            <select name="Jenis" id="Jenis" class="form-control custom-select" required onchange="nominal()">
                <option class="font-w700" disabled="disabled" selected value="">Jenis Transaksi</option>
                <option value="Pengajuan">Pengajuan</option>
                <option value="Pembayaran">Pembayaran</option>
            </select>
            <label for="Nominal" class="form-label">Nominal</label>
            <input autocomplete="off" type="text" class="form-control" id="Nominal" name="Nominal" required onkeyup="nominal()">
        </div>
        <div class="col-md-5">
            <label for="Keterangan" class="form-label">Keterangan/Catatan</label>
            <textarea class="form-control" name="Keterangan" id="Keterangan" rows="3"></textarea>
        </div>
        <div class="col-md-3 mt-5">
            <button type="submit" class="btn btn-primary mb-3">Simpan</button>
            <button type="reset" class="btn btn-warning mb-3">Reset</button>
        </div>
    </form>
</div>
<!-- end form transaksi bon -->

<script>
    function nominal(){
        $( '#Nominal' ).mask('000.000.000', {reverse: true})
        uang = $( '#Nominal' ).val().split('.');
        uang_fix = ""
        for(i=0;i<uang.length;i++){
            uang_fix = uang_fix+uang[i];
        }
        // alert(uang_fix);
        if($("#Jenis").val()=='Pembayaran'){
            if(parseInt(uang_fix)>parseInt($("#bon-saat-ini").val())){
                alert('Jumlah Pembayaran Harus Lebuh Kecil Dari Rp.'+ rupiah($("#bon-saat-ini").val()));
                $( '#Nominal' ).val("");
            }
        }
    }
    function bon_user(){
        $.ajax({
            type: "GET",
            url: "<?php echo base_url('index.php/form/getbonsupir') ?>",
            dataType: "text",
            data:{
                id:$("#Supir_bon").val()
            },
            success: function(data) {
                $("#bon-saat-ini-tampilan").attr('placeholder','Rp.'+rupiah(data));
                $("#bon-saat-ini").val(data);
                nominal();
            }
        });
    }
</script>