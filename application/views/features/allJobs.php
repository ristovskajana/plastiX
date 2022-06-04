<style type="text/css" media="screen">
	
	html, body{
	height: 100%;
	width: 100%;
	font-family: "Poppins", sans-serif;
	color: #222;
}

h2, .text-info{
	color: #0e6929!important;
}

.btn-primary {
    color: #fff;
    background-color: #0e6929;
    border-color: #6a9e79;
}

.btn-primary:hover {
    color: #fff;
    background-color: #0e6929;
    border-color: #6a9e79;
}

.alert-primary{
	background-color: #6a9e79;
	color: white;
}

a{
	color: #0e6929;
}

</style>

<div class="row justify-content-center">
	<div class="col-12 col-md-10 col-lg-8">
		<div class="card card-sm">
			<div class="card-body row no-gutters align-items-center">
				<div class="col-auto">
					<i class="fa fa-search h4 text-body"></i>
				</div>
				<!--end of col-->
				<div class="col">
					<input class="form-control form-control-lg form-control-borderless" id="textarea" type="search"
					placeholder="Search articles by titles or keywords">
				</div>
				<!--end of col-->
				<div class="col-auto">
					<button class="btn btn-lg btn-success" id="searchbutton" type="submit" style="background-color: #0e6929;">Search</button>
				</div>
				<!--end of col-->
			</div>
		</div>
	</div>
	<!--end of col-->
</div>
<div class="row">
	<div class="col">
		<div class="col">
			<?php if (count($Jobposts)) : ?>
				<?php foreach ($Jobposts as $job) : ?>
					<div>
						<div>
							<h2 style="color: #0e6929;"><a href="<?php echo site_url('Jobs/show_job/'. $job->JID); ?>"> <?php echo $job->JTitle; ?> </a></h2>
							<hr>
							<p class="lead">
								<?php echo $job->JDesc; ?>
							</p>
							<!--  <p class="lead">
								By: < ?php echo $job->UName; ?>
							</p> -->
							<hr>		
							</div>
							<hr>
						</div>
					<?php endforeach; ?>
					<?php else : ?>
						<div class="alert alert-primary" role="alert">
							No such Article found!
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	function myFunction() {
		var x = document.getElementById("myDIV");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}
</script>

