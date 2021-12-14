<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Detail Data Buku
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $buku['judul']; ?></h5>
                    <p>Pengarang :</p><h6 class="card-subtitle mb-2 text-muted"><?= $buku['pengarang']; ?></h6>
                    <p class="card-text"><?= $buku['tahun']; ?></p>
                    <p class="card-text"><?= $buku['deskripsi']; ?></p>
                    <a href="<?= base_url(); ?>buku" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        
        </div>
    </div>
</div>