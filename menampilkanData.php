<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menampilkan Data</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
</head>

<body>


    <!-- modal tambah -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="nama" class="form-label">nama</label>
                        <input type="text" id="nama" class="form-control" aria-describedby="passwordHelpBlock">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamat" class="form-control" aria-describedby="passwordHelpBlock">
                        <label for="profil" class="form-label">Profil</label>
                        <input type="file" id="profil" class="form-control" name="profil" aria-describedby="passwordHelpBlock">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="menambahData()">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- akhir modal tambah -->


    <!-- modal edit -->

    <div class="modal" id="modalEdit" tabindex="-1" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data</h5>
                    <button type="button" class="btn-close" onclick="menutupMoadal()" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <label for="nama" class="form-label">nama</label>
                        <input type="hidden" name="idEdit" id="idEdit">
                        <input type="text" id="namaEdit" class="form-control" aria-describedby="passwordHelpBlock">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" id="alamatEdit" name="alamatEdit" class="form-control" aria-describedby="passwordHelpBlock">
                        <input type="hidden" id="profilEdit" name="profilEdit" class="form-control" aria-describedby="passwordHelpBlock">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="menutupMoadal()">Close</button>
                    <button type="button" class="btn btn-primary" onclick="mengupdateData()">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- akhir modal edit -->

    <div class="container mt-4">

        <div class="row">
            <div class="col-md-7 col-12">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Data</button>
            </div>
            <div class="col-md-5 col-12">
                <form class="d-flex align-items-center">
                    <h5 class=" ms-auto me-1">Cari Data: </h5>
                    <input type="text" id="search" style="width:400px;" class="form-control">
                </form>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Asal</th>
                    <th>photo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="menampilkanData">

            </tbody>
        </table>
    </div>

    <script src="bootstrap/js/bootstrap.bundle.js"></script>
    <script src="ajax/menampilkanData.js"></script>
    <script src="ajax/menambahData.js"></script>
    <script src="ajax/menghapusData.js"></script>
    <script src="ajax/mengubahData.js"></script>
</body>

</html>