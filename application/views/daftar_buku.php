<div class="card mt-2">
  <div class="card-header text-center">
    <h1>Selamat Datang Di Halaman Daftar Buku</h1>
  </div>
  <div class="card-body">
    <!-- Menampilkan flashdata -->
    <?= $this->session->flashdata('pesan');?>
    <!-- Tombol Tambah -->
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary col-12 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data Buku
</button>

    <table class="table table-striped" id="myTable">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Kode Buku</th>
          <th scope="col">Judul Buku</th>
          <th scope="col">Tahun Terbit</th>
          <th scope="col">Penerbit</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
            $no = 1;
            foreach($data_buku as $row) { ?>
            <tr>
              <th scope="row"><?= $no++; ?></th>
              <td><?= $row['kode_buku']; ?></td>
              <td><?= $row['judul_buku']; ?></td>
              <td><?= $row['tahun_terbit']; ?></td>
              <td><?= $row['nama_penerbit']; ?></td>
              
              <td>
                <a href="<?=base_url('Pages/hapus_buku/').$row['kode_buku'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Data Ini?')">
                  <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
                <a href="<?=base_url('Pages/show_edit_page/').$row['kode_buku'];?>" class="btn btn-success btn-sm">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                </a>
              </td>

            </tr>
          <?php } ?>
      </tbody>
    </table>
    </div>
</div>