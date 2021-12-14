<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Ubah Data Karyawan
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $karyawan['id']; ?>">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $karyawan['nama']; ?>">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="kode">ID Pegawai</label>
                            <input type="text" name="kode" class="form-control" id="kode" value="<?= $karyawan['kode']; ?>">
                            <small class="form-text text-danger"><?= form_error('kode'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="telp">No Telepone</label>
                            <input type="text" name="telp" class="form-control" id="telp" value="<?= $karyawan['telp']; ?>">
                            <small class="form-text text-danger"><?= form_error('telp'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="bagian">Bagian</label>
                            <select class="form-control" id="bagian" name="bagian">
                                <?php foreach( $bagian as $j ) : ?>
                                    <?php if( $j == $karyawan['bagian'] ) : ?>
                                        <option value="<?= $j; ?>" selected><?= $j; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $j; ?>"><?= $j; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" name="ubah" class="btn btn-primary float-right">Ubah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>