<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h3 class="mb-3">Edit Buku : <?= $data['buku']['judul'] ?></h3>
        <form action="<?= BASE_URL; ?>/buku/updateBuku" method="post">
        <div class="class-body">
            <input type="hidden" name="id" value="<?= $data['buku']['id']; ?>">
            <div class="form-group mb-3">
                <label for="judul">judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $data['buku']['judul'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="penulis">penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $data['buku']['penulis'] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="tgl_selesai">Tanggal selesai</label>
                <input type="text" class="form-control" id="tgl_selesai" name="tgl_selesai" value="<?= $data['buku']['tgl_selesai'] ?>">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    </div>
</body>
</html>