<?php include 'header_admin.php'; ?>




  <main id="main" class="main " style="margin-left: 0;">

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
					<h3 class="p-5 pb-4 pt-5 text-center">Update Task</h3>
					<form class="row g-3 needs-validation p-5 pt-0 justify-content-center" novalidate  action="<?=base_url('admin_task/edit_form_post');?>" method="post">

						<input type="hidden" name="user_id" value="<?= $result[0]['user_id'] ?>">

						


						<div class="col-md-10 position-relative">
					    <label for="validationTooltip02" class="form-label">Company Name</label>
					    <select class="form-select" name="emp_name" id="validationTooltip02" required="">
					      <option value="">Select</option>
					      <option  <?php if($result[0]['emp_name']=="Emp_name1"){echo "selected";}?>>Emp_name1</option>
					      <option <?php if($result[0]['emp_name']=="Emp_name2"){echo "selected";}?>>Emp_name2</option>
					      <option <?php if($result[0]['emp_name']=="Emp_name3"){echo "selected";}?>>Emp_name3</option>
					      <option <?php if($result[0]['emp_name']=="Emp_name4"){echo "selected";}?>>Emp_name4</option>
					      <option <?php if($result[0]['emp_name']=="Emp_name5"){echo "selected";}?>>Emp_name5</option>
					      <option <?php if($result[0]['emp_name']=="Emp_name6"){echo "selected";}?>>Emp_name6</option>
					    </select>
					  </div>

					   <div class="col-md-10 position-relative">
					    <label for="validationTooltip02" class="form-label">Company Name</label>
					    <select class="form-select" name="company" id="validationTooltip02" required="">
					      <option value="">Select</option>
					      <option  <?php if($result[0]['company_name']=="Coding Web"){echo "selected";}?>>Coding Web</option>
						  <option  <?php if($result[0]['company_name']=="companie1"){echo "selected";}?>>companie1</option>
					      <option  <?php if($result[0]['company_name']=="companie2"){echo "selected";}?>>companie2</option>
					      <option  <?php if($result[0]['company_name']=="companie3"){echo "selected";}?>>companie3</option>
					      <option  <?php if($result[0]['company_name']=="companie4"){echo "selected";}?>>companie4</option>
					      <option  <?php if($result[0]['company_name']=="companie5"){echo "selected";}?>>companie5</option>
					      <option  <?php if($result[0]['company_name']=="companie6"){echo "selected";}?>>companie6</option>
					      <option  <?php if($result[0]['company_name']=="companie7"){echo "selected";}?>>companie7</option>
					      <option <?php if($result[0]['company_name']=="Others"){echo "selected";}?>>Others</option>
					      
					    </select>
					  </div>

					  <div class="col-md-5 position-relative">
					    <label for="validationTooltip03" class="form-label">Task name</label>
					    <input name="task" type="text" value="<?=$result [0]['task_name']?>" class="form-control" id="validationTooltip03" placeholder="Enter task " required>             
					  </div>

					   <div class="col-md-5 position-relative">
					    <label for="validationTooltip04" class="form-label">Status</label>
					    <select class="form-select" name="work_status" id="status" required="">
					      <option value="">Select</option>
					      <option <?php if($result[0]['work_status']=="Pending"){echo "selected";}?>>Pending</option>
					      <option <?php if($result[0]['work_status']=="In-progress"){echo "selected";}?>>In-progress</option>
					      <option <?php if($result[0]['work_status']=="Completed"){echo "selected";}?>>Completed</option>
					    </select>
					  </div>

					  <div class="col-md-10 position-relative" id="date" >
					    <label for="allocation_date" class="form-label">Allocation Date</label>
					    <input name="allocation_date" value="<?php echo date("Y-m-d");?>"  type="date" class="form-control" id="allocation_date" placeholder="Enter task " >
					  </div>

					    <div class="col-md-5 position-relative " id="start_date">
					    <label for="validationTooltip05" class="form-label">Start Date</label>
					    <input name="start_date" value="<?=$result[0]['start_date']?>"  type="date" class="form-control" id="validationTooltip05" placeholder="Enter task " >
					  </div>

					  <div class="col-md-5 position-relative " id="start_time">
					    <label for="validationTooltip06" class="form-label">Start Time</label>
					    <!-- <input name="end_date" type="date" class="form-control"  placeholder="Enter task " =""> -->
               <input type="time" name="start_time" value="<?=$result[0]['start_time']?>" class="form-control" value="10:05 AM" />
					  </div>

					  <!-- // -->

					   <div class="col-md-5 position-relative " id="end_date">
					    <label for="validationTooltip07" class="form-label">End Date</label>
					    <input name="end_date"  type="date" value="<?=$result[0]['end_date']?>" class="form-control" id="validationTooltip07" placeholder="Enter task " >
					  </div>

					  <div class="col-md-5 position-relative " id="end_time">
					    <label for="validationTooltip08" class="form-label">End Time</label>
					    <!-- <input name="end_date" type="date" class="form-control"  placeholder="Enter task " =""> -->
               <input type="time" name="end_time" value="<?=$result[0]['end_time']?>" class="form-control" value="10:05 AM" />
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
					      <option value="in-progress">In-progress</option>
					      <option value="completed">Completed</option>
					    </select>
					  </div> -->
					  <div class="col-md-5"> </div>
 						
 						<div class="col-md-9"> </div>
 

					  <div class="col-md-3">
					   <button type="submit" class="btn btn-success shadow-sm mr-2 my-1 submit_article blog">Update</button>
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
	
	$(document).ready(function(){
		 	$("#start_date").hide();
      $("#start_time").hide();
      $("#end_date").hide();
      $("#end_time").hide();
      $("#date").hide();

      var status = $("#status").val();
      // console.log(status);

      if(status == 'In-progress'){
      	$("#start_date").show();
	      $("#start_time").show();
	      $("#date").show();
	      $("#end_date").hide();
  			$("#end_time").hide();
      }
      else if(status == 'Completed')
      {
      	$("#start_date").show();
        $("#start_time").show();
        $("#end_date").show();
        $("#end_time").show();
        $("#date").show();
      }
      else if(status == 'Pending')
      {
      	$("#date").show();
      }

    $('#status').on('change', function() {

    	var status = $("#status").val();
    	console.log(status);

      if (status == 'Pending'){
      	$("#date").show();
      	$("#start_date").hide();
	      $("#start_time").hide();
	      $("#end_date").hide();
  			$("#end_time").hide();
      }

      else{
		      if (status == 'In-progress')   
		      {
		      	$("#start_date").show();
			      $("#start_time").show();
			      $("#date").show();
			      $("#end_date").hide();
      			$("#end_time").hide();
		      }
		      else{

		      	if (status == 'Completed')   
		     		{
		     		  $("#start_date").show();
			        $("#start_time").show();
			        $("#end_date").show();
			        $("#end_time").show();
			        $("#date").show();
		      	}
			      
		    
			   }
			}

    });
});
</script>


<?php include 'footer.php'; ?>