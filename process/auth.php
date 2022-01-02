<?php

	require('./connect.php');
	session_start();
	
	if (isset($_POST['login'])) 
	{
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];

		$result = mysqli_query($conn,"SELECT * FROM user WHERE uname='" . $_POST["uname"] . "' and pass = '". $_POST["pass"]."'");
		$cek = mysqli_num_rows($result);
		$row = $result->fetch_assoc();
	
		if($cek > 0){
			$_SESSION['uname'] = $uname;
			$_SESSION['pass'] = $pass;
			$_SESSION['id_user']= $row['id_user'];
			$_SESSION['uac'] 	= $row['uac']; 

			header("location:./main.php");
			echo('<script>alert("Berhasil Login!"); </script>');
		}else{
			echo('<script>alert("username dan password tidak cocok"); </script>');
		 	echo '<meta http-equiv="refresh" content="0;URL=?p=login">';
		}		
	}
	else if (isset($_POST['daftar'])) 
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
							
							echo('<script>alert("Registrasi berhasil, silahkan login"); </script>');
							 echo '<meta http-equiv="refresh" content="0;URL=?p=login">';
							 
							
						}
					}
					else
					{
						echo('<script>alert("email sudah digunakan"); </script>');
	 					echo '<meta http-equiv="refresh" content="0;URL=?p=register">';
					}
				}
				else
				{
					echo('<script>alert("email belum diisi"); </script>');
	 				echo '<meta http-equiv="refresh" content="0;URL=?p=register">';
				}

			}
			else
			{
				echo('<script>alert("username sudah digunakan"); </script>');
	 			echo '<meta http-equiv="refresh" content="0;URL=?p=register">';
			}

		} else
		{
			echo('<script>alert("username belum diisi"); </script>');
	 		echo '<meta http-equiv="refresh" content="0;URL=?p=register">';
		}
	}
?>
			
			
					
				