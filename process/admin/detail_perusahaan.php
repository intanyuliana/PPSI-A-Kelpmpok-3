
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">Informasi Perusahaan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
        <?php

            $GetID= $_GET['id'];

            $sql = "SELECT *FROM perusahaan a
                    INNER JOIN user b ON (a.id_user=b.id_user) 
                    WHERE a.id_perusahaan = '$GetID'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();


            $id_jenis = $data['id_jenis'];

          
        ?>    


                   
                <form class="form" role="form" action="?p=admin.list_perusahaan" id="defaultForm" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="id_user" value="<?php echo $GetID; ?>">  
                <img src="dist/images/logo/<?php echo $data['logo'];?>" width="100" height="100"> 
                <div class="form-group"></div>    
                    <div class="form-group">
                    <label> Nama Perusahaan</label>
                        <p> <?php echo $data['nama']; ?></p>
                    </div>
                    <div class="form-group">
                    <label> No. NPWP Perusahaan</label>
                        <p> <?php echo $data['npwp']; ?></p>
                    </div>
                    <div class="form-group">
                    <label> Jenis Industri</label>
                    <?php       

                            $sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM jenis_industri WHERE id_jenis = '$id_jenis'"));
                        
                    ?>
                    <p><?php echo $sql['jenis'] ?></p>
                    </div>
                    <div class="form-group">
                    <label> Alamat</label>
                        <p> <?php echo $data['alamat']; ?></p>
                    </div>
                    <div class="form-group">
                    <label> No. Telepon</label>
                        <p> <?php echo $data['telp']; ?> </p>
                    </div>
                    <!-- <div class="form-group"> -->
                    <!-- <label> Logo Perusahaan</label>
                        <input type="file" name="logo"><img src="dist/images/logo/<?php echo $data['logo'];?>" width="90" height="90" required/>
                    </div> -->
                    <div class="form-group">
                    <label> Deskripsi Perusahaan</label>
                       <p> <?php echo $data['deskripsi'];?></p>
                    </div>
                    <div class="form-group">
                    <label></label>

                    <button class="btn btn-primary" type="" name="">Kembali</button>
                        
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>

