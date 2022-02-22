        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Supplier</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Data Supplier

                                <div class="text-right"><a href="#" class="btn btn-success btn-sm-2 " data-toggle="modal" data-target="#modaltambahsupplier">Tambah</a></div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <?php $this->session->flashdata('message');  ?>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="tablesupplier">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Keterangan</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($supplier as $s) : ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $s['nama']; ?></td>
                                                    <td><?= $s['alamat']; ?></td>
                                                    <td><?= $s['telepon']; ?></td>
                                                    <td><?= $s['keterangan']; ?></td>
                                                    <td>
                                                        <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modaleditsupplier" data-idedit="<?= $s['id']; ?>" data-namaedit="<?= $s['nama']; ?>" data-alamatedit="<?= $s['alamat']; ?>" data-teleponedit="<?= $s['telepon']; ?>" data-keteranganedit="<?= $s['keterangan']; ?>" name="editsupplier" id="editsupplier">edit</a>

                                                        <a data-kode="<?= $s['id']; ?>" href='javascript:void(0)' class="del_supplier btn btn-danger   btn-xs">delete</a>
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

        <div class="modal fade" id="modaleditsupplier">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>Edit Supplier</b></h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('supplier/editsupplier'); ?>" method="post">
                            <input type="hidden" name="idedit" id="idedit">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Nama" name="namaedit" id="namaedit" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" placeholder="Alamat" name="alamatedit" id="alamatedit" required>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="number" class="form-control" placeholder="Telepon" name="teleponedit" id="teleponedit" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keteranganedit" id="keteranganedit" class="form-control" placeholder="Keterangan" required></textarea>
                            </div>
                            <button class="btn btn-success" type="submit">Edit</button>
                            <button class="btn btn-danger" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modaltambahsupplier">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b>Tambah Supplier</b></h5>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('supplier/addsupplier'); ?>" method="post">
                            <!-- <input type="hidden" name="id"> -->
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                            </div>
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="number" class="form-control" placeholder="Telepon" name="telepon" required>
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea name="keterangan" class="form-control" placeholder="Keterangan" required></textarea>
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
                $('#tablesupplier').DataTable({
                    responsive: true
                });
            });

            $(document).ready(function() {
                $(document).on('click', '#editsupplier', function() {
                    var idedit = $(this).data('idedit');
                    var namaedit = $(this).data('namaedit');
                    var alamatedit = $(this).data('alamatedit');
                    var teleponedit = $(this).data('teleponedit');
                    var keteranganedit = $(this).data('keteranganedit');
                    $('#idedit').val(idedit);
                    $('#namaedit').val(namaedit);
                    $('#alamatedit').val(alamatedit);
                    $('#teleponedit').val(teleponedit);
                    $('#keteranganedit').val(keteranganedit);
                })
            })

            $(document).on('click', '.del_supplier', function(event) {
                event.preventDefault();
                let kode = $(this).attr('data-kode');
                let delete_url = "<?= base_url(); ?>/Supplier/delete/" + kode;


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