<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Transaksi Yang Belum Terverivikasi</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Riwayat Transaksi</h6>
        </div>
        <div class="card-body">
            <?php echo $this->session->flashdata('Pesan'); ?>

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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($Transaksi as $m) {

                        ?>
                            <tr>
                                <td><?= $i ?> </td>
                                <td><?= $m->Namakos; ?></td>
                                <td><?= $m->Namapemilik; ?></td>
                                <td><?= $m->Namauser; ?></td>
                                <td>
                                    <?php
                                    if (empty($m->Buktipembayaran)) {
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
                                <td><?= $m->Lamasewa; ?>&nbsp;Bulan</p>
                                </td>
                                <td><?= $m->Jumlahkamar; ?>&nbsp;Kamar</td>
                                <td>Rp.&nbsp;<?= $m->Totalharga; ?></td>
                                <td>
                                    <P>
                                        <button data-toggle="modal" data-target="#verivikasidata<?php echo $m->id; ?>" class="badge badge-success">
                                            <span class="text">Verivikasi</span></button>
                                    </P>
                                    <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#konfirmdelete">
                                        Delete
                                    </button>


                                </td>
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
<!-- End of Main Content -->
</div>


<!-- Modal untuk Konfirmasi Delete Data -->

<div class="modal fade" id="konfirmdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin menghapus data ini ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Pilih "Delete" untuk menghapus.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <a href="<?php echo base_url() ?>superadmin/hapus_datatransaksi/<?php echo $m->id; ?>" class="btn btn-danger">
                    <span class="text">Delete</span> </a>
            </div>
        </div>
    </div>
</div>

<!-- Akhir Modal -->

<!-- Modal untuk Verivikasi Data-->
<?php $no = 0; ?>
<?php foreach ($Transaksi as $m) : $no++ ?>
    <div class="modal fade" id="verivikasidata<?php echo $m->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Verivikasi data ini ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pilih button Verivikasi untuk memverivikasi data.
                    <form class="user" method="POST" action="<?php echo base_url() ?>Superadmin/proses_verivikasi_data/<?php echo $m->id ?>">

                        <input type="hidden" name="id" value="<?php echo $m->id; ?>">
                        <div class="form-group">
                            <input type="hidden" name="status" value="Sukses" class="form-control">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Verivikasi</button>
                </div>
                </form>

            </div>
        </div>
    </div>

<?php endforeach ?>

<!-- Akhir Modal -->