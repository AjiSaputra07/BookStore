<div class="modal fade" id="fatma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Isi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('Pages/simpan_penerbit');?>" method="POST">
                <div class="modal-body">

                    <div class="row g-3">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Penerbit"
                                name="namaPenerbit">
                            <label for="floatingInput">Nama Penerbit</label>
                        </div>

                        <div class="row g-3">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Alamat Penerbit"
                                    name="alamatPenerbit">
                                <label for="floatingInput">Alamat Penerbit</label>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>