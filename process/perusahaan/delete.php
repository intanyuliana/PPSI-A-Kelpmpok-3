<?php
	$getId	 = $_REQUEST['id'];

 		$cek   = "SELECT * FROM perusahaan WHERE id_perusahaan = '".$getId."' "; 
		$res    = $conn->query($cek);
		$row    = $res->fetch_array();

		$upload_dir = "../dist/images/logo/";
		unlink($upload_dir.$row['logo']);

		$sql = "DELETE FROM perusahaan WHERE id_perusahaan = '".$getId."' ";

		if ($conn->query($sql)) {
			echo '<script>alert("data berhasil dihapus"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=admin.list_perusahaan">';
		}else{
            echo '<script>alert("data gagal dihapus' .$sql. "<br>" .$conn->error. '"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=admin.list_perusahaan">';
	}
?>