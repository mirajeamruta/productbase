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
      

      
<?php
            // $notfications = array_slice($this->Notification_Model->getNotifications(), 0, 10);
            $notfications = $this->Notification_Model->getNotifications();
            $this->load->model('Workorder_model');
            $loggedInUserId = $this->session->userdata('userId');
             foreach ($notfications as $notfication) {
                if ($this->session->userdata('usertype') == 'admin') {
                 ?>
            <tr>

                <?php if ($notfication["type"] == "updatedates") { ?>
                <td>
                    <h6> Target date and deadline for workorder no <a
                            href="<?= base_url("workorder/view_workorder/".$notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                        </a> has been revised <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
                </td>
                <?php } else if ($notfication["type"] == "workorder") {?>
                <td>
                    <h6> New workorder <a
                            href="<?= base_url("workorder/view_workorder/".$notfication["workorder_no"]) ?>"><?php echo $notfication["workorder_no"] ?>
                        </a> assigned to you <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
                </td>
                <?php } else if ($notfication["type"] == "client") { ?>
                <td>
                    <h6>New client <a href="<?= base_url("client/clientList") ?>"><?php echo $notfication['name']; ?>
                        </a> has been created <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
                </td>

                <?php } else if ($notfication["type"]=="editclient") { ?>
                <td>
                    <h6> Client <a
                            href="<?= base_url("Client/editClientData/".$notfication["client_id"]) ?>"><?php echo $notfication['name']; ?>
                        </a> has been updated <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
                </td>
                <?php } else if ($notfication["type"]=="user") { ?>
                <td>
                    <h6> New user <a href="<?= base_url("user/allusers") ?>"><?php echo $notfication['user_name']; ?>
                        </a> has been created <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
                </td>
                <?php } else if ($notfication["type"]=="edituser") { ?>
                <td>
                    <h6> User <a
                            href="<?= base_url("User/editUserData/".$notfication["user_id"]) ?>"><?php echo $notfication['user_name']; ?>
                        </a> has been updated <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
                </td>
                <?php } ?>
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
                    <h6> Target date and deadline for workorder no <a
                            href="<?= base_url("workorder/view_workorder/" . $notfication["workorder_no"]) ?>"><?php echo $notfication['workorder_no'] ?>
                        </a> has been revised <br></h6>
                    <input id="<?= $notfication["Notification_id"] ?>_notification_date" type="hidden"
                        value="<?= $notfication["date"] ?>" />
                </td>
                <?php }
                }else if ($notfication["type"] == "workorder") {
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
                        value="<?= $notfication["date"] ?>" />
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

  <div class="notifycalender">
    <input id="date" type="date">
  </div>


</section>

<!-- notification function -->

<script>
  document.getElementById("date").valueAsDate = new Date("2017-06-21");
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
