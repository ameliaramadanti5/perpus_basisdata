<div class="card">
    <div class="card-header">
        Pengadaan
    </div>
    <div class="card-body">

        <!-- Button trigger modal -->
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand">Data Buku Yang Harus Di Beli</a>

            </div>
        </nav>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Buku</th>
                    <th scope="col">Nama Penerbit</th>
                    <th scope="col">Sisa Stok</th>


                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($Pengadaan)) {
                    $no = 1;
                    foreach ($Pengadaan as $ReadDS) {
                ?>

                        <tr>
                            <th scope="row"><?php echo $no; ?></th>
                            <td><?php echo $ReadDS->nama_buku; ?></td>
                            <td><?php echo $ReadDS->penerbit; ?></td>
                            <td><?php echo $ReadDS->stok; ?></td>

                        </tr>
            </tbody>
    <?php
                        $no++;
                    }
                }
    ?>
        </table>