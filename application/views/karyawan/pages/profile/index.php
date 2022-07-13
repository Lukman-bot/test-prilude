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
                  <h6 class="m-0 font-weight-bold text-primary">Detail User</h6>
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