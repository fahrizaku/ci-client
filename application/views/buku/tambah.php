<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Form Tambah Data Buku
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="judul">Judul Buku</label>
                            <input type="text" name="judul" class="form-control" id="judul">
                            <small class="form-text text-danger"><?= form_error('judul'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" name="tahun" class="form-control" id="tahun">
                            <small class="form-text text-danger"><?= form_error('tahun'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="pengarang">Pengarang</label>
                            <input type="text" name="pengarang" class="form-control" id="pengarang">
                            <small class="form-text text-danger"><?= form_error('pengarang'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Penerbit</label>
                            <select class="form-control" id="deskripsi" name="deskripsi">
                                <option value="Gramedia Pustaka">Gramedia Pustaka</option>
                                <option value="Penerbit Airlangga">Penerbit Airlangga</option>
                                <option value="Mizan">Mizan</option>
                                <option value="Elexmedia Komputindo">Elexmedia Komputindo</option>
                                <option value="Agro Media">Agro Media</option>
                            </select>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data</button>
                    </form>
                </div>
            </div>


        </div>
    </div>

</div>