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

            <!-- <a href="<?= base_url('adminkos/tambahkamarkos'); ?>" type="button" class="btn btn-primary">
                Tambah data Kamar kos
            </a> -->
            <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#addmodal">
                <span class="text">Tambah data Kamar kos</span>
            </button> -->

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
                            <th>Tersedia</th>
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
                                <td><?php
                                    if ($m->Aktif == '1') {
                                        echo '<div class="badge badge-success">Aktif</div>';
                                    } else {
                                        echo '<div class="badge badge-danger">Tidak Aktif</div>';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <P>
                                        <button class="badge badge-primary" data-toggle="modal" data-target="#editmodal<?php echo $m->id; ?>">
                                            <span class="text">Edit</span> </button>
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
</div>

<!-- /.container-fluid -->
</div>


<!-- Modal Untuk Edit Data -->
<?php $no = 0; ?>
<?php foreach ($datakamarkos as $m) : $no++ ?>
    <div class=" modal fade" id="editmodal<?php echo $m->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('adminkos/Edit_data_kamarkos/' . $m->id); ?>
                    <input type="hidden" name="id" value="<?= $m->id; ?>">
                    <div class="form-group ">
                        <label class="small mb-1" for="namakos">Nama Kamar : </label>
                        <input type="text" name="namakamar" class="form-control " value="<?= $m->Namakamar; ?>" id="namakos" placeholder="Nama Kamar" required="">
                    </div>
                    <div class="form-group ">
                        <input type="hidden" name="id_kos" class="form-control " value="<?= $m->id_kos; ?>" required="">
                    </div>

                    <div class="form-group ">
                        <input type="hidden" name="namakos" class="form-control" value="<?= $m->Namakos; ?>" placeholder="Nama Kos" required="">
                    </div>
                    <div class="form-group ">
                        <input type="hidden" name="id_pemilik" class="form-control " value="<?= $m->id_pemilik; ?>" required="">
                    </div>
                    <div class="form-group ">
                        <input type="hidden" name="namapemilik" class="form-control " value="<?= $m->Namapemilik; ?>" required="">
                    </div>
                    <div class="form-group ">
                        <input class="form-control" value="<?= $m->Foto; ?>" type="hidden" name="old_userfile" id="foto" />
                        <label class="small mb-1" for="foto">Foto Kamar</label>
                        <input class="form-control" type="file" name="userfile" id="foto" />
                        <img size="20%" class="img-fluid" src="<?= base_url('androidAPI/Image/FotoKamarKos/' . $m->Foto); ?> ">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="fasilitas">Fasilitas Kamar :</label>
                        <textarea type="text" class="form-control " name="fasilitas" id="fasilitas" placeholder="Fasilitas Kamar" required=""> <?= $m->Fasilitaskamar; ?></textarea>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="small mb-1" for="jmlkamar">Jumlah Kamar Yang Tersedia:</label>
                            <input type="number" name="jmlkamar" min="1" max="100" class="form-control " value="<?= $m->Jumlahkamar; ?>" id="jmlkamar" placeholder="Kamar Tersedia" required="">
                        </div>

                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="small mb-1" for="aktif">Kamar Kos Tersedia ?</label>
                            <select name="aktif" class="form-control" id="aktif" required="">
                                <option selected value="<?= $m->Aktif; ?>">
                                    <?php
                                    if ($m->Aktif == '1') {
                                        echo '<div class="badge badge-success">Tersedia</div>';
                                    } else {
                                        echo '<div class="badge badge-primary">Tidak Tersedia</div>';
                                    }
                                    ?></option>
                                <option value="1">Tersedia</option>
                                <option value="0">Tidak Tersedia</option>
                            </select>

                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="small mb-1" for="harga">Harga Kamar / Bulan :</label>
                        <input type="text" class="form-control " name="harga" id="harga" value="<?= $m->Hargakamar; ?>" placeholder="Harga Sewa" required="">
                    </div>

                </div>
                <div class="card-footer" style="text-align: right;">
                    <a href="<?php echo base_url() ?>adminkos/datakamarkos" class="btn btn-secondary">Kembali</a>
                    <button type="submit" value="upload" class="btn btn-primary">Ubah</button>
                    <?php echo form_close() ?>

                </div>
            </div>
        </div>
    </div>
<?php endforeach ?>

<!-- Akhir Modal -->


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
                <a href="<?php echo base_url() ?>adminkos/hapus_data_kamarkos/<?php echo $m->id; ?>" class="btn btn-danger">
                    <span class="text">Delete</span> </a>
            </div>
        </div>
    </div>
</div>

<!-- Akhir Modal -->