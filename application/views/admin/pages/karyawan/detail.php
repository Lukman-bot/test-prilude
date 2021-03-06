
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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Karyawan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('adminn/Home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('adminn/Karyawan') ?>">Data Karyawan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail Karyawan</li>
        </ol>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Detail Karyawan#<?= $detail->namakaryawan ?></h6>
                    <button class="btn btn-info btn-sm" title="Edit Detail Karyawan" data-toggle="modal" data-target="#modal-edit-<?= $detail->karyawanid ?>">
                        <li class="fa fa-edit"></li>
                    </button>
                </div>
                <div class="card-body">
                    <p class="float-right">
                        <img src="<?= base_url("__assets/img/karyawan/$detail->photo") ?>" alt="" height="200" class="img-responsive">
                    </p>
                    <p>Username: <b><?= $detail->username ?></b></p>
                    <p>Nama Karyawan: <b><?= $detail->namakaryawan ?></b></p>
                    <p>Nomor Telepon: <b><?= $detail->noteleponkaryawan ?></b></p>
                    <p>Email Karyawan: <b><?= $detail->emailkaryawan ?></b></p>
                    <p>Kota Lahir: <b><?= $detail->kotalahirkaryawan ?></b></p>
                    <p>Tanggal Lahir: <b><?= $detail->tanggallahirkaryawan ?></b></p>
                    <p>NIK: <b><?= $detail->nikkaryawan ?></b></p>
                </div>
            </div>
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

    <!-- Modal Add Detail Karyawan -->
<?php
    foreach ($idKaryawan->result_array() as $showID) :
?>
    <div class="modal fade" id="modal-edit-<?php echo $showID['karyawanid'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Detail Karyawan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('adminn/Karyawan/UpdateDetail') ?>" method="POST">
                    <div class="modal-body">
                        <input type="text" name="idkaryawan" value="<?php echo $showID['karyawanid'] ?>">

                        <p>Nama Karyawan</p>
                        <p><input type="text" name="namakaryawan" value="<?php echo $showID['namakaryawan'] ?>" class="form form-control" placeholder="Lukman Aditiya Anggara"></p>

                        <p>Nomor Telepon Karyawan</p>
                        <p><input type="text" name="noteleponkaryawan" value="<?php echo $showID['noteleponkaryawan'] ?>" class="form form-control" placeholder="089510396303"></p>

                        <p>Email Karyawan</p>
                        <p><input type="email" name="emailkaryawan" value="<?php echo $showID['emailkaryawan'] ?>" class="form form-control" placeholder="bunga.langensari@gmail.com"></p>

                        <p>Kota Kelahiran</p>
                        <p><input type="text" name="kotalahirkaryawan" value="<?php echo $showID['kotalahirkaryawan'] ?>" class="form form-control" placeholder="Bekasi"></p>

                        <p>Tanggal Lahir</p>
                        <div class="form-group" id="simple-date1">
                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="date" value="<?php echo $showID['tanggallahirkaryawan'] ?>" class="form-control" id="simpleDataInput" name="tanggallahirkaryawan" placeholder="06/04/2004">
                            </div>
                        </div>

                        <p>NIK Karyawan</p>
                        <input type="text" value="<?php echo $showID['nikkaryawan'] ?>" name="nikkaryawan" class="form form-control">

                        <p>Alamat</p>
                        <textarea class="form-control" value="<?php echo $showID['alamatkaryawan'] ?>" id="exampleFormControlTextarea1" rows="3" name="alamatkaryawan"></textarea>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <li class="fa fa-undo"></li> Batal
                        </button>
                        <button type="submit" class="btn btn-success">
                            <li class="fa fa-save"></li> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php
    endforeach;
?>
<!-- End Modal Add Detail Karyawan -->