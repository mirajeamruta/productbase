<div class="sidebar" Id="sidebar1">
    <div class="logo-details">
        <i class='bx bxl-c-plus-plus'></i>
        <span class="logo_name"></span>
    </div>
    <ul class="nav-links">
        <li>
            <a class="active" style="">
                <i class='bx bx-grid-alt'></i>
                <span class="links_name">Total Workorders</span>
                <div class="number" style="margin-left: -85px; margin-top: 88px; background: white; border-radius: 21px; box-sizing: border-box; padding: 10px 14px 10px 13px;color: black;"><?php echo $countworkorder; ?></div>
            </a>
        </li>
        <li>
            <a class="active1" id="active1" style="">
                <!-- <a  class="active1" id="active1" style="margin-left: 10px; ;margin-top: 74px;"> -->
                <i class='bx bx-box'></i>
                <span class="links_name">Pending Workorders</span>
                <div class="number" style="margin-left: -109px; margin-top: 88px; background: white; border-radius: 21px; box-sizing: border-box; padding: 10px 15px 11px 12px; color: black;"> <?php echo $pendingWorkorders; ?> </div>
            </a>
        </li>
        <li>
            <a class="active3" style="">
                <!-- <a class="active3" style="margin-left: 10px;margin-top: 74px;"> -->
                <i class=' bx bx-user-pin'></i>
                <span class="links_name">Number of Clients</span>
                <div class="number" style="margin-left: -93px; margin-top: 88px; background: white; border-radius: 21px; box-sizing: border-box; padding: 9px 14px 9px 11px; color: black;"><?php echo $countclents; ?></div>
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

