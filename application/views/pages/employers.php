<style type="text/css" media="screen">
	html, body{
	height: 100%;
	width: 100%;
	font-family: "Poppins", sans-serif;
	color: #222;
	}

	h2{
		color: #a80808;
	}

	a{
	color: #a80808;
}


</style>

<!--- Welcome Section -->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Employers Site</h1>
		</div>
		<hr>
		<div class="col-12">
			<p class="lead">Find actors that fit your requirements, for an easier casting process.</p>
			<p class="lead">Save time and money by applying search filters for your requirements.</p>
			<p class="lead">Ability to have more specific aditional requirements.</p>
		</div>
	</div>
</div>

<!--- Jumbotron -->
<div class="container-fluid">
	<div class="row jumbotron">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
			<p class="lead">Welcome to the employers site. If you want to become an User register below, or if you already have a profile, log in. Below you can discover potetial actors. To browse throught potetntial employees, you need to have a profile.</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
			<a href="<?php echo base_url() ?>index.php/user_authentication_employers/index_employers">
				<button type="button" class="btn btn-outline-secondary btn-lg" >Log In</button>
			</a>
			<a href="<?php echo base_url() ?>index.php/user_authentication_employers/show_employers">
				<button type="button" class="btn btn-outline-secondary btn-lg">Sign In</button>
			</a>
		</div>
	</div>
</div>
