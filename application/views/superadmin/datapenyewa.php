    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Penyewa Rumah Kos</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Akun Penyewa Kos Badung</h6>
            </div>
            <div class="card-body">
                <?php echo $this->session->flashdata('Pesan'); ?>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Alamat</th>
                                <th>No Telpon</th>
                                <th>Jenis Kelamin</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($user as $m) : ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $m['Nama']; ?></td>
                                    <td><?= $m['Alamat']; ?></td>
                                    <td><?= $m['No_telp']; ?></td>
                                    <td><?= $m['Jenis_kelamin']; ?></td>
                                    <td><?= $m['Username']; ?></td>
                                    <td><?= $m['Password']; ?></td>
                                    <td>
                                        <button class="badge badge-primary" data-toggle="modal" data-target="#editmodal<?php echo $m['id']; ?>">
                                            <span class="text">Edit</span> </button>
                                        <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#konfirmdelete">
                                            Delete
                                        </button>

                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Modal untuk Konfirmasi Delete Data -->

    <div class="modal fade" id="konfirmdelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Anda yakin ingin menghapus data ini ?</h5>
                    <button type="button" class="close" data-dismiss="modazl" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Pilih "Delete" untuk menghapus.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <a href="<?php echo base_url() ?>Superadmin/hapus_datapenyewa/<?php echo $m['id'] ?>" class="btn btn-danger">
                        <span class="text">Delete</span> </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Akhir Modal -->



    <!-- Modal Untuk Edit Data -->
    <?php $no = 0; ?>
    <?php foreach ($user as $m) : $no++ ?>
        <div class="modal fade" id="editmodal<?php echo $m['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="user" method="POST" action="<?php echo base_url() ?>Superadmin/proses_editdata_penyewa/<?php echo $m['id'] ?>">

                            <input type="hidden" name="id" value="<?php echo $m['id'] ?>">
                            <div class="form-group">
                                <Label class="small mb-1">Nama Lengkap</Label>
                                <input type="text" name="nama" class="form-control" value="<?php echo $m['Nama'] ?>" required="">
                            </div>
                            <div class="form-group">
                                <Label class="small mb-1">Alamat</Label>
                                <input type="text" name="alamat" class="form-control" value="<?php echo $m['Alamat'] ?>" required="">
                            </div>
                            <div class="form-group">
                                <Label class="small mb-1">No Telpon</Label>
                                <input type="text" name="notelp" class="form-control" value="<?php echo $m['No_telp'] ?>" required="">
                            </div>
                            <div class="form-group">
                                <Label class="small mb-1">Jenis Kelamin</Label>
                                <select name="jeniskelamin" class="form-control" value="<?php echo $m['Jenis_kelamin']; ?>" required="">
                                    <option value="Pria" selected>Pria</option>
                                    <option value="Wanita">Wanita</option>
                                </select>
                            </div>
                            <div class="form-group">

                                <Label class="small mb-1">Username</Label>
                                <input type="text" name="username" class="form-control" value="<?php echo $m['Username'] ?>" required="">
                            </div>
                            <div class="form-group">

                                <Label class="small mb-1">Password</Label>
                                <input type="text" name="password" class="form-control" value="<?php echo $m['Password'] ?>" required="">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach ?>


    <!-- Akhir Modal -->