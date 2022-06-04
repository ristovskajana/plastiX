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

a{
	color: #a80808;
}

</style>

<main class="page login-page">
	<section class="clean-block clean-form dark">
		<div class="container">
			<div class="block-heading">
				<h2 class="text-info">Sign In</h2>
				<p> <?php if (isset($error_message)) {
						echo $error_message;
					};
					if (isset($logout_message)) {
						echo "<div class='message'>";
						echo $logout_message;
						echo "</div>";
					};
					if (isset($message_display)) {
						echo "<div class='message'>";
						echo $message_display;
						echo "</div>";
					}?></p>
			</div>
			<div>
				<div>
					<hr/>
					<?php
					echo "<div class='error_msg'>";
					echo validation_errors();
					echo "</div>";
					echo form_open('user_authentication_employers/signin_employers');

					echo '<div class="form-group"><label for="UEmail">Email</label>';
					echo "</br>";
					$data1 = array(
							'type' => 'email',
							'name' => 'UEmail',
							'class' => 'form-control item'
					);
					echo form_input($data1);
					echo "<div class='error_msg'>";

					echo "</div>";
					echo "</br>";

					echo '<div class="form-group"><label for="UPassword">Password</label>';
					echo "</br>";
					$data2 = array(
							'type' => 'password',
							'name' => 'UPassword',
							'class' => 'form-control item'
					);
					echo form_input($data2);
					echo "<div class='error_msg'>";

					echo "</div>";
					echo "</br>";

					$data3 = array(
							'type' => 'submit',
							'name' => 'submit',
							'class' => 'btn btn-primary btn-block',
							'value' => 'Sign In',
					);
					echo form_submit($data3);
					echo form_close();

					?>
					<a href="<?php echo base_url() ?>index.php/user_authentication_employers/show_employers">To Sign Up Click Here</a>
					<p></p>
					<a href="<?php echo base_url() ?>index.php/user_authentication_actors/index_actors">To Log In as Actor</a>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</section>
</main>
