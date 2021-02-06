    <div class="" id="invoice-table">
        <table class="table table-bordered">
            <thead class="">
                <tr class="text-uppercase">
                    <th class="text-center" >ID Invoice</th>
                    <th class="text-center" >Nama Pengirim</th>
                    <th class="text-center" >Nama Penerima</th>
                    <th class="text-center" >Nama Barang</th>
                    <th class="text-center" >Status</th>
                    <th class="text-center" >Supir dan Mobil</th>
                    <th class="text-center" >Link</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoice as $value) {?>
                    <tr>
                        <td class="text-center">
                            <span class=""><?php echo $value["invoice_kode"] ?></span>
                        </td>
                        <td class="text-center">
                            <span class=""><?php echo $value["nama_pengirim"] ?></span>
                        </td>
                        <td class="text-center">
                            <span class=""><?php  echo $value["nama_penerima"]?></span>
                        </td>
                        <td class="text-center">
                            <span class=""><?php  echo $value["nama_barang"]?></span>
                        </td>
                        <td class="text-center">
                            <?php if($value["status"]=="Dalam Pengiriman"){ ?>
                                <button class='btn-sm btn-block btn-warning' data-bs-toggle='modal' data-bs-target='#modal-block-large-status-invoice' href='' id="<?php echo $value["invoice_kode"] ?>" onclick='datainvoice(this)'>
                                    <?php echo $value["status"] ?>
                                </button>
                            <?php }else{ ?>
                                <button class='btn-sm btn-block btn-success' href=''>
                                    <?php echo $value["status"] ?>
                                </button>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <?php if($value["mobil_pengiriman"]  == 0){?>
                                <button class='btn-sm btn-block' data-bs-toggle='modal' data-bs-target='#modal-block-large-pengiriman' href='' id="<?php  echo $value["invoice_kode"]?>" onclick='datapengirim(this)'>
                                    BELUM ADA
                                </button>
                            <?php }else{?>
                            <!-- <?php //}else if($value["status"]=="Dalam Pengiriman"){?>
                                <button class='btn-sm btn-block' data-toggle='modal' data-target='#modal-block-large-pengiriman' href='' id="<?php  echo $value["invoice_kode"]?>"
                                    onclick="datapengirim(this,<?=$value['supir_pengiriman']?>,<?=$value['mobil_pengiriman']?>)">
                                    <?php  echo $supir[$value["supir_pengiriman"]-1]["nama_supir"]?> || <?php  echo $mobil[$value["mobil_pengiriman"]-1]["no_mobil"]?>
                                </button>
                            <?php //}else{?> -->
                                <button class='btn-sm btn-block' href="">
                                    <?php  echo $supir[$value["supir_pengiriman"]-1]["nama_supir"]?> || <?php  echo $mobil[$value["mobil_pengiriman"]-1]["no_mobil"]?>
                                </button>
                            <?php }?>
                        </td>
                        <td class="text-center">
                            <span class="">
                                <a id="<?php echo $value["invoice_kode"]?>" class="btn btn-primary px-4 py-2" class="p-2 bg-primary text-white text-decoration-none tiket" data-bs-toggle="modal" data-bs-target="#modal-block-large-detail" href="" onclick="datainvoice(this)">
                                    Detail
                                </a>
                            </span>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
    <!-- pop up detail invoice -->
    <div class="modal fade" id="modal-block-large-detail" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-primary-dark">
                        <h3 class="block-title">DETAIL TIKET</h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-content font-size-sm mt-3 text-justify ">
                        <h4 id="kode_invoice">KODE TIKET</h4>
                    </div>
                    <h4 id="pengirim">KODE TIKET</h4>
                    <h4 id="penerima">KODE TIKET</h4>
                    <h4 id="barang">KODE TIKET</h4>
            </div>
        </div>
    </div>
    <!-- akhir pop up detail invoice -->
    <!-- pop up status invoice -->
    <div class="modal fade" id="modal-block-large-status-invoice" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-primary-dark">
                        <h3 class="block-title">Status Sampai Tujuan</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-content font-size-sm mt-3 text-justify ">
                        <h4>Apakah Invoice Sudah Sampai Tujuan ?</h4>
                        <form action="<?php echo base_url('index.php/home/updatestatusinvoice/') ?>" method="POST" id="status_supir">
                            <input type="text" name="kode_invoice_status" id="kode_invoice_status" hidden>
                            <!-- <div class="form-group">
                                <label for="status">Status Invoice</label>
                                <select name="status" id="status" class="form-control" require>
                                    <option class="font-w700" disabled="disabled" selected value="">Status Invoice</option>
                                    <option value="Dalam Pengiriman">Dalam Pengiriman</option>
                                    <option value="Sampai Tujuan">Sampai Tujuan</option>
                                </select>
                            </div> -->
                            <div style="float:right;margin-bottom:3%">
                                <button type="submit" class="btn btn-primary">YA,SUDAH SAMPAI</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <!-- akhir pop up update status invoice -->
    <!-- pop up status supuir dan mobil -->
    <div class="modal fade" id="modal-block-large-pengiriman" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header bg-primary-dark">
                        <h3 class="block-title">TENTUKAN DATA PENGIRIMAN</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-content font-size-sm mt-3 text-justify ">
                        <h4>Pilih SUPIR dan MOBIL</h4>
                        <form id="form_pengiriman"  method="POST" id="status_supir">
                            <input type="text" name="kode_invoice_pengiriman" id="kode_invoice_pengiriman" hidden>
                            <div class="form-group">
                                <label for="kode_supir">Supir Pengiriman</label>
                                <select name="kode_supir" id="kode_supir" class="form-select custom-select" required>
                                    <option class="font-w700" id="nama_supir_set" selected value="0">Supir Pengiriman</option>
                                    <?php foreach($supir_kosong as $value){?>
                                        <option value=<?php echo $value["kode_supir"]?>><?php echo $value["nama_supir"]?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kode_mobil">No Polisi Mobil Pengiriman</label>
                                <select name="kode_mobil" id="kode_mobil" class="form-select custom-select" required>
                                    <option class="font-w700" id="kode_mobil_set" selected value="0">No Polisi</option>
                                    <?php foreach($mobil_kosong as $value){?>
                                        <option value=<?php echo $value["kode_mobil"]?>><?php echo $value["no_mobil"]?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div style="float:right;margin-bottom:3%">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <!-- akhir pop up update status supuir dan mobil -->
    <script>
            function datainvoice(a){
                // alert(a.id);
                id_invoice = a.id;
                $('#kode_invoice_status').val(id_invoice); //set value
                $.ajax({ //ajax ambil data pelanggan
                    type: "GET",
                    url: "<?php echo base_url('index.php/home/getdetailinvoice') ?>",
                    dataType: "JSON",
                    data: {
                        id: id_invoice
                    },
                    success: function(data) { //jika ambil data sukses
                        $('#kode_invoice').text(id_invoice); //set value
                        $('#pengirim').text(data["nama_pengirim"]); //set value
                        $('#penerima').text(data["nama_penerima"]); //set value
                        $('#barang').text(data["nama_barang"]); //set value
                    }
                });
            }
            function datapengirim(a,supir,mobil){
                id_invoice = a.id;
                $('#kode_invoice_pengiriman').val(id_invoice);
                $('#form_pengiriman').attr('action','<?php echo base_url("index.php/home/updatepengiriman/")?>'+supir+'/'+mobil);
                $.ajax({ //ajax ambil data pelanggan
                    type: "GET",
                    url: "<?php echo base_url('index.php/home/getdetailsupir') ?>",
                    dataType: "JSON",
                    data: {
                        id: supir
                    },
                    success: function(data) { //jika ambil data sukses
                        $('#nama_supir_set').text(data["nama_supir"]); //set value
                        $('#nama_supir_set').val(supir); //set value
                    }
                });
                $.ajax({ //ajax ambil data pelanggan
                    type: "GET",
                    url: "<?php echo base_url('index.php/home/getdetailmobil') ?>",
                    dataType: "JSON",
                    data: {
                        id: mobil
                    },
                    success: function(data) { //jika ambil data sukses
                        $('#kode_mobil_set').text(data["no_mobil"]); //set value
                        $('#kode_mobil_set').val(mobil); //set value
                    }
                });
            }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>