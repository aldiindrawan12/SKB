<div class="container small">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Seluruh Data Job Order</h1>
            <a href="<?=base_url("index.php/form/joborder/x")?>" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-100">
                <i class="fas fa-plus"></i> 
            </span>
                <span class="text">
                     Buat Job Order
                </span>
            </a>
    </div> 
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Job Order(JO)</h6>
    </div>
    <!-- tabel JO -->
    <div class="card-body">
        <div class="float-right mt-2 mb-2">
            <select name="status-JO" id="status-JO" class="form-control">
                <option value="x">Semua Status</option>
                <option value="Dalam Perjalanan">Dalam Perjalanan</option>
                <option value="Sampai Tujuan">Sampai Tujuan</option>
            </select>
        </div>
        <div class="table-responsive thead-dark">
            <table class="table table-bordered  " id="Table-Job-Order" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th width ="8%" class="text-center" scope="col">No JO</th>
                        <th width ="17%" class="text-center" scope="col">Customer</th>
                        <th width ="15%" class="text-center" scope="col">Muatan</th>
                        <th width ="16%" class="text-center" scope="col">Asal</th>
                        <th width ="16%" class="text-center" scope="col">Tujuan</th>
                        <th width ="7%" class="text-center" scope="col">Tanggal</th>
                        <th width ="16%" scope="col">Status</th>
                        <th width ="5%" scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end tabel JO -->
</div>

</div>