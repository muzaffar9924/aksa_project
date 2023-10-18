<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Assigned Task Report</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Assigned Task Report</li>
          <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">Assign task </button>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Assign Task</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
          <!-- add task -->
        <section class="section dashboard">
            <form class="row g-3 needs-validation  pt-0 justify-content-center" novalidate  action="<?=base_url('task/task_assign_to');?>" method="post">

              <input type="hidden" name="assign_by" value="<?php echo $empData['name'];?>">

             <div class="col-md-12 position-relative">
              <label for="validationTooltip022" class="form-label">Task Assign To</label>
              <select class="form-select" name="employee_name" id="validationTooltip022" required="">
                <option value="">Select</option>
                <?php 
                  $select_query = $this->db->query("SELECT `e_name` FROM `employee_details`");
                  foreach ($select_query->result_array() as $row) {
                      echo '<option value="'.$row['e_name'].'">'.$row['e_name'].'</option>';
                  }
                  ?>
              </select>
            </div>

             <div class="col-md-12 position-relative">
              <label for="validationTooltip03" class="form-label">Company Name</label>
              <select class="form-select" name="company" id="validationTooltip03" required="">
                <option value="">Select</option>
                <option value="Coding Web">Coding Web</option>
                <option value="companie1">companie1</option>
                <option value="companie2">companie2</option>
                <option value="companie3">companie3</option>
                <option value="companie4">companie4</option>
                <option value="companie5">companie5</option>
                <option value="companie6">companie6</option>
                <option value="companie7">companie7</option>
                <option value="Others">Others</option>
                
              </select>
            </div>

            <div class="col-md-6 position-relative">
              <label for="validationTooltip04" class="form-label">Task name</label>
              <input name="task" type="text" class="form-control" id="validationTooltip04" placeholder="Enter task " required>             
            </div>

             <div class="col-md-6 position-relative">
              <label for="validationTooltip05" class="form-label">Status</label>
             <!--  <select class="form-select" name="work_status" id="validationTooltip05" required="">
                <option value="Pending">Pending</option>
               
              </select> -->
               <input type="text"  name="work_status" class="form-control"  value="Pending" readonly> 

            </div>

            <div class="col-md-12 position-relative">
              <label for="validationTooltip06" class="form-label">Allocation Date</label>
              <input name="allocation_date" value="<?php date_default_timezone_set('Asia/Kolkata'); echo date("Y-m-d");?>"  type="date" class="form-control" id="validationTooltip06" placeholder="Enter task " readonly>
            </div>

            <div class="col-md-12 position-relative">
              <label for="validationTooltip07" class="form-label">Deadline For Task</label>
              <input name="deadline"  type="date" class="form-control" id="validationTooltip07" >
            </div>

            <div class="d-flex justify-content-end">
              <div class="col-md-2 position-relative">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              </div>

              <div class="col-md-2 position-relative">
                <input type="submit" name="submit" class="btn btn-primary" >
              </div>
            </div>
            </form>
         </section>



      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <div class="col-md-3">
              <!-- <button class="btn btn-primary" type="submit">Submit form</button> -->
              
            </div>
      </div>
    </div>
  </div>
