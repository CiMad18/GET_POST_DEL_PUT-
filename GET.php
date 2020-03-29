<?php
    $conn = mysqli_connect('localhost', 'root', '', 'bukalapakk');
    $fnl= mysqli_query($conn, 'SELECT * FROM produk');

    if(mysqli_num_rows($fnl) > 0 ){
    $response = array();
    $response["produk"] = array();
    while($ac = mysqli_fetch_array($fnl)){
        $cc['id_produk'] = $ac["id_produk"];
        $cc['nama_produk'] = $ac["nama_produk"];
        $cc['stok_produk'] = $ac["stok_produk"];
        $cc['harga_produk'] = $ac["harga_produk"];
        $cc['produk_deskripsi'] = $ac["produk_deskripsi"];
        array_push($response["produk"], $cc);
    }
    echo json_encode($response);
    }
    else {
    $response["message"]="No Data";
    echo json_encode($response);
    }
?>