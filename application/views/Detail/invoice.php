<!-- Basic Card Example -->
<div class="card shadow mb-4 ml-5 mr-5 py-2 px-2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Detail Invoice</h6>
    </div>
    <div class="card-body">
            <div class="container small">
                <div class="py-3">
                    <h6 class="m-0 font-weight-bold text-center">Invoice</h6>
                </div>
                <div class="card-body">
                    <a class="btn btn-primary" onclick="cetak_invoice()"><span class="small">Cetak Invoice</span></a>
                    <?php if($invoice["status_bayar"] == "Belum Lunas"){?>
                        <a class="btn btn-warning" data-toggle="modal" data-target="#popup-konfirmasi-status" href="" id="<?= $invoice["invoice_kode"]?>" onclick="update_status(this)"><span class="small">Tandai Lunas</span></a>
                    <?php }?>
                    <table class="w-50 mt-4">
                        <tbody>
                            <tr>
                                <td width="35%">Customer</td>
                                <td width="5%">:</td>
                                <td><?= $customer["customer_name"]?></td>
                            </tr>
                            <tr>
                                <td width="35%">Invoice No</td>
                                <td width="5%">:</td>
                                <td><?= $invoice["invoice_kode"]?></td>
                            </tr>
                            <tr>
                                <td width="35%">Tanggal</td>
                                <td width="5%">:</td>
                                <td><?= $invoice["tanggal_invoice"]?></td>
                            </tr>
                            <tr>
                                <td width="35%">Batas Pembayaran</td>
                                <td width="5%">:</td>
                                <td><?= $invoice["batas_pembayaran"]?></td>
                            </tr>
                            <tr>
                                <td width="35%">Status Pembayaran</td>
                                <td width="5%">:</td>
                                <td >
                                    <?php if($invoice["status_bayar"] == "Belum Lunas"){?>
                                        <span class="text-danger"><?= $invoice["status_bayar"]?></span>
                                    <?php }else{?>
                                        <span class="text-success"><?= $invoice["status_bayar"]?></span>
                                    <?php }?>
                                </td>
                            </tr>
                            <tr>
                                <td width="35%">Muatan</td>
                                <td width="5%">:</td>
                                <td><?= $invoice["muatan"]?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="Table-Jo" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10%" scope="col">Tgl JO</th>
                                    <th class="text-center" width="13%" scope="col">Tgl Bngkr</th>
                                    <th class="text-center" width="10%" scope="col">Mobil</th>
                                    <th class="text-center" width="10%" scope="col">Dari</th>
                                    <th class="text-center" width="10%" scope="col">Ke</th>
                                    <th class="text-center" width="8%" scope="col">Tonase</th>
                                    <th class="text-center" width="10%" scope="col">Harga/Kg</th>
                                    <th class="text-center" width="10%" scope="col">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= $invoice["tanggal_surat"]?></td>
                                    <td><?= $invoice["tanggal_bongkar"]?></td>
                                    <td><?= $invoice["mobil_no"]?></td>
                                    <td><?= $invoice["asal"]?></td>
                                    <td><?= $invoice["tujuan"]?></td>
                                    <td><?= $invoice["tonase"]?> Ton</td>
                                    <td><?= $invoice["harga/kg"]?></td>
                                    <td>Rp.<?= number_format($invoice["tonase"]*$invoice["harga/kg"]*1000,2,',','.')?></td>
                                </tr>
                                <tr>
                                    <td colspan=7>Total</td>
                                    <td>Rp.<?= number_format($invoice["tonase"]*$invoice["harga/kg"]*1000,2,',','.')?></td>
                                </tr>
                                <tr>
                                    <td colspan=7>PPN 10%</td>
                                    <td>Rp.<?= number_format(($invoice["tonase"]*$invoice["harga/kg"]*1000)*0.1,2,',','.')?></td>
                                </tr>
                                <tr>
                                    <td colspan=7>Jumlah</td>
                                    <td>Rp.<?= number_format(($invoice["tonase"]*$invoice["harga/kg"]*1000)+(($invoice["tonase"]*$invoice["harga/kg"]*1000)*0.1),2,',','.')?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end detail invoice -->

                </div>
            </div>


             <!-- pop up update status invoice -->
                <div class="modal fade mt-5 px-5 py-5" id="popup-konfirmasi-status" tabindex="-1" 
                    role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary-dark">
                                <h5 class="font-weight-bold mt-2">Konfirmasi Lunas</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="font-size-sm m-3 text-justify">
                                <p>Apakah anda ingin merubah status <b>Kode Invoice  #<span id="view-invoice-kode" ></b> </span> menjadi <b>Lunas</b> ?</p>
                                <form id="form-status-jo"  method="POST" action="<?= base_url("index.php/detail/updateinvoice")?>">
                                    <input type="text" name="invoice-kode" id="invoice-kode" hidden>
                                        <button type="submit" class="btn btn-success mb-3 mt-3 float-right">Ya, Lunas</button>
                                        <button class="btn btn-outline-danger mb-3 mr-3 mt-3 float-right" data-dismiss="modal">Batal</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end pop up update status invoice -->

<script>
    function cetak_invoice(){
        window.location.replace("<?= base_url("index.php/print_berkas/invoice/".$invoice["Jo_id"]."/invoice")?>");    
    }
    function update_status(a){
        var invoice_kode = a.id;
        $("#view-invoice-kode").text(invoice_kode);
        $("#invoice-kode").val(invoice_kode);
    }
</script>