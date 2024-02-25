<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
        <h2 class="text-center">Data Penerbit</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data Penerbit +
        </button>


        <!-- Modal -->
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Penerbit</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo site_url('Welcome/addpenerbit'); ?>" method="post">

                            <div class="mb-3">
                                <label for="id_penerbit" class="form-label">ID Penerbit</label>
                                <input type="text" class="form-control" id="id_penerbit" name="id_penerbit" placeholder="Masukkan Id Penerbit" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="kota" class="form-label">Kota</label>
                                <input type="text" class="form-control" id="kota" name="kota" placeholder="Masukkan Kota" required>
                            </div>
                            <div class="mb-3">
                                <label for="telepon" class="form-label">Telepon</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan Telepon" required>
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
            <table class="table">
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Penerbit</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kota</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($MasterDataPenerbit)) {
                            $no = 1;
                            foreach ($MasterDataPenerbit as $ReadDS) {
                        ?>
                                <tr>
                                    <th scope="row"><?php echo $no; ?></th>
                                    <td><?php echo $ReadDS->id_penerbit; ?></td>
                                    <td><?php echo $ReadDS->nama; ?></td>
                                    <td><?php echo $ReadDS->alamat; ?></td>
                                    <td><?php echo $ReadDS->kota; ?></td>
                                    <td><?php echo $ReadDS->telepon; ?></td>
                                    <!-- Tombol Edit dengan atribut data-bs-target sesuai dengan ID modal yang unik -->
                                    <td><button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal_<?php echo $ReadDS->id_penerbit; ?>">
                                            Update
                                        </button>
                                        <a href="<?php echo site_url('Welcome/deletepenerbit/' . $ReadDS->id_penerbit) ?>" class="btn btn-danger" onclick="return confirmDelete()"> Delete</a>
                                    </td>




                                    <div class="modal fade" id="exampleModal_<?php echo $ReadDS->id_penerbit; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <!-- Konten modal -->
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data Penerbit</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="<?= site_url('Welcome/updatepenerbit/' . $ReadDS->id_penerbit) ?>" method="post">
                                                        <div class="mb-3">
                                                            <label for="id_penerbit" class="form-label"></label>
                                                            <input type="text" class="form-control" id="id_penerbit" name="id_penerbit" value="<?= $ReadDS->id_penerbit; ?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nama" class="form-label">Nama</label>
                                                            <input type="text" class="form-control" id="nama" name="nama" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="alamat" class="form-label">Alamat</label>
                                                            <input type="text" class="form-control" id="alamat" name="alamat"  required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="kota" class="form-label">Kota</label>
                                                            <input type="text" class="form-control" id="kota" name="kota" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="telepon" class="form-label">Telepon</label>
                                                            <input type="text" class="form-control" id="telepon" name="telepon"required>
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
            </table>
        </div>



    </div>


    <script>
        function confirmDelete() {
            return confirm('Apakah Anda yakin ingin menghapus data ini?');
        }
    </script>
</body>

</html>