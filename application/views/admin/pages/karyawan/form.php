<div class="container">
	<div class="row mb-4">
		<div class="col">
			<h3>Form <?= $title ?></h3>
		</div>
	</div>

	<?= form_open_multipart($form_action) ?>
		<?= isset($input->id) ? form_hidden('id', $input->id) : '' ?>
        
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
			<label class="col-sm-2 col-form-label" id="label-photo">Foto</label>
			<div class="col-sm-8">
				<?php if(!empty($input->photo)) : ?>
					<img src="<?= base_url("__assets/img/karyawan/$input->photo") ?>" alt="">
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
				<a href="<?= base_url('adminn/Karyawan') ?>" class="btn btn-sm btn-secondary"><i class="fas fa-angle-left mr-1"></i>Kembali</a>
				<button type="submit" class="btn btn-sm btn-primary float-right"><i class="fas fa-check mr-1"></i> Simpan</button>
			</div>
		</div>
	<?= form_close() ?>
</div>
