    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Buat Akun Pemilik Kos</h1>
                            </div>
                            <form class="user" method="POST" action="<?= base_url('auth/registration'); ?>">
                                <div class="form-group ">
                                    <label class="small mb-1" for="namalengkap">Username </label>
                                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= set_value("username");  ?>">
                                    <?= form_error('username', ' <small class="text-danger ">', '</small>'); ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label class="small mb-1" for="username">Password : </label>
                                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', ' <small class="text-danger ">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="small mb-1" for="password">Confirm Password : </label>
                                        <input type="password" id="password2" class="form-control form-control-user" name="password2" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="small mb-1" for="namalengkap">Nama Lengkap : </label>
                                    <input type="text" class="form-control form-control-user" id="name" placeholder="Nama Lengkap" name="name" value="<?= set_value("name");  ?>">
                                    <?= form_error('name', ' <small class="text-danger ">', '</small>'); ?>
                                </div>
                                <div class="form-group ">
                                    <label class="small mb-1" for="notelp">No Telpon : </label>
                                    <input type="text" class="form-control form-control-user" id="notelp" name="notelp" placeholder="No Telepon" value="<?= set_value("notelp");  ?>">
                                    <?= form_error('notelp', ' <small class="text-danger ">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="jeniskelamin">Jenis Kelamin: </label>
                                    <p>
                                        <input type="radio" id="Pria" name="gender" value="pria" <?php echo set_radio('gender', 'pria'); ?>>
                                        <label class="small mb-1" for="pria">Pria</label><br>
                                        <input type="radio" id="Wanita" name="gender" value="wanita" <?php echo set_radio('gender', 'wanita'); ?>>
                                        <label class="small mb-1" for="wanita">Wanita</label><br>
                                        <?= form_error('gender', ' <small class="text-danger ">', '</small>'); ?>

                                    </p>
                                </div>

                                <div class="form-group">
                                    <label class="small mb-1" for="namalengkap">Alamat: </label>
                                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?= set_value("alamat");  ?>"></input>
                                    <?= form_error('alamat', ' <small class="text-danger ">', '</small>'); ?>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Buat Akun
                                </button>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('auth') ?>">Sudah punya akun? Login disini!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>