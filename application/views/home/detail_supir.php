    <table>
        <tbody>
            <tr>
                <th>Kode = </th>
                <td><?= $supir["kode_supir"] ?></td>
            </tr>
            <tr>
                <th>Nama = </th>
                <td><?= $supir["nama_supir"] ?></td>
            </tr>
            <tr>
                <th>Kasbon = </th>
                <td><?= $supir["kasbon_supir"] ?></td>
            </tr>
        </tbody>
    </table>
    <div class="container bg-light w-50">
        <h3 class="text-center">Data Perjalanan</h3>
    </div>
    <div class="" id="invoice-table">
        <table class="table table-bordered">
            <thead class="">
                <tr class="text-uppercase">
                    <th class="text-center">ID Invoice</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Supir dan Mobil</th>
                    <th class="text-center">Gaji Supir</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($perjalanan_supir as $value) {?>
                    <tr>
                        <td class="text-center">
                            <span class=""><?php echo $value["invoice_kode"] ?></span>
                        </td>
                        <td class="text-center">
                            <span class=""><?php echo $value["status"] ?></span>
                        </td>
                        <td class="text-center">
                            <span class=""><?php  echo $allsupir[$value["supir_pengiriman"]-1]["nama_supir"]?> || <?php  echo $mobil[$value["mobil_pengiriman"]-1]["no_mobil"]?></span>
                        </td>
                        <td class="text-center">
                            <span class="">-</span>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <!-- <div class="block-content block-content-full" id="report-table">
        <table class="table table-bordered table-hover table-vcenter font-size-sm mb-0">
            <thead class="thead-dark">
                <tr class="text-uppercase">
                    <th class="font-w700 text-center" style="width: 16%;">ID Supir</th>
                    <th class="font-w700 text-center" style="width: 16%;">Nama</th>
                    <th class="font-w700 text-center" style="width:16%" ;>Link</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($supir as $value) {?>
                    <tr>
                        <td>
                            <span class="font-w600"><?php echo $value["kode_supir"] ?></span>
                        </td>
                        <td class="text-center">
                            <span class="font-w600"><?php echo $value["nama_supir"] ?></span>
                        </td>
                        <td class="text-center">
                            <span class="font-w600"><a href="">Detail</a></span>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>

</html>