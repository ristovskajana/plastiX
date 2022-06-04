<style type="text/css" media="screen">
	.carousel-inner img {
	width: 100%;
	height: 100%;
}

a{
	color: #0e6929;
}

.carousel-caption {
	position: absolute;
	top: 50%;
	transform: translateY(-50%);
	background-color: rgba(0,0,0,0.3);
}

.carousel-caption h1{
	font-size: 500%;
	text-shadow: 1px 1px 10px #000;
}

.jumbotron {
	padding: 1rem;
	border-radius: 0;
	text-align: center;

}

.padding {
	padding-bottom: 2rem;
}

.padding2 {
	padding-top: 1rem;
}

.paddingBottom{
	margin-bottom: 0;
}

.welcome {
	width: 75%;
	margin: 0 auto;
	padding-top: 2rem;
}

.welcome hr {
	border-top: 2px solid #b4b4b4;
	width: 50%;
	margin-top: .2rem;
	margin-bottom: 1rem;
}
.input-group {
	width: 60%;
	margin: 0 auto;
	padding-bottom: 1rem;
}

.social a{
	font-size: 4.1em;
	padding: 2.5rem;
}


.fa-git{
	color: #0e6929;
}

 .fa-git:hover {
	color: #6a9e79;
}

</style>


<!--- Image Slider -->
<div id="slides" class="carousel slide" data-ride="carousel">
	<iframe src="https://www.google.com/maps/d/embed?mid=14LTBezCE6p0wbc2hN_CRV4tf0WUxsUTa&ehbc=2E312F" width="100%" height="800"></iframe>
</div>


<!--- Jumbotron -->
<div class="container-fluid">
	<div class="row jumbotron">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
			<p class="lead">Want to participate and help others? Want to write a post or share some tips and tricks?</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
			<a href="#">
				<button type="button" class="btn btn-outline-secondary btn-lg"><a href="<?php echo base_url() ?>index.php/user_authentication_actors/index_actors">Join our community</a></button>
			</a>
		</div>
	</div>
</div>


<!--- Welcome Section -->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Sustainable living made fun. </h1>
		</div>
		<hr>
		<div class="col-12">
			<p class="lead">This system allows users to find eco friendly restaurants, coffee shops and markets all over Slovenia. Users can also view the location of recycling bins near them, as well as participate in eco challenges. Our Eco Blog is a place where everyone can participate in the comunity by posting articles and helping others.</p>
		</div>
	</div>
</div>


<!--- Connect -->
<div class="container-fluid padding">
	<div class="row text-center padding">
		<div class="col-12">
			<h2>Connect</h2>
		</div>
		<div class="col-12 social padding">
			<a href="https://github.com/ristovskajana/plastiX"><i class="fab fa-github"></i></a>
		</div>
	</div>
</div>






