<?php
if ( isset($_POST['save']) ) 
	{
		$uname 		= $_POST['uname'];
		$id_user	= $uname;
		$pass 		= $_POST['pass'];
		$email 		= $_POST['email'];
		$uac 		= $_POST['uac'];
		
		if (!empty($uname)) 
		{
			$sql = "SELECT *FROM user WHERE uname = '$uname'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();

			if ($row['uname'] != $uname)
			{
				if (!empty($email))
				{
					$sql = "SELECT *FROM user WHERE email = '$email'";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();

					if ($row['email'] != $email)
					{
						$query = "INSERT INTO user (id_user, uname, pass, email,tgl_daftar, uac)
									VALUES ('$id_user', '$uname', '$pass', '$email',NOW(), '$uac')";
						if ($conn->query($query) === TRUE)
						{
							
							echo('<script>alert("Berhasil ditambahkan!"); </script>');
	 						echo '<meta http-equiv="refresh" content="0;URL=?p=admin.list_pelamar">';
							
						}
					}
					else
					{
						echo('<script>alert("email sudah digunakan"); </script>');
	 					echo '<meta http-equiv="refresh" content="0;URL=?p=admin.add_pelamar">';
					}
				}
				else
				{
					echo('<script>alert("email belum diisi"); </script>');
	 				echo '<meta http-equiv="refresh" content="0;URL=?p=admin.add_pelamar">';
				}

			}
			else
			{
				echo('<script>alert("username sudah digunakan"); </script>');
	 			echo '<meta http-equiv="refresh" content="0;URL=?p=admin.add_pelamar">';
			}

		} else
		{
			echo('<script>alert("username belum diisi"); </script>');
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=admin.add_pelamar">';
		}
    }
?>