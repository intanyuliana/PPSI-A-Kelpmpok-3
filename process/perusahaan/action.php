<?php
	if ( isset($_POST['edit']) ) 
	{
		$allowExt 			= array( 'png', 'jpg', 'jpeg' );
		$fileName 			= $_FILES['logo']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['logo']['size'];
		$fileTemp 			= $_FILES['logo']['tmp_name'];
		$upload_dir 		= "dist/images/logo/";
		$logo 				= basename ($fileName);
		$v_logo 			= str_replace(' ','_',$logo);
		$id  				= $_SESSION['id_user'];
		$nama 				= $_POST['nama'];
		$alamat				= $_POST['alamat'];
		$id_kota			= $_POST['id_kota'];
		$npwp				= $_POST['npwp'];
		$id_jenis			= $_POST['id_jenis'];
		$telp				= $_POST['telp'];
		$deskripsi			= $_POST['deskripsi'];
		
		if($_FILES['logo']['size'] > 0)
		{
			

		if( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if( $fileSize < 1044070 ) 
			{
				if(move_uploaded_file( $fileTemp,$upload_dir.$v_logo)) 
				{
					$sql = "UPDATE perusahaan SET
								npwp 		= $npwp,
								id_jenis 	= $id_jenis,
								nama 		= '$nama',
								alamat 		= '$alamat',
								id_kota		= $id_kota,
								telp 		= '$telp',
								deskripsi 	= '$deskripsi',
								logo        = '$v_logo'
							WHERE id_user 	= '$id'";
						
					var_dump($sql);	
					if ( $conn->query($sql) === TRUE ) 
					{
						echo '<script>alert("data berhasil disimpan"); </script>';
	 					echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.profil">';
					} else 
					{
						echo '<script>alert("data gagal disimpan"); </script>';
					// echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.edit">';	
					}
				}
				else 
				{
					echo '<script>alert("gagal upload file"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=employer.add">';
				}
			}
			else 
			{
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=employer.add">';
			}
		}
		else 
		{
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=employer.add">';
		}

	}
	else
	{
		$sql = "UPDATE perusahaan SET
								npwp 		= $npwp,
								id_jenis 	= $id_jenis,
								nama 		= '$nama',
								alamat 		= '$alamat',
								id_kota		= $id_kota,
								telp 		= '$telp',
								deskripsi 	= '$deskripsi'
								
							WHERE id_user 	= '$id'";
						
					var_dump($sql);	
					if ( $conn->query($sql) === TRUE ) 
					{
						echo '<script>alert("data berhasil disimpan"); </script>';
	 					echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.profil">';
					} else 
					{
						echo '<script>alert("data gagal disimpan"); </script>';
					// echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.edit">';	
					}
	}
	}
						
	 if ( isset($_POST['save']) ) 
	{
		$allowExt 			= array( 'png', 'jpg', 'jpeg', 'JPG' );
		$fileName 			= $_FILES['logo']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['logo']['size'];
		$fileTemp 			= $_FILES['logo']['tmp_name'];
		$upload_dir 		= "dist/images/logo/";
		$logo 				= basename ($fileName);
		$v_logo 			= str_replace(' ','_',$logo);
		$id_user  			= $_SESSION['id_user'];
		$nama 				= $_POST['nama'];
		$alamat				= $_POST['alamat'];
		$id_kota			= $_POST['id_kota'];
		$npwp				= $_POST['npwp'];
		$id_jenis			= $_POST['id_jenis'];
		$telp				= $_POST['telp'];
		$deskripsi			= $_POST['deskripsi'];

		if ( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				$sqlCek = "SELECT*FROM perusahaan WHERE nama = '$nama' ";
		    	$result = $conn->query($sqlCek);

		    	if($result->num_rows > 0) 
		    	{
		    		echo '<script>alert("nama perusahaan sudah terdaftar"); </script>';
 					echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.edit">';
		    	}
		    	else
		    	{
		    		if ( move_uploaded_file( $fileTemp,$upload_dir.$v_logo) ) 
		    		{
		    			$sql = "INSERT INTO perusahaan (npwp, id_user, id_jenis, nama, alamat,id_kota, telp, deskripsi, logo) VALUES ($npwp, '$id_user', $id_jenis, '$nama', '$alamat',$id_kota, '$telp', '$deskripsi', '$v_logo')";
	
						if ( $conn->query($sql) === TRUE ) 
						{
							echo '<script>alert("data berhasil disimpan"); </script>';
	 						echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.profil">';
						} 
						else 
						{
							echo '<script>alert("data gagal disimpan"); </script>';
						
							echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.edit">';
						}
		    		}
		    		else
		    		{
		    			echo '<script>alert("gagal upload file"); </script>';
						echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.edit">';
		    		}

		    	}
			}
			else
			{
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.edit">';
			}

		}

		else 
		{
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.edit">';
		}
	}
?>


			
				
				
			    
			  
							
								