<section class="home-section" id="hom">
    <div class="home-content">

        <div class="sales-boxes" style="">
            <div class="recent-sales box" id="recent">
                <div class="title" style="text-align: center;">Notifications</div>
                <div class="sales-details" style="margin-left: 95px;">
                    <section id="section-dashboard" class="text-center">
                        <ul class="test">
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

                                        <?php if ($notfication["type"] == "updatedates") {
                                            $assign_to = $this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])[0]['assign_to'];
                                            $array['number1'] = str_replace('"', '', $assign_to);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);

                                            if (in_array($loggedInUserId, $array['number4'])) {
                                        ?>
                                                <td>
                                                    <h6> Target date and deadline for workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                                                        </a> has been revised <br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                            <?php }
                                        } else if ($notfication["type"] == "workorder") {
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
                                        } else if ($notfication["type"] == "client") { ?>
                                            <td>
                                                <h6>New client <a href="<?= base_url("client/clientList") ?>"><?php echo $notfication['name']; ?>
                                                    </a> has been created <br></h6>
                                                <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                            </td>

                                        <?php } else if ($notfication["type"] == "editclient") { ?>
                                            <td>
                                                <h6> Client <a href="<?= base_url("Client/editClientData/" . $notfication["client_id"]) ?>"><?php echo $notfication['name']; ?>
                                                    </a> has been updated <br></h6>
                                                <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                            </td>
                                        <?php } else if ($notfication["type"] == "user") { ?>
                                            <td>
                                                <h6> New user <a href="<?= base_url("user/allusers") ?>"><?php echo $notfication['user_name']; ?>
                                                    </a> has been created <br></h6>
                                                <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                            </td>
                                        <?php } else if ($notfication["type"] == "edituser") { ?>
                                            <td>
                                                <h6> User <a href="<?= base_url("User/editUserData/" . $notfication["user_id"]) ?>"><?php echo $notfication['user_name']; ?>
                                                    </a> has been updated <br></h6>
                                                <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                            </td>
                                        <?php } else if ($notfication['type'] == "closeworkorder") { ?>

                                            <td>

                                                <h6> User <a href="<?= base_url("user/allusers") ?>"><?php echo $notfication['user_name']; ?>
                                                    </a> with employee id <?php echo $notfication['balunand_id_no']; ?> has been
                                                    requesting to close the workorder <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>

                                                    </a> <br></h6>

                                                <input id="<?= $notfication["Notification_id"] ?>" type="hidden" value="<?= $notfication["user_id"] ?>" />
                                            </td>
                                            <script>
                                                removedItem.push(<?php echo json_encode($notfication['workorder_no']) ?>)
                                            </script>

                                            <?php  } else if ($notfication["type"] == "deadline") {
                                            $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (in_array($loggedInUserId, $array['number4'])) {
                                                $date = new DateTime();
                                                $notfication['deadline'];
                                                $date->modify('+2 day')->format('Y-m-d');
                                                strcmp($notfication['deadline'], $date->modify('+2 day')->format('Y-m-d')) ? 'abc' : 'xyz';
                                                if ($notfication['targetted_end_date'] == date('Y-m-d')) {
                                            ?>
                                                    <td>
                                                        <h6> Your deadline for the workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                            </a> is approaching soon <br></h6>
                                                        <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                    </td>
                                                <?php
                                                } else if ($notfication['deadline'] == date('Y-m-d')) {
                                                ?>
                                                    <td>
                                                        <h6> Your working on the workorder number <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                            </a> which is deadling today <br></h6>
                                                        <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                    </td>
                                                <?php
                                                } else if (strcmp($notfication['deadline'], $date->modify('+2 day')->format('Y-m-d'))) { ?>
                                                    <td>
                                                        <h6> Your working on the workorder number <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                            </a> which in deadling in two days <br></h6>
                                                        <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                    </td>
                                                <?php }
                                            }
                                        } else if ($notfication["type"] == "newdeadline") {
                                            $assign_to = $this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])[0]['assign_to'];
                                            $array['number1'] = str_replace('"', '', $assign_to);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (in_array($loggedInUserId, $array['number4'])) {
                                                $date = new DateTime();
                                                $notfication['deadline'];
                                                $date->modify('+2 day')->format('Y-m-d');
                                                strcmp($notfication['deadline'], $date->modify('+2 day')->format('Y-m-d')) ? 'abc' : 'xyz';
                                                if ($notfication['targetted_end_date'] == date('Y-m-d')) {
                                                ?>
                                                    <td>
                                                        <h6> Your deadline for the workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                            </a> is approaching soon <br></h6>
                                                        <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                    </td>
                                                <?php
                                                } else if ($notfication['deadline'] == date('Y-m-d')) {
                                                ?>
                                                    <td>
                                                        <h6> Your working on the workorder number <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                            </a> which is expiring today <br></h6>
                                                        <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                    </td>
                                                <?php
                                                } else if (strcmp($notfication['deadline'], $date->modify('+2 day')->format('Y-m-d'))) { ?>
                                                    <td>
                                                        <h6> Your working on the workorder number <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                            </a> which in deadling in two days <br></h6>
                                                        <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                    </td>
                                        <?php }
                                            }
                                        } else if ($notfication["type"] == "newuser") {
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
                                        }

                                        else if ($notfication["type"] == "closeuser") {
                                            $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (!(in_array($loggedInUserId, $array['number4']))) {
                                            ?>
                                                <td>
                                                <h6> You have been removed from requested workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?> </a> <br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                                <?php }
                                        } 
                                        ?>
                                    </tr>
                                <?php
                                } else {
                                    // For USER 
                                ?>
                                    <tr>
                                        <?php if ($notfication["type"] == "updatedates") {
                                            $assign_to = $this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])[0]['assign_to'];
                                            $array['number1'] = str_replace('"', '', $assign_to);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);

                                            if (in_array($loggedInUserId, $array['number4'])) {
                                        ?>
                                                <td>
                                                    <h6> Target date and deadline for workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                                                        </a> has been revised <br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                </td>
                                            <?php }
                                        } else if ($notfication["type"] == "workorder") {
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
                                        } else if ($notfication["type"] == "deadline") {
                                            $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (in_array($loggedInUserId, $array['number4'])) {
                                                $date = new DateTime();
                                                $notfication['deadline'];
                                                $date->modify('+2 day')->format('Y-m-d');
                                                strcmp($notfication['deadline'], $date->modify('+2 day')->format('Y-m-d')) ? 'abc' : 'xyz';
                                                if ($notfication['targetted_end_date'] == date('Y-m-d')) {
                                                ?>
                                                    <td>
                                                        <h6> Your deadline for the workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                            </a> is approaching soon <br></h6>
                                                        <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                    </td>
                                                <?php
                                                } else if ($notfication['deadline'] == date('Y-m-d')) {
                                                ?>
                                                    <td>
                                                        <h6> Your working on the workorder number <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                            </a> which is deadline today <br></h6>
                                                        <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                    </td>
                                                <?php
                                                } else if (strcmp($notfication['deadline'], $date->modify('+2 day')->format('Y-m-d'))) { ?>
                                                    <td>
                                                        <h6> Your working on the workorder number <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                            </a> which deadline in two days <br></h6>
                                                        <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                    </td>
                                                <?php }
                                            }
                                        } else if ($notfication["type"] == "newdeadline") {
                                            $assign_to = $this->Workorder_model->getAssignToForWorkOrderNo($notfication['workorder_no'])[0]['assign_to'];
                                            $array['number1'] = str_replace('"', '', $assign_to);
                                            $array['number2'] = str_replace(']', '', $array['number1']);
                                            $array['number3'] = str_replace('[', '', $array['number2']);
                                            $array['number4'] = explode(',', $array['number3']);
                                            if (in_array($loggedInUserId, $array['number4'])) {
                                                $date = new DateTime();
                                                $notfication['deadline'];
                                                $date->modify('+2 day')->format('Y-m-d');
                                                strcmp($notfication['deadline'], $date->modify('+2 day')->format('Y-m-d')) ? 'abc' : 'xyz';
                                                if ($notfication['targetted_end_date'] == date('Y-m-d')) {
                                                ?>
                                                    <td>
                                                        <h6> Your deadline for the workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                            </a> is approaching soon <br></h6>
                                                        <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                    </td>
                                                <?php
                                                } else if ($notfication['deadline'] == date('Y-m-d')) {
                                                ?>
                                                    <td>
                                                        <h6> Your working on the workorder number <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                            </a> which is expiring today <br></h6>
                                                        <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                    </td>
                                                <?php
                                                } else if (strcmp($notfication['deadline'], $date->modify('+2 day')->format('Y-m-d'))) { ?>
                                                    <td>
                                                        <h6> Your working on the workorder number <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                            </a> which deadline in two days <br></h6>
                                                        <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                                    </td>
                                                <?php }
                                            }
                                        } else if ($notfication['type'] == "closeworkorder") {
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
                                        } else if ($notfication["type"] == "newuser") {
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
                                      
                                    } else if ($notfication["type"] == "closeuser") {
                                        $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                                        $array['number2'] = str_replace(']', '', $array['number1']);
                                        $array['number3'] = str_replace('[', '', $array['number2']);
                                        $array['number4'] = explode(',', $array['number3']);
                                        if (!(in_array($loggedInUserId, $array['number4']))) {                                                                
                                ?>

                                   <td>
                                                    <h6> You have been removed from requested workorder number  <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                                                        </a> <br></h6>
                                                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
                                   </td>

                               <?php }
                                      
                                    }                                    
                                    }// end of else
                                }                               
                                ?>

                                    </tr>


                        </ul>
                        <div class="button_notify">
                            <button class="show_button"> <a href="<?= base_url("Notification_Controller/notification") ?>" style="color:whitesmoke">View More</a></button>
                        </div>
                    </section>




                </div>





            </div>


            <div class="top-sales box">
                <div class="title1" style="text-align: center; margin-left: -18px; font-size:20px">Pending Workorders</div>
                <ul class="top-sales-details" style="margin-left: 36px;">
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



                <div id="recently_close_pending_workorder">
                    <p id="recent_close_header">Recently Closed Workorder</p>
                    <ul id="close_items">

                    </ul>
                </div>

            </div>
        </div>
    </div>
</section>


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
    //let removedItem = ['24EA8', '23EA27', '23RF3', '23EA2']

    for (let j = 0; j < removedItem.length; j++) {
        let isMatch;
        for (let i = 0; i < pendingWorkorders.length; i++) {
            if (pendingWorkorders[i].trim() == removedItem[j]) {
                isMatch = true;
            }
        }
        if (!isMatch) {
            let li = document.createElement('li');
            let textNode = document.createTextNode(`${removedItem[j]} is closed`)
            li.className = "closed_workorder"
            li.appendChild(textNode)
            document.getElementById('close_items').appendChild(li)

        }
    }
</script>