<?php
	$getId	 = $_REQUEST['id'];


		$sql = "DELETE FROM joblist WHERE id_job = '".$getId."' ";

		if ($conn->query($sql)) {
			echo '<script>alert("Data lowongan berhasil dihapus"); </script>';
			if($_SESSION['uac'] === 'ADM'){
				echo '<meta http-equiv="refresh" content="0;URL=?p=job.list">';
			}else
			{
				echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.listjob">';
			}
	 		
		}else{
            echo '<script>alert("data gagal dihapus' .$sql. "<br>" .$conn->error. '"); </script>';
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.listjob">';
		}
?>