
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">Informasi Pelamar</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
        <?php
            $id= $_GET['id'];

            $sql = "SELECT *FROM pelamar a
                    LEFT JOIN user b ON (a.id_user=b.id_user) 
                    LEFT JOIN fakultas c ON (a.id_fakultas=c.id_fakultas)
                    LEFT JOIN jurusan d ON (d.id_jurusan=a.id_jurusan)
                    WHERE  a.id_user = '$id'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();


            $id_jenis = $data['id_jenis'];

          
        ?>    


                   
                <form class="form" role="form" action="?p=admin.list_pelamar.php" id="defaultForm" method="" enctype="multipart/form-data">
                
            
                <img src="dist/images/foto/<?php echo $data['foto'];?>" width="100" height="100"> 
       
                    <div class="form-group">
                    <label> Nama</label>
                        <p> <?php echo $data['nama_p']; ?></p>
                    </div>
                    <div class="form-group">
                    <label>Email</label>
                        <p> <?php echo $data['email']; ?></p>
                    </div>
                    <div class="form-group">
                    <label> Tempat, Tanggal Lahir</label>
                        <p><?php echo $data['tempat_lahir']; ?>, <?php echo $data['tgl_lahir']; ?></p>
                    </div>
                    <div class="form-group">
                    <label> Jenis Kelamin</label>
                        <p><?php echo $data['jk']; ?></p>
                    </div>
                    
                    <div class="form-group">
                    <label> Agama</label>
                        <p><?php echo $data['agama']; ?></p>
                    </div>
                    
                    <div class="form-group">
                    <label> Alamat</label>
                        <p><?php echo $data['alamat']; ?></p>
                    </div>
                    
                    
                    <div class="form-group">
                    <label> No. Telp</label>
                        <p><?php echo $data['telp']; ?></p>
                    </div>
                    <div class="form-group">
                    <label>Jurusan/Fakultas</label>
                        <p><?php echo $data['nama_jurusan']; ?>/<?php echo $data['nama_fakultas']; ?></p>
                    </div>
                    <div class="form-group">
                    <label> Keahlian</label>
                        <p><?php echo $data['keahlian']; ?></p>
                    </div>

                    <a class="btn btn-default" href="?p=admin.list_pelamar">Kembali</a>
                   
            
                                      
                </form>
            </div>
        </div>
    </div>
</div>
</div>




