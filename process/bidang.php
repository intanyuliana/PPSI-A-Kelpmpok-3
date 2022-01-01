<!-- Blog Entries Column -->
<style>
.tag {
    height: auto;
    min-height: 100px;
    background: green;
    padding: 7px;
    border-radius: 15px;
    font-size:14px;
    display: inline;
}
hr.new {
  border-top: 2px solid green;
}
</style>
<div class="col-md-8">
<h1 class="page-header" >  
    <small>Lowongan Terbaru</small>
</h1>
<?php
    include 'connect.php';
    include 'rupiah.php';
    $getID = $_GET['id'];

    $sql2 = "SELECT bidang FROM bidang where id_bidang = $getID";
    $res = $conn->query($sql2);
    $data2 = $res->fetch_assoc();

    $sql = "SELECT *FROM joblist a
            LEFT JOIN perusahaan b ON (a.id_perusahaan=b.id_perusahaan)
            LEFT JOIN bidang c ON (a.id_bidang=c.id_bidang)
            LEFT JOIN jenis_industri d ON (b.id_jenis=d.id_jenis)
            LEFT JOIN user e ON (b.id_user=e.id_user)
            LEFT JOIN kota f ON (f.id_kota=b.id_kota)
            WHERE a.id_bidang = $getID ";
    $res = $conn->query($sql);
    echo '<h3>'.$hasil.' Lowongan pekerjaan di bidang : <span class="text-navy">"'.$data2['bidang'].'"</span></h3>';
    foreach ($res as $row => $data) 
    {
?>
<!-- First Blog Post -->
    <div class="row">
        <div class="col-lg-2">
            <a href="?p=detail_job&id=<?php echo $data['id_job']; ?>"><center><img src="dist/images/logo/<?php echo $data['logo'];?>" width="110" height="120"></center>
        </div>
    
        <div class="col-lg-10">
            <h3><?php echo $data['posisi']; ?></h3></a>
            <p><?php echo $data['desk_job']; ?></p>
                                
            <div class="row">
                <div style="float:left;">
                    &nbsp;&nbsp;&nbsp;<p class="tag" style="color:white;"><i class="fa fa-map-marker"></i>&nbsp;<?php echo $data['kota']; ?></p>&nbsp;
                </div>
                <div style="float:left;">
                    <p class="tag" style="color:white;"><i class="fa fa-clock-o"></i>&nbsp;<?php echo $data['tipe']; ?></p>&nbsp;
                </div>
                <div class="col-lg">
                    <p class="tag" style="color:white;"><i class="fa fa-bookmark"></i>&nbsp;<?php echo $data['bidang']; ?></p>&nbsp;
                </div>
            </div>                
            <br>
                                    
            <div class="row">
                <div class="col-lg-8">
                    <a href="?p=perusahaan.profil&id=<?php echo $data['id_perusahaan']; ?>"><p><i class="fa fa-building"></i>&nbsp;<?php echo $data['nama']; ?></p></a>
                    <p><i class="	glyphicon glyphicon-credit-card"></i>&nbsp;<?php echo rupiah($data['gaji_min']); ?> - <?php echo rupiah($data['gaji_max']); ?></p> 
                </div>
                                    
                <div class="col-lg-4">
                    <a class="btn btn-success" href="?p=detail_job&id=<?php echo $data['id_job']; ?>">Lihat</a>
                </div>
            </div> 
        </div>
                                        
    </div>
    <hr>
    <?php 
    }   ?>
</div>
<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Cari Lowongan</h4>
                    <form role="search" class="navbar-form-custom" action="?p=search" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Posisi, perusahaan, bidang ...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Bidang Lowongan</h4><hr class="new">
    
                    <div class="row">
                        <div class="col-lg-8">
                        <?php
                            $sql = "SELECT * FROM bidang";
                            $res = $conn->query($sql);
                            foreach ($res as $row => $data) {
                            echo'
                            <ul class="list-unstyled">
                                <li><a href="?p=bidang&id='.$data["id_bidang"].'"> '.$data['bidang'].'</a>
                                </li>
                            </ul>'; 
                            }
                        ?>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>
                
                <div class="well">
    <h4>Jenis Industri Perusahaan</h4><hr class="new">

    <div class="row">
        <div class="col-lg-8">
        <?php
            $sql = "SELECT * FROM jenis_industri";
            $res = $conn->query($sql);
            foreach ($res as $row => $data) {
            echo'
            <ul class="list-unstyled">
                <li><a href="?p=jenis&id='.$data["id_jenis"].'"> '.$data['jenis'].'</a>
                </li>
            </ul>'; 
            }
        ?>
        </div>
        
    </div>
    <!-- /.row -->
</div>

            </div>