</div>


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <a href="<?=base_url();?>task/assignPendingTask" id="searchButton">
                  <h5 class="card-title">Pending<span></span></h5>
                    
                  </a>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center ">
                      
                      <!-- <i class="fa-solid fa-hourglass-clock"></i> -->
                    <i class="fa-solid fa-stopwatch fa-shake text-danger"></i>
                    <!-- <i class="bi bi-stopwatch text-danger" style="font-size : 2.5rem;"></i> -->

                    </div>

                    <div class="ps-3">
                      <h6><?= $pending;?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                <a href="<?=base_url();?>task/assignInprogressTask" id="searchButton">
                  <h5 class="card-title">In-progress <span></span></h5>
                </a>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-spinner fa-spin-pulse text-warning"></i>
                     <!-- <i class="fa-sharp fa-solid fa-circle-check"></i> -->
                    </div>
                    <div class="ps-3">
                      <h6><?= $In_progress;?></h6>
                    
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

 
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                <a href="<?=base_url();?>task/assignCompletedTask" id="searchButton">
                  <h5 class="card-title">Completed<span></span></h5>
                </a>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-sharp fa-solid fa-circle-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $Completed;?></h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="card-body">
                  <h5 class="card-title pe-5">Task-Report <span></span> 

                    <!-- <button class="btn btn-danger ms-3 filter_btn" name="statusButton" data-id='Pending'>Pending</button>
                    <button class="btn btn-warning filter_btn" name="statusButton" data-id='In-progress'>In-progress</button>
                    <button class="btn btn-success filter_btn" name="statusButton" data-id='Completed'></button> -->
                  </h5>


                  <div id="dataTableDiv">
                    <table class="table table-bordered datatable" id="Datatable">
                    <thead >
                      <tr class="text-center">
                        <th class="text-center" scope="col">Sr.no.</th>
                        <th class="text-center" scope="col">Assigned To</th>  
                        <th class="text-center" scope="col">Company Name</th>  
                        <th class="text-center" scope="col">Task Name</th>
                        <th class="text-center" scope="col">Task Assigned on</th>
                        <th class="text-center" scope="col">Start Date</th>
                        <th class="text-center" scope="col">Start Time</th>
                        <th class="text-center" scope="col">End Date</th>
                        <th class="text-center" scope="col">End Time</th>
                        <th class="text-center" scope="col">Deadline</th>
                        <th class="text-center" scope="col">Status</th>
                        <th class="text-center" scope="col">Action</th>
                      </tr>
                    </thead>

                    <tbody >
                       <?php if($result){
                        $counter = 1;
                          foreach($result as $key => $value){ ?>
                      <tr class="text-center">
                       
              
                        <th scope="row"><?=$counter++?></th>
                        <td><?=$value['assign_to']?></td>
                        <td><?=$value['company_name']?></td>
                        <td><?=$value['task_name']?></td>
                        <td><?=$value['allocation_date']?></td>
                        <td><?=$value['start_date']?></td>
                        <td><?=$value['start_time']?></td>
                        <td><?=$value['end_date']?></td>
                        <td><?=$value['end_time']?></td>
                        <td><?=$value['deadline']?></td>
                        <td>
                            <?php if($value['work_status']=='Pending'){?>
                             <span class="badge bg-danger"><?=$value['work_status']?></span>
                           <?php }elseif($value['work_status']=='In-progress'){?>
                            <span class="badge bg-warning"><?=$value['work_status']?></span>
                           <?php }elseif($value['work_status']=='Completed'){?>
                               <span class="badge bg-success"><?=$value['work_status']?></span>
                           <?php }
                                ?>
                        </td>
                        <td>
                          <?php { ?>
                                <!-- <a href="<?=base_url('task/edit_form/'.$value['user_id'])?>"> -->
                              
                                <!-- <button type='button' class='btn btn-success' style="margin: 10px;"> -->
                                  <!-- <i class='fa-regular fa-pen-to-square'></i> -->
                                <!-- </button> -->
                                <!-- </a> -->
                            <?php } ?>
                            
                            <?php { ?>
                              <a href="" data-id ="<?=$value['user_id'];?>"class=' delete blog_delete fs-5 text-danger' >
                              <i class='fa-solid fa-trash'></i>
                              </a>
                                <!-- <button type='' data-id ="<?=$value['user_id'];?>"class=' delete blog_delete'><i class='fa-solid fa-trash'></i></button> -->
                            <?php } ?>


                        </td>
                          <?php }
                        }
                        ?>
                      </tr>
                     
                    </tbody>
                  </table>
                  </div>
                 
                        
                </div>

              </div>
            </div><!-- End Recent Sales -->


          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

    <script type="text/javascript">
      $(document).ready(function(){
      $("#searchButton").click(function () {
      var rows = $("#stud_body").find("tr").hide();
      rows.filter(":contains('Completed')").show();
    });
    });
    </script>

    <?php if(isset($_SESSION['status']) &&  $_SESSION['status'] !=''){?>
  <script>
      swal({
      title: "<?php echo $_SESSION['status']?>",
    //   text: "You clicked the button!",
      icon: "<?php echo $_SESSION['status_code']?>",
      button: "Ok ",
    });
  </script>
  <?php 
  unset($_SESSION['status']);
  }?> 
<script type="text/javascript">
    $(document).ready(function(){
        $(".delete").click(function(){

            var delet_id = $(this).attr('data-id');

            var elem = $(this);

            console.log(delet_id);
             
            var bool = confirm('Are you sure you want to delete the task?');
            console.log(bool);

            if(bool){
                // alert("move to delete functionalty using ajax");
                $.ajax({
                    url: '<?= base_url()."task/delete_assign_task"?>',
                    type: 'post',
                    data:  { 'user_id' : delet_id },
                    success: function(response){
                        console.log(response);
                        if (response == "deleted") {
                                alert("Task deleted Sussesfully!");
                                elem.closest('tr').remove();
                        }
                        elseif (response == "notdeleted")
                        {
                                alert("Task Not Deleted! Some error occurred!");
                        }
                    }
                })
            }
            else{
                alert("Your Task is Safe");     
            }
        });





      //filter table data

        $('.filter_btn').on('click',function(){

            var filter_id = $(this).data('id');
            
            console.log(filter_id);
            // var locationName = $(this).data("id");

            /* Load Google Leads Location Wise */
            $.ajax({
                url: "<?= base_url()."Task/filter_data"?>",
                type: "POST",
                data: {work_status: filter_id },
                success: function(data) {
                    $('#dataTableDiv').empty();
                    $('#dataTableDiv').append(data);
                    $('#Datatable').DataTable({
                        autoWidth: false,
                        columnDefs: [
                            {
                                targets: ['_all'],
                                className: 'mdc-data-table__cell',
                            },
                        ],
                    });
                }
            });

        });




    });
      
    
</script>

<?Php include 'footer.php';?>
