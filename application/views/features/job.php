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


<?php

if (!isset($this->session->userdata['logged_in'])) {
	$data['message_display'] = 'Signin to view this page!';
	$this->load->view('user_authentication/login_form_employers', $data);
	return;
} ?>


<div>
	<!-- Post Content Column -->
	<div class="col">
		<div class="col">
					<h2 style="color: #a80808;"><?php echo $job['JTitle']; ?></h2>
					<hr>
					<p class="lead">
						<?php echo $job['JDesc']; ?>
					</p>
					<hr>
				</div>
	</div>
	<div class="block-heading" align="center">
					<h3 class="text-info">Comments</h3>
					<hr>
					<?php if (count($Requirements)): ?>
						<?php foreach ($Requirements as $info): ?>
							<div>
								<p class="lead">
									<?php echo $info->QRequirement; ?> 
								</p>
							</div>
						<?php endforeach; ?>
						<?php else: ?>
							<div class="alert alert-primary" role="alert">
								No comments!
							</div>
						<?php endif; ?>
					</div>			
	<div class="col">
		<div class="col">
			<div class="block-heading" align="center">
				<h2 class="text-info">Add a comment</h2>
			</div>
		</div>

		<?php echo form_open_multipart('Jobs/add_requirements') ?>
		<div class="form-group"><label for="QRequirement">Insert comment Here:</label>
			<br/>
			<?php
			$data4 = array(
					'type' => 'text',
					'name' => 'QRequirement',
					'class' => 'form-control item'
			);
			echo form_input($data4); ?>
			<br/>
		</div>
		<?php
		$data5 = array(
				'type' => 'submit',
				'name' => 'submit',
				'class' => 'btn btn-primary btn-block',
				'value' => 'Upload',
		);
		echo form_submit($data5);
		echo form_close();
		?>
	</div>
</div>
	</div>
</div>

</body>

