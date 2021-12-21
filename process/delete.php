<?php
	$getId	 = $_REQUEST['id'];
	$getId2	 = $_REQUEST['id2'];

 		$cek   = "SELECT * FROM pelamar WHERE id_user = '".$getId."' "; 
		$res    = $conn->query($cek);
		$row    = $res->fetch_array();

		$upload_dir = "../dist/images/foto/";
		unlink($upload_dir.$row['foto']);

		$sql = "DELETE FROM pelamar WHERE id_user = '".$getId."' ";

		if ($conn->query($sql)) {
			
			$sql = "DELETE FROM user WHERE id_user = '".$getId."' ";
			
			if($conn->query($sql))
			{
				echo('<script>alert("Berhasil dihapus!"); </script>');
				echo '<meta http-equiv="refresh" content="0;URL=?p=admin.list_pelamar">';
			}else
			{
				echo '<script>alert("data gagal dihapus' .$sql. "<br>" .$conn->error. '"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=admin.list_pelamar">';
			}
	 		
		}else{
            echo '<script>alert("data gagal dihapus' .$sql. "<br>" .$conn->error. '"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=admin.list_pelamar">';
	}
?>