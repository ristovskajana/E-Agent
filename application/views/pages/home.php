<style type="text/css" media="screen">
	.carousel-inner img {
	width: 100%;
	height: 100%;
}

a{
	color: #a80808;
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

.fa-facebook{
	color: #3b5998;
}

.fa-instagram{
	color: #517fa4;
}
.fa-git{
	color: #8c929d;
}

.fa-facebook:hover, .sivo:hover, .fa-instagram:hover, .fa-git:hover {
	color: #d5d5d5;
}

</style>

<!--- Image Slider -->
<div id="slides" class="carousel slide" data-ride="carousel">
	<ul class="carousel-indicators">
		<li data-target="#slides" data-slide-to="0" class="active"></li>
		<li data-target="#slides" data-slide-to="1"></li>
		<li data-target="#slides" data-slide-to="2"></li>
	</ul>
	<div class="carousel-inner">
		<div class="carousel-item active">
			<img src="<?php echo base_url(); ?>/assets/img/background4.jpg">
			<div class="carousel-caption">
				<h1 class="display-2">E - Agent</h1>
				<h3>Connects actors and employers worldwide</h3>
				<button type="button" class="btn btn-outline-light btn-lg">
					<a class="login" href="<?php echo base_url() ?>index.php/user_authentication_actors/index_actors">Log - In</a></button>
				<button type="button" class="btn btn-primary-light btn-lg"><a class="login" href="<?php echo base_url() ?>index.php/user_authentication_actors/show_actors">Register</a></button>
			</div>
		</div>
		<div class="carousel-item">
			<img src="<?php echo base_url(); ?>/assets/img/background2.jpg">
		</div>
		<div class="carousel-item">
			<img src="<?php echo base_url(); ?>/assets/img/background3.jpg">
		</div>
	</div>
</div>


<!--- Jumbotron -->
<div class="container-fluid">
	<div class="row jumbotron">
		<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10">
			<p class="lead">This information system allows actors from all over the world to find potential jobs, gigs or short term projects. E-Agent puts production companies at ease, with filter searching for requirements.</p>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2">
			<a href="#">
				<button type="button" class="btn btn-outline-secondary btn-lg"><a href="<?php echo base_url() ?>index.php/user_authentication_actors/index_actors">Find a job</a></button>
			</a>
		</div>
	</div>
</div>


<!--- Welcome Section -->
<div class="container-fluid padding">
	<div class="row welcome text-center">
		<div class="col-12">
			<h1 class="display-4">Job searching made fun.</h1>
		</div>
		<hr>
		<div class="col-12">
			<p class="lead">No need to stress over jobs. Stop wasting money on agents to find unsuitable jobs for you. You can do it yourself with E-Agent. Plus you get the opportunity to search for jobs in other countries, even continents. Just add your information and portfolio pictures to get started.</p>
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
			<a href="https://www.facebook.com/jana.ristovska73"><i class="fab fa-facebook"></i></a>
			<a href="https://github.com/ristovskajana"><i class="fab fa-github"></i></a>
			<a href="https://ristovskajana.github.io/"><i class="fas fa-link"></i></i></a>
			<a href="https://www.instagram.com/ristovskajana/"><i class="fab fa-instagram"></i></a>
			<a href="https://www.linkedin.com/in/jana-ristovska-039b55b7/"><i class="fab fa-linkedin"></i></a>
		</div>
	</div>
</div>






