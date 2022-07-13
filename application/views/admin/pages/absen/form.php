<div class="container">
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Form Input Absen</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('adminn/Home') ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= base_url('adminn/Absen') ?>">Data Absen</a></li>
			<li class="breadcrumb-item active" aria-current="page">Form Input Absen</li>
        </ol>
    </div>

	<?= form_open_multipart($form_action) ?>
		<?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>

        <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Karyawan</label>
            <div class="col-sm-10">
                <?= form_dropdown('idkaryawan', getDropdownList('karyawan', ['karyawanid', 'username']), $input->idkaryawan, ['class'=>'form-control']) ?>
                <?= form_error('idkaryawan') ?>
            </div>
        </div>

        <div class="form-group row" id="simple-date1">
            <label for="" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
                <input type="date" value="<?= $input->tanggal ?>" class="form-control" id="simpleDataInput" name="tanggal" placeholder="06/04/2004">
                <?= form_error('tanggal', '<small class="form-text text-danger">', '</small>') ?>
            </div>
        </div>

        <div class="form-group row">
			<label for="absen" class="col-sm-2 col-form-label">Absen</label>
			<div class="col-sm-2">
				<select class="form-control" id="absen" name="absen">
					<option value="H" <?php if($input->absen == "H"){ print ' selected'; }?>>Hadir</option> 
					<option value="T" <?php if($input->absen == "T"){ print ' selected'; }?>>Telat</option>
                    <option value="I" <?php if($input->absen == "I"){ print ' selected'; }?>>Izin</option>
                    <option value="A" <?php if($input->absen == "A"){ print ' selected'; }?>>Alpha</option>
				</select>
				<?= form_error('absen', '<small class="form-text text-danger">', '</small>') ?>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-10 offset-2">
				<a href="<?= base_url('adminn/Home') ?>" class="btn btn-sm btn-secondary"><i class="fas fa-angle-left mr-1"></i>Kembali</a>
				<button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-check mr-1"></i> Simpan</button>
			</div>
		</div>
	<?= form_close() ?>
</div>
