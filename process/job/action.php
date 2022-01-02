<?php
	
	if (isset($_POST['save'])) 
	{
		$id_perusahaan 				= $_POST['id_perusahaan'];
		$tgl_akhir 					= $_POST['tgl_akhir'];
		$id_bidang				 	= $_POST['id_bidang'];
		$posisi 					= $_POST['posisi'];
		$syarat 					= $_POST['syarat'];
		$gaji_max 					= $_POST['gaji_max'];
		$gaji_min					= $_POST['gaji_min'];
		$tipe						= $_POST['tipe'];
		$desk_job					= $_POST['desk_job'];	
		$status_job					= $_POST['status_job'];	

		$sql = "INSERT INTO joblist (id_perusahaan, posisi, id_bidang, gaji_max, gaji_min, tgl_akhir,tgl_posting, tipe, syarat, desk_job, status_job) VALUES ($id_perusahaan, '$posisi' , $id_bidang, $gaji_max, $gaji_min, '$tgl_akhir',NOW(), '$tipe', '$syarat' , '$desk_job', '$status_job')";
		
		if ( $conn->query($sql) === TRUE ) 
		{
			echo '<script>alert("Lowongan berhasil disimpan"); </script>';
			 echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.listjob">';

		} else 
			{
				echo '<script>alert("data gagal dipublis"); </script>';
				var_dump($sql);
			 	// echo '<meta http-equiv="refresh" content="0;URL=?p=job.tambah">';
			}
				
	}
	else if(isset($_POST['edit']))
	{
		$id_job						= $_POST['id_job'];
		$id_perusahaan 				= $_POST['id_perusahaan'];
		$tgl_akhir 					= $_POST['tgl_akhir'];
		$id_bidang				 	= $_POST['id_bidang'];
		$posisi 					= $_POST['posisi'];
		$syarat 					= $_POST['syarat'];
		$gaji_max 					= $_POST['gaji_max'];
		$gaji_min					= $_POST['gaji_min'];
		$tipe						= $_POST['tipe'];
		$desk_job					= $_POST['desk_job'];	
		$status_job					= $_POST['status_job'];	

		$sql = "UPDATE joblist SET 
					id_perusahaan =  $id_perusahaan,
					posisi        =  '$posisi', 
					id_bidang     =  $id_bidang, 
					gaji_max      =  $gaji_max, 
					gaji_min      =  $gaji_min, 
					tgl_akhir     =  '$tgl_akhir', 
					tipe          =  '$tipe', 
					syarat        =  '$syarat', 
					desk_job      =  '$desk_job', 
					status_job    =  '$status_job' 
				WHERE id_job = $id_job";

		if ( $conn->query($sql) === TRUE ) 
		{
			echo '<script>alert("Lowongan berhasil disimpan"); </script>';
			 echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.listjob">';

		} else 
			{
				echo '<script>alert("data gagal dipublis"); </script>';
			 	echo '<meta http-equiv="refresh" content="0;URL=?p=job.edit">';
			}
	}
		


?>