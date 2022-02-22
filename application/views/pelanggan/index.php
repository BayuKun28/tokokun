<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pelanggan</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Pelanggan

                        <div class="text-right"><a href="#" class="btn btn-success btn-sm-2 " data-toggle="modal" data-target="#modaltambahpelanggan">Tambah</a></div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php $this->session->flashdata('message');  ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tablepelanggan">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($pelanggan as $s) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $s['nama']; ?></td>
                                            <td><?= $s['jenis_kelamin']; ?></td>
                                            <td><?= $s['alamat']; ?></td>
                                            <td><?= $s['telepon']; ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modaleditpelanggan" data-idedit="<?= $s['id']; ?>" data-namaedit="<?= $s['nama']; ?>" data-alamatedit="<?= $s['alamat']; ?>" data-teleponedit="<?= $s['telepon']; ?>" data-jkedit="<?= $s['jenis_kelamin']; ?>" name="editpelanggan" id="editpelanggan">edit</a>

                                                <a data-kode="<?= $s['id']; ?>" href='javascript:void(0)' class="del_pelanggan btn btn-danger   btn-xs">delete</a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<div class="modal fade" id="modaleditpelanggan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Edit Pelanggan</b></h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pelanggan/editpelanggan'); ?>" method="post">
                    <input type="hidden" name="idedit" id="idedit">
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="namaedit" id="namaedit" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" id="jkedit" name="jkedit">
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                            <option value="Lainya">Lainya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat" name="alamatedit" id="alamatedit" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control" placeholder="Telepon" name="teleponedit" id="teleponedit" required>
                    </div>
                    <button class="btn btn-success" type="submit">Edit</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaltambahpelanggan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Tambah Pelanggan</b></h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pelanggan/addpelanggan'); ?>" method="post">
                    <!-- <input type="hidden" name="id"> -->
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" id="jk" name="jk">
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                            <option value="Lainya">Lainya</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Telepon</label>
                        <input type="number" class="form-control" placeholder="Telepon" name="telepon" required>
                    </div>
                    <button class="btn btn-success" type="submit">Tambah</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('templates/_foot'); ?>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#tablepelanggan').DataTable({
            responsive: true
        });
    });

    $(document).ready(function() {
        $(document).on('click', '#editpelanggan', function() {
            var idedit = $(this).data('idedit');
            var namaedit = $(this).data('namaedit');
            var alamatedit = $(this).data('alamatedit');
            var teleponedit = $(this).data('teleponedit');
            var jkedit = $(this).data('jkedit');
            $('#idedit').val(idedit);
            $('#namaedit').val(namaedit);
            $('#alamatedit').val(alamatedit);
            $('#teleponedit').val(teleponedit);
            $('#jkedit').val(jkedit);
        })
    })

    $(document).on('click', '.del_pelanggan', function(event) {
        event.preventDefault();
        let kode = $(this).attr('data-kode');
        let delete_url = "<?= base_url(); ?>/Pelanggan/delete/" + kode;


        Swal.fire({
            title: 'Hapus Data',
            text: "Apakah Anda Yakin Ingin Menghapus Data Ini?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then(async (result) => {
            if (result.value) {
                window.location.href = delete_url;
            }
        });
    });
</script>
<?php
if (!empty($this->session->flashdata('message'))) {
    $pesan = $this->session->flashdata('message');
    if ($pesan == "Berhasil Ditambah") {
        $script = "
                    <script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Data',
                              text: 'Data Berhasil Ditambah'
                            }) 
                    </script>
                ";
    } elseif ($pesan == "Berhasil Dihapus") {
        // die($pesan);
        $script = "
                    <script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Data',
                              text: 'Berhasil Dihapus'
                            }) 
                    </script>
                ";
    } elseif ($pesan == "Berhasil Di Update") {
        // die($pesan);
        $script = "
                    <script>
                            Swal.fire({
                              icon: 'success',
                              title: 'Data',
                              text: 'Berhasil Di Update'
                            }) 
                    </script>
                ";
    } else {
        $script =
            "
                    <script>
                                Swal.fire({
                                  icon: 'error',
                                  title: 'Data',
                                  text: 'Gagal'
                                }) 

                    </script>
                    ";
    }
} else {
    $script = "";
}
echo $script;
?>

</body>

</html>