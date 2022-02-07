<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Histori Pesanan</h4>
                    <div class="breadcrumb__links">
                        <a href="index.html">Home</a>
                        <span>Histori Pesanan</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="shop spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-12">




                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga Barang</th>
                            <th>Qty</th>
                            <th>Resi</th>
                            <th>Status</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($transaksi as $t) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $t['nama_barang'] ?></td>
                            <td><?= 'Rp ' . number_format($t['harga'], 2, ",", ".") ?></td>
                            <td><?= $t['qty'] ?></td>
                            <td><?= $t['jasa_pengiriman'] . " (" . $t['nomor_resi'] . ")" ?></td>
                            <td>
                                <?php if ($t['status'] == 0) {
                                        echo "Pesanan sedang diperiksa";
                                    } elseif ($t['status'] == 1) {
                                        echo "Pesanan diterima, paket akan segera dikirim";
                                    } elseif ($t['status'] == 2) {
                                        echo "Pesanan ditolak";
                                    } ?>
                            </td>
                        </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>



            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $('#table_id').DataTable();
});
</script>