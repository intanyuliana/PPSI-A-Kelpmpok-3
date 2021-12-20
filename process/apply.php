<?php 
    	session_start();
	    require_once ('connect.php');
	    if  ( empty($_SESSION['uname']))  
	    {
	    	echo '<script>alert("Harap login untuk melamar pekerjaan!");</script>';
	    	echo '<meta http-equiv="refresh" content="0;URL=?p=login">';
	        // header('location:./');
	    } else {

    	$getID = $_GET['id'];
    	$id = $_SESSION['id_user'];
    	$sql = "SELECT *FROM joblist a
	            INNER JOIN bidang b ON 
	            (a.id_bidang=b.id_bidang)
	            INNER JOIN perusahaan c ON 
	            (a.id_perusahaan=c.id_perusahaan) WHERE a.id_job = '$getID' ";
	            $res = $conn->query($sql);
	            foreach ($res as $row => $data);

	    $sql2 = "SELECT id_pelamar from pelamar WHERE id_user= '$id'";
	     $res = $conn->query($sql2);
            $data2 = $res->fetch_assoc();
	    
    ?>

    <div class="row">
        <div class="col-lg-8">
            <h5 class="page-header"><small> Apply for job</small></h5>
    <!-- </div> -->
    <!-- <div class="row"> 
        <div class="col-lg-8"> -->
            <div class="panel panel-default">
            <div class="panel-heading">Apply Lowongan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                        <form class="" role="form" style="margin-top: 10px;" action="?p=apply_save" id="defaultForm" method="post" enctype="multipart/form-data">
	                    <input type="hidden" name="id_job" value="<?php echo $data['id_job']; ?>">
	                    <input type="hidden" name="id_pelamar" value="<?php echo $data2['id_pelamar'];?>">
	                    <input type="hidden" name="id_perusahaan" value="<?php echo $data['id_perusahaan']; ?>">
						<input type="hidden" name="status_apply" value="0">
						<input type="hidden" name="status_pelamar" value="0">
	                   
	                    
	                    <div class="form-group">
	                    <label> Upload CV</label>
	                            <input type="file" name="file" required/>
	                            <i style="color:red;">* File max 1 MB, 
	                            File tipe .pdf, .doc, .docx</i>
	                    </div>
	                    <div class="form-group">
	                    <label> Upload Transkrip Nilai/Ijazah</label>
	                            <input type="file" name="files" required/>
	                            <i style="color:red;">* File max 1 MB, 
	                            File tipe .pdf, .doc, .docx</i>
	                    </div>
	                    <div class="form-group">
	                    <label></label>
	                        <a class="btn btn-default" href="?p=home">Batal</a>
	                        <input type="submit" name="save" value="Apply" class="btn btn-primary">
	                    </div>                   
	                </form>
	            </div>
	        </div>
	    </div>
	</div>
</div>
	
	<?php 
	}