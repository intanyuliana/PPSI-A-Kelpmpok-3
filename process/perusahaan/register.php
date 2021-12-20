<!DOCTYPE html>
<html>
<head>
   	
   	<title>Register</title>
</head>

<body>
	<div class="login-panel panel panel">
        <div class="panel-heading" style="text-align: center;">
            <h1 class="panel-title" style="padding-top:13px;">Isi Biodata Lengkap Perusahaan</h1>
                <br>
                    <div style="color: rgba(102,117,127,0.6);">
                    </div>
                    
                    <div class="panel-body" style="height: 320px;">
                        <div class="col-md-6 col-md-offset-3">
                        	<form role="form" method="post" action="?p=auth">
                            	<fieldset>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama" placeholder="Nama Perusahaan" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="npwp" placeholder="No. NPWP Perusahaan" />
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control"  name="id_jenis">
                                        <option value="">Industri Perusahaan</option>
                                        <?php
                                            $query = "SELECT * FROM jenis_industri";
                                            $sql = mysqli_query($conn, $query);

                                            while($data = mysqli_fetch_assoc($sql)) 
                                            { ?>               
                                            <option value="<?php echo $data['id_jenis']; ?>"><?php echo $data['jenis'];?></option>
                                            <?php 
                                            } ?>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="telp" placeholder="No. Telepon" />
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email" placeholder="Email" />
                                    </div>
                                	<div class="form-group">
                                    	<input class="form-control" name="uname" type="text" placeholder="Username" maxlength="32" required/>
                                	</div>
                                	<div class="form-group">
                                    	<input class="form-control" name="pass" type="password" placeholder="Password" maxlength="32" required/>
                               	 	</div>
                                
                                    <input type="hidden" name="uac" value="PERUSAHAAN">
                                	<input type="submit" name="daftar" value="Register" class="btn btn-md btn-primary btn-block"><br/>Punya Akun?
                               		<a style="text-decoration:none;" href="?p=login"> Masuk</a>
                        
                            	</fieldset>
                        	</form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>

   
     