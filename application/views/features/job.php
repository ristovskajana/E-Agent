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
						Short Description: <?php echo $job['JDesc']; ?>
					</p>
					<p class="lead">
						Location of filming: <?php echo $job['JLocation']; ?>
					</p>
					<p class="lead">
						Deadline for application: <?php echo $job['JDeadline']; ?>
					</p>
					<p class="lead">
						Call for Info: <?php echo $job['JPhone']; ?>
					</p>
					<p class="lead">
						Send CV to: <?php echo $job['JEmail']; ?>
					</p>
					<hr>
				</div>
	</div>
	<div class="block-heading" align="center">
					<h3 class="text-info">Requirements</h3>
					<hr>
					<?php if (count($Requirements)): ?>
						<?php foreach ($Requirements as $info): ?>
							<div>
								<p class="lead">
									<?php echo $info->QType; ?> : <?php echo $info->QRequirement; ?> 
								</p>
							</div>
						<?php endforeach; ?>
						<?php else: ?>
							<div class="alert alert-primary" role="alert">
								You have no Requirements!
							</div>
						<?php endif; ?>
					</div>			
	<div class="col">
		<div class="col">
			<div class="block-heading" align="center">
				<h2 class="text-info">Add Additional Requirements</h2>
			</div>
		</div>

		<?php echo form_open_multipart('Jobs/add_requirements') ?>
		<div class="form-group"><label for="QType">Type of Requirement (ex. Height, Nationality..)</label>
			<?php
			$data3 = array(
					'type' => 'text',
					'name' => 'QType',
					'class' => 'form-control item'
			);
			echo form_input($data3); ?>
			<br/>
		</div>
		<div class="form-group"><label for="QRequirement">Insert Requirement Here:</label>
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

