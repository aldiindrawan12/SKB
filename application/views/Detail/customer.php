<div class="container">
    <div class="card-header py-3 text-center">
        <h4 class="m-0 font-weight-bold text-dark"><?= $customer["customer_name"]?></h4>
        <input type="text" id="customer-id" value="<?= $customer["customer_id"]?>" hidden>
    </div>
    <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Lunas</h6>
    </div>
    <!-- tabel invoice Belum Lunas-->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="Table-Invoice-Lunas" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center" width="10%" scope="col">No Invoice</th>
                        <!-- <th class="text-center" width="10%" scope="col">ID JO</th> -->
                        <th class="text-center" width="25%" scope="col">Customer</th>
                        <th class="text-center" width="12%" scope="col">Tgl Invoice</th>
                        <th class="text-center" width="15%" scope="col">Batas Pembayaran</th>
                        <th class="text-center" scope="col">Status Pembayaran</th>
                        <th class="text-center" scope="col">Grand Total</th>
                        <th class="text-center" scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end tabel invoice Belum Lunas-->
    <div class="card shadow mb-4 mt-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-danger">Belum Lunas</h6>
    </div>
    <!-- tabel invoice Belum Lunas-->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="Table-Invoice-Belum-Lunas" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center" width="10%" scope="col">No Invoice</th>
                        <!-- <th class="text-center" width="10%" scope="col">ID JO</th> -->
                        <th class="text-center" width="25%" scope="col">Customer</th>
                        <th class="text-center" width="12%" scope="col">Tgl Invoice</th>
                        <th class="text-center" width="15%" scope="col">Batas Pembayaran</th>
                        <th class="text-center" scope="col">Status Pembayaran</th>
                        <th class="text-center" scope="col">Grand Total</th>
                        <th class="text-center" scope="col">Detail</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end tabel invoice Belum Lunas-->
</div>

</div>
    <!-- end tabel JO Dalam Perjalanan-->
</div>

</div>