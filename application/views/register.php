<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register Akun</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <div id="flash-data2" data-flashdata="<?= $this->session->flashdata('gagal'); ?>"></div>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST" action="<?= site_url('Auth/register') ?>" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="wajib"><small class="text-danger">*</small></label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nama Depan" name="nama_depan" value="<?= set_value('nama_depan') ?>">
                                        <?= form_error('nama_depan', '<small class="text-danger pl-3">', '</small>'); ?>

                                    </div>
                                    <div class="col-sm-6">
                                        <label for="text-white"></label>
                                        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Nama Belakang" name="nama_belakang" value="<?= set_value('nama_belakang') ?>">
                                    </div>
                                    <?= form_error('nama_belakang', '<small class="text-danger pl-3">', '</small>'); ?>

                                </div>
                                <div class="form-group">
                                    <label for="wajib"><small class="text-danger">*</small></label>
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Alamat Email" name="email" value="<?= set_value('email') ?>">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>

                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="wajib"><small class="text-danger">*</small></label>

                                        <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="pass">
                                        <small class="text-primary">Password harus terdiri dari minimal 8 karakter dan mengandung huruf dan angka</small>
                                        <?= form_error('pass', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="wajib"><small class="text-danger">*</small></label>
                                        <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulangi Password" name="repass">
                                        <?= form_error('repass', '<small class="text-danger pl-3">', '</small>'); ?>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="pertanyaan">Upload Foto Profil</label><small class="text-danger">*</small>
                                    <input type="file" class="form-control form-control-user" name="foto" placeholder="Profil Picture">
                                    <small class="text-danger pl-3"><?= $this->session->flashdata('foto'); ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="pertanyaan">Pilih Pertanyaan Berikut Sebagai Konfirmasi Keamanan</label><small class="text-danger">*</small>
                                    <select class="custom-select" name="pertanyaan">
                                        <option selected>Pilih Pertanyaan</option>
                                        <?php foreach ($pertanyaan as $question) : ?>
                                            <option value="<?= $question['ID_PERTANYAAN'] ?>"><?= $question['PERTANYAAN'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <small class="text-danger pl-3"><?= $this->session->flashdata('pertanyaan'); ?></small>

                                </div>
                                <div class="form-group">
                                    <small class="text-danger">*</small>
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Jawaban dari pertanyaan yang Anda pilih" name="jawaban">
                                    <?= form_error('jawaban', '<small class="text-danger pl-3">', '</small>'); ?>

                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= site_url('welcome') ?>">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/js/sb-admin-2.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/myscript.js') ?>" type="text/javascript"></script>

</body>

</html>