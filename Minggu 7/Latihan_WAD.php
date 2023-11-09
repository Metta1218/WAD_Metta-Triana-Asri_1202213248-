<?php
require 'function.php';
require 'ceklog.php'

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Record Transaksi</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hpmodal">
                                Tambah 
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Kode Kue</th>
                                            <th>Nama Kue</th>
                                            <th>Rasa Kue</th>
                                            <th>Harga</th>
                                            <th>Stock</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $viewcake = mysqli_query($conn, "SELECT * FROM `kue`");
                                        while ($data = mysqli_fetch_array($viewcake)) {
                                            $id_kue = $data['id_kue'];
                                            $name = $data['Nama'];
                                            $rasa = $data['rasa'];
                                            $harga = $data['harga'];
                                            $stock = $data['stock'];
                                            $keterangan = $data['keterangan'];

                                        ?>
                                            <tr>
                                                <td><?= $id_kue; ?></td>
                                                <td><?= $nama; ?></td>
                                                <td><?= $rasa; ?></td>
                                                <td><?= "Rp " . $harga; ?></td>
                                                <td><?= $stock ?></td>
                                                <td><?= $keterangan; ?></td>
                                                <td>
                                                    <button style="margin: 2px;" type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalupdate<?= $id_kue; ?>">Update</button>
                                                    <button style="margin: 2px;" type="button" class="btn btn-danger" data-toggle="modal" data-target="#modaldelete<?= $id_kue; ?>">Delete</button>
                                                </td>
                                            </tr>
                                        
                                            <div class="modal fade" id="modalupdate<?= $id_kue; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Update Tabel</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <input type="text" name="nama" value="<?= $nama; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="text" name="rasa" value="<?= $rasa; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="number" name="harga" value="<?= $harga; ?>" class="form-control" required>
                                                                <br />
                                                                <input type="number" name="stock" value="<?= $stock; ?>" class="form-control" required>
                                                                <br />
                                                                <textarea type="text" class="form-control" name="spek" rows="3" required><?= $spek; ?></textarea>
                                                                <input type="hidden" name="idkue" value="<?= $id_kue; ?>">
                                                                <br />
                                                                <button type="submit" name="updatekue" class="btn btn-warning">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal fade" id="modaldelete<?= $id_kue; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form method="POST">
                                                            <div class="modal-body">
                                                                <fieldset disabled>
                                                                    <input type="text" name="nama" value="<?= $nama; ?>" class="form-control" required>
                                                                    <br />
                                                                    <input type="text" name="rasa" value="<?= $rasa; ?>" class="form-control" required>
                                                                    <br />
                                                                </fieldset>
                                                                <br />
                                                                Apakah anda ingin menghapus kue ini?
                                                                <br />
                                                                <br />
                                                                <input type="hidden" name="idkue" value="<?= $id_kue; ?>">
                                                                <button type="submit" name="delete" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        };

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>
</html>