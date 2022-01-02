<?php
	$getId	 = $_REQUEST['id'];


		$sql = "DELETE FROM jenis_industri WHERE id_jenis = '".$getId."' ";

		if ($conn->query($sql)) {
			echo '<script>alert("Data jenis industri perusahaan berhasil dihapus!"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=jenis.list">';
		}else{
            echo '<script>alert("data gagal dihapus' .$sql. "<br>" .$conn->error. '"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=jenis.list">';
    }
?>