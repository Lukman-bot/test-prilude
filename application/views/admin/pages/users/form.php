<div class="container">
	<div class="row mb-4">
		<div class="col">
			<h3>Form <?= $title ?></h3>
		</div>
	</div>

	<?= form_open_multipart($form_action) ?>
		<?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
 
		<div class="form-group row">
			<label for="namauser" class="col-sm-2 col-form-label">Nama User</label>
			<div class="col-sm-10">
				<input type="text" name="namauser" id="namauser" value="<?= $input->namauser ?>" required class="form-control">
				<?= form_error('namauser', '<small class="form-text text-danger">', '</small>') ?>
			</div>
		</div>

		<div class="form-group row">
			<label for="username" class="col-sm-2 col-form-label">Username</label>
			<div class="col-sm-10">
				<input type="text" name="username" id="username" value="<?= $input->username ?>" required class="form-control">
				<?= form_error('username', '<small class="form-text text-danger">', '</small>') ?>
			</div>
		</div>

		<div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="password" id="password" value="<?= $input->password ?>" required class="form-control">
                <?= form_error('password', '<small class="form-text text-danger">', '</small>') ?>
            </div>
        </div>

        <div class="form-group row">
			<label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
			<div class="col-sm-2">
				<select class="form-control" id="jeniskelamin" name="jeniskelamin">
					<option value="Laki-laki" <?php if($input->jeniskelamin == "Laki-laki"){ print ' selected'; }?>>Laki-laki</option> 
					<option value="Perempuan" <?php if($input->jeniskelamin == "Perempuan"){ print ' selected'; }?>>Perempuan</option>
				</select>
				<?= form_error('jeniskelamin', '<small class="form-text text-danger">', '</small>') ?>
			</div>
		</div>

        <div class="form-group row">
            <label for="akses" class="col-sm-2 col-form-label">Akses</label>
            <div class="col-sm-2">
            <select name="akses" id="" class="form-control">
				<!-- <option value="1">Super Admin</option> -->
				<option value="2">Admin</option>
			</select>
            <?= form_error('akses', '<small class="form-text text-danger">', '</small>') ?>
            </div>
        </div>

        <div class="form-group row">
			<label for="notelepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
			<div class="col-sm-10">
				<input type="text" name="notelepon" id="notelepon" value="<?= $input->notelepon ?>" required class="form-control">
				<?= form_error('notelepon', '<small class="form-text text-danger">', '</small>') ?>
			</div>
		</div>

        <div class="form-group row">
			<label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
			<div class="col-sm-10">
				<input type="text" name="alamat" id="alamat" value="<?= $input->alamat ?>" required class="form-control">
				<?= form_error('alamat', '<small class="form-text text-danger">', '</small>') ?>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label" id="label-photo">Foto</label>
			<div class="col-sm-8">
				<?php if(!empty($input->photo)) : ?>
					<img src="<?= base_url("__assets/img/user/$input->photo") ?>" alt="">
				<?php else: ?>
					<p>No Photo</p>
				<?php endif; ?>
				<br> 
				<small><span class="text-danger">*</span>	Maksimal ukuran gambar adalah 3 MB</small>
				<br> <br>
				<input name="photo" type="file" class="form-control-file">
				<?php if($this->session->flashdata('image_error')) :  ?>
                <small class="form-text text-danger">
                  <?= $this->session->flashdata('image_error') ?>
                </small>
				<?php endif ?>
			</div>
		</div>

		<div class="row mt-4">
			<div class="col-10 offset-2">
				<a href="<?= base_url('adminn/User') ?>" class="btn btn-sm btn-secondary"><i class="fas fa-angle-left mr-1"></i>Kembali</a>
				<button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-check mr-1"></i> Simpan</button>
			</div>
		</div>
	<?= form_close() ?>
</div>
