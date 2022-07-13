    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('superadminn/Dashboard') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>

    <!-- Alert -->
    <div class="row">
        <div class="col">
            <?php if($this->session->flashdata('message')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('message') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>   
                </div>
            <?php endif ?>
        </div> 
    </div> 

    <div class="row">
        <div class="col">
            <?php if($this->session->flashdata('berhasil')): ?>
                <div class="alert alert-success alert-dissmissable fade show" role="alert">
                    <?= $this->session->flashdata('berhasil') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif($this->session->flashdata('gagal')) : ?>
                <div class="alert alert-error alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('gagal') ?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Table Absen</h6>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-header d-flex flex-row align-items-center justify-content-between">
                            <a href="<?= base_url('adminn/Absen/Add') ?>" class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> Tambah
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive p-3">
                    <table id="dataTable" class="table align-items-center table-fluish">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal</th>
                                <th>Nama Karyawan</th>
                                <th>Nomor Telepon</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($dataAbsen as $showAbsen) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $showAbsen->tanggal ?></td>
                                        <td><?= $showAbsen->namakaryawan ?></td>
                                        <td><?= $showAbsen->noteleponkaryawan ?></td>
                                        <td>
                                            <?php
                                                if ($showAbsen->absen == 'H') {
                                                    echo "<span class='badge badge-success'>Hadir</span>";
                                                } if ($showAbsen->absen == 'T') {
                                                    echo "<span class='badge badge-warning'>Telat</span>";
                                                } if ($showAbsen->absen == 'I') {
                                                    echo "<span class='badge badge-primary'>Izin</span>";
                                                } if ($showAbsen->absen == 'A') {
                                                    echo "<span class='badge badge-danger'>Alpha</span>";
                                                }
                                            ?>
                                        </td>
                                    </tr>   
                                    <?php
                                    $no++;
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

