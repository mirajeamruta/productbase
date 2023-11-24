<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />

</head>


<style>
    /* Reset default margin and padding for elements */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Style for the body */
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        background: #f6f8fa;
        font-family: 'Poppins', sans-serif;
    }

   
    .main-container {
    display: flex;
    width: 100vw;
    position: relative;
    top: 4px;
    z-index: 1;
}

    .container-notification .title {
        padding: 25px;
        background: #f6f8fa;
        /* text-align: center; */
    }

    .container-notification .title p {
        font-size: 25px;
        font-weight: 500;
        /* position: relative; */
    }


    .container-notification.title p::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30px;
        height: 3px;
        background: linear-gradient(to right, #F37A65, #D64141);
    }
    .container-notification {
        max-width: 1386px;
        width: 100%;
        background: #ffffff;
        border-radius: 0.5rem;
        box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1), 0px 5px 12px -2px rgba(0, 0, 0, 0.1),
            0px 18px 36px -6px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        margin: -4px;
        height: 454px;
    }

    /* Style for the button container */
    #notificationFilterButtons {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
        margin-top: 36px;
        margin-left:36px
    }

    /* Style for the search input */
    .notification__searchbtn input[type="text"] {
        width: 263px;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

  /* Style for the search reset button (X) */
.notification__searchbtn {
    position: sticky;
    top: 0;
    z-index: 999;
    background-color: #fff; /* Set the background color to match your design */
    padding: 10px 0;
}

.notification__searchbtn input[type="reset"] {
    background-color: #ff0000;
    color: #fff;
    border: none;
    border-radius: 4px;
    padding: 10px 8px;
    cursor: pointer;
    position: absolute;
    top: 10px;
    left: 260px;
}

    /* Style for the select input */
    .Notification__button select {
        width: 69%;
        /* Adjust the width */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    /* Style for the date input */
    .notifycalender input[type="date"] {
        width: 100%;
        /* Adjust the width */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background: #e99b7e;
        border: none;
        color: white;
    }

    .Notify_datafound {
        position: relative;
    top: 188px;
    left: -672px;
    color: #ff0000;
    font-weight: bold;

}




    /* Style for the table */
    .notificationtable {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }



    /* Style for the View Notification Details column */
    .header th {
        padding: 10px;
        text-align: center;
    }


    .notificationtable {
        border-collapse: collapse;
        width: 100%;
    }

    .notification_tbody .notification-row {
        border-bottom: 1px solid #ccc;
    }

    .notificationtable th, .notificationtable td {
        padding: 10px;
        text-align: left;
    }

    .notificationtable th {
        background-color: #f2f2f2;
        font-size: medium;
    }

    .notificationtable td {
        background-color: #fff;
    }

    .notificationtable a {
        text-decoration: none;
        color: #007bff;
    }

    .notificationtable a:hover {
        text-decoration: underline;
    }

    .notification-date, .notification-type {
        display: none;
    }

    /* Add this CSS for small screens (adjust the max-width as needed) */
@media (max-width: 768px) {
    #notificationFilterButtons {
        flex-direction: column;
        align-items: flex-start;
    }

    .notification__searchbtn input[type="text"]{
        width: 305px;
    margin-bottom: 20px !important;
    margin-left: -4px !important;
    }
    .Notification__button select{
        width: 305px;
    margin-bottom: 20px !important;
    margin-left: -21px !important;
    }
    .notifycalender input[type="date"]{
        width: 305px;
    margin-bottom: 20px !important;
    margin-left: -4px !important;
    }
    .notification__searchbtn input[type="reset"] {
        margin-bottom: 20px !important;
    margin-left: 16px !important;
    }
    .Notify_datafound {
    position: relative;
    top: 145px;
    left: 41px;
    color: #ff0000;
    font-weight: bold;
}

}

/* Media query for small screens */
@media (max-width: 768px) {
    .notificationtable {
        display: block;
        max-height: 300px; /* Set the maximum height you desire */
        overflow-y: auto;
    }
    .notification_tbody {
        display: block;
    }
}




</style>

<body>
    <div class="main" id="mainnotification">

        <div class="container-notification" id="notification_deatils">
        <div class="title">
            <p>Notification</p>
        </div>
            <div id="notificationFilterButtons">

                <div class="notification__searchbtn">
                    <input type="text" id="myInput1" onkeyup="myFunction()" placeholder="Search name & Workorder No" title="" />
                    <input type="reset" class="btn12" id="cancelbtn" value="X" alt="" />
                </div>
                <div class="col-sm-6 Notification__button">
                    <select placeholder="Type of Notification" name="type_of_notification" id="filterType" class="classic" onchange="typeofnotify()">
                        <option value="">Select</option>
                        <?php
                        $notfications = $this->Notification_Model->getNotifications();
                        $unique_array = [];
                        foreach ($notfications as $element) {
                            $hash = $element['type'];
                            $unique_array[$hash] = $element;
                        }
                        $result = array_values($unique_array);
                        foreach ($result as $notfication) : ?>
                            <option value="<?= $notfication['type']; ?>">
                                <?= $notfication['type']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="notifycalender">
                    <input type="date" class="btnnotification" id="notification__filterDate" onchange="filterNotifications()">

                </div>


                <div id="dataDisplay">
                <div id="dataNotFoundMessage" class="Notify_datafound" style="display:none;">Data not found</div>
                </div>

            </div>
            <hr>
            </hr>



            <div class='container-fluid' id="fristhead">
                <table class="notificationtable whole__notificationtable" style="width:88%" id="notificationdata1">
                    <tbody class="notification_tbody">
                        <tr class="header">

                            <th style="text-align: left;font-size: medium;"> View Notification Details</th>
                        </tr>
                        <script>
                            let testArray1 = [];
                        </script>

<?php

// $notfications = array_slice($this->Notification_Model->getNotifications(), 0, 10);
$notfications = $this->Notification_Model->getNotifications();
$loggedInUserId = $this->session->userdata('userId');
foreach ($notfications as $notfication) {
  if ($this->session->userdata('usertype') == 'admin') {
?>
      <tr class="notification-row">
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
              <h6 style="margin-top: 10px;"> Workorder number <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                  </a> has been revised <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />

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
                      </a> which will be completed by two days
                      <br>
                  </h6>
                  <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
                  <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                      class="notification-type" value="<?= $notfication["type"] ?>" />

              </td>
              <?php } else if ($notfication['targetted_end_date'] == date('Y-m-d')) {
                                      ?>
              <td>
                  <h6> Your working on the workorder number <a
                          href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                      </a> which will be completed within few days <br></h6>
                  <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
                  <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                      class="notification-type" value="<?= $notfication["type"] ?>" />

              </td>
              <?php
                                          } else if ($notfication['deadline'] == date('Y-m-d')) {
                                          ?>
              <td>
                  <h6> Your working on the workorder number <a
                          href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                      </a> which will be completed by today <br></h6>
                  <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
                  <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                      class="notification-type" value="<?= $notfication["type"] ?>" />

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
              <h6 style="margin-top: 10px;"> New workorder <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                  </a> assigned to you <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" /><input
                  id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
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
              <h6> New workorder <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                  </a> assigned to you <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" class="notification-date" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
          </td>
          <?php }
                   } else if ($notfication["type"] == "New Client") { ?>
          <td>
              <h6 style="margin-top: 10px;">New client <a
                      href="<?= base_url("client/clientList") ?>"><?php echo $notfication['name']; ?>
                  </a> has been created <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
          </td>

          <?php 
      } else if ($notfication["type"] == "Clients Added Through CSV") { ?>
          <td>
              <h6>New client <a href="<?= base_url("client/clientList") ?>"><?php echo $notfication['name']; ?>
                  </a> has been created <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" class="notification-date" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
          </td>

          <?php 
      } else if ($notfication["type"] == "Updated Client") { ?>
          <td>
              <h6 style="margin-top: 10px;"> Client <a
                      href="<?= base_url("Client/editClientData/" . $notfication["client_id"]) ?>"><?php echo $notfication['name']; ?>

                  </a> has been updated <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
              <script>
              testArray1.push("<?php echo $notfication['date'] ?>")
              </script>

          </td>
          <?php 
      } else if ($notfication["type"] == "New User") { ?>
          <td>
              <h6 style="margin-top: 10px;"> New user <a
                      href="<?= base_url("user/allusers") ?>"><?php echo $notfication['user_name']; ?>
                  </a> has been created <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
          </td>
          <?php 
      } else if ($notfication["type"] == "Updated User") { ?>
          <td>
              <h6 style="margin-top: 10px;"> User <a
                      href="<?= base_url("User/editUserData/" . $notfication["user_id"]) ?>"><?php echo $notfication['user_name']; ?>

                  </a> has been updated <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
          </td>
          <?php 
          } if ($notfication["type"] == "Requesting to Close Workorder") { ?>
          <td>
              <h6 style="margin-top: 10px;"> User <a
                      href="<?= base_url("user/allusers") ?>"><?php echo $notfication['user_name']; ?>
                  </a> with employee id <?php echo $notfication['balunand_id_no']; ?> has been
                  requesting to close the workorder <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                  </a> <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>" type="hidden" class="notification-date"
                  type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
          </td>
          <?php 
           } else if ($notfication["type"] == "Workorder - Assigned to new user") {
        $array['number1'] = str_replace('"', '', $notfication['assign_to']);
        $array['number2'] = str_replace(']', '', $array['number1']);
        $array['number3'] = str_replace('[', '', $array['number2']);
        $array['number4'] = explode(',', $array['number3']);
        if (in_array($loggedInUserId, $array['number4'])) {
          ?>
          <td>
              <h6 style="margin-top: 10px;"> New workorder <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                  </a> assigned to you <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
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
              <h6> You have been removed from workorder no <?php echo $notfication["workorder_no"] ?><br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
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
              <h6> workorder no <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                  </a> has been closed <br>
              </h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
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
              <h6> workorder no <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                  </a> has been opened <br>
              </h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
          </td>
          <?php }
                                  }
      ?>
      </tr>
      <?php
      //User
  } 

}
else {
  ?>
      <tr class="notification-row">
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
              <h6 style="margin-top: 10px;"> Workorder number <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                  </a> has been revised <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
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
                      </a> which will be completed by two days
                      <br>
                  </h6>
                  <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
                  <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                      class="notification-type" value="<?= $notfication["type"] ?>" />

              </td>
              <?php } else if ($notfication['targetted_end_date'] == date('Y-m-d')) {
                                      ?>
              <td>
                  <h6> Your working on the workorder number <a
                          href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                      </a> which will be completed within few days <br></h6>
                  <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
                  <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                      class="notification-type" value="<?= $notfication["type"] ?>" />

              </td>
              <?php
                                          } else if ($notfication['deadline'] == date('Y-m-d')) {
                                          ?>
              <td>
                  <h6> Your working on the workorder number <a
                          href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                      </a> which will be completed by today <br></h6>
                  <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
                  <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                      class="notification-type" value="<?= $notfication["type"] ?>" />

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
              <h6 style="margin-top: 10px;"> New workorder <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                  </a> assigned to you <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
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
              <h6> New workorder <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                  </a> assigned to you <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                 class="notification-date" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
          </td>
          <?php }
                 }  else if ($notfication["type"] == "Requesting to Close Workorder") {
        if ($loggedInUserId == $notfication['user_id']) {

          ?>
          <td>
              <h6 style="margin-top: 10px;"> You have requested to close the workorder <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                  </a> <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>" type="hidden" class="notification-date"
                  type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
          </td>
          <?php }
      } else if ($notfication["type"] == "Workorder - Assigned to new user") {
        $array['number1'] = str_replace('"', '', $notfication['assign_to']);
        $array['number2'] = str_replace(']', '', $array['number1']);
        $array['number3'] = str_replace('[', '', $array['number2']);
        $array['number4'] = explode(',', $array['number3']);
        if (in_array($loggedInUserId, $array['number4'])) {
        ?>
          <td>
              <h6 style="margin-top: 10px;"> New workorder <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                  </a> assigned to you <br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
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
              <h6>You have been removed from workorder no <?php echo $notfication["workorder_no"] ?><br></h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
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
              <h6> workorder no <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                  </a> has been closed <br>
              </h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
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
              <h6> workorder no <a
                      href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                  </a> has been opened <br>
              </h6>
              <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                  class="notification-date" type="datetime-local" value="<?= $notfication["date"] ?>" />
              <input id="<?= $notfication["Notification_id"] ?>_notification_type" type="hidden"
                  class="notification-type" value="<?= $notfication["type"] ?>" />
          </td>
          <?php }
}
                                  }
    }
  }
  ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<script>
    window.addEventListener('beforeunload', function() {
        localStorage.removeItem('selectedte')
        localStorage.setItem('refreshPage', true)
    })
