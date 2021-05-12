               <!-- Begin Page Content -->
               <div class="container-fluid">

                   <!-- DataTales Example -->

                   <div class="card shadow mb-5 p-5 mt-5">
                       <div class="card-header py-3">
                           <h6 class="m-0 font-weight-bold ">Foto kos</h6>
                       </div>
                       <div class="card-body ">

                           <?php foreach ($kosid as $m) {
                            ?>
                               <div class="row">
                                   <div class="col"> <a href="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto1); ?> "> <img class="img-fluid " src="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto1); ?> "></a></div>
                                   <div class="col"> <a href="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto2); ?> "><img class="img-fluid" src="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto2); ?> "></a>
                                       </a>
                                   </div>
                                   <div class="w-100"></div>
                                   <div class="col"> <a href="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto3); ?> "> <img class="img-fluid" src="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto3); ?> "></a>
                                   </div>
                                   <div class="col"> <a href="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto4); ?> "> <img class="img-fluid" src="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto4); ?> "> </a>
                                   </div>
                               </div>

                           <?php } ?>

                       </div>
                   </div>

               </div>
               <!-- /.container-fluid -->

               </div>