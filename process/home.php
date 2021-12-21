<!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="page-header" style="margin-left: 17px">
                    
                    <small>Lowongan Terbaru</small>
                </h1>
                <?php
                    include 'connect.php';
                    $sql = "SELECT *FROM joblist a
                                LEFT JOIN bidang b ON 
                                (a.id_bidang=b.id_bidang)
                                LEFT JOIN perusahaan c ON 
                                (a.id_perusahaan=c.id_perusahaan)
                            ORDER BY a.id_job DESC LIMIT 20";
                    $res = $conn->query($sql);
                    foreach ($res as $row => $data) {         
                ?>
                <!-- First Blog Post -->
            
                <div class="col-md-2" id="">
                <img class="img-responsive" src="dist/images/logo/<?php echo $data['logo']; ?>" alt="" sizes="{max-width: 100px} 100vw, 100px" height="100px" width="110" style="border-radius: 50%;padding: 10px;">
                </div>
                <h4>
                    <a href="?p=detail_job&id=<?php echo $data['id_job']; ?>" class="title"><?php echo $data['posisi']; ?></a>
                </h4>
                <h5>
                    <a href="index.php" id="conten">
                    <span class="glyphicon glyphicon-list-alt"></span>
                
                    <?php echo $data['nama'].' 
                    <span class="fa fa-bookmark fa-fw"></span> '. $data['bidang'] .' 
                    <span class="glyphicon glyphicon-map-marker"></span> '. $data['alamat'].' 
                
                    <span class="fa fa-calendar fa-fw"></span><span id=conten> '.
                    date_format(date_create($data['tgl_posting']), 'd-m-Y').' - '. 
                    date_format(date_create($data['tgl_akhir']), 'd-m-Y'). ' 
                     <span class="glyphicon glyphicon-tags"></span> '. $data['syarat'].' 
                     </a>' ; 
                    ?>
                </h5>
                <br>
                <hr>
                <!-- <a class="btn btn-primary btn-sm" href="#">View More </a> -->
                <?php } ?></div>

             <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Cari Lowongan</h4>
                    <form role="search" class="navbar-form-custom" action="?p=search" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search">
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
                    <h4>Kategori Lowongan</h4>
                    <div class="row">
                        <div class="col-lg-8">
                       
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