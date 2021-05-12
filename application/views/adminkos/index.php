<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> Dashboard Admin Pemilik kos</h1>
    </div>
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Kos Anda</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_kos; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Jumlah Penyewa Kos</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_user; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Transaksi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total_transaksi; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Approach -->
        <div class="col-6">
            <div class="card shadow mb-4 ">
                <div class=" card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Selamat Datang Di Badung Kos</h6>
                </div>
                <div class="card-body">
                    <p>Selamat Datang, di Dashboard admin pemilik kos.</p>
                    <p class="mb-0">Badung kos merupakan aplikasi pencarian rumah kos di kabupaten Badung, yang memudahkan masyarakat dalam mencari kos maupun sewa sekaligus pembayaran rumah kos.</p>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card shadow mb-3 ">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile.png') ?>" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"> <?= $admin['Nama'] ?></h5>
                            <?= $admin['Username'] ?></p>
                            <p class="card-text"><small class="text-muted"> Nomor Telephone : &nbsp; <?= $admin['No_telp'] ?></small></p>
                            <p class="card-text"><small class="text-muted"> Alamat : &nbsp;<?= $admin['Alamat'] ?></small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->