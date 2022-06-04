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

a{
	color: #0e6929;
}

</style>

<main class="page registration-page">
	<section class="clean-block clean-form dark">
		<div class="container">
			<div class="block-heading">
				<h2 class="text-info">Registration</h2>
				<p><?php if (isset($message_display)) {
						echo $message_display;
					};
					echo "<div class='error_msg'>";
					echo validation_errors();
					echo "</div>";?></p>
			</div>
			<div>
				<div>
					<hr/>
					<?php

					echo form_open('user_authentication_actors/signup_actors');

					echo '<div class="form-group"><label for="UName">Name</label>';
					echo "</br>";
					$data1 = array(
							'type' => 'text',
							'name' => 'UName',
							'class' => 'form-control item'
					);
					echo form_input($data1);
					echo "<div class='error_msg'>";

					echo "</div>";
					echo "</br>";

					echo '<div class="form-group"><label for="USurname">Surname</label>';
					echo "</br>";
					$data2 = array(
							'type' => 'text',
							'name' => 'USurname',
							'class' => 'form-control item'
					);
					echo form_input($data2);
					echo "<div class='error_msg'>";

					echo "</div>";
					echo "<br/>";

					echo '<div class="form-group"><label for="UEmail">Email</label>';
					echo "<br/>";
					$data3 = array(
							'type' => 'email',
							'name' => 'UEmail_value',
							'class' => 'form-control item'
					);
					echo form_input($data3);
					echo "<br/>";
					echo '<div class="form-group"><label for="UUserName">UserName</label>';
					echo "<br/>";
					$data6 = array(
							'type' => 'text',
							'name' => 'UUserName',
							'class' => 'form-control item'
					);
					echo form_input($data6);
					echo "<br/>";
					echo '<div class="form-group"><label for="UPassword">Password</label>';
					echo "<br/>";
					$data4 = array(
							'type' => 'password',
							'name' => 'UPassword',
							'class' => 'form-control item'
					);

					echo form_password($data4);
					echo "<br/>";
					$data7 = array(
							'type' => 'hidden',
							'name' => 'RID',
							'value' => '1',
					);
					echo form_input($data7);
					$data5 = array(
							'type' => 'submit',
							'name' => 'submit',
							'class' => 'btn btn-primary btn-block',
							'value' => 'Sign Up',
					);
					echo form_submit($data5);
					echo form_close();
					?>
					<a href="<?php echo base_url() ?>index.php/user_authentication_actors/index_actors">To Login Click Here</a>
				</div>
			</div>
		</div>
	</section>
</main>
