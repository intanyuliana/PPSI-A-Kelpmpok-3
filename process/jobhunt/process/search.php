<?php
	echo '<div class="col-md-8">

            <h1 class="page-header" >  
                <small>Find Job</small>
            </h1>';

            if ($_POST['search'] <> '') {
                $search = $_POST['search'];
                $sql = "SELECT *FROM joblist a
                        LEFT JOIN bidang b ON 
                        (a.id_bidang=b.id_bidang)
                        LEFT JOIN perusahaan c ON 
                        (a.id_perusahaan=c.id_perusahaan) 
                        WHERE a.id_job LIKE '%$search%'or
                        a.posisi LIKE '%$search%'or
                        a.tipe LIKE '%$search%'or
                        a.syarat LIKE '%$search%'or
                        a.deskripsi LIKE '%$search%'or
                        a.img LIKE '%$search%'or
                        b.bidang LIKE '%$search%' or
                        c.nama LIKE '%$search%' or
                        c.alamat LIKE '%$search%' or
                        c.telp LIKE '%$search%'";

                        

                $res = $conn->query($sql);
                $hasil = mysqli_num_rows($res);

                if ($hasil > 0){
                    echo '<h3>'.$hasil.' lowongan ditemukan dengan kata kunci: <span class="text-navy">"'.$search.'"</span></h3>';
                
                    foreach ($res as $row => $data) {
                        
                        echo '<div class="col-md-2" id="crop">
                            <img class="img-responsive" src="assets/img/portfolio/'.$data['img'].'" alt="" sizes="{max-width: 110px} 100vw, 110px" height="110" width="110">
                            </div>
                            
                            <h4>
                                <a href="?p=job&id='.$data['id_job'].'" class="title"> '.$data['posisi'].'</a>
                            </h4>
                            <h5>
                                <a href="index.php" id="conten">
                                <span class="glyphicon glyphicon-list-alt"></span>
                            '.$data['nama'].' 
                            <span class="fa fa-bookmark fa-fw"></span> '.$data['bidang'] .' 
                            <span class="glyphicon glyphicon-map-marker"></span> '.$data['alamat'].' </a>
                    
                            <span class="fa fa-calendar fa-fw"></span><span id=conten> '.
                            date_format(date_create($data['tgl_posting']), 'd-m-Y').' - '. 
                            date_format(date_create($data['tgl_akhir']), 'd-m-Y').' 
                            <span class="glyphicon glyphicon-tags"></span> '. 
                            $data['deskripsi'].' '.$data['jk_require'].'
                            <span class="fa fa-graduation-cap fa-fw"></span> '. 
                            $data['syarat'].'
                    
                            </h5>
                            <br>
                            <hr>
                            ';
                        }
                }
                else{
                    echo "<h3>Not Found! </h3> Data yang kamu cari tidak ada pada database.";
                }
            }else{
                echo '<h3>Not Found! </h3>Silahkan masukkan kata kunci yang kamu cari dengan benar.';
            }
        echo "</div>";