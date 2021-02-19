<div class="container">
    <div class="card-header py-3 text-center">
        <h4 class="m-0 font-weight-bold text-dark"><?= $customer["customer_name"]?></h4>
        <input type="text" id="customer-id" value="<?= $customer["customer_id"]?>" hidden>
    </div>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sampai Tujuan</h6>
    </div>
    <!-- tabel JO Sampai Tujuan-->
    <div class="card-body">
        <div class="table-responsive thead-dark">
            <table class="table table-bordered  " id="Table-Job-Order-Sampai" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No JO</th>
                        <th class="text-center" scope="col">Customer</th>
                        <th class="text-center" scope="col">Muatan</th>
                        <th class="text-center" scope="col">Asal</th>
                        <th class="text-center" scope="col">Tujuan</th>
                        <th class="text-center" scope="col">Tanggal</th>
                        <th width ="17%" scope="col">Status</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end tabel JO Sampai Tujuan-->
    <div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Dalam Perjalanan</h6>
    </div>
    <!-- tabel JO Dalam Perjalanan-->
    <div class="card-body">
        <div class="table-responsive thead-dark">
            <table class="table table-bordered" id="Table-Job-Order-Perjalanan" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center" scope="col">No JO</th>
                        <th class="text-center" scope="col">Customer</th>
                        <th class="text-center" scope="col">Muatan</th>
                        <th class="text-center" scope="col">Asal</th>
                        <th class="text-center" scope="col">Tujuan</th>
                        <th class="text-center" scope="col">Tanggal</th>
                        <th width ="17%" scope="col">Status</th>
                        <th scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end tabel JO Dalam Perjalanan-->
</div>

</div>