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
                    LEFT JOIN pengalaman e ON (e.id_pelamar=a.id_pelamar)
                    WHERE a.id_user = '$GetID'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();

          
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
                            <a href="?p=pelamar.profil" >Tentang Saya</a>
                            <a href="?p=pengalaman.list" class="active">Pengalaman & Sertifikat</a>
                        </div>
                </div>
                <br>
                <div class="">
                    <a class="btn btn-default" title="New Data" href="?p=pengalaman.add"><i class="fa fa-plus fa-fw"></i> Tambah</a>
                    <br>
                </div>
                <br>
               
                <div>
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Deskripsi</th>
                        <th>Tahun</th>
                        <th>Sertifikat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
               
                <?php
                
                $sql2 = "SELECT *FROM pelamar a 
                               left join pengalaman b on a.id_pelamar = b.id_pelamar
                               WHERE a.id_user = '$GetID'";
                   
                       $res = $conn->query($sql2);
                       $no  = 0;
                       foreach ($res as $row => $data) {
                       ?>
                       <tr>
                       <td><?php echo $data['desk_pengalaman']; ?></td>
                       <td style="width:20%"><?php echo $data['tahun']; ?></td>
                       <td style="width:15%"><a href="dist/file/sertifikat/<?php echo $data['sertifikat']; ?>">Unduh</a></td>
                       <td style="width:12%">
                        <div class="btn-group" role="group" aria-label="...">

                        <a class="btn btn-default btn-xs" title="Lihat Profil" href="?p=pengalaman.edit&id=<?php echo $data['id']; ?>" ><i class="fa fa-pencil fa-fw"></i></a>
                            <a href="?p=pengalaman.delete&id=<?php echo $data['id']; ?>" onclick="return confirm('Apakah anda yakin menghapus data?')" class="btn btn-default btn-xs" title="Delete Data"><span class="fa fa-trash fa-fw"></span></a>
                        </div>

                        </td>
                        </tr>
                       <?php } ?>
                </tbody>
                </table>
                    
                </div>
                                      
                </form>
            </div>
        </div>
    </div>
</div>
</div>




