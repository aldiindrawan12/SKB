    <div class="container bg-light">
        <form action="<?php echo base_url('index.php/home/addtiket/')?>" method="POST" id="form-tiket">
            <div>
                <label class="form-label" for="nama_pengirim">Nama Pengirim</label>
                <input autocomplete="off" type="text" name="nama_pengirim" id="nama_pengirim" class="form-control" placeholder="Nama Pengirim" required>
            </div>
            <div>
                <label class="form-label" for="no_telvon">No HP/Telvon</label>
                <input autocomplete="off" type="number" class="form-control" name="no_telvon" id="no_telvon" placeholder="No Hp/Telvon" required>
            </div>
            <div>
                <label class="form-label" for="provinsi_pengirim">Provinsi Pengirim</label>
                <select name="provinsi_pengirim" id="provinsi_pengirim" class="form-control" required>
                    <option class="font-w700" disabled="disabled" selected value="">Provinsi Pengirim</option>
                    <option value="Sumatera Selatan">Sumatera Selatan</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Aceh">Aceh</option>
                    <option value="Aceh">Lampung</option>
                </select>
            </div>
            <div>
                <label class="form-label" for="alamat_pengirim">Alamat Pengirim</label>
                <textarea class="form-control" name="alamat_pengirim" id="alamat_pengirim" rows="3"></textarea>
            </div>
            <div>
                <label class="form-label" for="nama_penerima">Nama Penerima</label>
                <input autocomplete="off" type="text" name="nama_penerima" id="nama_penerima" class="form-control" placeholder="Nama Pengirim" required>
            </div>
            <div>
                <label class="form-label" for="no_telvon_penerima">No HP/Telvon Penerima</label>
                <input autocomplete="off" type="number" class="form-control" name="no_telvon_penerima" id="no_telvon_penerima" placeholder="No Hp/Telvon Penerima" required>
            </div>
            <div>
                <label class="form-label" for="provinsi_penerima">Provinsi Penerima</label>
                <select name="provinsi_penerima" id="provinsi_penerima" class="form-control custom-select" required>
                    <option class="font-w700" disabled="disabled" selected value="">Provinsi Tujuan/Penerima</option>
                    <option value="Sumatera Selatan">Sumatera Selatan</option>
                    <option value="Jakarta">Jakarta</option>
                    <option value="Aceh">Aceh</option>
                    <option value="Aceh">Lampung</option>
                </select>
            </div>
            <div>
                <label class="form-label" for="alamat_penerima">Alamat Penerima</label>
                <textarea class="form-control" name="alamat_penerima" id="alamat_penerima" rows="3"></textarea>
            </div>
            <div>
                <label class="form-label" for="tanggal_pengiriman">Tanggal Pengiriman</label>
                <div class="input-group">
                    <input autocomplete="off" type="text" class="form-control" name="tanggal_pengiriman" id="tanggal_pengiriman" required>
                </div>
            </div>
            <div>
                <label class="form-label" for="nama_barang">Nama Barang</label>
                <input autocomplete="off" type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Nama Barang" required>
            </div>
            <div>
                <label class="form-label" for="berat_volume">Berat atau Volume Barang</label>
                <input autocomplete="off" type="number" class="form-control" name="berat_volume" id="berat_volume" placeholder="Berat atau Volume" required>
            </div>
            <div>
                <label class="form-label" for="satuan">Satuan</label>
                <select name="satuan" id="satuan" class="form-control" required>
                    <option class="font-w700" disabled="disabled" selected value="">Satuan</option>
                    <option value="Volume">Volume</option>
                    <option value="Berat">Berat</option>
                </select>
            </div>
            <!-- <div class="form-group">
                <label for="nama_supir">Supir Pengiriman</label>
                <select name="nama_supir" id="nama_supir" class="form-control custom-select" required>
                    <option class="font-w700" disabled="disabled" selected value="">Supir Pengiriman</option>
                    <?php foreach($supir_kosong as $value){?>
                        <option value=<?php echo $value["kode_supir"]?>><?php echo $value["nama_supir"]?></option>
                    <?php }?>
                </select>
            </div>
            <div class="form-group">
                <label for="kode_mobil">No Polisi Mobil Pengiriman</label>
                <select name="kode_mobil" id="kode_mobil" class="form-control custom-select" required>
                    <option class="font-w700" disabled="disabled" selected value="">No Polisi</option>
                    <?php foreach($mobil_kosong as $value){?>
                        <option value=<?php echo $value["kode_mobil"]?>><?php echo $value["no_mobil"]?></option>
                    <?php }?>
                </select>
            </div> -->
            <div style="float:right;margin-bottom:3%">
                <button type="reset" class="btn btn-outline-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Buat</button>
            </div>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>