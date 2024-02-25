<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-...">
    </script>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/sb-admin-2.min.css'); ?>">


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <!-- judul (card) -->
    <div class="container mt-4">
        <h2 class="text-center">Data Buku</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data Buku +
        </button>


        <!-- Modal -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Buku</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo site_url('Welcome/addbuku'); ?>" method="post">

                            <div class="mb-3">
                                <label for="id_buku" class="form-label">Id Buku</label>
                                <input type="text" class="form-control" id="id_buku" name="id_buku" placeholder="Masukkan Id Buku" required>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan Kategori" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_buku" class="form-label">Nama Buku</label>
                                <input type="text" class="form-control" id="nama_buku" name="nama_buku" placeholder="Masukkan Nama Buku" required>
                            </div>
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga" required>
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok" required>
                            </div>
                            <div class="mb-3">
                                <label for="penerbit" class="form-label">Penerbit</label>
                                <input type="text" class="form-control" id="penerbit" name="penerbit" placeholder="Masukkan Penerbit" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                        <div id="pesan" class="alert" style="display: none;"></div>
                    </div>
                </div>
            </div>
        </div>


        <!-- tabel -->
        <div class="table-responsive">
            <div class="table table-bordered">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Buku</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Nama Buku</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($MasterDataBuku)) {
                            $no = 1;
                            foreach ($MasterDataBuku as $ReadDS) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $ReadDS->id_buku; ?></td>
                                    <td><?php echo $ReadDS->kategori; ?></td>
                                    <td><?php echo $ReadDS->nama_buku; ?></td>
                                    <td><?php echo $ReadDS->harga; ?></td>
                                    <td><?php echo $ReadDS->stok; ?></td>
                                    <td><?php echo $ReadDS->penerbit; ?></td>
                                    <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $ReadDS->id_buku; ?>">
                                            Update
                                        </button>
                                        <a href="<?php echo site_url('Welcome/deletebuku/' . $ReadDS->id_buku) ?>" class="btn btn-danger" onclick="return confirmDelete()"> Delete</a>
                                    </td>


                                    <div class="modal fade" id="exampleModal_<?php echo $ReadDS->id_buku; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <!-- Konten modal -->
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Blok Kavling</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= site_url('Welcome/updatebuku/' . $ReadDS->id_buku) ?>" method="post">
                                                        <div class="mb-3">
                                                            <label for="id_buku" class="form-label"></label>
                                                            <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?= $ReadDS->id_buku; ?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="kategori" class="form-label">Kategori</label>
                                                            <input type="text" class="form-control" id="kategori" name="kategori" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nama_buku" class="form-label">Nama Buku</label>
                                                            <input type="text" class="form-control" id="nama_buku" name="nama_buku" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="harga" class="form-label">Harga</label>
                                                            <input type="text" class="form-control" id="harga" name="harga" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="stok" class="form-label">Stok</label>
                                                            <input type="text" class="form-control" id="stok" name="stok" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="penerbit" class="form-label">Penerbit</label>
                                                            <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Kembali</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>



                                                    </form>
                                                    <!-- Akhir formulir -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Akhir konten modal -->

                                    </div>
                                    <!-- Akhir Modal Edit -->
                                    </td>
                                </tr>
                        <?php
                                $no++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>




    </div>


    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>