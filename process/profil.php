<head>
<style>
.topnav {
  background-color: #0000;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  display: block;
  color: #000000;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 14px;
  font-family: Helvetica;
  border-bottom: 3px solid transparent;
}

.topnav a:hover {
  border-bottom: 3px solid green;
}

.topnav a.active {
  border-bottom: 3px solid green;
}
</style>
</head>


<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">Informasi Pelamar</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
        <?php

            $GetID= $_SESSION['id_user'];
     

            $sql = "SELECT *FROM pelamar a
                    LEFT JOIN user b ON (a.id_user=b.id_user) 
                    LEFT JOIN fakultas c ON (a.id_fakultas=c.id_fakultas)
                    LEFT JOIN jurusan d ON (d.id_jurusan=a.id_jurusan)
                    WHERE a.id_user = '$GetID'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();


            $id_jenis = $data['id_jenis'];
            if  ( empty($data['nama_p']))  
            {
                echo '<script>alert("Silahkan isi profil pelamar terlebih dahulu!");</script>';
                echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.edit">';
                 // header('location:./');
             } else {

          
        ?>    
                   
                <form class="form" role="form" action="?p=pelamar.edit" id="defaultForm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_user" value="<?php echo $GetID; ?>">  

                <div class="row">
                    <div class="col-lg-3">
                        <center><img src="dist/images/foto/<?php echo $data['foto'];?>" width="150" height="150"></center>
                    </div>
                    <div class="col-lg-9">
                    <h2><?php echo $data['nama_p']; ?></h2>
                        <div class="row">
                            <div class="col-lg-8">
                                <p><i class="fa fa-university"></i>&nbsp;Fakultas&nbsp;<?php echo $data['nama_fakultas']; ?>-<?php echo $data['nama_jurusan']; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <p><i class="fa fa-graduation-cap"></i>&nbsp;<?php echo $data['tahun_masuk']; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <p><i class="fa fa-envelope"></i>&nbsp;<?php echo $data['email']; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <p><i class="fa fa-phone-square"></i>&nbsp;<?php echo $data['telp']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div>
                    <div class="topnav">
                        <a href="?p=pelamar.profil" class="active">Tentang Saya</a>
                        <a href="?p=pengalaman.list">Pengalaman & Sertifikat</a>
                    </div>
                </div>
                <br>
              
                <div>  
                        <div class="row">
                            <div class="col-lg-3">
                                <label> Username</label>
                            </div>
                            <div class="col-lg-9">
                                <p> <?php echo $data['id_user']; ?></p>
                            </div>
                        </div>
                   
                        <div class="row">
                            <div class="col-lg-3">
                                <label> Nama</label>
                            </div>
                            <div class="col-lg-9">
                                <p> <?php echo $data['nama_p']; ?></p>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-lg-3">
                                <label> Tempat, Tanggal Lahir</label>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo $data['tempat_lahir']; ?>, <?php echo date_format(date_create($data['tgl_lahir']), 'd/m/Y');?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <label> Jenis Kelamin</label>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo $data['jk']; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <label> Agama</label>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo $data['agama']; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <label> Alamat</label>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo $data['alamat']; ?></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3">
                                <label>Keahlian</label>
                            </div>
                            <div class="col-lg-9">
                                <p><?php echo $data['keahlian']; ?></p>
                            </div>
                        </div>
                        <hr>


                        <button class="btn btn-primary" type="submit" name="edit">Edit</button>
                    
                </div>
                                      
                </form>
             <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>




