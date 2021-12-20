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
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">Informasi Perusahaan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
                        <?php
                        
                            $GetID= $_SESSION['id_user'];

                            $sql = "SELECT *FROM perusahaan a
                                    INNER JOIN user b ON (a.id_user=b.id_user) 
                                    INNER JOIN jenis_industri c ON (a.id_jenis=c.id_jenis)
                                    INNER JOIN kota d ON (d.id_kota=a.id_kota)
                                    WHERE a.id_user = '$GetID'";
                            $res = $conn->query($sql);
                            $data = $res->fetch_assoc();
                            if  ( empty($data['nama']))  
                            {
                            echo '<script>alert("Silahkan isi profil perusahaan terlebih dahulu!");</script>';
                            echo '<meta http-equiv="refresh" content="0;URL=?p=perusahaan.edit">';
                            // header('location:./');
                            } else {
                        ?>    
                   
                        <form class="form" role="form" action="?p=perusahaan.edit" id="defaultForm" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_user" value="<?php echo $GetID; ?>">  
                        <div class="row">
                            <div class="col-lg-3">
                                <center><img src="dist/images/logo/<?php echo $data['logo'];?>" width="150" height="150"></center>
                            </div>
                            <div class="col-lg-9">
                            <h2><?php echo $data['nama']; ?></h2>
                            <p><?php echo $data['jenis']; ?></p>
                                
                                <div class="row">
                                    <div class="col-lg-8">
                                        <p><i class="fa fa-map-marker"></i>&nbsp;<?php echo $data['kota']; ?></p>
                                    </div>
                                    <div class="col-lg-4">
                                        <p><i class="fa fa-phone-square"></i>&nbsp;<?php echo $data['telp']; ?></p>
                                    </div>
                                </div>

                        <div class="row">
                            <div class="col-lg-8">
                                <p><i class="fa fa-envelope"></i>&nbsp;<?php echo $data['email']; ?></p>
                            </div> 
                        </div>
                    </div>
                </div>
                <hr>

                <div>
                    <div class="topnav">
                        <a href="?p=perusahaan.profil" class="active">Tentang Perusahaan</a>
                        
                    </div>
                </div>
                <br>
                
                
                
                <div>  
                        <div class="row">
                            <div class="col-lg-3">
                                <label> Alamat</label>
                            </div>
                            <div class="col-lg-9">
                                <p> <?php echo $data['alamat']; ?></p>
                            </div>
                        </div>
                        

                        <div class="row">
                        <div class="col-lg-12">
                            
                                <p><?php echo $data['deskripsi']; ?></p>
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

