<style type="text/css" media="screen">
	
	html, body{
		height: 100%;
		width: 100%;
		font-family: "Poppins", sans-serif;
		color: #222;
	}

	h2, .text-info{
		color: #a80808!important;
	}

	.btn-primary {
		color: #fff;
		background-color: #a80808;
		border-color: #007bff;
	}

	.btn-primary:hover {
		color: #fff;
		background-color: #a80808;
		border-color: #007bff;
	}
	.alert-primary{
		background-color: #9c3333;
		color: white;
	}

	a{
		color: #a80808;
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
					placeholder="Search Actors by name or surname">
				</div>
				<!--end of col-->
				<div class="col-auto">
					<button class="btn btn-lg btn-success" id="searchbutton" type="submit" style="background-color: #a80808;">Search</button>
				</div>
				<!--end of col-->
			</div>
		</div>
	</div>
	<!--end of col-->
</div>
<div class="col">
	<div class="col">
		<div class="col">
			<?php if (count($Actors)) : ?>
				<?php foreach ($Actors as $act) : ?>
					<div>
						<div>
							<h2 style="color: #a80808;"><?php echo $act->UName; ?>  <?php echo $act->USurname; ?></h2>
							<hr>
							<p class="lead">
								Email: <?php echo $act->UEmail; ?>
							</p>
							<p class="lead">
								Username: <?php echo $act->UUserName; ?>
							</p>
						</div>
					</div>
					<hr>
					<div class="col">
						<h3 class="text-info">Additional Information</h3>
						<?php $UID = $act->UID;
						$Information = $this->login_database_actors->get_AllInfo($UID); ?>
						<?php if (count($Information)): ?>
							<?php foreach ($Information as $info): ?>
								<div class="col">
									<p class="lead">
										<?php echo $info->IType; ?> : <?php echo $info->IInformation; ?> 
									</p>
								</div>
							<?php endforeach; ?>
							<?php else: ?>
								<div class="alert alert-primary" role="alert">
									No Additional Information!
								</div>
							<?php endif; ?>
							<hr>
							<div class="col">
								<h4 style="color: #a80808;">Profile Picture</h4>
								<?php if (count($Pictures)): ?>
									<?php foreach ($Pictures as $pic): ?>
										<?php if ($pic->UID == $act->UID) {
											echo '<img src="' ;echo base_url() . $pic->PLocation; echo'" width="150" height="120">';								
										}
									endforeach; ?>
									<?php else: ?>
										<div class="alert alert-primary" role="alert">
											No Profile Pictures!
										</div>
									<?php endif; ?>
								</div>		
						</div>
							<hr>
				<?php endforeach; ?>
				<?php else : ?>
					<div class="alert alert-primary" role="alert">
						No such Actor found!
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

