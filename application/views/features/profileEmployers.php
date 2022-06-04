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

<div class="row">
	<div class="col">
		<div class="col">
			<div class="block-heading" align="center">
				<?php 
				$user = $this->session->userdata['logged_in']['UEmail'];
				$UID = $this->login_database_employers->getEmployersIDfromemail($user)[0]->UID;
				$fullName = $this->login_database_employers->getEmployersBasicInfo($UID);
				?>
				<h2 class="text-info" style="color: #a80808;">Your Posts</h2>
				<hr>
				<?php 
				$user = $this->session->userdata['logged_in']['UEmail'];
				$UID = $this->login_database_employers->getEmployersIDfromemail($user)[0]->UID;
				$jobPosts = $this->login_database_employers->get_AllJobs($UID);
				?>
				<?php if (count($Jobs)): ?>
					<?php foreach ($Jobs as $job): ?>
						<div>
							<p class="lead">
								<a href="<?php echo site_url('Jobs/show_job/'. $job->JID); ?>"> <?php echo $job->JTitle; ?> </a>
							</p>
						</div>
					<?php endforeach; ?>
					<?php else: ?>
						<div class="alert alert-primary" role="alert">
							You have no posts!
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col">
				<div class="block-heading" align="center">
					<h2 class="text-info"  style="color: #a80808;">Write an Article</h2>
				</div>
			</div>

			<?php echo form_open_multipart('Profile_employers/upload_job') ?>
			<div class="form-group"><label for="JTitle">Title of the Article:</label>
				<br/>
				<?php
				$data1 = array(
					'type' => 'text',
					'name' => 'JTitle',
					'class' => 'form-control item'
				);
				echo form_input($data1); ?>
				<br/>
			</div>
			<div class="form-group"><label for="JDesc">Description:</label>
				<br/>
				<?php
				$data2 = array(
					'type' => 'text',
					'name' => 'JDesc',
					'class' => 'form-control item'
				);
				echo form_input($data2); ?>
				<br/>
			</div>
			<?php
			$data7 = array(
				'type' => 'submit',
				'name' => 'submit',
				'class' => 'btn btn-primary btn-block',
				'value' => 'Upload',
			);
			echo form_submit($data7);
			echo form_close();
			?>
		</div>
	</div>
</div>

</body>
