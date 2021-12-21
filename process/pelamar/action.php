<?php

	//pelamar mengedit profilnya
	if ( isset($_POST['edit']) ) 
	{
		$allowExt 			= array( 'png', 'jpg', 'jpeg' );
		$fileName 			= $_FILES['foto']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['foto']['size'];
		$fileTemp 			= $_FILES['foto']['tmp_name'];
		$upload_dir 		= "dist/images/foto/";
		$foto 				= basename ($fileName);
		$v_foto 			= str_replace(' ','_',$foto);
		$nama_p 		    = $_POST['nama_p'];
		$tempat_lahir		= $_POST['tempat_lahir'];
		$tgl_lahir	         	= $_POST['tgl_lahir'];
		
		$jk					= $_POST['jk'];
		$agama				= $_POST['agama'];
		$alamat				= $_POST['alamat'];
		$tahun_masuk		= $_POST['tahun_masuk'];
		$telp 				= $_POST['telp'];
		$keahlian			= $_POST['keahlian'];
		$id_jurusan 			= $_POST['id_jurusan'];
		$id_fakultas 			= $_POST['id_fakultas'];
		$id_user            = $_POST['id_user'];

		
		if($_FILES['foto']['size'] > 0)
		{
			if( in_array( $fileExt, $allowExt ) === TRUE ) 
			{
				if( $fileSize < 1044070 ) 
				{
					if(move_uploaded_file( $fileTemp,$upload_dir.$v_foto)) 
					{
						$sql = "UPDATE pelamar SET
								nama_p		= '$nama_p',
								telp 	    = '$telp',
								id_fakultas = $id_fakultas,
								id_jurusan 	= $id_jurusan,
								keahlian 	= '$keahlian',
								tgl_lahir 	= '$tgl_lahir',
								jk        	= '$jk',
								tempat_lahir= '$tempat_lahir',
								agama		= '$agama', 
								alamat 		= '$alamat',
								tahun_masuk = $tahun_masuk,
								foto		= '$v_foto'
							
							WHERE id_user 	= '$id_user'";
			
						if ( $conn->query($sql) === TRUE ) 
						{
							echo '<script>alert("data berhasil disimpan"); </script>';
	 						echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.profil">';
						} 
						else 
						{
							echo '<script>alert("data gagal disimpan"); </script>';
							echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.edit">';	
						}
					}
					else 
					{
						echo '<script>alert("gagal upload file"); </script>';
						echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.edit">';
					}
				}
				else 
				{
					echo '<script>alert("ukuran file maks 1 mb"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.edit">';
				}
			}
			else 
			{
				echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.edit">';
			}

		}
		else
		{
			$sql = "UPDATE pelamar SET
								nama_p		= '$nama_p',
								telp 	    = '$telp',
								id_fakultas = $id_fakultas,
								id_jurusan 	= $id_jurusan,
								keahlian 	= '$keahlian',
								tgl_lahir 	= '$tgl_lahir',
								jk        	= '$jk',
								tempat_lahir= '$tempat_lahir',
								agama		= '$agama', 
								alamat 		= '$alamat',
								tahun_masuk = $tahun_masuk
							
							WHERE id_user 	= '$id_user'";

				if ( $conn->query($sql) === TRUE ) 
				{
					echo '<script>alert("data berhasil disimpan"); </script>';
	 				echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.profil">';
				} 
				else 
				{
					echo '<script>alert("data gagal disimpan"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.edit">';	
				}
		}
	}
	//pelamar baru menambahkan profil
	else if ( isset($_POST['tambah']) ) 
	{
		$allowExt 			= array( 'png', 'jpg', 'jpeg' );
		$fileName 			= $_FILES['foto']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['foto']['size'];
		$fileTemp 			= $_FILES['foto']['tmp_name'];
		$nama_p 			= $_POST['nama_p'];
		$tempat_lahir		= $_POST['tempat_lahir'];
		$date	         	= explode('-',$_POST['tgl_lahir']);
		$tgl_lahir 			= $date['2'].'-'.$date['1'].'-'.$date['0'];
		$jk					= $_POST['jk'];
		$agama				= $_POST['agama'];
		$alamat				= $_POST['alamat'];
		$tahun_masuk		= $_POST['tahun_masuk'];
		$telp 				= $_POST['telp'];
		$keahlian			= $_POST['keahlian'];
		$id_jurusan 		= $_POST['id_jurusan'];
		$id_fakultas 		= $_POST['id_fakultas'];
		$id_user            = $_POST['id_user'];
		$upload_dir 		= "dist/images/foto/";
		$foto 				= basename ($fileName);
		$v_foto 			= str_replace(' ','_',$foto);

		if ( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
		    	if ( move_uploaded_file( $fileTemp,$upload_dir.$v_foto) ) 
		    	{
		    		$sql = "INSERT INTO pelamar (id_user, nama_p, telp, id_fakultas, id_jurusan, 
					keahlian, tgl_lahir, jk, tempat_lahir, agama, alamat, tahun_masuk, foto) 
					VALUES ('$id_user', '$nama_p','$telp', $id_fakultas, $id_jurusan, '$keahlian', '
					$tgl_lahir','$jk','$tempat_lahir', '$agama','$alamat',$tahun_masuk, '$v_foto')";
					


					if ( $conn->query($sql) === TRUE ) 
					{
						echo '<script>alert("data berhasil disimpan"); </script>';
	 					echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.profil">';
					} 
					else 
					{
						echo '<script>alert("data gagal disimpan"); </script>';
			
						echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.edit">';
					}
		    	}
		    	else
		    	{
		    		echo '<script>alert("gagal upload file"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.edit">';
		    	}	
			}
			else
			{
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.edit">';
			}
		}
		else 
		{
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.edit">';
		}
	}
?>

