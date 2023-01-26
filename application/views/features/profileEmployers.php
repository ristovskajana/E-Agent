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

<div class="row">
	<div class="col">
		<div class="col">
			<div class="block-heading" align="center">
				<?php 
				$user = $this->session->userdata['logged_in']['EEmail'];
				$EID = $this->login_database_employers->getEmployersIDfromemail($user)[0]->EID;
				$fullName = $this->login_database_employers->getEmployersBasicInfo($EID);
				?>
				<h2 class="text-info" style="color: #a80808;">Your Information</h2>
				<p class="lead"> <?php echo $fullName[0]->EName ?> </p>
				<hr>
				<h2 class="text-info" style="color: #a80808;">Your Job Posts</h2>
				<?php 
				$user = $this->session->userdata['logged_in']['EEmail'];
				$EID = $this->login_database_employers->getEmployersIDfromemail($user)[0]->EID;
				$jobPosts = $this->login_database_employers->get_AllJobs($EID);
				?>
				<?php if (count($Jobs)): ?>
					<?php foreach ($Jobs as $job): ?>
						<div>
							<p class="lead">
								<a href="<?php echo site_url('Jobs/show_job/'. $job->JID); ?>"> <?php echo $job->JTitle; ?> </a>
							</p>
						</div>
					<?php endforeach; ?>
					<?php else: ?>
						<div class="alert alert-primary" role="alert">
							You have no Job Posts!
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="col">
			<div class="col">
				<div class="block-heading" align="center">
					<h2 class="text-info"  style="color: #a80808;">Create a Job Post</h2>
				</div>
			</div>

			<?php echo form_open_multipart('Profile_employers/upload_job') ?>
			<div class="form-group"><label for="JTitle">Title of Job:</label>
				<br/>
				<?php
				$data1 = array(
					'type' => 'text',
					'name' => 'JTitle',
					'class' => 'form-control item'
				);
				echo form_input($data1); ?>
				<br/>
			</div>
			<div class="form-group"><label for="JDesc">Short Description:</label>
				<br/>
				<?php
				$data2 = array(
					'type' => 'text',
					'name' => 'JDesc',
					'class' => 'form-control item'
				);
				echo form_input($data2); ?>
				<br/>
			</div>
			<div class="form-group"><label for="JLocation">Location of Job:</label>
				<br/>
				<?php
				$data3 = array(
					'type' => 'text',
					'name' => 'JLocation',
					'class' => 'form-control item'
				);
				echo form_input($data3); ?>
				<br/>
			</div>
			<div class="form-group"><label for="JDeadline">Deadline for application (year/month/day):</label>
				<br/>
				<?php
				$data4 = array(
					'type' => 'date(yy/mm/dd)',
					'name' => 'JDeadline',
					'class' => 'form-control item'
				);
				echo form_input($data4); ?>
				<br/>
			</div>
			<div class="form-group"><label for="JPhone">Phone for contact:</label>
				<br/>
				<?php
				$data5 = array(
					'type' => 'text',
					'name' => 'JPhone',
					'class' => 'form-control item'
				);
				echo form_input($data5); ?>
				<br/>
			</div>
			<div class="form-group"><label for="JEmail">Email for applications:</label>
				<br/>
				<?php
				$data6 = array(
					'type' => 'text',
					'name' => 'JEmail',
					'class' => 'form-control item'
				);
				echo form_input($data6); ?>
				<br/>
			</div>
			<?php
			$data7 = array(
				'type' => 'submit',
				'name' => 'submit',
				'class' => 'btn btn-primary btn-block',
				'value' => 'Upload',
			);
			echo form_submit($data7);
			echo form_close();
			?>
		</div>
	</div>
</div>

</body>
