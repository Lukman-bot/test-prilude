
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
                    <a href="<?= base_url('adminn/Karyawan/EditDetail') ?>" class="btn btn-success btn-sm">
                        <i class="fas fa-edit"></i> Edit Detail
                    </a>
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
                    <p>Alamat: <b><?= $detail->alamatkaryawan ?></b></p>
                </div>
            </div>
        </div>

        
    </div>