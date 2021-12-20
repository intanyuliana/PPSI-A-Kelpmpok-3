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
</style>
<div class="row">
    <div class="col-md-8">
    <h1 class="page-header" >  
        <small>Cari Lowongan</small>
    </h1>

    <?php
        
        include 'rupiah.php';
        if ($_POST['search'] <> '') 
        {
            $search = $_POST['search'];
            $sql = "SELECT *FROM joblist a
                    LEFT JOIN bidang b ON (a.id_bidang=b.id_bidang)
                    LEFT JOIN perusahaan c ON (a.id_perusahaan=c.id_perusahaan) 
                    LEFT JOIN kota d ON (d.id_kota=c.id_kota)
                    WHERE   a.id_job LIKE '%$search%'or
                            a.posisi LIKE '%$search%'or
                            a.tipe LIKE '%$search%'or
                            a.syarat LIKE '%$search%'or
                            a.desk_job LIKE '%$search%'or
                            b.bidang LIKE '%$search%' or
                            c.nama LIKE '%$search%' or
                            c.alamat LIKE '%$search%' or
                            c.telp LIKE '%$search%' or
                            d.kota LIKE '%$search%'
                    ORDER BY a.id_job DESC";

            $res = $conn->query($sql);
            $hasil = mysqli_num_rows($res);

            if ($hasil > 0)
            {
                echo '<h3>'.$hasil.' Lowongan ditemukan dengan kata kunci: <span class="text-navy">"'.$search.'"</span></h3>';
                foreach ($res as $row => $data) 
                {  
                ?>
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
                }
            }      
            else
            {
                echo "<h3>Tidak Ditemukan!</h3> Lowongan pekerjaan belum tersedia!";
            }
        }
        else
        {
            echo '<h3>Not Found! </h3>Silahkan masukkan kata kunci yang kamu cari dengan benar';
        }?>
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
                
                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>
</div>