  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

    

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Task Management</span>
        </a>
        <ul id="components-navs" class="nav-content collapses " data-bs-parent="#sidebar-navs">
          <li>
            <a href="<?=base_url();?>task/add_task">
              <i class="bi bi-circle"></i><span>Add Task</span>
            </a>
          </li>
          <li>
            <a href="<?=base_url();?>task/view_task">
              <i class="bi bi-circle"></i><span>View Task</span>
            </a>
          </li>
           <li>
            <a href="<?=base_url();?>task/assign_task">
              <i class="bi bi-circle"></i><span>Assign Task</span>
            </a>
          </li>
         
        </ul>
      </li><!-- End Components Nav -->

    
      <!--<li class="nav-heading">Pages</li>-->


      <li class="nav-item">
        <a class="nav-link collapsed" href="<?=base_url()?>login/logout">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Log out</span>
        </a>
      </li><!-- End Login Page Nav -->


    </ul>

  </aside><!-- End Sidebar-->