<?php
// echo "<pre>";
// 	print_r($empData);
// 	echo "</pre>";
// 	die();	
?>

<?php
$this->load->view('admin/header_admin');
$this->load->view('admin/sidebar');

?>
<?php //include 'sidebar.php'; 
?>

<main id="main" class="main">

	<div class="pagetitle">
		<h1>Add Your Task</h1>
		<nav>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="">Home</a></li>
				<li class="breadcrumb-item active">Add Task</li>
			</ol>
		</nav>
	</div><!-- End Page Title -->

	<section class="section dashboard">
		<div class="row justify-content-center">

			<!-- Left side columns -->
			<div class="col-lg-9">
				<div class="row ">
					<!-- Recent Sales -->
					<!-- <div class="col-18"> -->
					<div class="card recent-sales overflow-auto">
						<h3 class="p-5 pb-4 pt-5 text-center">Add Task</h3>
						<form class="row g-3 needs-validation p-5 pt-0 justify-content-center" novalidate action="<?= base_url('Admin_opration/add_task'); ?>" method="post">
							<!-- 
							<div class="col-md-10 position-relative " hidden>
								<label for="validationTooltip01" class="form-label">Name</label>
								<input name="name" type="text" class="form-control" value="<?php echo $empData['name']; ?>" id="validationTooltip01" placeholder="Enter task " required /> 
							</div> -->

							<div class="col-md-3 position-relative">
								<label for="validationTooltip02" class="form-label">Company Name</label>
								<select class="form-select" name="company" id="validationTooltip02" required="">
									<option value="">Select</option>
									<option value="AXA">AXA</option>
									<option value="JazzCash">JazzCash</option>
									<option value="Telenot">Telenot</option>
									<option value="ZTBL">ZTBL</option>
									<option value="Others">Others</option>
								</select>
							</div>

							<div class="col-md-3 position-relative">
								<label for="validationTooltip09" class="form-label">Project Name</label>
								<input name="project" type="text" class="form-control" id="validationTooltip09" placeholder="Enter Project " required>
							</div>

							<div class="col-md-3 position-relative">
								<label for="validationTooltip03" class="form-label">Task name</label>
								<input name="task" type="text" class="form-control" id="validationTooltip03" placeholder="Enter task " required>
							</div>

							<div class="col-md-3 position-relative">
								<label for="validationTooltip04" class="form-label">Status</label>
								<select class="form-select" name="work_status" id="status" required="">
									<option value="">Select</option>
									<option value="Pending">Pending</option>
									<option value="In-progress">In-progress</option>
									<option value="Completed">Completed</option>
								</select>
							</div>

							<div class="col-md-12 position-relative">
								<label for="validationTooltip10" class="form-label">Task Description</label>
								<textarea name="task_desc" type="text" class="form-control" id="validationTooltip10" placeholder="Enter task " required></textarea>
							</div>

							<div class="col-md-12 position-relative" id="date">
								<label for="allocation_date" class="form-label">Task Created On</label>
								<input name="allocation_date" type="date" value="<?php date_default_timezone_set('Asia/Karachi');
																					echo date('Y-m-d'); ?>" class="form-control" id="allocation_date" placeholder="Enter task " readonly>
							</div>

							<div class="col-md-6 position-relative " id="start_date">
								<label for="validationTooltip05" class="form-label">Start Date</label>
								<input name="start_date" id="start_date1" value="<?php date_default_timezone_set('Asia/Karachi');
																					echo date('Y-m-d'); ?>" type="date" class="form-control" id="validationTooltip05" placeholder="Enter task " readonly>
							</div>

							<div class="col-md-6 position-relative " id="start_time">
								<label for="validationTooltip06" class="form-label">Start Time</label>
								<!-- <input name="end_date" type="date" class="form-control"  placeholder="Enter task " =""> -->
								<input type="time" name="start_time" id="start_time1" value="<?php date_default_timezone_set('Asia/Karachi'); ?>" class="form-control" required />
							</div>

							<!-- // -->

							<div class="col-md-6 position-relative " id="end_date">
								<label for="validationTooltip07" class="form-label">End Date</label>
								<input name="end_date" id="end_date1" type="date" value="<?php date_default_timezone_set('Asia/Karachi');
																							echo date('Y-m-d'); ?>" class="form-control" id="validationTooltip07" placeholder="Enter task " readonly>
							</div>

							<div class="col-md-6 position-relative " id="end_time">
								<label for="validationTooltip08" class="form-label">End Time</label>
								<!-- <input name="end_date" type="date" class="form-control"  placeholder="Enter task " =""> -->
								<input type="time" name="end_time" id="end_time1" class="form-control" required />
							</div>

							<!--  <div class="col-md-5 position-relative">
              <label for="validationTooltip05" class="form-label">End Time</label>
               <input type="time" name="end_time" class="form-control" value="10:05 AM" />
            </div>
 -->
							<!-- <div class="col-md-5 position-relative">
					    <label for="validationTooltip06" class="form-label">Status</label>
					    <select class="form-select" name="work" id="validationTooltip06" ="">
					      <option value="pending">Pending</option>
					      <option value="In-progress">In-progress</option>
					      <option value="completed">Completed</option>
					    </select>
					  </div> -->
							<div class="col-md-6"> </div>

							<div class="col-md-9"> </div>


							<div class="col-md-3">
								<!-- <button class="btn btn-primary" type="submit">Submit form</button> -->
								<input type="submit" name="submit" class="btn btn-primary">
							</div>
						</form>

					</div>
					<!-- </div> -->
					<!-- End Recent Sales -->


				</div>
			</div><!-- End Left side columns -->


		</div>
	</section>

</main><!-- End #main -->


<script>
	$(document).ready(function() {
		$("#start_date").hide();
		$("#start_time").hide();
		$("#end_date").hide();
		$("#end_time").hide();
		$("#date").hide();

		$('#status').on('change', function() {
			if (this.value == 'Pending') {
				$("#date").show();
				$("#start_date").hide();
				$("#start_time").hide();
				$("#end_date").hide();
				$("#end_time").hide();
				$("#date").prop("disabled", false);
				$("#start_date1").prop("disabled", true);
				$("#start_time").prop("disabled", true);
				$("#start_time1").prop("disabled", true);
				$("#end_date1").prop("disabled", true);
				$("#end_time1").prop("disabled", true);
			} else {
				if (this.value == 'In-progress') {
					$("#start_date").show();
					$("#start_time").show();
					$("#date").show();
					$("#end_date").hide();
					$("#end_time").hide();
					$("#date").prop("disabled", false);
					$("#start_date1").prop("disabled", false);
					$("#start_time1").prop("disabled", false);
					$("#end_date1").prop("disabled", true);
					$("#end_time1").prop("disabled", true);
				} else {

					if (this.value == 'Completed') {
						$("#start_date").show();
						$("#start_time").show();
						$("#end_date").show();
						$("#end_time").show();
						$("#date").show();
						$("#start_date1").prop("disabled", false);
						$("#start_time1").prop("disabled", false);
						$("#end_date1").prop("disabled", false);
						$("#end_time1").prop("disabled", false);
					} else {
						$("#start_date").hide();
						$("#start_time").hide();
						$("#end_date").hide();
						$("#end_time").hide();
						$("#date").hide();
						$("#start_date").prop("disabled", true);
						$("#start_time").prop("disabled", true);
						$("#end_date").prop("disabled", true);
						$("#end_time").prop("disabled", true);
						$("#date").prop("disabled", true);
					}

				}
			}

		});
	});
</script> 