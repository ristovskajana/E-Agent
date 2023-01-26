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
	.alert-primary{
		background-color: #9c3333;
		color: white;
	}

	a{
		color: #a80808;
	}

</style>

<div class="row justify-content-center">
	<div class="col-12 col-md-10 col-lg-8">
		<div class="card card-sm">
			<div class="card-body row no-gutters align-items-center">
				<div class="col-auto">
					<i class="fa fa-search h4 text-body"></i>
				</div>
				<!--end of col-->
				<div class="col">
					<input class="form-control form-control-lg form-control-borderless" id="textarea" type="search"
					placeholder="Search Jobs by titles, locations or keywords">
				</div>
				<!--end of col-->
				<div class="col-auto">
					<button class="btn btn-lg btn-success" id="searchbutton" type="submit" style="background-color: #a80808;">Search</button>
				</div>
				<!--end of col-->
			</div>
		</div>
	</div>
	<!--end of col-->
</div>
<div class="row">
	<div class="col">
		<div class="col">
			<?php if (count($Jobposts)) : ?>
				<?php foreach ($Jobposts as $job) : ?>
					<div>
						<div>
							<h2 style="color: #a80808;"><?php echo $job->JTitle; ?></h2>
							<hr>
							<p class="lead">
								Short Description: <?php echo $job->JDesc; ?>
							</p>
							<p class="lead">
								Location of filming: <?php echo $job->JLocation; ?>
							</p>
							<p class="lead">
								Deadline for application: <?php echo $job->JDeadline; ?>
							</p>
							<p class="lead">
								Call for Info: <?php echo $job->JPhone; ?>
							</p>
							<p class="lead">
								Send CV to: <?php echo $job->JEmail; ?>
							</p>
							<hr>
							<div id="myDIV">
								<h4 style="color: #a80808;">Requirements</h4>
								<?php if (count($Requirements)): ?>
									<?php foreach ($Requirements as $info): ?>
										<?php if ($job->JID == $info->JID) {
										echo $info->QType; ?> : <?php echo $info->QRequirement;		echo ";    ";										
									}
									endforeach; ?>
									<?php else: ?>
										<div class="alert alert-primary" role="alert">
											No Requirements!
										</div>
									<?php endif; ?>
								</div>		
							</div>
							<hr>
						</div>
					<?php endforeach; ?>
					<?php else : ?>
						<div class="alert alert-primary" role="alert">
							No such Job Post found!
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	function myFunction() {
		var x = document.getElementById("myDIV");
		if (x.style.display === "none") {
			x.style.display = "block";
		} else {
			x.style.display = "none";
		}
	}
</script>

