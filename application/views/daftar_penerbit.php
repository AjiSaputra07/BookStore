<div class="card mt-2">
    <div class="card-header text-center">
        <h1>Selamat Datang Di Halaman Daftar Penerbit</h1>
    </div>
    <div class="card-body">
        <!-- Menampilkan flashdata -->
        <?= $this->session->flashdata('pesan');?>
        <!-- Tombol Tambah -->
        <!-- Button trigger modal -->

        <button type="button" class="btn btn-primary col-12 mb-3" data-bs-toggle="modal" data-bs-target="#fatma">
            Tambah Data Penerbit
        </button>

        <!-- <div class="card-body"> -->
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Kode penerbit</th>
                    <th scope="col">Nama Penerbit</th>
                    <th scope="col">Alamat Penerbit</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach($data_penerbit as $row) { ?>
                <tr>
                    <th scope="row"><?= $no++; ?></th>
                    <td><?= $row['kode_penerbit']; ?></td>
                    <td><?= $row['nama_penerbit']; ?></td>
                    <td><?= $row['alamat_penerbit']; ?></td>

                    <td>
                        <a href="<?=base_url('Pages/hapus_penerbit/').$row['kode_penerbit'];?>"
                            class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data Ini?')">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                        <a href="<?=base_url('Pages/show_edit_page2/').$row['kode_penerbit'];?>"
                            class="btn btn-success btn-sm">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                    </td>

                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>