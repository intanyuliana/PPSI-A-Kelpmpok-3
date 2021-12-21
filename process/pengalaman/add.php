<div class="row">
        <div class="col-lg-8">
            <h5 class="page-header"><small>Pengalaman & Sertifikat</small></h5>
    <!-- </div> -->
    <!-- <div class="row"> 
        <div class="col-lg-8"> -->
            <div class="panel panel-default">
            <div class="panel-heading">Tambah Pengalaman & Sertifikat Baru</div>
                <div class="panel-body">
                    <?php
                        $getID = $_SESSION['id_user'];
                        $sql = "SELECT id_pelamar from pelamar where id_user='$getID'";
                        $res = $conn->query($sql);
                        $id = $res->fetch_assoc();
                        $id_pelamar=$id['id_pelamar'];
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                        <form class="" role="form" style="margin-top: 10px;" action="?p=pengalaman.action" id="defaultForm" method="post" enctype="multipart/form-data">
	                    <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
                        <input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar ?>">
	                    
	                   
	                    <div class="form-group">
	                        <label>Deskripsi Pengalaman</label>
	                            <textarea type="text" name="desk_pengalaman" class="form-control" required></textarea>
	                            <i style="color:grey;">(Nama organisasi, jabatan, kegiatan, dsb)</i>
	                    </div>
	                    <div class="form-group">
	                        <label>Tahun</label>
	                            <input type="text" name="tahun" class="form-control"/>
	                    </div>
	                    <div class="form-group">
	                    <label> Upload Sertifikat</label>
	                            <input type="file" name="sertifikat" class="form-control"/>
	                            <i style="color:red;">*File tipe .pdf, .doc, .docx</i>
                                <i style="color:grey;">(Jika ada)</i>
	                    </div>
	                    <div class="form-group">
	                    <label></label>
	                        <a class="btn btn-default" href="?p=pengalaman.list">Batal</a>
	                        <input type="submit" name="save" value="Tambah" class="btn btn-primary">
	                    </div>                   
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>
	