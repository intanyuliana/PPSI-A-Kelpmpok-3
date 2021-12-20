<!doctype html>
<?php include('koneksi.php'); ?>
<html lang="en">

<head>
	<?php include('header.html') ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
		
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                <div class="navbar-fixed-top">
                                    <nav>
                                        <ul>
                                            <li><a href="index.html" class="default-btn">Home</a></li>
                                            <li><a href="joblist.html">Lowongan Pekerjaan</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
           
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Panels</h3>
					
					<?php

					$query = mysqli_query($conn,"SELECT*FROM joblist");
					$no=1;
					while($data = mysqli_fetch_assoc($query)) 
				{
				?>
			
					<div class="col-md">	
							<!-- PANEL HEADLINE -->
							<div class="panel panel-headline">
								<div class="panel-heading">
									<div class="profile-main">
										<img src="images/home.jpg" style="border-radius: 50%;height: 70px; width: 70px; float: left; margin: 10px">
									</div>
								<div>
									
								<h3 class="panel-title"><?php echo $data['posisi']; ?></h3>
								<?php 
								$query = mysqli_query($conn,"SELECT perusahaan.nama, perusahaan.lokasi FROM perusahaan, joblist WHERE  joblist.id_perusahaan=perusahaan.id_perusahaan");
								
								while($data = mysqli_fetch_assoc($query)) 
								{
								?>
									<p class="panel-subtitle"><?php echo $data['nama']; ?> - <?php echo $data['lokasi']; ?></p>
								<?php } ?>
							</div>
						</div>
						<hr>
						<div class="panel-body">
							<h4>Panel Content</h4>
								
						</div>
				
						<!-- END PANEL HEADLINE -->
				</div>
				<?php }	?>		
			</div>
						
							<!-- END PANEL WITH FOOTER -->
		</div>
					
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
