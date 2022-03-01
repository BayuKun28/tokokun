<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Laporan Stok Keluar</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-10"><b>Data Laporan Stok Keluar</b></div>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <form method="post" action="<?= base_url('laporan_stok_keluar') ?>" class="row">
                            <div class="form-group col-md-2">
                                <input type="text" id="tanggalawal" name="tanggalawal" autocomplete="off" class="form-control" value="<?= $tanggalawal ?>">
                            </div>
                            <div class="form-group col-md-1">
                                <input type="text" readonly placeholder="S/D" class="form-control">
                            </div>
                            <div class="form-group col-md-2">
                                <input type="text" id="tanggalakhir" name="tanggalakhir" autocomplete="off" class="form-control" value="<?= $tanggalakhir ?>">
                            </div>
                            <div class="form-group col-md-4 align-items-end">
                                <button name="action" value="tampil" type="submit" class="btn btn-success btn-col-1 " role="button" aria-disabled="true">Tampilkan</button>
                                <a href="<?= base_url('laporan_stok_keluar/cetak?tglawal=') . $tanggalawal . '&tglakhir=' . $tanggalakhir; ?>" name="cetak" class="btn btn-danger btn-col-1" target="_blank" role="button" aria-disabled="true"><i class="fa fa-balance-scale fa-fw"></i>Cetak</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <?php $this->session->flashdata('message');  ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="tablelaporanpenjualan">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Barcode</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($stok as $s) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $s['tanggal']; ?></td>
                                        <td><?= $s['barcode']; ?></td>
                                        <td><?= $s['nama_produk']; ?></td>
                                        <td><?= $s['jumlah']; ?></td>
                                        <td><?= $s['keterangan']; ?></td>
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

<?php $this->load->view('templates/_foot'); ?>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
    $(document).ready(function() {
        $('#tanggalawal').datetimepicker({
            format: 'Y-m-d',
            timepicker: false
        });
    });
    $(document).ready(function() {
        $('#tanggalakhir').datetimepicker({
            format: 'Y-m-d',
            timepicker: false
        });
    });
    $(document).ready(function() {
        $('#tablelaporanpenjualan').DataTable({
            responsive: true
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