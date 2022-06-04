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
	$this->load->view('user_authentication_actors/login_form_actors', $data);
	return;
} ?>

<div class="row">
	<div class="col">
		<div class="col" >
			<?php 
			$user = $this->session->userdata['logged_in']['UEmail'];
			$UID = $this->login_database_actors->getActorsIDfromemail($user)[0]->UID;
			$fullName = $this->login_database_actors->getActorsBasicInfo($UID);
			?>
			<h2 class="text-info" style="color: #0e6929;">Your Information</h2>
			<p class="lead"> <?php echo $fullName[0]->UName . " " . $fullName[0]->USurname ?> </p>
			<hr>
			<?php if (count($Additional_Information)): ?>
				<?php foreach ($Additional_Information as $info): ?>
					<div>
						<p class="lead">
							<?php echo $info->IType; ?> : <?php echo $info->IInformation; ?> 
						</p>
					</div>
				<?php endforeach; ?>
				<?php else: ?>
					<div class="alert alert-primary" role="alert">
						You have no additional information!
					</div>
				<?php endif; ?>
			</div>		
		</div>
		<div class="col">
			<h2 class="text-info" style="color: #0e6929;">Profile picture</h2>
			<div class="row">			
				<?php if (count($Portfolio_Pictures)): ?>
					<?php foreach ($Portfolio_Pictures as $pic): ?>
						<img src="<?php echo base_url() . $pic->PLocation; ?>" width="300" height="240">
					</div>
					<hr>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
	<?php else: ?>
		<div class="alert alert-primary" role="alert">
			You currently don't have a Profile Picture!
		</div>
	<?php endif; ?>
</div>
<hr>
<div class="col">
	<div class="col">
		<div class="block-heading" align="center">
			<h2 class="text-info" style="color: #a80808;">Upload a Profile Picture</h2>
			<p><?php echo "<div class='error_msg'>";
			echo validation_errors();
			echo "</div>";
			if (isset($error_message)) {
				echo $error_message;
			}; ?></p>
		</div>
	</div>

	<?php echo form_open_multipart('Profile_actors/upload_portfolio_pictures') ?>
	<div class="form-group"><label for="filename">Picture</label>
		<?php
		$data1 = array(
			'type' => 'file',
			'name' => 'filename',
			'class' => 'form-control-file'
		);
		echo form_upload($data1); ?>
		<br/>
	</div>
	<?php
	$data2 = array(
		'type' => 'submit',
		'name' => 'submit',
		'class' => 'btn btn-primary btn-block',
		'value' => 'Upload',
	);
	echo form_submit($data2);
	echo form_close();
	?>
</div>

<div class="col">
	<div class="col">
		<div class="block-heading" align="center">
			<h2 class="text-info" style="color: #a80808;">Upload Additional Information</h2>
		</div>
	</div>

	<?php echo form_open_multipart('Profile_actors/upload_additional_information') ?>
	<div class="form-group"><label for="IType">Type of information (ex. Nationality, Sex..)</label>
		<br/>
		<?php
		$data3 = array(
			'type' => 'text',
			'name' => 'IType',
			'class' => 'form-control item'
		);
		echo form_input($data3); ?>
		<br/>
	</div>
	<div class="form-group"><label for="IInformation">Insert Info Here:</label>
		<br/>
		<?php
		$data4 = array(
			'type' => 'text',
			'name' => 'IInformation',
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

</body>
