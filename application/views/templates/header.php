<html>
        <head>
        	<title><?php if (isset($title)) echo $title; ?></title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title>E - Agent</title>
			<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>/edit/css/css.css">
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
			<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
			<link rel="icon" src="<?php echo base_url(); ?>/assets/img/icon.png">
			<!-- <link rel="stylesheet" href="https://m.w3newbie.com/you-tube.css"> -->
	</head>
<body>

<!-- Navigation -->
<nav class ="navbar navbar-expand-md navbar-light bg-light sticky-top">
	<div class ="container-fluid">
		<a class="navbar-brand" href="<?php echo site_url('pages/view/home'); ?>"><img src="<?php echo base_url(); ?>/assets/img/logo3.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon" ></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('pages/view/home'); ?>">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo site_url('pages/view/about'); ?>">About</a>
				</li>
				<?php if ($logiran == true && $role == 1) {
					echo '<li class="nav-item"><a class="nav-link" href="';
					echo site_url("Profile_actors/index_actors") . '"' . '>Your Profile</a> </li>';
					echo '<li class="nav-item"><a class="nav-link" href="';
					echo site_url("All_jobs/index") . '"' . '>Jobs</a> </li>';
					echo '<li class="nav-item"><a class="nav-link" style="text-align: right" href="';
					echo site_url("user_authentication_actors/logout_actors") . '"' . '>Logout </a> </li>';
				} else if ($logiran == true && $role == 2){
					echo '<li class="nav-item"><a class="nav-link" href="';
					echo site_url("Profile_employers/index_employers") . '"' . '>Your Profile</a></li>';
					echo '<li class="nav-item"><a class="nav-link" href="';
					echo site_url("All_actors/index") . '"' . '>Actors</a></li>';
					echo '<li class="nav-item"><a class="nav-link" style="text-align: right" href="';
					echo site_url("user_authentication_employers/logout_employers") . '"' . '>Logout </a> </li>';
				}else {
					echo '<li class="nav-item"><a class="nav-link" href="';
					echo site_url('pages/view/employers') . '"' . '>Employers</a></li>';
					echo '<li class="nav-item"><a class="nav-link" href="';
					echo site_url("user_authentication_actors/index_actors") . '"' . '>Log In</a></li>';
					echo '<li class="nav-item"><a class="nav-link" href="';
					echo site_url("user_authentication_actors/show_actors") . '"' . '>Register</a></li>';
				}  
				?>

			</ul>
		</div>
	</div>
</nav>