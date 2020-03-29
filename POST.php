<?php
	header("Content-Type:application/json");

		$servername = "localhost";
	    $username = "root";
	    $password = "";
	    $dbnamea = "bukalapakk";

    $conn = new mysqli($servername, $username, $password, $dbnamea);

	$smethod = $_SERVER['REQUEST_METHOD'];

	$result = array();

	if($smethod == $smethod){

		$nama_produk = $_POST['nama_produk'];
		$harga_produk = $_POST['harga_produk'];
		$stok_produk = $_POST['stok_produk'];
		$produk_deskripsi = $_POST['produk_deskripsi'];

		$sql = "INSERT INTO produk (
					nama_produk,
					harga_produk,
					stok_produk,
					produk_deskripsi)
				VALUES (
					'$nama_produk',
					'$harga_produk',
					'$stok_produk',
					'$produk_deskripsi'
					'')";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data inserted";
		$result['result'] = array(
			"nama_produk"=>$nama_produk,
			"harga_produk"=>$harga_produk,
			"stok_produk" =>$stok_produk,
			"produk_deskripsi"=>$produk_deskripsi
		);

	}else{
		$result['status']['code'] = 400;
	}

	echo json_encode($result);
?>