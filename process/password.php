
<?php

if (isset($_POST['ubah'])) {

    $passwordLama = $_POST['passwordold'];
    $passwordBaru = $_POST['passwordnew'];
    $passwordKonf = $_POST['passwordconf'];

    $id_user      = $_SESSION['id_user'];
    $pass         = $passwordLama;

    $sql = "SELECT * FROM user WHERE id_user = '{$id_user}' AND pass = '{$pass}'";
    $res = $conn->query($sql);

    if (!$res->num_rows >= 1) {

        echo ("<script> alert('Password lama tidak sesuai, silahkan cek ulang!', 'error'); </script>");
        // echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
    
    } else if ($passwordBaru !== $passwordKonf) {

        echo ("<script> alert('Password baru dan password konfirmasi tidak sama, silahkan cek ulang!'); </script>");
    } else {
        
        $newPassword = sha1($passwordKonf);

        $update = "UPDATE user SET pass = '{$newPassword}' WHERE id_user = '{$user_id}'";

        if ($conn->query($update) === TRUE) {

            echo("<script> alert('Password berhasil diganti, silahkan login kembali!'); </script>");
            echo '<meta http-equiv="refresh" content="0;URL=./logout.php">';        
            }
        } 
    }
?>

   
<div class="row">
        <div class="col-lg-8">
            <h3 class="page-header"><small>Ganti Password</small></h3>
        
        <div class="panel panel-default">
            <div class="panel-heading"></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
          
                        <form id="defaultForm" method="post" action="" enctype="multipart/form-data">
                    <div class="form-group">
                    <label>Password Lama</label>
                        <input type="password" name="passwordold" class="form-control" maxlength="32" required />
                    </div>
                    
                    <div class="form-group">
                    <label>Password Baru</label>
                        <input type="password" name="passwordnew" class="form-control" maxlength="32" required />
                    </div>

                    <div class="form-group">
                    <label>Konfismasi Password Baru</label>
                        <input type="password" name="passwordconf" class="form-control" maxlength="32" required />
                    </div>

                    <div class="form-group">
                    <label></label>
                    <button type="submit" name="ubah" class="btn btn-primary"> Save</button>
                            <button class="btn btn-white" type="reset">Reset</button>
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
