<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block" style="margin: auto;">
                            <center><img src="<?= base_url('assets/'); ?>img/logo.png" height="50%" width="50%" alt=""></center>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang <br> Di Website Admin Badung Kos </h1>
                                </div>

                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="POST" action="<?= base_url('auth') ?>">
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Nama User :</label>
                                        <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Masukkan nama user" value="<?= set_value("username");  ?>">
                                        <?= form_error('username', ' <small class="text-danger ">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="inputEmailAddress">Kata sandi :</label>
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukkan kata sandi">
                                        <?= form_error('password', ' <small class="text-danger ">', '</small>'); ?>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <p>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration') ?>">Lupa Password !</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration') ?>">Buat Akun !</a>
                                </div>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>