
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
                                            </button>
                                            <a href=".base_url()."adminn/Karyawan/AddDetail/".$showKaryawan->karyawanid." class='btn btn-success btn-sm' title='Tambah Detail'>
                                                <i class='fas fa-plus'></i>
                                            </a>
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
