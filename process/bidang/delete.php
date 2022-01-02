<?php
	$getId	 = $_REQUEST['id'];


		$sql = "DELETE FROM bidang WHERE id_bidang = '".$getId."' ";

		if ($conn->query($sql)) {
			echo '<script>alert("Data bidang pekerjaan berhasil dihapus!"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=bidang.list">';
		}else{
            echo '<script>alert("data gagal dihapus' .$sql. "<br>" .$conn->error. '"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=bidang.list">';
    }
?>