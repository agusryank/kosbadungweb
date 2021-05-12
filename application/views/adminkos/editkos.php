                <!-- Begin Page Content -->

                <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbmLZgJDDWp1lLXfKICo9BoUlHt1ZdQ_s&callback=initMap">
                </script>
                <script>
                    function initMap() {
                        var map = new google.maps.Map(document.getElementById('map'), {
                            center: new google.maps.LatLng(-8.581930, 115.177055),
                            zoom: 20
                        });
                    }
                </script>


                <div class="container-fluid">

                    <div id="map"></div>

                    <!-- Form Tambah Data Kos -->

                    <div class="card shadow mb-3 " style=" margin-left: auto; margin-right: auto; width: 550px">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Kos</h6>
                        </div>
                        <div class="card-body">
                            <?php echo form_open_multipart('adminkos/proses_tambah_kos'); ?>
                            <div class="form-group ">
                                <label class="small mb-1" for="namakos">Nama Kos : </label>
                                <input type="text" name="namakos" class="form-control" value="" id="namakos" placeholder="Nama Kos" required="">
                            </div>
                            <div class="form-group ">
                                <input type="hidden" name="namapemilik" class="form-control" value="" id="namapemilik" value="<?= $admin['Nama'] ?>" required="">
                            </div>
                            <label class="small mb-1" for="alamat">Alamat Rumah Kos</label>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="small mb-1" for="lat">Latitude : </label>
                                    <input type="text" name="lat" class="form-control" value="" id="lat" placeholder="Latitude" required="">
                                </div>
                                <div class="col-sm-6">
                                    <label class="small mb-1" for="long">Longtitude :</label>
                                    <input type="text" class="form-control" value="" name="long" id="long" placeholder="Longtitude" required="">
                                </div>
                            </div>

                            <div class="form-group">

                                <label class="small mb-1" for="long">Pilih Lokasi Anda</label>

                            </div>

                            <div class="form-group ">
                                <label class="small mb-1" for="foto1">Foto 1:</label>
                                <input type="file" class="form-control" value="" id="foto1" name="foto1" size="20" required="">
                            </div>
                            <div class="form-group ">
                                <label class="small mb-1" for="foto2">Foto 2:</label>
                                <input type="file" class="form-control" value="" id="foto2" name="foto2" size="20" required="">
                            </div>
                            <div class="form-group ">
                                <label class="small mb-1" for="foto3">Foto 3:</label>
                                <input type="file" class="form-control" value="" id="foto3" name="foto3" size="20" required="">
                            </div>
                            <div class="form-group ">
                                <label class="small mb-1" for="foto4">Foto 4:</label>
                                <input type="file" class="form-control" value="" id="foto4" name="foto4" size="20" required="">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="small mb-1" for="kecamatan">Kecamatan :</label>
                                    <select name="kecamatan" class="form-control" id="kecamatan" required="">
                                        <option value="" selected>Pilih Kecamatan :</option>
                                        <option value="Kuta Selatan">Kuta Selatan</option>
                                        <option value="Kuta Utara">Kuta Utara</option>
                                        <option value="Kuta">Kuta</option>
                                        <option value="Kuta Tengah">Kuta Tengah</option>
                                        <option value="Petang">Petang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="deskripsi">Deskripsi Kos : </label>
                                <textarea value="" type="text" class="form-control " name="deskripsi" id="deskripsi" placeholder="Deskripsi" required=""></textarea>
                            </div>
                        </div>
                        <div class="card-footer" style="text-align: right;">

                            <a href="<?php echo base_url() ?>adminkos/datakos" class="btn btn-secondary">Kembali</a>
                            <button type="submit" value="upload" class="btn btn-primary">Tambah</button>
                            <?php echo form_close() ?>

                        </div>

                    </div>

                </div>

                <!-- /.container-fluid -->
                <br>
                </div>
                <!-- End of Main Content -->