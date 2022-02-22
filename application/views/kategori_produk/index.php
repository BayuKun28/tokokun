<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Kategori Produk</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Data Kategori Produk

                        <div class="text-right"><a href="#" class="btn btn-success btn-sm-2 " data-toggle="modal" data-target="#modaltambahkategori">Tambah</a></div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <?php $this->session->flashdata('message');  ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="tablekategori">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($kategori_produk as $s) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $s['kategori']; ?></td>
                                            <td>
                                                <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modaleditkategori" data-idedit="<?= $s['id']; ?>" data-kategoriedit="<?= $s['kategori']; ?>" name="editkategori" id="editkategori">edit</a>

                                                <a data-kode="<?= $s['id']; ?>" href='javascript:void(0)' class="del_kategori btn btn-danger   btn-xs">delete</a>
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

<div class="modal fade" id="modaleditkategori">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Edit Kategori</b></h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kategori_produk/editproduk'); ?>" method="post">
                    <input type="hidden" name="idedit" id="idedit">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" placeholder="Kategori" name="kategoriedit" id="kategoriedit" required>
                    </div>
                    <button class="btn btn-success" type="submit">Edit</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modaltambahkategori">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><b>Tambah Kategori</b></h5>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kategori_produk/addkategoriproduk'); ?>" method="post">
                    <!-- <input type="hidden" name="id"> -->
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" class="form-control" placeholder="Kategori" name="kategori" id="kategori" required>
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
        $('#tablekategori').DataTable({
            responsive: true
        });
    });

    $(document).ready(function() {
        $(document).on('click', '#editkategori', function() {
            var idedit = $(this).data('idedit');
            var kategoriedit = $(this).data('kategoriedit');
            $('#idedit').val(idedit);
            $('#kategoriedit').val(kategoriedit);
        })
    })

    $(document).on('click', '.del_kategori', function(event) {
        event.preventDefault();
        let kode = $(this).attr('data-kode');
        let delete_url = "<?= base_url(); ?>/Kategori_produk/delete/" + kode;

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