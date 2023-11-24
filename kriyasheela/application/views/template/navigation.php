<header>

    <div class="logosec">


        <div class="logo">
            <img src="<?= ("http://localhost/kriyasheela-p2/kriyasheela/images/ca_logo.png") ?>" width="95" height="45">

        </div>
        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182541/Untitled-design-(30).png" class="icn menuicn" id="menuicn" alt="menu-icon">

        <a class="nav-link dropdown-toggle" href="#" style="font-size: 12px;margin-left: 1213px;position: absolute;margin-top: -2px;color: black;ont-weight: 600;" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">

            <?php echo ($this->session->userdata('username')); ?> </a>
        <div class="dp" style="margin-left: 1228px;">
            <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210180014/profile-removebg-preview.png" class="dpicn" alt="dp">
        </div>


    </div>

</header>


<div class="main-container">
    <div class="navcontainer">
        <nav class="nav">
            <div class="nav-upper-options">
                <?php
                if ($this->session->userdata('usertype') == 'admin') {
                ?>
                    <div class="nav-option option1">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png" class="nav-img" alt="dashboard">
                        <h3 style="font-size: large; font-weight: 600;"><a class="nav-link" style="color: #fff;" href="<?= base_url("main/dashboard") ?>">Dashboard</a></h3>
                    </div>

                    <div class="nav-option option" onclick="toggleDropdown('dropdown1')">
                        <i class='fas fa-fax' style='font-size:24px'></i>


                        <h3 style="font-size: large; font-weight: 600;">Workorder</h3>
                    </div>
                    <div id="dropdown1" class="dropdown-content">

                        <a class="dropdown-item" href="<?= base_url("workorder/workorderform") ?>">Create Workorder</a>
                        <a class="dropdown-item" href="<?= base_url("workorder/view_workorder") ?>"> View Workorder</a>
                        <a class="dropdown-item" href="<?= base_url("Bulk_Workorder_Controller/bulk_workorder") ?>">Bulk Workorders</a>

                    </div>

                    <div class="nav-option option2" onclick="toggleDropdown('dropdown2')">
                        <i class='fas fa-file-alt' style='font-size:24px'></i>

                        <h3 style="font-size: large; font-weight: 600;">Worksheet</h3>
                    </div>
                    <div id="dropdown2" class="dropdown-content">

                        <a class="dropdown-item" href="<?= base_url("worksheet") ?>">Create Worksheet</a>
                        <a class="dropdown-item" href="<?= base_url("worksheet/worksheetview") ?>">View Worksheet</a>

                    </div>

                    <div class="nav-option option5" onclick="toggleDropdown('dropdown3')">
                        <i class='fas fa-user-friends' style='font-size:24px'></i>

                        <h3 style="font-size: large; font-weight: 600;">Clients</h3>
                    </div>
                    <div id="dropdown3" class="dropdown-content">

                        <a class="dropdown-item" href="<?= base_url("client") ?>">Add New Clients</a>
                        <a class="dropdown-item" href="<?= base_url("client/clientList") ?>">View Clients</a>

                    </div>

                    <div class="nav-option option5" onclick="toggleDropdown('dropdown4')">
                        <i class='fas fa-user-circle' style='font-size:24px'></i>

                        <h3 style="font-size: large;font-weight: 600; margin-left: 10px; ">User</h3>
                    </div>
                    <div id="dropdown4" class="dropdown-content">

                        <a class="dropdown-item" href="<?= base_url("user") ?>">Add New User</a>
                        <a class="dropdown-item" href="<?= base_url("user/allusers") ?>">View User</a>

                    </div>

                    <div class="nav-option option4">
                        <i class='fas fa-bell' style='font-size:24px'></i>

                        <a class="nav-link" id="iconnotify" style="color: black;" href="<?= base_url("Notification_Controller/notification") ?>">
                            <h3 style="font-size: large; font-weight: 600;"> Notification</h3>
                        </a>

                    </div>
                    <div class="nav-option option3">
                        <i class='fas fa-layer-group' style='font-size:24px'></i>

                        <a class="nav-link" style="color: black;" href="<?= base_url("View_user_controllerreport/View_user_report") ?>">
                            <h3 style="font-size: large; font-weight: 600;">Report</h3>
                        </a>
                    </div>



                    <div class="nav-option logout">
                        <i class='fab fa-expeditedssl' style='font-size:24px'>

                        </i>


                        <h3><a class="logout" style="font-size: large;font-weight: 600;color: black;text-decoration: none;margin-left: 16px;" href="<?= base_url("main/logout") ?>">Logout </a></h3>
                    </div>

            </div>

        <?php
                } else {

                    $loggedInUserId = $this->session->userdata('userId');
        ?>
               <div class="nav-option option1">
                        <img src="https://media.geeksforgeeks.org/wp-content/uploads/20221210182148/Untitled-design-(29).png" class="nav-img" alt="dashboard">
                        <h3 style="font-size: large; font-weight: 600;"><a class="nav-link" style="color: #fff;" href="<?= base_url("main/dashboard") ?>">Dashboard</a></h3>
                    </div>

           
            <div class="nav-option option" onclick="toggleDropdown('dropdown1')">
                        <i class='fas fa-fax' style='font-size:24px'></i>


                        <h3 style="font-size: large; font-weight: 600; margin-left: 21px;">Workorder</h3>
                    </div>
                    <div id="dropdown1" class="dropdown-content">

        
                        <a class="dropdown-item" href="<?= base_url("workorder/view_workorder") ?>"> View Workorder</a>

                    </div>


            <div class="nav-option option2" onclick="toggleDropdown('dropdown2')">
                <i class='fas fa-file-alt' style='font-size:24px'></i>

                <h3 style="font-size: large; font-weight: 600;  margin-left: 21px;">Worksheet</h3>
            </div>
            <div id="dropdown2" class="dropdown-content">

                <a class="dropdown-item" href="<?= base_url("worksheet") ?>">Create Worksheet</a>
                <a class="dropdown-item" href="<?= base_url("worksheet/worksheetview") ?>">View Worksheet</a>

            </div>

            <div class="nav-option option4">
                <i class='fas fa-bell' style='font-size:24px'></i>

                <a class="nav-link" id="iconnotify" style="color: black;" href="<?= base_url("Notification_Controller/notification") ?>">
                    <h3 style="font-size: large; font-weight: 600;"> Notification</h3>
                </a>

            </div>
            <div class="nav-option option3">
                <i class='fas fa-layer-group' style='font-size:24px'></i>

                <a class="nav-link" style="color: black;" href="<?= base_url("View_user_controllerreport/View_user_report") ?>">
                    <h3 style="font-size: large; font-weight: 600;">Report</h3>
                </a>
            </div>

            <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?php echo ($this->session->userdata('username')); ?> 
                    </a>

                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              
                   
                </ul>
            </li> -->
            <div class="nav-option">
                       
            <i class='fas fa-user-circle' style='font-size:24px'></i>
                     <h3><a class="myprofile" style="font-size: large;font-weight: 600;color: black;text-decoration: none;margin-left: 16px;"  href="<?= base_url("user/MyProfile") ?>">My Profile</a></h3>
                    </div>

                    
                    <div class="nav-option">
                   
                     <i class='fab fa-expeditedssl' style='font-size:24px'>
                        </i>
                        <h3><a class="logout" style="font-size: large;font-weight: 600;color: black;text-decoration: none;margin-left: 16px;" href="<?= base_url("main/logout") ?>">Logout </a></h3>
            </div>


        <?php
                }
        ?>
        </nav>


    </div>



    <!-- functionality of side bar for mobile responsive script -->

    <script src="./index.js"></script>
    </body>

    </html>

    <script>
        let menuicn = document.querySelector(".menuicn");
        let nav = document.querySelector(".navcontainer");

        menuicn.addEventListener("click", () => {
            nav.classList.toggle("navclose");
        })
    </script>



    <!-- drop down script -->

    <script>
        function toggleDropdown(id) {
            var dropdown = document.getElementById(id);
            if (dropdown.style.display === "block") {
                dropdown.style.display = "none";
            } else {
                dropdown.style.display = "block";
            }
        }
    </script>