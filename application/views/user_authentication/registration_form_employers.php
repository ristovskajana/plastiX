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

					echo form_open('user_authentication_employers/signup_employers');

					echo '<div class="form-group"><label for="UName">Name</label>';
					echo "</br>";
					$data11 = array(
							'type' => 'text',
							'name' => 'UName',
							'class' => 'form-control item'
					);
					echo form_input($data11);
					echo "<div class='error_msg'>";

					echo "</div>";
					echo "</br>";

					echo '<div class="form-group"><label for="UEmail">Email</label>';
					echo "<br/>";
					$data12 = array(
							'type' => 'email',
							'name' => 'EEmail_value',
							'class' => 'form-control item'
					);
					echo form_input($data12);
					echo "<br/>";
					echo '<div class="form-group"><label for="UPassword">Password</label>';
					echo "<br/>";
					$data13 = array(
							'type' => 'password',
							'name' => 'UPassword',
							'class' => 'form-control item'
					);
					echo form_password($data13);
					echo "<br/>";
					$data7 = array(
							'type' => 'hidden',
							'name' => 'RID',
							'value' => '2',
					);
					echo form_input($data7);
					echo "<br/>";
					$data14 = array(
							'type' => 'submit',
							'name' => 'submit',
							'class' => 'btn btn-primary btn-block',
							'value' => 'Sign Up',
					);
					echo form_submit($data14);
					echo form_close();
					?>
					<a href="<?php echo base_url() ?>index.php/user_authentication_employers/index_employers">To Login Click Here</a>
					<p></p>
					<a href="<?php echo base_url() ?>index.php/user_authentication_actors/show_actors">To Sign in As an Actor</a>
				</div>
			</div>
		</div>
	</section>
</main>
