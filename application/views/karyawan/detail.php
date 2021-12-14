<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Karyawan
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $karyawan['nama']; ?></h5>
                    <p>No Telepone :</p><h6 class="card-subtitle mb-2 text-muted"><?= $karyawan['telp']; ?></h6>
                    <p>ID Pegawai :</p><p class="card-text"><?= $karyawan['kode']; ?></p>
                    <p class="card-text"><?= $karyawan['bagian']; ?></p>
                    <a href="<?= base_url(); ?>karyawan" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>