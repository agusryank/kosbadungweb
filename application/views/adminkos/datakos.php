    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Kos Anda</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kos</h6>
            </div>

            <div class="card-body">
                <?php echo $this->session->flashdata('Pesan'); ?>

                <a href="<?= base_url('adminkos/tambahkos'); ?>" type="button" class="btn btn-primary">
                    Tambah data kos
                </a>

                <hr>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kos</th>
                                <th>Nama Pemilik Kos</th>
                                <th>Latitude</th>
                                <th>Longtitude</th>
                                <th>Foto</th>
                                <th>Deskripsi</th>
                                <th>Kecamatan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $i = 1; ?>
                            <?php foreach ($datakos as $m) { ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $m->Namakos; ?></td>
                                    <td><?= $m->Namapemilik; ?></td>
                                    <td><?= $m->Latitude; ?></td>
                                    <td><?= $m->Longtitude; ?></td>
                                    <td>
                                        <a href="<?= base_url('adminkos/datakosid/' . $m->id); ?>" class="badge badge-primary">
                                            <span class="text">Lihat Foto</span></a>
                                    </td>
                                    <td><?= $m->Deskripsi; ?></td>
                                    <td><?= $m->Kecamatan; ?></td>
                                    <td><?php
                                        if ($m->Status == 'Sukses') {
                                            echo '<div class="badge badge-success">Sukses verivikasi</div>';
                                        } else {
                                            echo '<div class="badge badge-primary">Proses Verivikasi';
                                        }
                                        ?></td>
                                    <td>
                                        <p>
                                            <a href="<?php echo base_url() ?>adminkos/tambahkamarkos/<?php echo $m->id; ?>" type="button" class="badge badge-primary">
                                                Tambah Data Kamar Kos
                                            </a>
                                        </p>
                                        <P>
                                            <!-- <button class="badge badge-primary" data-toggle="modal" data-target="#editmodal"> -->
                                            <a href="<?php echo base_url() ?>adminkos/edit_kos/<?php echo $m->id; ?>" type="button" class="badge badge-primary">
                                                Edit Data Kos
                                            </a>
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
    <!-- End of Main Content -->
    <!-- Modal Untuk Edit Data -->
    <?php $no = 0; ?>
    <?php foreach ($datakos as $m) : $no++ ?>
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
                        <?php echo form_open_multipart('adminkos/edit_datakos/' . $m->id); ?>

                        <input type="hidden" name="id" value="<?php echo $m->id; ?>">
                        <div class="form-group">
                            <Label class="small mb-1">Nama Kos</Label>
                            <input type="text" name="namakos" class="form-control" value="<?php echo $m->Namakos; ?>" required="">
                        </div>
                        <div class="form-group">
                            <Label class="small mb-1">Nama Pemilik</Label>
                            <input type="text" name="namapemilik" class="form-control" value="<?php echo $m->Namapemilik; ?>" required="">
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label class="small mb-1" for="Latitude">Latitude : </label>
                                <input type="text" class="form-control " name="lat" id="Latitude" value="<?php echo $m->Latitude; ?>" required="">
                            </div>
                            <div class="col-sm-6">
                                <label class="small mb-1" for="Longtitude">Longtitude :</label>
                                <input type="text" class="form-control " id="Longtitude" name="long" value="<?php echo $m->Longtitude; ?>" required="">
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="small mb-1" for="foto1">Foto 1:</label>
                            <input type="hidden" name="oldFoto1" value="<?php echo $m->foto1; ?>">
                            <input type="hidden" name="oldFoto2" value="<?php echo $m->foto2; ?>">
                            <input type="hidden" name="oldFoto3" value="<?php echo $m->foto3; ?>">
                            <input type="hidden" name="oldFoto4" value="<?php echo $m->foto4; ?>">

                            <input type="file" class="form-control " id="foto1" name="foto1" required="">
                            <img src="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto1); ?>" width="50%" height="50%" />
                        </div>
                        <div class="form-group ">
                            <label class="small mb-1" for="foto2">Foto 2:</label>
                            <input type="file" class="form-control" id="foto2" name="foto2">
                            <img src="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto2); ?>" width="50%" height="50%" />
                        </div>
                        <div class="form-group ">
                            <label class="small mb-1" for="foto3">Foto 3:</label>
                            <input type="file" class="form-control " id="foto3" name="foto3">
                            <img src="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto3); ?>" width="50%" height="50%" />
                        </div>
                        <div class="form-group ">
                            <label class="small mb-1" for="foto4">Foto 4:</label>
                            <input type="file" class="form-control " id="foto4" name="foto4">
                            <img src="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto3); ?>" width="50%" height="50%" />
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="small mb-1" for="Longtitude">Kecamatan :</label>
                                <select class="form-control" name="kecamatan" id="Kecamatan" form="form-group" required="">
                                    <option value="<?php echo $m->Kecamatan; ?>" selected><?php echo $m->Kecamatan; ?></option>
                                    <option value="Kuta Selatan">Kuta Selatan</option>
                                    <option value="Kuta Utara">Kuta Utara</option>
                                    <option value="Kuta">Kuta</option>
                                    <option value="Kuta Tengah">Kuta Tengah</option>
                                    <option value="Petang">Petang</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <Label class="small mb-1">Deskripsi</Label>
                            <textarea type="text" name="deskripsi" class="form-control" required=""><?php echo $m->Deskripsi; ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" value="<?php echo $m->id; ?>">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <?php echo form_close() ?>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <!-- Akhir Modal -->

    <!-- Modal Tambah Data -->
    <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo form_open_multipart('adminkos/proses_tambah_kos'); ?>
                    <div class="form-group ">
                        <label class="small mb-1" for="namakos">Nama Kos : </label>
                        <input type="text" name="namakos" class="form-control " id="namakos" placeholder="Nama Kos">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="small mb-1" for="namapemilik">Nama Pemilik Kos : </label>
                        <input type="text" name="namapemilik" class="form-control " id="namapemilik" value="<?= $admin['Nama'] ?> ">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <label class="small mb-1" for="alamat">Alamat Rumah Kos</label>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="small mb-1" for="lat">Latitude : </label>
                            <input type="text" name="lat" class="form-control " id="lat" placeholder="Latitude">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="small mb-1" for="long">Longtitude :</label>
                            <input type="text" class="form-control" name="long" id="long" placeholder="Longtitude">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="small mb-1" for="foto1">Foto 1:</label>
                        <input type="file" class="form-control " id="foto1" name="foto1">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="small mb-1" for="foto2">Foto 2:</label>
                        <input type="file" class="form-control" id="foto2" name="foto2">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="small mb-1" for="foto3">Foto 3:</label>
                        <input type="file" class="form-control " id="foto3" name="foto3">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="small mb-1" for="foto4">Foto 4:</label>
                        <input type="file" class="form-control " id="foto4" name="foto4">
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <label class="small mb-1" for="jmlkamar">Jumlah Kamar Tersedia : </label>
                            <input type="number" name="jmlkamar" min="1" max="100" class="form-control " id="jmlkamar" placeholder="Kamar Tersedia">
                            <div class="invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="small mb-1" for="kecamatan">Kecamatan :</label>
                            <select name="kecamatan" class="form-control" id="kecamatan">
                                <option selected>Kuta Selatan</option>
                                <option value="Kuta Selatan">Kuta Selatan</option>
                                <option value="Kuta Utara">Kuta Utara</option>
                                <option value="Kuta">Kuta</option>
                                <option value="Kuta Tengah">Kuta Tengah</option>
                                <option value="Petang">Petang</option>
                            </select>
                            <div class="invalid-feedback">
                            </div>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="small mb-1" for="harga">Harga Sewa Bulanan :</label>
                        <input type="text" class="form-control " name="harga" id="harga" placeholder="Harga Sewa">
                        <div class="invalid-feedback">
                            Please choose a username.
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="deskripsi">Deskripsi Kos : </label>
                        <textarea type="text" class="form-control " name="deskripsi" id="deskripsi" placeholder="Deskripsi"></textarea>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                    <br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Buat</button>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal-->

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
                    <a href="<?php echo base_url() ?>adminkos/hapus_datakos/<?php echo $m->id; ?>" class="btn btn-danger">
                        <span class="text">Delete</span> </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal -->