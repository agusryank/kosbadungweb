<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Kamar Kos Anda</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Kamar Kos</h6>
        </div>

        <div class="card-body">
            <?php echo $this->session->flashdata('Pesan'); ?>


            <hr>
            <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kamar</th>
                            <th>Nama Kos</th>
                            <th>Nama Pemilik</th>
                            <th>Foto</th>
                            <th>Fasilitas Kamar</th>
                            <th>Jumlah Kamar</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $i = 1; ?>
                        <?php foreach ($datakamarkos as $m) { ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= $m->Namakamar; ?></td>
                                <td><?= $m->Namakos; ?></td>
                                <td><?= $m->Namapemilik; ?></td>
                                <td><a href="<?= base_url('androidAPI/Image/FotoKamarKos/' .
                                                    $m->Foto); ?>" class='badge badge-primary'><span class='text'>Lihat Foto</span></a></td>
                                <td><?= $m->Fasilitaskamar; ?></td>
                                <td><?= $m->Jumlahkamar; ?></td>
                                <td><?= $m->Hargakamar; ?> </td>
                                <td>
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
</div>

<!-- /.container-fluid -->
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
                <a href="<?php echo base_url() ?>superadmin/hapus_data_kamarkos/<?php echo $m->id; ?>" class="btn btn-danger">
                    <span class="text">Delete</span> </a>
            </div>
        </div>
    </div>
</div>

<!-- Akhir Modal -->