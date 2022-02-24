<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Transaksi</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Menu Transaksi
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Produk</h4>
                                <div class="row">
                                    <?php foreach ($produk as $row) : ?>
                                        <div class="col-md-4">
                                            <div class="thumbnail">
                                                <div class="caption">
                                                    <h4><?php echo $row->nama_produk; ?></h4>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h5>Stok : <?php echo $row->stok; ?></h5>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <h4><?php echo 'Rp ' . number_format($row->harga); ?></h4>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <input type="number" name="quantity" id="<?php echo $row->id; ?>" value="1" class="quantity form-control">
                                                        </div>
                                                    </div>
                                                    <button class="add_cart btn btn-success btn-block" data-produk_id="<?php echo $row->id; ?>" data-nama_produk="<?php echo $row->nama_produk; ?>" data-harga="<?php echo $row->harga; ?>">
                                                        <i class=" fa fa-fw fa-shopping-bag"></i> Add To Cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <h4>Keranjang Belanja</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detail_cart">

                                    </tbody>

                                </table>
                                <form class="form-horizontal" action="<?php echo base_url() ?>Order/proses_order" method="post" name="frmCO" id="frmCO">
                                    <button type="submit" class="btn btn-primary pull-right">Proses Order</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- end off cart -->
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
        $('#tableproduk').DataTable({
            "columnDefs": [{
                "width": "5",
                "targets": 0
            }],
            fixedColumns: true,
            responsive: true

        });
        $('#tablecart').DataTable({
            "columnDefs": [{
                "width": "5",
                "targets": 0
            }],
            fixedColumns: true,
            responsive: true

        });


        $('.add_cart').click(function() {
            var produk_id = $(this).data("produk_id");
            var nama_produk = $(this).data("nama_produk");
            var harga = $(this).data("harga");
            var qty = $('#' + produk_id).val();
            $.ajax({
                url: "<?php echo base_url(); ?>Order/add_to_cart",
                method: "POST",
                data: {
                    produk_id: produk_id,
                    nama_produk: nama_produk,
                    harga: harga,
                    qty: qty
                },
                success: function(data) {
                    $('#detail_cart').html(data);
                }
            });
        });
        // Load shopping cart
        $('#detail_cart').load("<?php echo base_url(); ?>Order/load_cart");
        //Hapus Item Cart
        $(document).on('click', '.hapus_cart', function() {
            var row_id = $(this).attr("id"); //mengambil row_id dari artibut id
            $.ajax({
                url: "<?php echo base_url(); ?>Order/hapus_cart",
                method: "POST",
                data: {
                    row_id: row_id
                },
                success: function(data) {
                    $('#detail_cart').html(data);
                }
            });
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