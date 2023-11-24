<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">
</head>



<body>
    <!-- for header part -->
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
<body>
        <div class="main">

            <div class="box-container">

                <div class="box box1">
                    <div class="text">
                        <h2 class="topic-heading">  <?php echo $countworkorder; ?></h2>

                        <h2 class="topic">total Workorders</h2>
                    </div>
                    <i class='bx bx-grid-alt' style="font-size: 39px;  color: white;">
                    </i>

                </div>

                <div class="box box2">
                    <div class="text">
                        <h2 class="topic-heading"><?php echo $pendingWorkorders; ?></h2>

                        <h2 class="topic">Pending Workorders</h2>
                    </div>

                    <i class='bx bx-box' style="font-size: 39px;  color: white;"></i>
                </div>

                <div class="box box3">
                    <div class="text">
                        <h2 class="topic-heading"><?php echo $countclents; ?></h2>


                        <h2 class="topic">Number of Clients</h2>
                    </div>

                    <i class=' bx bx-user-pin' style="font-size: 39px; color: white;"></i>
                </div>

                <div class="box box4">
                    <div class="text">
                        <h2 class="topic-heading"><?php echo $countusers; ?></h2>


                        <h2 class="topic">Number of Users</h2>

                    </div>

                    <i class='bx bx-user' style="font-size: 39px; color: white;"></i>
                </div>
            </div>

            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles">Dashboard</h1>
                    <button class="view" id="viewAllBtn" onclick="toggleView()">View All</button>
                </div>

                <div class="report-body">
                    <div class="report-topic-heading">

                        <h3 class="t-op">Notifications</h3>

                        <h3 class="t-op" id="pen" style="margin-left: 211px;">Pending Workorders</h3>
                        <h3 class="t-op">Closed Workorders</h3>
                    </div>




                    <div class="items">
                        <div class="item1">
                            <td>
                                <!-- <h3 class="t-op-nextlvl">Notifications</h3> -->

                                <ul class="test  alladmin___notificationsdata   alluser__notificationdata" id="dashboardData">
                            <!-- Closed wokrder array -->
                            <script>
                                let removedItem = [];
                            </script>

                            <?php
                            $notfications = array_slice($this->Notification_Model->getNotifications(), 0, 10);
                            //$notfications = $this->Notification_Model->getNotifications();
                            $loggedInUserId = $this->session->userdata('userId');
                            foreach ($notfications as $notfication) {
                                if ($this->session->userdata('usertype') == 'admin') {
                            ?>

                                    <tr>

                                        <?php

if ($notfication['workorder_no'] && !$this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])) {
                                    $this->db->where('workorder_no', $notfication['workorder_no']);
                                    $this->db->delete('notification');
                                } else {

 if ($notfication["type"] == "Updated Workorder") {
                                            $assign_to = $this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])[0]['assign_to'];
                                            $array['number1'] = str_replace('"', '', $assign_to);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);

                                            if (in_array($loggedInUserId, $array['number4'])) {
                                        ?>
                                                <td>
                                                    <h6> Workorder number <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                                                        </a> has been revised <br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                            <?php }
                                        } if ($notfication["type"] == "Workorder - Deadline") {
                                            $assign_to = $this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])[0]['assign_to'];
                                            $array['number1'] = str_replace('"', '', $assign_to); 
                                           $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (in_array($loggedInUserId, $array['number4'])) {
                                                $date = date("Y-m-d");
                                             if (strcmp($notfication['deadline'], date("Y-m-d", strtotime($date . " +2 days"))) == 0) { ?>
                                <td>
                                    <h6> Your working on the workorder number <a
                                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                        </a> which will be completed by another two days <br>
                                    </h6>
                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                                        value="<?= $notfication["date"] ?>" />
                                </td>
                                <?php } else if ($notfication['targetted_end_date'] == date('Y-m-d')) {
                                            ?>
                                <td>
                                    <h6> Your working on the workorder number <a
                                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                        </a> which will be completed within few days <br></h6>
                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                                        value="<?= $notfication["date"] ?>" />
                                </td>
                                <?php
                                     } else if ($notfication['deadline'] == date('Y-m-d')) {
                                                ?>
                                <td>
                                    <h6> Your working on the workorder number <a
                                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                        </a> which will be completed by today <br></h6>
                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                                        value="<?= $notfication["date"] ?>" />
                                </td>
                                <?php
                                                } 
                                            }
                                        } else if ($notfication["type"] == "New Workorder") {
                                            $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (in_array($loggedInUserId, $array['number4'])) {
                                            ?>
                                                <td>
                                                    <h6> New workorder <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                        </a> assigned to you <br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                            <?php }
                                        } else if ($notfication["type"] == "Bulk Workorder") {
                                            $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (in_array($loggedInUserId, $array['number4'])) {
                                            ?>
                                                <td>
                                                    <h6> New workorder <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                        </a> assigned to you <br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                            <?php }
                                        } else if ($notfication["type"] == "New Client") { ?>
                                            <td>
                                                <h6>New client <a href="<?= base_url("client/clientList") ?>"><?php echo $notfication['name']; ?>
                                                    </a> has been created <br></h6>
                                                <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                            </td>

                                        <?php } else if ($notfication["type"] == "Clients Added Through CSV") { ?>
                                            <td>
                                                <h6>New client <a href="<?= base_url("client/clientList") ?>"><?php echo $notfication['name']; ?>
                                                    </a> has been created <br></h6>
                                                <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                            </td>

                                        <?php } else if ($notfication["type"] == "Updated Client") { ?>
                                            <td>
                                                <h6> Client <a href="<?= base_url("Client/editClientData/" . $notfication["client_id"]) ?>"><?php echo $notfication['name']; ?>
                                                    </a> has been updated <br></h6>
                                                <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                            </td>
                                        <?php } else if ($notfication["type"] == "New User") { ?>
                                            <td>
                                                <h6> New user <a href="<?= base_url("user/allusers") ?>"><?php echo $notfication['user_name']; ?>
                                                    </a> has been created <br></h6>
                                                <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                            </td>
                                        <?php } else if ($notfication["type"] == "Updated User") { ?>
                                            <td>
                                                <h6> User <a href="<?= base_url("User/editUserData/" . $notfication["user_id"]) ?>"><?php echo $notfication['user_name']; ?>
                                                    </a> has been updated <br></h6>
                                                <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                            </td>
                                        <?php } if ($notfication["type"] == "Requesting to Close Workorder") { ?>

                                            <td>

                                                <h6> User <a href="<?= base_url("user/allusers") ?>"><?php echo $notfication['user_name']; ?>
                                                    </a> with employee id <?php echo $notfication['balunand_id_no']; ?> has been
                                                    requesting to close the workorder <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>

                                                    </a> <br></h6>

                                                <input id="<?= $notfication["Notification_id"] ?>" type="hidden" value="<?= $notfication["user_id"] ?>" />
                                            </td>
                                            <script>
                                                removedItem.push(<?php echo json_encode($notfication['workorder_no']) ?>)
                                                // Storing close workorder number in local Storage
                                                localStorage.setItem('closeWorkorderNumbers', removedItem)
                                            </script>

                                            <?php  } else if ($notfication["type"] == "Workorder - Assigned to new user") {
                                            $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (in_array($loggedInUserId, $array['number4'])) {
                                                ?>
                                                <td>
                                                    <h6> New workorder <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                        </a> assigned to you <br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                            <?php }
                                        } else if ($notfication["type"] == "Workorder - Removal of user") {
                                            $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (!(in_array($loggedInUserId, $array['number4']))) {
                                            ?>
                                                <td>
                                                    <h6> You have been removed from workorder number
                                                        <?php echo $notfication["workorder_no"] ?><br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                            <?php }
                                        } else if ($notfication["type"] == "Closed Workorder") {
                                            $assign_to = $this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])[0]['assign_to'];
                                            $array['number1'] = str_replace('"', '', $assign_to);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);

                                            if (in_array($loggedInUserId, $array['number4'])) {
                                            ?>
                                                <td>
                                                    <h6> workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                                                        </a> has been closed<br>
                                                    </h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                            <?php }
                                        } else if ($notfication["type"] == "Open Workorder") {
                                            $assign_to = $this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])[0]['assign_to'];
                                            $array['number1'] = str_replace('"', '', $assign_to);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);

                                            if (in_array($loggedInUserId, $array['number4'])) {
                                            ?>
                                                <td>
                                                    <h6> workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                                                        </a> has been opened <br>
                                                    </h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                        <?php }
                                        }
                                        ?>
                                    </tr>
                                <?php
                                } 
}
else {
                                    // For USER 
                                ?>
                                    <tr>
                                        <?php

if ($notfication['workorder_no'] && !$this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])) {
                                    $this->db->where('workorder_no', $notfication['workorder_no']);
                                    $this->db->delete('notification');
                                } else {

 if ($notfication["type"] == "Updated Workorder") {
                                            $assign_to = $this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])[0]['assign_to'];
                                            $array['number1'] = str_replace('"', '', $assign_to);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);

                                            if (in_array($loggedInUserId, $array['number4'])) {
                                        ?>
                                                <td>
                                                    <h6> Workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                                                        </a> has been revised <br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                            <?php }
                                        } if ($notfication["type"] == "Workorder - Deadline") {
                                            $assign_to = $this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])[0]['assign_to'];
                                            $array['number1'] = str_replace('"', '', $assign_to); 
                                           $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (in_array($loggedInUserId, $array['number4'])) {
                                                $date = date("Y-m-d");
                                             if (strcmp($notfication['deadline'], date("Y-m-d", strtotime($date . " +2 days"))) == 0) { ?>
                                <td>
                                    <h6> Your working on the workorder number <a
                                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                        </a> which will be completed by another two days <br>
                                    </h6>
                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                                        value="<?= $notfication["date"] ?>" />
                                </td>
                                <?php } else if ($notfication['targetted_end_date'] == date('Y-m-d')) {
                                            ?>
                                <td>
                                    <h6> Your working on the workorder number <a
                                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                        </a> which will be completed within few days <br></h6>
                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                                        value="<?= $notfication["date"] ?>" />
                                </td>
                                <?php
                                     } else if ($notfication['deadline'] == date('Y-m-d')) {
                                                ?>
                                <td>
                                    <h6> Your working on the workorder number <a
                                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                        </a> which will be completed by today <br></h6>
                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                                        value="<?= $notfication["date"] ?>" />
                                </td>
                                <?php
                                                } 
                                            }
                                        } else if ($notfication["type"] == "New Workorder") {
                                            $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (in_array($loggedInUserId, $array['number4'])) {
                                            ?>
                                                <td>
                                                    <h6> New workorder <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                        </a> assigned to you <br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                            <?php }
                                        } else if ($notfication["type"] == "Bulk Workorder") {
                                            $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (in_array($loggedInUserId, $array['number4'])) {
                                            ?>
                                                <td>
                                                    <h6> New workorder <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                        </a> assigned to you <br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                                <?php }
                                        } else if ($notfication["type"] == "Requesting to Close Workorder") {
                                            if ($loggedInUserId == $notfication['user_id']) {

                                                ?>
                                                <td>
                                                    <h6> You have requested to close the workorder <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                                                        </a> <br></h6>

                                                    <input id="<?= $notfication["Notification_id"] ?>" type="hidden" value="<?= $notfication["user_id"] ?>" />
                                                </td>
                                                <script>
                                                    removedItem.push(<?php echo json_encode($notfication['workorder_no']) ?>)
                                                </script>
                                            <?php }
                                        } else if ($notfication["type"] == "Workorder - Assigned to new user") {
                                            $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (in_array($loggedInUserId, $array['number4'])) {
                                            ?>
                                                <td>
                                                    <h6> New workorder <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                        </a> assigned to you <br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                            <?php }
                                        } else if ($notfication["type"] == "Workorder - Removal of user") {
                                            $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (!(in_array($loggedInUserId, $array['number4']))) {
                                            ?>

                                                <td>
                                                    <h6> You have been removed from workorder number
                                                        <?php echo $notfication["workorder_no"] ?><br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>

                                            <?php }
                                        } else if ($notfication["type"] == "Closed Workorder") {
                                            $assign_to = $this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])[0]['assign_to'];
                                            $array['number1'] = str_replace('"', '', $assign_to);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);

                                            if (in_array($loggedInUserId, $array['number4'])) {
                                            ?>
                                                <td>
                                                    <h6> workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                                                        </a> has been closed <br>
                                                    </h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                            <?php }
                                        } else if ($notfication["type"] == "Open Workorder") {
                                            $assign_to = $this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])[0]['assign_to'];
                                            $array['number1'] = str_replace('"', '', $assign_to);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);

                                            if (in_array($loggedInUserId, $array['number4'])) {
                                            ?>
                                                <td>
                                                    <h6> workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                                                        </a> has been opened <br>
                                                    </h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                <?php }
                                        }
                                    } // end of else
}
                                }
                                ?>

                                    </tr>


                        </ul>
                            </td>

                            <td>
                            <ul class="top-sales-details pending-details datadetails" id="tableofpendingworkorder" style="margin-left: 173px;">
                            <script>
                                let pendingWorkorders = [];
                            </script>


                            <?php

                            if (!empty($pendingWorkorderDetails2)) {

                                //print_r($pendingWorkorderDetails2);
                                foreach ($pendingWorkorderDetails2  as $dataworkorder) {

                                    $key = $dataworkorder['workordernumber'];
                            ?>
                                    <li style="color:blue"> <a href="<?= base_url("workorder/view_workorder/$key") ?>">
                                            Workorder-<?php echo $dataworkorder['workordernumber'] ?> </a>
                                        <script>
                                            pendingWorkorders.push("<?php echo $dataworkorder['workordernumber'] ?>")
                                        </script>
                                    </li>

                            <?php

                                }
                            }

                            ?>

                        </ul>
                            </td>

                            <td>
                            <ul id="close_items" class="closedetails">
                            </ul>
                            </td>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        </body>


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





<!--script for view all button  -->

<script>
    function toggleView() {
        var viewAllBtn = document.getElementById('viewAllBtn');
        var dashboardData = document.getElementById('dashboardData');

        // Toggle visibility of additional data items
        var additionalDataItems = dashboardData.querySelectorAll('.data-item:nth-child(n+6)');
        additionalDataItems.forEach(function(item) {
            item.style.display = (item.style.display === 'none' || item.style.display === '') ? 'block' : 'none';
        });

        // Change the button text based on the state
        var isViewingAll = additionalDataItems[0].style.display === 'block';
        viewAllBtn.innerHTML = isViewingAll ? 'View Less' : 'View All';
    }
</script>