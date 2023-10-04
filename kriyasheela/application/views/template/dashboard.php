<div class="sidebar" Id="sidebar1">
    <div class="logo-details">
    </div>
    <ul class="nav-links">
        <li>
            <a class="active" style="">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Total Workorders</span>
                <div class="number" style="margin-left: -85px; margin-top: 88px; background: white; border-radius: 21px; box-sizing: border-box; padding: 10px 14px 10px 13px;color: black;">
                    <?php echo $countworkorder; ?></div>
            </a>
        </li>
        <li>
            <a class="active1" id="active1" style="">
                <!-- <a  class="active1" id="active1" style="margin-left: 10px; ;margin-top: 74px;"> -->
                <i class='bx bx-box'></i>
                <span class="links_name">Pending Workorders</span>
                <div class="number" style="margin-left: -109px; margin-top: 88px; background: white; border-radius: 21px; box-sizing: border-box; padding: 10px 15px 11px 12px; color: black;">
                    <?php echo $pendingWorkorders; ?> </div>
            </a>
        </li>
        <li>
            <a class="active3" style="">
                <!-- <a class="active3" style="margin-left: 10px;margin-top: 74px;"> -->
                <i class=' bx bx-user-pin'></i>
                <span class="links_name">Number of Clients</span>
                <div class="number" style="margin-left: -93px; margin-top: 88px; background: white; border-radius: 21px; box-sizing: border-box; padding: 9px 14px 9px 11px; color: black;">
                    <?php echo $countclents; ?></div>
            </a>
        </li>
        <li>
            <a class="active2" style="">
                <!-- <a class="active2" style="margin-left: 10px; margin-top: 70px;"> -->
                <i class='bx bx-user'></i>
                <span class="links_name" id="links">Number of Users</span>
                <div class="number" id="Numb"><?php echo $countusers; ?></div>
            </a>
        </li>

        </li>
    </ul>
</div>
        </li>
    </ul>
</div>

<section class="home-section" id="hom">
<section class="home-section" id="hom">
    <div class="home-content">

        <div class="sales-boxes" style="">
            <div class="recent-sales box" id="recent">
                <div class="title" id="heading" style="text-align: center;  margin-left: -610px;">Notifications</div>
                <div class="sales-details admindetails " id="dashborad___notifications" style="left:93px; width: fit-content;position: relative;top: 19px;">
                    <section id="section-dashboard " style="text-align: center;">
                        <ul class="test  alladmin___notificationsdata   alluser__notificationdata">
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
                        <?php
                        if ($this->session->userdata('usertype') == 'admin') {
                        ?>
                            <div class="button_notify">
                                <button class="show_button"> <a href="<?= base_url("Notification_Controller/notification") ?>" style="color:whitesmoke">View More</a></button>
                            </div>
                        <?php
                        } else {



                        ?>
                            <div class="button_notify1  dashboarduser___notify0">
                                <button class="show_button"> <a href="<?= base_url("Notification_Controller/notification") ?>" style="color:whitesmoke">View More</a></button>
                            </div>

                        <?php
                        } ?>
                    </section>








                </div>

                <?php
                if ($this->session->userdata('usertype') == 'admin') {
                ?>
                    <div class="top-sales box box-1">
                        <div class="title1 pendingworkorder__adminside" id="heading1" style="text-align: center; margin-left: 117px; margin-top: -90px !important; font-size:20px">Pending Workorders</div>
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
                        <div id="recently_close_pending_workorder1" class="closeworkorder1  recentlyclosed___workorder closedworkorder___dashboard">
                            <p class="closeworkorder1" id="recent_close_header">Recently Closed Workorder</p>
                            <ul id="close_items" class="closedetails">
                            </ul>
                        </div>

                    </div>
                <?php
                } else {



                ?>
                    <div class="top-sales box box-2" id="pendingWorkorder__section">
                        <div class="title2" id="heading2" style="text-align: center; margin-left: 129px; margin-top: 19px !important ; font-size:20px">Pending Workorders</div>
                        <ul class="top-sales-details pending-details datadetails" id="user__pendingWorkorderList"style="margin-left: 191px; margin-top: 10px;">
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
                        <div id="recently_close_pending_workorder" class="user__closeworkorder2">
                            <p class="user__closeworkorder2" id="recent_close_header">Recently Closed Workorder</p>
                            <ul id="close_items" class="closedetails">
                            </ul>
                        </div>

                    </div>
                <?php
                } ?>
            </div>



        </div>
    </div>
<script>
	window.addEventListener('beforeunload',function(){	
    localStorage.removeItem('selectedte')	
    localStorage.setItem('refreshPage',true)	
})

</script>
    <!-- Notification -->
    <script>
        $('ul.test p:gt(12)').hide();
        var l = $('.test p').length;
        if (l > 10) {
            $('#show_button').show();
        } else {
            $('#show_button').hide();
        }
        $('.').click(function() {
            $('ul.test p:gt(12)').toggle('');
        });
    </script>


    <!-- closed workorder code -->


    <script>
        // let removedItem = ['24EA8', '23EA27', '23RF3', '23EA2']
        for (let j = 0; j < removedItem.length; j++) {
            let isMatch;
            for (let i = 0; i < pendingWorkorders.length; i++) {
                if (pendingWorkorders[i].trim() == removedItem[j]) {
                    isMatch = true;
                    console.log('Inside room 1')
                }
            }
            if (!isMatch) {
                let li = document.createElement('li');
                let textNode = document.createTextNode(`${removedItem[j]} is closed`)
                li.className = "closed_workorder"
                li.appendChild(textNode)
                document.getElementById('close_items').appendChild(li)
                console.log('Inside room 2')

            }
        }
    </script>