<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body>
    <div class="card mx-auto" style="width: 18rem; margin-top:auto;">
        <img src="<?= base_url('assets/foto/') . $user[0]['FOTO_USER'] ?>" class="card-img-top" alt="<?= $user[0]['NAMA_USER'] ?>">
        <div class="card-body">
            <form class="user">
                <div class="form-group">
                    <label for="nama">Nama: </label>
                    <input class="form-control form-control-user" type="text" value="<?= $user[0]['NAMA_USER'] ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="nama">Email: </label>
                    <input type="text" class="form-control form-control-user" value="<?= $user[0]['EMAIL_USER'] ?>" readonly>
                </div>
                <a href="<?= site_url('Auth/logout') ?>" class="btn btn-danger btn-block">Logout</a>
            </form>
        </div>
    </div>
</body>

</html>