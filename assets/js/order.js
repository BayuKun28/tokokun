
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

        $('#search_text').keyup(function() {
            let search = $(this).val();
            let len_text = search.length;
            if (len_text > 0) {
                load_data(search);
            } else {
                $("#result").html("");
            }
        });

        $(document).on('click', '.add_cart', function() {
            var produk_id = $(this).attr("produk_id");
            var nama_produk = $(this).attr("nama_produk");
            var stok = $(this).attr("stok");
            var harga = $(this).attr("harga");
            var qty = $('#' + produk_id).val();
            console.log(produk_id);

            if (qty > stok) {
                alert('Stok Kurang');
            } else {
                $.ajax({
                    url: '<?= base_url(); ?>Order/add_to_cart',
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
            }
        });

        $('#uangbayar').mask('#,##0,000', {
            reverse: true
        });

        $('#uangbayar').keyup(function() {
            var txtFirstNumberValue = document.getElementById('uangbayar').value;
            var value1 = txtFirstNumberValue.replace(",", "").replace(",", "");
            var txtSecondNumberValue = document.getElementById('sumtotal').value;
            var result = parseInt(value1) - parseInt(txtSecondNumberValue);

            if (result < 0) {
                document.getElementById('hasilkembalian').value = 0;
            } else {
                if (!isNaN(result)) {
                    document.getElementById('hasilkembalian').value = result;
                }
                $('#hasilkembalian').mask('#,##0,000', {
                    reverse: true
                });
            }



        });

        $('#detail_cart').load('<?= base_url(); ?>Order/load_cart');

        $(document).on('click', '.hapus_cart', function() {
            var row_id = $(this).attr("id");
            $.ajax({
                url: '<?= base_url(); ?>Order/hapus_cart',
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
