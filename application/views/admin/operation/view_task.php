<?php include 'header.php'; ?>

<?php include 'sidebar.php'; ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Task Report</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="">Home</a></li>
          <li class="breadcrumb-item active">Task Report</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <a href="<?=base_url()?>task/pendingTask" id="searchButton">
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
            <div class="col-xxl-4 col-xl-6">

              <div class="card info-card customers-card">

                <div class="card-body">
                    <a href="<?=base_url()?>task/inprogressTask" id="searchButton">
                        <h5 class="card-title">In-progress <span></span></h5>
                    </a>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="fa-solid fa-spinner fa-spin-pulse text-warning"></i>

      
                     <!-- <i class="fa-sharp fa-solid fa-circle-check"></i> -->
                    </div>
                    <div class="ps-3">
                      <h6><?= $onprogress;?></h6>
                    
                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

 
            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="card-body">
                    <a href="<?=base_url()?>task/completedTask" id="searchButton">
                        <h5 class="card-title">Completed <span></span></h5>
                    </a>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fa-sharp fa-solid fa-circle-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?= $completed;?></h6>
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
                    <button class="btn btn-success filter_btn" name="statusButton" data-id='Complete'>Completed</button> -->
                  </h5>


                  <div id="dataTableDiv">
                    <table class="table table-bordered datatable" id="Datatable">
                    <thead >
                      <tr class="text-center">
                        <th class="text-center" scope="col">Sr.no.</th>
                        <th class="text-center" scope="col">Assigned By</th>  
                        <th class="text-center" scope="col">Company Name</th>  
                        <th class="text-center" scope="col">Task Name</th>
                        <th class="text-center" scope="col">Task Created on</th>
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
                              <td><?=$value['assign_by']?></td>
                              <td><?=$value['company_name']?></td>
                              <td><?=$value['task_name']?></td>
                              <td><?=$value['allocation_date']?></td>
                              <td><?=$value['start_date']?></td>
                              <td><?=$value['start_time']?></td>
                              <td><?=$value['end_date']?></td>
                              <td><?=$value['end_time']?></td>
                              <td><?=$value['deadline']?></td>
                              <td id="status">
                                  <?php if($value['work_status']=='Pending'){?>
                                  <span class="badge bg-danger"><?=$value['work_status']?></span>
                                <?php }elseif($value['work_status']=='In-progress'){?>
                                  <span class="badge bg-warning"><?=$value['work_status']?></span>
                                <?php }
                                  elseif($value['work_status']=='Completed'){                  
                                  ?>
                                  <span class="badge bg-success"><?=$value['work_status']?></span>
                                  <?php 
                                    }
                                  ?>
                              </td>
                              <td id="edit_button">
                                <?php 
                                  if($value['work_status'] == 'Pending')
                                  { ?>
                                      <a href="<?=base_url('task/edit_form/'.$value['user_id'])?>" class="fs-5">                                  
                                        <i class="bi bi-exclamation-circle text-danger"></i>
                                      </a>
                                  <?php }
                                  if($value['work_status'] == 'In-progress'){ ?>
                                      <a href="<?=base_url('task/edit_form/'.$value['user_id'])?>" class="fs-5">                                  
                                        <i class="bi bi-clock-history text-warning"></i>
                                      </a>
                                  <?php } if($value['work_status'] == 'Completed'){ ?>
                                    <a class="fs-5">                                  
                                      <i class="bi bi-clipboard-check text-success"></i>
                                    </a>
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


      <!-- on completed remove edit button -->
    <script type="text/javascript">
      $(document).ready(function(){
         $('#status').on('change', function() {
      if (this.value == 'Completed'){
         $("#edit_button").hide();
      }
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
                    url: '<?= base_url()."task/delete_blog"?>',
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
      
      <?php 
        // if(isset($_SESSION['update'])){
        //     if($_SESSION['update']=='yes'){
        //         echo 'alert("Data has been updated")';
        //     }
        //     else if ($_SESSION['update']=='no'){
        //         echo "alert('some error occurred | data hass been not updated')";
        //     }
        // }
        
      ?> 
</script>

<?Php include 'footer.php';?>
