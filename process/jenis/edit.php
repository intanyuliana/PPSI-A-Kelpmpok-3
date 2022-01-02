
    <div class="row">
        <div class="col-lg-8">
            <h5 class="page-header"><small>Edit Jenis Industri Perusahaan</small></h5>
    
            <div class="panel panel-default">
            <div class="panel-heading">Informasi Jenis Industri Perusahaan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
            <?php 
                $getID = $_GET['id'];
                $sql = "SELECT *FROM jenis_industri 
                            WHERE id_jenis = '$getID'";
                $res = $conn->query($sql);
                $data = $res->fetch_assoc();
            ?>
                   
                <form class="" role="form" style="margin-top: 10px;" action="?p=jenis.action" id="defaultForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $getID; ?>">
                    <div class="form-group">
                    <label> Nama Jenis Industri Perusahaan</label>
                        <input type="text" class="form-control" name="jenis" value="<?php echo $data['jenis']; ?>" required/>
                    </div>
                    
                    <div class="form-group">
                    <label></label>
                        <a class="btn btn-default" href="?p=jenis.list">Batal</a>
                        <input type="submit" name="update" value="Simpan" class="btn btn-primary">
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
