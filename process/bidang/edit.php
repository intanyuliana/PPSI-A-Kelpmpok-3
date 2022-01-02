
    <div class="row">
        <div class="col-lg-8">
            <h5 class="page-header"><small>Edit Bidang Pekerjaan</small></h5>
    
            <div class="panel panel-default">
            <div class="panel-heading">Informasi Bidang Pekerjaan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
            <?php 
                $getID = $_GET['id'];
                $sql = "SELECT *FROM bidang 
                            WHERE id_bidang = '$getID'";
                $res = $conn->query($sql);
                $data = $res->fetch_assoc();
            ?>
                   
                <form class="" role="form" style="margin-top: 10px;" action="?p=bidang.action" id="defaultForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $getID; ?>">
                    <div class="form-group">
                    <label> Nama Bidang Pekerjaan</label>
                        <input type="text" class="form-control" name="bidang" value="<?php echo $data['bidang']; ?>" required/>
                    </div>
                    
                    <div class="form-group">
                    <label></label>
                        <a class="btn btn-default" href="?p=bidang.list">Batal</a>
                        <input type="submit" name="update" value="Simpan" class="btn btn-primary">
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
