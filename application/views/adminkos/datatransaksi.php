<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Transaksi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Transaksi</h6>
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
                            <th>Nama Kamar</th>
                            <th>Bukti Pembayaran</th>
                            <th>Tanggal Mulai</th>
                            <th>Lama Sewa</th>
                            <th>Jumlah Kamar</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($datatransaksi as $m) { ?>
                            <tr>
                                <td><?= $i++; ?> </td>
                                <td> <?= $m->Namakos; ?> </td>
                                <td><?= $m->Namapemilik; ?> </td>
                                <td><?= $m->Namauser; ?> </td>
                                <td><?= $m->Namakamar; ?> </td>
                                <td>
                                    <?php
                                    if ($m->Buktipembayaran == 'Pending') {
                                        echo "Bukti pembayaran belum di upload.";
                                    } else {
                                        echo "<a href=";
                                        echo "'";
                                        echo base_url('androidAPI/Image/BuktiPembayaran/' .
                                            $m->Buktipembayaran);
                                        echo "'";
                                        echo "class='badge badge-primary'><span class='text'>Lihat Bukti</span></a>";
                                    } ?>
                                </td>
                                <td><?= $m->Tglmulai; ?></td>
                                <td><?= $m->Lamasewa; ?>&nbsp;Bulan</td>
                                <td><?= $m->Jumlahkamar; ?>&nbsp;Kamar</td>
                                <td>Rp.&nbsp;<?= $m->Totalharga; ?></td>
                                <td> <?php
                                        if ($m->Status == 'Pending') {
                                            echo "<div class='badge badge-primary'><span class='text'><span>";
                                            echo $m->Status;
                                            echo "</span></div>";
                                        } else {
                                            echo "<div class='badge badge-success'><span class='text'><span>";
                                            echo $m->Status;
                                            echo "</span></div>";
                                        } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->