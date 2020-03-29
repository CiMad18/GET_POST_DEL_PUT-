<?php
	header("Content-Type:application/json");

	    $servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbnamea = "bukalapakk";

    $conn = new mysqli($servername, $username, $password, $dbnamea);

	$smethod = $_SERVER['REQUEST_METHOD'];

	if($smethod == $smethod){

        parse_str(file_get_contents("php://input"),$post_vars);
    	$nama_produk = $post_vars['nama_produk'];
		$harga_produk = $post_vars['harga_produk'];
        $stok_produk = $post_vars['stok_produk'];
        $produk_deskripsi = $post_vars['produk_deskripsi'];

		$sql = "UPDATE produk SET
					nama_produk = '$nama_produk',
					harga_produk = '$harga_produk',
					stok_produk = '$stok_produk',
                    produk_deskripsi = '$produk_deskripsi'
				WHERE nama_produk = '$nama_produk'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data updated";
		$result['result'] = array(
			"nama_produk"=>$nama_produk,
			"harga_produk"=>$harga_produk,
            "stok_produk"=>$stok_produk,
            "produk_deskripsi" =>$produk_deskripsi
		);

	}else{
		$result['status']['code'] = 400;
	}

	echo json_encode($result);
?>