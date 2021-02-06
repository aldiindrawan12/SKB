    <div class="" id="report-table">
        <table class="table table-bordered">
            <thead class="">
                <tr class="text-uppercase">
                    <th class="text-center">ID Supir</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Kasbon</th>
                    <th class="text-center">Link</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($supir as $value) {?>
                    <tr>
                        <td>
                            <span class=""><?php echo $value["kode_supir"] ?></span>
                        </td>
                        <td class="text-center">
                            <span class=""><?php echo $value["nama_supir"] ?></span>
                        </td>
                        <td class="text-center">

                            <!-- <?php if($value["status_supir"]=="Jalan"){ ?>
                                <button class='btn-sm btn-block btn-success' data-toggle='modal' data-target='#modal-block-large-status-supir' href='' id="<?php echo $value["kode_supir"] ?>" onclick='datasupir(this)'>
                                    <i class='fa fa-fw fa-check'></i><?php echo $value["status_supir"] ?>
                                </button>
                            <?php }else{ ?>
                                <button class='btn-sm btn-block btn-danger' data-toggle='modal' data-target='#modal-block-large-status-supir' href='' id="<?php echo $value["kode_supir"] ?>" onclick='datasupir(this)'>
                                    <i class='fa fa-fw fa-check'></i><?php echo $value["status_supir"] ?>
                                </button>
                            <?php } ?> -->

                            <span class=""><?php echo $value["status_supir"] ?></span>
                        </td>
                        <td class="text-center">
                            <button class='btn-sm btn-block' data-bs-toggle='modal' data-bs-target='#modal-block-large-kasbon-supir' href='' id="<?php echo $value["kode_supir"] ?>" onclick='datasupirkasbon(this)'>
                               <?php echo $value["kasbon_supir"] ?>
                            </button>
                        </td>
                        <td class="text-center">
                            <span class=""><a href="<?php echo base_url('index.php/home/detailsupir/').$value["kode_supir"] ?>">Detail</a></span>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
    <!-- pop up status supir -->
    <!-- <div class="modal fade" id="modal-block-large-status-supir" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Update Status Supir</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm mt-3 text-justify ">
                        <h4>Pilih Status Supir</h4>
                        <form action="<?php echo base_url('index.php/home/updatestatussupir/') ?>" method="POST" id="status_supir">
                            <input type="text" name="kode_supir" id="kode_supir" hidden>
                            <div class="form-group">
                                <label for="status_supir">Status Supir</label>
                                <select name="status_supir" id="status_supir" class="form-control" require>
                                    <option class="font-w700" disabled="disabled" selected value="">Status Supir</option>
                                    <option value="Jalan">Jalan</option>
                                    <option value="Tidak Jalan">Tidak Jalan</option>
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
    </div> -->
    <!-- akhir pop up update status supir -->
    <!-- pop up kasbon supir -->
    <div class="modal fade" id="modal-block-large-kasbon-supir" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="block-title">Kasbon Supir</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-content font-size-sm mt-3 text-justify">
                        <form action="<?php echo base_url('index.php/home/kasbonsupir/') ?>" method="POST" id="kasbon_supir">
                            <input type="text" name="kode_supir_kasbon" id="kode_supir_kasbon" hidden>
                            <div class="">
                                <label for="kasbon_supir">Jumlah Kasbon</label>
                                <input autocomplete="off" type="number" class="form-control" name="kasbon_supir" id="kasbon_supir" placeholder="Jumlah Kasbon" required>
                            </div>
                            <div class="">
                                <label for="transaksi_supir">Jenis Transaksi</label>
                                <select name="transaksi_supir" id="transaksi_supir" class="form-select" require>
                                    <option class="" disabled="disabled" selected value="">Jenis Transaksi</option>
                                    <option value="Kasbon">Kasbon</option>
                                    <option value="Bayar Kasbon">Bayar Kasbon</option>
                                </select>
                            </div>
                            <div class="">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" name="keterangan" id="keterangan" rows="3"></textarea>
                            </div>
                            <div style="float:right;margin-bottom:3%">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <!-- akhir pop up kasbon supir -->

    <script>
        // function datasupir(a){
        //     // alert(a.id);
        //     $('#kode_supir').val(a.id); //set value
        // }
        function datasupirkasbon(a){
            // alert(a.id);
            $('#kode_supir_kasbon').val(a.id); //set value
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>