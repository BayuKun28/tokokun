function getDays() {
    let now=new Date,
    bulan=now.getMonth()+1,
    tahun=now.getFullYear(),
    hari=new Date(tahun, bulan, 0).getDate(),
    totalHari=[];
    for(var o=0; o<=hari; o++) {
        totalHari.push(o);
    }
    return totalHari
}

$.ajax( {
    url:transaksi_hariUrl,
    type:"get",
    dataType:"json",
    success:(res)=> {
        $("#transaksi_hari").html(res.total)
    }
});

$.ajax( {
    url:transaksi_bulanUrl,
    type:"get",
    dataType:"json",
    success:(res)=> {
        $("#transaksi_bulan").html(res.total)
    }
});

$.ajax( {
    url:stok_hariUrl,
    type:"get",
    dataType:"json",
    success:res=> {
        $("#stok_hari").html(res.total)
    }
});