</script>

<!-- notification function -->

<script>
    document.getElementById("date").valueAsDate = new Date();
</script>



<script>
    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput1");
        filter = input.value.toUpperCase();
        table = document.getElementById("notificationdata1");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
        if (filter) {
            document.getElementById('cancelbtn').style.display = "block";
        }
    }

    document.getElementById('cancelbtn').addEventListener('click', function() {
        let input = document.getElementById("myInput1");
        input.value = "";
    })
</script>




<!-- notification data based date filter out function -->


<script>
    function filterNotifications() {
        var notification__filterDate = document.getElementById('notification__filterDate').value;
        var notificationdata1 = document.getElementById('notificationdata1');
        var dataNotFoundMessage = document.getElementById('dataNotFoundMessage');

        if (notificationdata1) {
            var rows = notificationdata1.getElementsByClassName('notification-row');
            var dataFound = false; // Variable to check if data is found

            for (var i = 0; i < rows.length; i++) {
                var notificationDateElement = rows[i].querySelector('.notification-date');

                if (notificationDateElement) {
                    var notificationDate = notificationDateElement.value;
                    // alert(notificationDate); // Debugging: Display the selected date

                    // Compare the date values and apply display style accordingly
                    if (notification__filterDate === '' || notificationDate.startsWith(notification__filterDate)) {
                        rows[i].style.display = '';
                        dataFound = true; // Data is found
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }

            // If no data is found, display the "Data not found" message
            if (!dataFound && dataNotFoundMessage) {
                dataNotFoundMessage.style.display = '';
            } else if (dataNotFoundMessage) {
                dataNotFoundMessage.style.display = 'none';
            }
        }
    }
</script>
<script>
    function typeofnotify() {
        var filterType = document.getElementById('filterType').value;
        var notificationdata1 = document.getElementById('notificationdata1');
        var dataNotFoundMessage = document.getElementById('dataNotFoundMessage');

        if (notificationdata1) {
            var rows = notificationdata1.getElementsByClassName('notification-row');
            var dataFound = false;

            for (i = 0; i < rows.length; i++) {
                var notificationTypeElement = rows[i].querySelector('.notification-type');

                if (notificationTypeElement) {
                    var notificationType = notificationTypeElement.value;

                    if (filterType === '' || notificationType.startsWith(filterType)) {
                        rows[i].style.display = '';
                        dataFound = true; // Data is found
                    } else {
                        rows[i].style.display = 'none';
                    }

                }
            }

            if (!dataFound && dataNotFoundMessage) {
                dataNotFoundMessage.style.display = '';
            } else if (dataNotFoundMessage) {
                dataNotFoundMessage.style.display = 'none';
            }
        }
    }
</script>


<!-- search btn using script  -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

<script>

const searchBtn = document.querySelector(".search-btn");
const cancelBtn = document.querySelector(".cancel-btn");
const searchBox = document.querySelector(".search-box");

searchBtn.onclick = () => {
  searchBox.classList.add("active");
}

cancelBtn.onclick = () => {
  searchBox.classList.remove("active");
}
</script> -->