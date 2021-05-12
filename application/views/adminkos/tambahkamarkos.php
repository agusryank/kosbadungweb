<div class="container-fluid">


    <!-- Form Tambah Data Kos -->

    <div class="card shadow mb-3 " style=" margin-left: auto; margin-right: auto; width: 550px">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Kamar Kost</h6>
        </div>
        <div class="card-body">
            <?php echo form_open_multipart('adminkos/Tambah_data_kamarkos'); ?>
            <div class="form-group ">
                <label class="small mb-1" for="namakos">Nama Kamar : </label>
                <input type="text" name="namakamar" class="form-control " id="namakos" placeholder="Nama Kamar" required="">
            </div>
            <?php foreach ($kosid as $m) { ?>
                <div class="form-group ">
                    <input type="hidden" name="id_kos" class="form-control " value="<?= $m->id ?>" required="">
                </div>

                <div class="form-group ">
                    <input type="hidden" name="namakos" class="form-control" value="<?= $m->Namakos ?>" placeholder="Nama Kos" required="">
                </div>
            <?php } ?>
            <div class="form-group ">
                <input type="hidden" name="id_pemilik" class="form-control " value="<?= $admin['id'] ?>" required="">
            </div>
            <div class="form-group ">
                <input type="hidden" name="namapemilik" class="form-control " value="<?= $admin['Nama'] ?>" required="">
            </div>
            <div class="form-group ">
                <label class="small mb-1" for="foto">Foto Kamar</label>
                <input class="form-control" type="file" name="userfile" id="foto" required="" />
            </div>
            <div class="form-group">
                <label class="small mb-1" for="fasilitas">Fasilitas Kamar :</label>
                <textarea type="text" class="form-control " name="fasilitas" id="fasilitas" placeholder="Fasilitas Kamar" required=""></textarea>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <label class="small mb-1" for="jmlkamar">Jumlah Kamar Yang Tersedia:</label>
                    <input type="number" name="jmlkamar" min="1" max="100" class="form-control " id="jmlkamar" placeholder="Kamar Tersedia" required="">
                </div>
            </div>
            <div class="form-group ">
                <label class="small mb-1" for="harga">Harga Kamar / Bulan :</label>
                <input type="text" class="form-control " name="harga" id="harga" placeholder="Harga Sewa" required="">
            </div>
        </div>
        <div class="card-footer" style="text-align: right;">
            <a href="<?php echo base_url() ?>adminkos/datakamarkos" class="btn btn-secondary">Kembali</a>
            <button type="submit" value="upload" class="btn btn-primary">Tambah</button>
            <?php echo form_close() ?>

        </div>

    </div>

</div>

<!-- /.container-fluid -->
<br>
</div>
<!-- End of Main Content -->