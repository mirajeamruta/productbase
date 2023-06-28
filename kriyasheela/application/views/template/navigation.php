<div class="container-fluid navcontainer">
    <nav class="navbar navbar-expand-lg navbar-fixed-top mb-0 px-0">
        <div class="container-fluid">
            <div class="logo">
                <a id="top" href="#"> <img src="<?= ("http://localhost/kriyasheela-p2/kriyasheela/images/ca_logo.png") ?>" width="91"  height="30"></a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

             <!-- (B) THE HAMBURGER code start -->

            <div id="hamnav">

  <label for="hamburger">&#9776;</label>
  <!-- <input type="checkbox" id="hamburger"/> -->

</div>

             <!-- (B) THE HAMBURGER code end-->



            <div class="collapse navbar-collapse" id="navbarText">
                <?php
                if ($this->session->userdata('usertype') == 'admin') {
                ?>
                <ul class="navbar-nav navbar-right ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url("main/dashboard") ?>">DASHBOARD</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            WORKORDER
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= base_url("workorder/workorderform") ?>">CREATE
                                    WORKORDER</a></li>
                            <li><a class="dropdown-item" href="<?= base_url("workorder/view_workorder") ?>">VIEW
                                    WORKORDER</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Worksheet
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= base_url("worksheet") ?>">Add New Entry</a></li>
                            <li><a class="dropdown-item" href="<?= base_url("worksheet/worksheetview") ?>">view
                                    Worksheet</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            CLIENTS
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= base_url("client") ?>">Add New CLIENTS</a></li>
                            <li><a class="dropdown-item" href="<?= base_url("client/clientList") ?>">view CLIENTS</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url("Bulk_Workorder_Controller/bulk_workorder") ?>">Bulk Workorders</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            User
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= base_url("user") ?>">Add New USERS</a></li>
                            <li><a class="dropdown-item" href="<?= base_url("user/allusers") ?>">view USERS</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" id="iconnotify"  href="<?= base_url("Notification_Controller/notification") ?>">
                            Notification
                            <!-- <span>Inbox</span> -->
                   
                        </a>
                        <!-- <a href="#" class="" id="iconnotify">
                         <span></span>
                      <span class="badge1">3</span>
                          </a> -->
                        <!-- <span href="#" class="badge1">3</span> -->
                        <!-- <a class="nav-link" href="<?= base_url("Notification") ?>">Notification -->
                            <!-- <?php echo  $this->session->userdata('countnotify'); ?> -->
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url("Report_Controller/index") ?>">Reports</a>
                    </li>
                    <li class="nav-item dropdown last">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo ($this->session->userdata('username')); ?> </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <!-- <li><a class="dropdown-item" href="<?= base_url("") ?>">My Profile</a></li> -->
                            <li><a class="dropdown-item" href="<?= base_url("main/logout") ?>">Logout
                                </a></li>
                        </ul>
                    </li>
                   

                </ul>
                <?php
                } else {
                ?>
                <ul class="navbar-nav navbar-right ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url("main/dashboard") ?>">DASHBOARD</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            WORKORDER
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <!-- <li><a class="dropdown-item" href="<?= base_url("workorder/workorderform") ?>">CREATE
										WORKORDER</a></li> -->
                            <li><a class="dropdown-item" href="<?= base_url("workorder/view_workorder") ?>">VIEW
                                    WORKORDER</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Worksheet
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= base_url("worksheet") ?>">Add New Entry</a></li>
                            <li><a class="dropdown-item" href="<?= base_url("worksheet/worksheetview") ?>">view
                                    Worksheet</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link "  href="<?= base_url("Notification_Controller/notification") ?>">
                            Notification
                            <!-- <span>Inbox</span> -->
                        <!-- </a><a href="#" class="" id="iconnotify">
                         <span></span>
                      <span class="badge1 badge2">3</span>
                          </a> -->
                      
                        <!-- <?php echo  $this->session->userdata('countnotify'); ?> -->
                        <!-- <a class="nav-link" href="<?= base_url("Notification") ?>">Notification</a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="margin-top: -15px;" href="<?= base_url("Report_Controller/index") ?>">Reports</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo ($this->session->userdata('username')); ?> </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="<?= base_url("user/MyProfile") ?>">My Profile</a></li>
                            <li><a class="dropdown-item" href="<?= base_url("main/logout") ?>">Logout
                                </a></li>
                        </ul>
                    </li>

                 
                </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
</div>
