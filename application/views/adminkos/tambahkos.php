                <!-- Begin Page Content -->
                <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
                <div class="container-fluid">
                    <!-- Form Tambah Data Kos -->

                    <div class="card shadow mb-3 " style=" margin-left: auto; margin-right: auto; width: 550px">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Kost</h6>
                        </div>
                        <div class="card-body">
                            <?php echo form_open_multipart('adminkos/proses_tambah_kos'); ?>
                            <div class="form-group ">
                                <label class="small mb-1" for="namakos">Nama Kos : </label>
                                <input type="text" name="namakos" class="form-control " id="namakos" placeholder="Nama Kos" required="">
                            </div>
                            <div class="form-group ">
                                <input type="hidden" name="namapemilik" class="form-control " id="namapemilik" value="<?= $admin['Nama'] ?>" required="">
                            </div>
                            <label class="small mb-1" for="alamat">Alamat Rumah Kos</label>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label class="small mb-1" for="lat">Latitude : </label>
                                    <input type="text" name="lat" class="form-control " id="lat" placeholder="Latitude" required="">
                                </div>
                                <div class="col-sm-6">
                                    <label class="small mb-1" for="long">Longtitude :</label>
                                    <input type="text" class="form-control" name="long" id="long" placeholder="Longtitude" required="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="small mb-1" for="long">Pilih Lokasi Anda</label>
                                <div id="this_map">
                                    this map
                                </div>
                            </div>

                            <div class="form-group ">
                                <label class="small mb-1" for="foto1">Foto 1:</label>
                                <input type="file" class="form-control " id="foto1" name="foto1" size="20" required="">
                            </div>
                            <div class="form-group ">
                                <label class="small mb-1" for="foto2">Foto 2:</label>
                                <input type="file" class="form-control" id="foto2" name="foto2" size="20" required="">
                            </div>
                            <div class="form-group ">
                                <label class="small mb-1" for="foto3">Foto 3:</label>
                                <input type="file" class="form-control " id="foto3" name="foto3" size="20" required="">
                            </div>
                            <div class="form-group ">
                                <label class="small mb-1" for="foto4">Foto 4:</label>
                                <input type="file" class="form-control " id="foto4" name="foto4" size="20" required="">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label class="small mb-1" for="kecamatan">Kecamatan :</label>
                                    <select name="kecamatan" class="form-control" id="kecamatan" required="">
                                        <option selected>Pilih Kecamatan :</option>
                                        <option value="Kuta Selatan">Kuta Selatan</option>
                                        <option value="Kuta Utara">Kuta Utara</option>
                                        <option value="Kuta">Kuta</option>
                                        <option value="Kuta Tengah">Mengwi</option>
                                        <option value="Petang">Petang</option>
                                        <option value="Petang">Abiansemal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="small mb-1" for="deskripsi">Deskripsi Kos : </label>
                                <textarea type="text" class="form-control " name="deskripsi" id="deskripsi" placeholder="Deskripsi" required=""></textarea>
                            </div>
                        </div>
                        <div class="card-footer" style="text-align: right;">

                            <a href="<?php echo base_url() ?>adminkos/datakos" class="btn btn-secondary">Kembali</a>
                            <button type="submit" value="upload" class="btn btn-primary">Tambah</button>
                            <?php echo form_close() ?>

                        </div>

                    </div>

                </div>
                <script>
                    var map;

                    function initMap() {
                        console.log('init map');
                        const myLatlng = {
                            lat: -8.503,
                            lng: 115.215
                        };
                        console.log('init map')
                        const map = new google.maps.Map(document.getElementById("this_map"), {
                            zoom: 8,
                            center: myLatlng,
                        });

                        // Create the initial InfoWindow.
                        let infoWindow = new google.maps.InfoWindow({
                            content: "Click the map to get Lat/Lng!",
                            position: myLatlng,
                        });
                        infoWindow.open(map);
                        // Configure the click listener.
                        map.addListener("click", (mapsMouseEvent) => {
                            // Close the current InfoWindow.
                            infoWindow.close();
                            // Create a new InfoWindow.
                            infoWindow = new google.maps.InfoWindow({
                                position: mapsMouseEvent.latLng,
                            });
                            infoWindow.setContent(
                                JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
                            );
                            infoWindow.open(map);
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbmLZgJDDWp1lLXfKICo9BoUlHt1ZdQ_s&callback=initMap&libraries=&v=weekly" async></script>

                <!-- /.container-fluid -->
                <br>
                </div>
                <!-- End of Main Content -->