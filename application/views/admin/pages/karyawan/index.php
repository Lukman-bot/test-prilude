
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Karyawan</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('adminn/Home') ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
        </ol>
    </div>

    <div class="row">
        <div class="col">
            <?php if($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dissmissable fade show" role="alert">
                    <?= $this->session->flashdata('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php elseif($this->session->flashdata('error')) : ?>
                <div class="alert alert-error alert-dismissible fade show" role="alert">
                    <?= $this->session->flashdata('error') ?>.
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
                    <h6 class="m-0 font-weight-bold text-primary">Table Karyawan</h6>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-header d-flex flex-row align-items-center justify-content-between">
                            <a href="<?= base_url('adminn/Karyawan/Add') ?>" class="btn btn-success btn-sm">
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
                                <th>Username</th>
                                <th>Photo</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($dataKaryawan as $showKaryawan) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $showKaryawan->username ?></td>
                                        <td>
                                            <?php if($showKaryawan->photo){
                                                echo '<a href="' . base_url('__assets/img/karyawan/' . $showKaryawan->photo).'" target="_blank"><img src="'.base_url('__assets/img/karyawan/' . $showKaryawan->photo) . '" class="img-responsive" style="max-height:150px; max-width:250px;"/></a>';
                                            }else{
                                                echo '(No photo)';
                                            } ?>
                                        </td>
                                        <?php echo "<td>
                                            <a href=".base_url()."adminn/Karyawan/Update/".$showKaryawan->karyawanid." class='btn btn-primary btn-sm' title='Edit'>
                                                <i class='fas fa-edit'></i>
                                            </a>
                                            <button class='btn btn-danger btn-sm' onClick='hapus($showKaryawan->karyawanid)' title='Hapus'>
                                                <i class='fas fa-trash'></i>
                                            </button>"; ?>
                                            <button class="btn btn-info btn-sm" title="Add Detail Karyawan" data-toggle="modal" data-target="#modal-add-<?= $showKaryawan->karyawanid ?>">
                                                <li class="fa fa-plus"></li>
                                            </button>
                                        <?php echo "
                                            <a href=".base_url()."adminn/Karyawan/Detail/".$showKaryawan->karyawanid." class='btn btn-secondary btn-sm' title='Detail Karyawan'>
                                                <i class='fas fa-eye'></i>
                                            </a>
                                        </td>"; ?>
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

<!-- Java Script -->
<script>
    function hapus(karyawanid){
        $('#form_hapus')[0].reset();
        $.ajax({
            url: "<?php echo base_url('adminn/Karyawan/Getid') ?>/"+karyawanid,
            type: "GET",
            dataType: "JSON",
            success: function(data){
                $('[name="id_hapus"]').val(data.karyawanid);
                $('#modal-default').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown){
                alert('Gagal ambil ajax');
            }
        })
    }
</script>

<!-- Modal -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pesan Hapus Karyawan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() ?>adminn/Karyawan/Delete" id="form_hapus" method="POST">
                <input type="hidden" name="id_hapus" value="" id="">
                Apakah Anda Yakin Akan Menghapus Data Tersebut.?!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
                </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Add Detail Karyawan -->
<?php
    foreach ($idKaryawan->result_array() as $showID) :
?>
    <div class="modal fade" id="modal-add-<?php echo $showID['karyawanid'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Detail Karyawan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('adminn/Karyawan/AddDetail') ?>" method="POST">
                    <div class="modal-body">
                        <input type="text" name="idkaryawan" value="<?php echo $showID['karyawanid'] ?>">

                        <p>Nama Karyawan</p>
                        <p><input type="text" name="namakaryawan" class="form form-control" placeholder="Lukman Aditiya Anggara"></p>

                        <p>Nomor Telepon Karyawan</p>
                        <p><input type="text" name="noteleponkaryawan" class="form form-control" placeholder="089510396303"></p>

                        <p>Email Karyawan</p>
                        <p><input type="email" name="emailkaryawan" class="form form-control" placeholder="bunga.langensari@gmail.com"></p>

                        <p>Kota Kelahiran</p>
                        <p><input type="text" name="kotalahirkaryawan" class="form form-control" placeholder="Bekasi"></p>

                        <p>Tanggal Lahir</p>
                        <div class="form-group" id="simple-date1">
                            <div class="input-group date">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                </div>
                                <input type="text" class="form-control" id="simpleDataInput" name="tanggallahirkaryawan" placeholder="06/04/2004">
                            </div>
                        </div>

                        <p>NIK Karyawan</p>
                        <input type="text" name="nikkaryawan" class="form form-control">

                        <p>Alamat</p>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="alamatkaryawan"></textarea>
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
