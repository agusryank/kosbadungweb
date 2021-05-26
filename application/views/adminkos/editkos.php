                <!-- Begin Page Content -->

                <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
                <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbmLZgJDDWp1lLXfKICo9BoUlHt1ZdQ_s&callback=initMap&libraries=&v=weekly" async></script>

                <div class="container-fluid">

                    <div id="map"></div>

                    <!-- Form Tambah Data Kos -->

                    <div class="card shadow mb-3 " style=" margin-left: auto; margin-right: auto; width: 550px">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Kos</h6>
                        </div>
                        <div class="card-body">
                            <?php foreach ($data_kos as $m) { ?>
                                <?php echo form_open_multipart('adminkos/edit_datakos/' . $m->id); ?>
                                <div class="form-group ">
                                    <label class="small mb-1" for="namakos">Nama Kos : </label>
                                    <input type="hidden" name="id_Kos" value="<?php echo $m->id; ?>">
                                    <input type=" text" name="namakos" class="form-control" value="<?php echo $m->Namakos; ?>" id="namakos" placeholder="Nama Kos" required="">
                                </div>
                                <div class="form-group ">
                                    <input type="hidden" name="namapemilik" class="form-control" id="namapemilik" value="<?php echo $m->Namapemilik; ?>" required>
                                </div>

                                <div class=" form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <!-- <label class="small mb-1" for="lat">Latitude : </label> -->
                                        <input type="hidden" name="lat" class="form-control" value="<?php echo $m->Latitude; ?>" id="lat" placeholder="Latitude" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- <label class="small mb-1" for="long">Longtitude :</label> -->
                                        <input type="hidden" class="form-control" value="<?php echo $m->Longtitude; ?>" name="long" id="long" placeholder="Longtitude" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="long">Lokasi Alamat Kos :</label>
                                    <p> <label class="small mb-1" for="long">Drag and drop pada maps, untuk menentukan alamat lokasi kos anda </label>
                                    </p>
                                    <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 300px "></div>
                                </div>

                                <div class="form-group ">
                                    <label class="small mb-1" for="foto1">Foto 1:</label>
                                    <input type="hidden" class="form-control" value="<?php echo $m->foto1; ?>" id="foto1" name="oldfoto1">

                                    <input type="file" class="form-control" id="foto1" name="foto1" size="20">
                                    <img size="20%" class="img-fluid" src="<?php echo  base_url('androidAPI/Image/FotoKos/' . $m->foto1); ?> ">
                                </div>
                                <div class="form-group ">
                                    <label class="small mb-1" for="foto2">Foto 2:</label>
                                    <input type="hidden" class="form-control" value="<?php echo $m->foto2; ?>" id="foto2" name="oldfoto2">

                                    <input type="file" class="form-control" id="foto2" name="foto2" size="20">
                                    <img size="20%" class="img-fluid" src="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto2); ?> ">
                                </div>
                                <div class="form-group ">
                                    <label class="small mb-1" for="foto3">Foto 3:</label>
                                    <input type="hidden" class="form-control" value="<?php echo $m->foto3; ?>" id="foto3" name="oldfoto3">

                                    <input type="file" class="form-control" id="foto3" name="foto3" size="20">
                                    <img size="20%" class="img-fluid" src="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto3); ?> ">
                                </div>
                                <div class="form-group ">
                                    <label class="small mb-1" for="foto4">Foto 4:</label>
                                    <input type="hidden" class="form-control" value="<?php echo $m->foto4; ?>" id="foto4" name="oldfoto4">

                                    <input type="file" class="form-control" id="foto4" name="foto4" size="20">
                                    <img size="20%" class="img-fluid" src="<?= base_url('androidAPI/Image/FotoKos/' . $m->foto4); ?> ">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label class="small mb-1" for="kecamatan">Kecamatan :</label>
                                        <select name="kecamatan" class="form-control" id="kecamatan" required="">
                                            <option value="<?php echo $m->Kecamatan; ?>" selected>Pilih Kecamatan : <?php echo $m->Kecamatan; ?></option>
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
                                    <textarea value="" type="text" class="form-control " name="deskripsi" id="deskripsi" placeholder="Deskripsi" required=""><?php echo $m->Deskripsi; ?></textarea>
                                </div>
                        </div>
                        <div class="card-footer" style="text-align: right;">

                            <a href="<?php echo base_url() ?>adminkos/datakos" class="btn btn-secondary">Kembali</a>
                            <button type="submit" value="upload" class="btn btn-primary">Tambah</button>
                            <?php echo form_close() ?>
                        <?php } ?>
                        </div>

                    </div>

                </div>

                <script>
                    function initMap() {
                        var takeLat = document.getElementById("lat").value;
                        var takeLng = document.getElementById("long").value;
                        console.log(takeLat);
                        console.log(takeLng);
                        var myLatlng = {
                            lat: parseFloat(takeLat),
                            lng: parseFloat(takeLng)
                        };
                        const map = new google.maps.Map(document.getElementById("map-container-google-1"), {
                            zoom: 14,
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

                            console.log("init map");
                            var input_lat = document.getElementById("lat");
                            var input_lng = document.getElementById("long");

                            var latlng_json = mapsMouseEvent.latLng.toJSON()
                            console.log(latlng_json["lat"]);
                            console.log(latlng_json["lng"]);
                            input_lat.value = latlng_json["lat"];
                            input_lng.value = latlng_json["lng"];
                        });
                    }
                </script>

                <!-- /.container-fluid -->
                <br>
                </div>
                <!-- End of Main Content -->