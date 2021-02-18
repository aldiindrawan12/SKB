<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Seluruh Data Penggajian Supir</h1>
        <a class="btn btn-primary btn-icon-split" data-toggle='modal' data-target='#popup-supir'>
            <span class="icon text-white-100">
                <i class="fas fa-plus"></i> 
            </span>
            <span class="text">
                 Tambah Supir Baru
            </span>
        </a>
    </div>  
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Supir</h6>
    </div>
    <!-- tabel supir -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="Table-Supir" width="100%" cellspacing="0">
                <thead>
                    <tr>        
                        <th class="text-center" width="3%" scope="col">ID Supir</th>
                        <th class="text-center" width="13%" scope="col">Nama Supir</th>
                        <th class="text-center" width="10%" scope="col">Kasbon</th>
                        <th width="7%" scope="col">Status</th>
                        <th width="5%" scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end tabel supir -->
</div>

<!-- pop up add supir -->
<div class="modal fade" id="popup-supir" tabindex="-1" role="dialog" aria-labelledby="modal-block-large" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary-dark">
                <h5 class="font-weight-bold">Menambah Supir Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="font-size-sm m-3 text-justify">
                <form action="<?= base_url("index.php/form/insert_supir")?>" method="POST">
                    <div class="form-group">
                        <label for="Supir" class="form-label">Nama Supir</label>
                        <input autocomplete="off" type="text" class="form-control" id="Supir" name="Supir" required>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-success mb-3 float-right">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end pop up add supir -->
</div>