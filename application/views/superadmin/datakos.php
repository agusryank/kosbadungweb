               <!-- Begin Page Content -->
               <div class="container-fluid">

                   <!-- Page Heading -->
                   <h1 class="h3 mb-2 text-gray-800">Data Kos Belum Terverivikasi</h1>

                   <!-- DataTales Example -->
                   <div class="card shadow mb-4">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold text-primary">Data Kos</h6>
                       </div>
                       <div class="card-body">
                           <?php echo $this->session->flashdata('Pesan'); ?>

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
                                       <?php foreach ($kos1 as $m) { ?>
                                           <tr>
                                               <td><?= $i; ?></td>
                                               <td><?= $m->Namakos; ?></td>
                                               <th><?= $m->Namapemilik; ?></th>
                                               <td><?= $m->Latitude; ?></td>
                                               <td><?= $m->Longtitude; ?></td>
                                               <td>
                                                   <a href="<?= base_url('superadmin/datakosid/' . $m->id); ?>" class="badge badge-primary">
                                                       <span class="text">Lihat Foto</span></a>
                                               </td>
                                               <td><?= $m->Deskripsi; ?></td>
                                               <td><?= $m->Kecamatan; ?></td>
                                               <td><?php
                                                    if ($m->Aktif == '1') {
                                                        echo '<div class="badge badge-success">Aktif</div>';
                                                    } else {
                                                        echo '<div class="badge badge-primary">Tidak Aktif</div>';
                                                    }
                                                    ?>
                                               </td>
                                               <td>
                                                   <P>
                                                       <button data-toggle="modal" data-target="#verivikasidata<?php echo $m->id; ?>" class="badge badge-success">
                                                           <span class="text">Verivikasi</span></button>
                                                   </P>
                                                   <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#konfirmdelete<?php echo $m->id; ?>">
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

               </div>


               <!-- Modal untuk Konfirmasi Delete Data -->
               <?php $no = 0; ?>
               <?php foreach ($kos1 as $m) : $no++ ?>
                   <div class="modal fade" id="konfirmdelete<?php echo $m->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                   <a href="<?php echo base_url() ?>superadmin/hapus_kos/<?php echo $m->id; ?>" class="btn btn-danger">
                                       <span class="text">Delete</span> </a>
                               </div>
                           </div>
                       </div>
                   </div>
               <?php endforeach ?>

               <!-- Akhir Modal -->

               <!-- Modal untuk Verivikasi Data-->
               <?php $no = 0; ?>
               <?php foreach ($kos1 as $m) : $no++ ?>
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
                                   <form class="user" method="POST" action="<?php echo base_url() ?>Superadmin/proses_verivikasidata/<?php echo $m->id ?>">

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