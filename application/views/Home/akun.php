<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Seluruh Data Akun</h1>
        <?php if($_SESSION["role"] == "Super User"){?>
            <a class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#popup-tambah-akun">
                <span class="icon text-white-100">
                    <i class="fas fa-plus"></i> 
                </span>
                <span class="text">
                        Buat Akun
                </span>
            </a>
        <?php }?>
    </div> 
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Akun</h6>
    </div>
    <!-- tabel data cutomer -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="Table-Akun" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center" width="3%" scope="col">ID</th>
                        <th class="text-center" width="20%" scope="col">Nama</th>
                        <th class="text-center" width="5%" scope="col">Role</th>
                        <th class="text-center" width="5%" scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end tabel data cutomer -->
</div>
<!-- pop up tambah akun -->
<div class="modal fade" id="popup-tambah-akun" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-dark">
                <h5 class="block-title">Tambah Akun</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">X</span>
                </button>
            </div>
            <div class="font-size-sm m-3 text-justify">
                <p>Isi Data Dengan Lengkap</p>
                <form  action="<?= base_url("index.php/form/insert_akun")?>" method="POST">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-5 col-form-label">Nama Akun</label>
                        <div class="col-sm-6">
                            <input autocomplete="off" class="form-control" type="text" name="nama" id="nama" required>    
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="username" class="col-sm-5 col-form-label">Username</label>
                        <div class="col-sm-6">
                            <input autocomplete="off" class="form-control" type="text" name="username" id="username" required>    
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-5 col-form-label">Password</label>
                        <div class="col-sm-6">
                            <input autocomplete="off" class="form-control" type="text" name="password" id="password" required>    
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label" for="role">Role Akun</label>
                        <select name="role" id="role" class="form-control custom-select col-sm-6" required>
                            <option class="font-w700" disabled="disabled" selected value="">Jenis Role</option>
                            <option value="Super User">Super User</option>
                            <option value="Operator">Operator</option>
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
<!-- end pop up tambah akun -->
<!-- pop up update akun -->
<div class="modal fade" id="popup-update-akun" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-dark">
                <h5 class="font-weight-bold">Update Data Akun</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="font-size-sm m-3 text-justify">
                <form action="<?= base_url("index.php/form/update_akun")?>" method="POST">
                    <input type="text" name=akun_id id=akun_id hidden>
                    <div class="form-group">
                        <label for="akun_name" class="form-label">Nama Akun</label>
                        <input autocomplete="off" type="text" class="form-control" id="akun_name" name="akun_name" required>
                    </div>
                    <div class="form-group">
                        <label class="" for="role_update">Role Akun</label>
                        <select name="role_update" id="role_update" class="form-control custom-select " required>
                            <option class="font-w700" disabled="disabled" selected value="">Jenis Role</option>
                            <option value="Super User">Super User</option>
                            <option value="Operator">Operator</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username_update" class="form-label">Username</label>
                        <input autocomplete="off" type="text" class="form-control" id="username_update" name="username_update" required>
                    </div>
                    <div class="form-group">
                        <label for="password_update" class="form-label">Password</label>
                        <input autocomplete="off" type="text" class="form-control" id="password_update" name="password_update" required>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-success mb-3 float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end pop up update akun -->
</div>