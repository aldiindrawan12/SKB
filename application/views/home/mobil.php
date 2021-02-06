    <div class="" id="report-table">
        <table class="table table-bordered">
            <thead class="">
                <tr class="text-uppercase">
                    <th class="text-center">ID Mobil</th>
                    <th class="text-center">No Polisi</th>
                    <th class="text-center">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mobil as $value) {?>
                    <tr>
                        <td class="text-center">
                            <span class=""><?php echo $value["kode_mobil"] ?></span>
                        </td>
                        <td class="text-center">
                            <span class=""><?php echo $value["no_mobil"] ?></span>
                        </td>
                        <td class="text-center">

                            <!-- <?php if($value["status_mobil"]=="Jalan"){ ?>
                                <button class='btn-sm btn-block btn-success' data-toggle='modal' data-target='#modal-block-large-status-mobil' href='' id="<?php echo $value["kode_mobil"] ?>" onclick='datamobil(this)'>
                                    <i class='fa fa-fw fa-check'></i><?php echo $value["status_mobil"] ?>
                                </button>
                            <?php }else{ ?>
                                <button class='btn-sm btn-block btn-danger' data-toggle='modal' data-target='#modal-block-large-status-mobil' href='' id="<?php echo $value["kode_mobil"] ?>" onclick='datamobil(this)'>
                                    <i class='fa fa-fw fa-check'></i><?php echo $value["status_mobil"] ?>
                                </button>
                            <?php } ?> -->
                            <span class=""><?php echo $value["status_mobil"] ?></span>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    
    <!-- pop up status mobil -->
    <div class="modal fade" id="modal-block-large-status-mobil" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Update Status Mobil</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm mt-3 text-justify ">
                        <h4>Pilih Status Mobil</h4>
                        <form action="<?php echo base_url('index.php/home/updatestatusmobil/') ?>" method="POST" id="status_supir">
                            <input type="text" name="kode_mobil" id="kode_mobil" hidden>
                            <div class="form-group">
                                <label for="status_mobil">Status Mobil</label>
                                <select name="status_mobil" id="status_mobil" class="form-control" require>
                                    <option class="font-w700" disabled="disabled" selected value="">Status Mobil</option>
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
    </div>
    <!-- akhir pop up update status mobil -->
    <script>
        function datamobil(a){
            // alert(a.id);
            $('#kode_mobil').val(a.id); //set value
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>