<!-- Blog Entries Column -->
<div class="col-md-8">

<h1 class="page-header" >
    
    <small>Lowongan Terbaru Berdasarkan Kategori</small>
</h1>
<?php
    include 'connect.php';
    $getID = $_GET['id'];

    $sql = "SELECT *FROM joblist a
                LEFT JOIN bidang b ON 
                (a.id_bidang=b.id_bidang)
                LEFT JOIN perusahaan c ON 
                (a.id_perusahaan=c.id_perusahaan)
            WHERE a.id_bidang = '$getID' ";
    $res = $conn->query($sql);
    foreach ($res as $row => $data) {
?>
<!-- First Blog Post -->
<!-- <div class="col-md-2" id="crop"> -->
<!-- <img class="img-responsive" src="dist/images/logo/<?php echo $data['logo']; ?>" alt="" sizes="{max-width: 110px} 100vw, 110px" height="110" width="110"> -->
<!-- </div> -->

<h4>
    <a href="?p=job&id=<?php echo $data['id_job']; ?>" class="title"><?php echo $data['posisi']; ?></a>
</h4>
<h5>
    <a href="index.php" id="conten">
    <span class="glyphicon glyphicon-list-alt"></span>
        <?php echo $data['nama'].' 
            <span class="fa fa-bookmark fa-fw"></span> '. $data['bidang'] .' 
            <span class="glyphicon glyphicon-map-marker"></span> '. $data['alamat'].' </a>
        
            <span class="fa fa-calendar fa-fw"></span><span id=conten> '.
            date_format(date_create($data['tgl_posting']), 'd-m-Y').' - '. 
            date_format(date_create($data['tgl_akhir']), 'd-m-Y').' 
            <span class="glyphicon glyphicon-tags"></span> '. 
            $data['syarat'].' '.$data['jk_require']; 
        ?>
</h5>
<br>
<!-- <a class="btn btn-primary btn-sm" href="#">View More </a> -->

<hr>
<?php } ?>

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