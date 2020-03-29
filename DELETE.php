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

		$sql = "DELETE FROM produk WHERE nama_produk = '$nama_produk'";
		$conn->query($sql);

		$result['status']['code'] = 200;
		$result['status']['description'] = "1 data DELETED";
		$result['result'] = array(
			"nama_produk"=>$nama_produk,
		);

	}else{
		$result['status']['code'] = 400;
	}


	echo json_encode($result);
?>