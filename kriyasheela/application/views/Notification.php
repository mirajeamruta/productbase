<section>
  <div>
    <input type="text" id="myInput1" onkeyup="myFunction()" placeholder="Search for names.." title="" />
    <input type="reset" class="btn12" id="cancelbtn" value="X" alt="" />
  </div>
  <div class='container' id="fristhead">
    <table class="notificationtable" style="width:88%" id="notificationdata1">

      <tr class="header">

        <th> View Notification Details</th>
      </tr>
      <script>
      let testArray1=[];
      </script>
      <?php
      
      // $notfications = array_slice($this->Notification_Model->getNotifications(), 0, 10);
      $notfications = $this->Notification_Model->getNotifications();
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
                  <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"  value="<?= $notfication["date"] ?>" />
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
                <script>
               testArray1.push("<?php echo $notfication['date']?>")
               </script>
              
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
            <?php } else if ($notfication['type'] =="closeworkorder"){ ?>
                                <td>
                                    <h6> User <a
                                            href="<?= base_url("user/allusers") ?>"><?php echo $notfication['user_name']; ?>
                                        </a> with employee id <?php echo $notfication['balunand_id_no']; ?> has been
                                        requesting to close the workorder <a
                                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                                        </a> <br></h6>
                                    <input id="<?= $notfication["Notification_id"] ?>" type="hidden"
                                        value="<?= $notfication["user_id"] ?>" />
                                </td>
                                <?php  } else if ($notfication["type"] == "deadline") {
                   $array['number1'] = str_replace('"', '', $notfication['assign_to']);
                    $array['number2'] = str_replace(']', '', $array['number1']);
                    $array['number3'] = str_replace('[', '', $array['number2']);
                    $array['number4'] = explode(',', $array['number3']);
                    if (in_array($loggedInUserId, $array['number4'])) {
                        $date = new DateTime();
                                        $notfication['deadline'];
                                        $date->modify('+2 day')->format('Y-m-d');
                                        strcmp($notfication['deadline'] ,$date->modify('+2 day')->format('Y-m-d'))?'abc' : 'xyz';
                        if ($notfication['targetted_end_date'] == date('Y-m-d')) {
                            ?>
                <td>
                    <h6> Your deadline for the workorder no <a
                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                        </a> is approaching soon <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
                </td>
                <?php
                        } else if ($notfication['deadline'] == date('Y-m-d')) {
                            ?>
                <td>
                    <h6> Your working on the workorder number <a
                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                        </a> which is deadling today <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
                </td>
                <?php
                        } else if (strcmp($notfication['deadline'] , $date->modify('+2 day')->format('Y-m-d')) ){ ?>
                <td>
                    <h6> Your working on the workorder number <a
                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                        </a> which in deadling in two days <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
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
                                    strcmp($notfication['deadline'] ,$date->modify('+2 day')->format('Y-m-d'))?'abc' : 'xyz';
                        if ($notfication['targetted_end_date'] == date('Y-m-d')) {
                            ?>
                <td>
                    <h6> Your deadline for the workorder no <a
                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                        </a> is approaching soon <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
                </td>
                <?php
                        } else if ($notfication['deadline'] == date('Y-m-d')) {
                            ?>
                <td>
                    <h6> Your working on the workorder number <a
                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                        </a> which is expiring today <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
                </td>
                <?php
                        }  else if (strcmp($notfication['deadline'] , $date->modify('+2 day')->format('Y-m-d')) ){ ?>
                <td>
                    <h6> Your working on the workorder number <a
                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                        </a> which in deadling in two days <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
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
// for remving workorder request code
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
                                   strcmp($notfication['deadline'] ,$date->modify('+2 day')->format('Y-m-d'))?'abc' : 'xyz';
                   if ($notfication['targetted_end_date'] == date('Y-m-d')) {
                       ?>
           <td>
               <h6> Your deadline for the workorder no <a
                       href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                   </a> is approaching soon <br></h6>
               <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                   value="<?= $notfication["date"] ?>" />
           </td>
           <?php
                   } else if ($notfication['deadline'] == date('Y-m-d')) {
                       ?>
           <td>
               <h6> Your working on the workorder number <a
                       href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                   </a> which is deadling today <br></h6>
               <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                   value="<?= $notfication["date"] ?>" />
           </td>
           <?php
                   } else if (strcmp($notfication['deadline'] , $date->modify('+2 day')->format('Y-m-d')) ){ ?>
           <td>
               <h6> Your working on the workorder number <a
                       href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                   </a> which in deadling in two days <br></h6>
               <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                   value="<?= $notfication["date"] ?>" />
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
                               strcmp($notfication['deadline'] ,$date->modify('+2 day')->format('Y-m-d'))?'abc' : 'xyz';
                   if ($notfication['targetted_end_date'] == date('Y-m-d')) {
                       ?>
           <td>
               <h6> Your deadline for the workorder no <a
                       href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                   </a> is approaching soon <br></h6>
               <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                   value="<?= $notfication["date"] ?>" />
           </td>
           <?php
                   } else if ($notfication['deadline'] == date('Y-m-d')) {
                       ?>
           <td>
               <h6> Your working on the workorder number <a
                       href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                   </a> which is expiring today <br></h6>
               <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                   value="<?= $notfication["date"] ?>" />
           </td>
           <?php
                   }  else if (strcmp($notfication['deadline'] , $date->modify('+2 day')->format('Y-m-d')) ){ ?>
           <td>
               <h6> Your working on the workorder number <a
                       href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                   </a> which in deadling in two days <br></h6>
               <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                   value="<?= $notfication["date"] ?>" />
           </td>
           <?php }
               }
           } else if ($notfication['type'] == "closeworkorder") {
            if ($loggedInUserId == $notfication['user_id']) {

                ?>
        <td>
            <h6> You have requested to close the workorder <a
                    href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                </a> <br></h6>
            <input id="<?= $notfication["Notification_id"] ?>" type="hidden"
                value="<?= $notfication["user_id"] ?>" />
        </td>
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
            <h6> You have been removed from  workorder no <a href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?> </a> <br></h6>
                <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden" value="<?= $notfication["date"] ?>" />
            </td>
            <?php }
    } 
          }
        }
        ?>
          </tr>
    </table>
  </div>
  <!-- Calender Box -->

  <div class="notifycalender" id="dateFilter" onchange="filterData()">
  <input id="date" type="date">
  
</div>
<div id="dataDisplay"></div>
</section>


<!-- notification function -->

<script>
  document.getElementById("date").valueAsDate = new Date();
</script>

<script>
 
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



<!-- <?php
// Your PHP code to fetch notifications from a database or any other source
// For demonstration purposes, I'll define a static array of notifications

$notifications = [
    [
        'date' => '2023-06-21',
        'message' => 'Notification 1 message'
    ],
    [
        'date' => '2023-06-26',
        'message' => 'Notification 2 message'
    ]
    // Add more notification objects with corresponding dates and messages
];

// Convert PHP array to JSON format
$notificationDataJSON = json_encode($notifications);
?> 

<script>
function fetchNotifications() {
  // Fetch notifications from PHP
  var notificationData1 = <?php echo json_encode($notfication["date"]); ?>;

  // Return the fetched notification data
  return notificationData1;
}

function filterData() {
  var selectedDate = document.getElementById("date").value;
  
  // Clear the data display
  var dataDisplay = document.getElementById("dataDisplay");
  dataDisplay.innerHTML = "";

  // Fetch notifications
  var notificationData1 = fetchNotifications();

  // Filter the notifications based on the selected date
  var filteredNotifications = notificationData1.filter(function(notification) {
    return notification.date == selectedDate;
  });

  // Display the filtered notifications
  if (filteredNotifications.length > 0) {
    filteredNotifications.forEach(function(notification) {
      var notificationElement = document.createElement("div");
      notificationElement.innerHTML = notification.message;
      dataDisplay.appendChild(notificationElement);
    });
  } else {
    var noDataElement = document.createElement("div");
    noDataElement.innerHTML = "No notifications available for this date.";
    dataDisplay.appendChild(noDataElement);
  }
}
</script>


<script>
 alert(testArray1)
</script> -->
