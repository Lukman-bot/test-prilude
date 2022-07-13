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
            <h1 class="h3 mb-0 text-gray-800">Profile User</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= base_url('Dashboard') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Profile User</li>
            </ol>
        </div>

        <div class="row">
            <div class="col-lg-3 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Akun User</h6>
                </div>
                <div class="table-responsive">
                    <img src="<?= base_url("__assets/img/karyawan/$profile->photo") ?>" alt="" height="300" class="img-responsive">
                    <div class="form-group">
                      <label for="exampleFormControlReadonly">Username</label>
                      <input class="form-control" type="text" id="exampleFormControlReadonly" value="<?= $profile->username ?>" readonly>
                    </div>
                </div>
              </div>
            </div>

            <div class="col-lg-9 mb-4">
              <!-- Simple Tables -->
              <div class="card">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Detail Karyawan</h6>
                  <button class="btn btn-info btn-sm" title="Edit Detail Karyawan" data-toggle="modal" data-target="#modal-edit-<?= $profile->karyawanid ?>">
                        <li class="fa fa-edit"></li>
                    </button>
                </div>
                <div class="table-responsive">
                    <div class="form-group">
                      <label for="exampleFormControlReadonly">Nama</label>
                      <input class="form-control" type="text" id="exampleFormControlReadonly" value="<?= $profile->namakaryawan ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlReadonly">Nomor Telepon</label>
                      <input class="form-control" type="text" id="exampleFormControlReadonly" value="<?= $profile->noteleponkaryawan ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlReadonly">Email</label>
                      <input class="form-control" type="text" id="exampleFormControlReadonly" value="<?= $profile->emailkaryawan ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlReadonly">Kota Lahir</label>
                      <input class="form-control" type="text" id="exampleFormControlReadonly" value="<?= $profile->kotalahirkaryawan ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlReadonly">Tanggal Lahir</label>
                      <input class="form-control" type="text" id="exampleFormControlReadonly" value="<?= $profile->tanggallahirkaryawan ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlReadonly">NIK</label>
                      <input class="form-control" type="text" id="exampleFormControlReadonly" value="<?= $profile->nikkaryawan ?>" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlReadonly">Alamat</label>
                      <input class="form-control" type="text" id="exampleFormControlReadonly" value="<?= $profile->alamatkaryawan ?>" readonly>
                    </div>
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
                <form action="<?php echo base_url('Profile/UpdateDetail') ?>" method="POST">
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