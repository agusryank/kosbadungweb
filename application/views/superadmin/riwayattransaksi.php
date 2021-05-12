<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Riwayat Transaksi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Transaksi Sukses</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Nama Kos</th>
                            <th>Nama Pemilik</th>
                            <th>Nama Penyewa</th>
                            <th>Bukti Pembayaran</th>
                            <th>Tanggal Mulai</th>
                            <th>Lama Sewa</th>
                            <th>Jumlah Kamar</th>
                            <th>Total Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($riwayat as $m) {

                        ?>
                            <tr>
                                <td><?= $i ?> </td>
                                <td><?= $m->Namakos; ?></td>
                                <td><?= $m->Namapemilik; ?></td>
                                <td><?= $m->Namauser; ?></td>
                                <td> <?php
                                        if (empty($m->Buktipembayaran)) {
                                            echo "Bukti pembayaran belum di upload.";
                                        } else {
                                            echo "<a href=";
                                            echo "'";
                                            echo base_url('androidAPI/Image/BuktiPembayaran/' .
                                                $m->Buktipembayaran);
                                            echo "'";
                                            echo "class='badge badge-primary'><span class='text'>Lihat Bukti</span></a>";
                                        } ?></td>
                                <td><?= $m->Tglmulai; ?></td>
                                <td><?= $m->Lamasewa; ?>&nbsp;Bulan</td>
                                <td><?= $m->Jumlahkamar; ?>&nbsp;Kamar</td>
                                <td>Rp.&nbsp;<?= $m->Totalharga; ?></td>
                            </tr>
                            <?php $i++ ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- /.container-fluid -->

</div>
</div>