
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="img/logo/logo.png" rel="icon">
    <title>Lukman Aditiya - Login</title>
    <link href="<?= base_url('__assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('__assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('__assets/css/ruang-admin.min.css') ?>" rel="stylesheet">

</head>

<body class="bg-gradient-login">
    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-12 col-md-9">
                <div class="card shadow-sm my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="login-form">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                        <?php
                                        if (!empty($this->session->flashdata('pesan'))) { ?>
                                            <div class="alert alert-warning alert-dismissible">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h4><i class="icon fa fa-warning"></i> Pemberitahuan</h4>
                                                <?= $this->session->flashdata('pesan'); ?>
                                            </div>
                                        <?php    }
                                        ?>
                                    </div>
                                    <form class="user" action="<?= base_url() ?>adminn/Auth/" method="POST">
                                        <div class="form-group">
                                            <input type="username" name="username" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Masukkan Email Anda">
                                            <font color="red"><?= form_error('username') ?></font> 
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword" placeholder="Masukkan Password Anda">
                                            <font color="red"><?= form_error('password') ?></font> 
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-block" type="submit">Login</button>
                                        </div>
                                        <hr>
                                    </form>
                                    <div class="text-center">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Content -->
    <script src="<?= base_url('__assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('__assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('__assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('__assets/js/ruang-admin.min.js') ?>"></script>
</body>

</html>