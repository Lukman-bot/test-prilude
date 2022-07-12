
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Icon Website -->
    <link href="<?= base_url('__assets/img/logo/ayo.png') ?>" rel="icon">
    <title>Admin | <?= $title ?></title>
    <link href="<?= base_url('__assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('__assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('__assets/css/ruang-admin.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('__assets/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('admin/template/_sidebar'); ?>
        <!-- Sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <?php $this->load->view('admin/template/_topbar'); ?>
                </nav>
                <!-- Topbar -->

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">

                    <!-- Konten Website -->
                    <?php $this->load->view('admin/pages/' . $page) ?>
                    <!-- End Konten Website -->

                </div>
                <!---Container Fluid-->
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - created by
                            <b><a href="#" target="_blank"><?= $footer; ?></a></b>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer -->

        </div>
    </div>

    <!-- Scroll to top -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Anda yakin ingin keluar ?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Klik tombol "Logout" untuk keluar.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?= base_url('adminn/Auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('__assets/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('__assets/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('__assets/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
    <script src="<?= base_url('__assets/js/ruang-admin.min.js') ?>"></script>
    <script src="<?= base_url('__assets/vendor/chart.js/Chart.min.js') ?>"></script>
    <script src="<?= base_url('__assets/js/demo/chart-area-demo.js') ?>"></script>
    <!-- Page level custom scripts -->
    <script src="<?= base_url('__assets/js/demo/chart-pie-demo.js') ?>"></script>
    <script src="<?= base_url('__assets/js/demo/chart-bar-demo.js') ?>"></script>
    <!-- Page level plugins -->
    <script src="<?= base_url('__assets/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('__assets/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>
    <!-- Sweet Alert 2 -->
    <script src="<?= base_url('__asset/vendor/sweetalert2/sweetalert2.js') ?>"></script>

        
    <script>
        $('#summernote').summernote({
            height: 300,
            toolbar: [
                // [Group Name, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear', 'fontname']],
                ['misc', ['undo', 'redo']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['insert', ['table', 'link', 'hr', 'fullscreeb']],
            ],
            placeholder: 'Masukkan Nama User di sini....'
        });
    </script>

    <!-- Untuk Data Tabel -->
    <?php
        if(isset($datatable)){
            $this->load->view('admin/pages/' . $datatable);
        }
    ?>

    <!-- Untuk Chart di Dashboard -->
    <?php
        if (isset($pageChart)) {
            $this->load->view('admin/template/' . $pageChart);
        }
    ?>

    <!-- Page level custom scripts -->
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable(); // ID From dataTable 
            $('#dataTableHover').DataTable(); // ID From dataTable with Hover
        });
    </script>
</body>

</html>