<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />

</head>

<style>

/* General Styles */
body {
  font-family: Arial, sans-serif;
  background-color: #f2f2f2;
  margin: 0;
  padding: 0;
}

.container {
    padding: 20px;

    max-width: 1261px;
    width: 100%;
    background: #ffffff;
    border-radius: 0.5rem;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1), 0px 5px 12px -2px rgba(0, 0, 0, 0.1), 0px 18px 36px -6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: 2px;
}

/* Title Styles */
.title1 {
  text-align: center;
  margin-top: 17px;
}

.title1 p {
  font-size: 1.75rem;
  font-weight: 600;
}

/* Select Workorder Number Styles */
.text-center {
  text-align: center;
}

.display-6 {
  font-weight: bold;
  font-size: 1.5rem;
}

.filter-handle {
  width: 100%;
  max-width: 305px;
  padding: 10px;
  border: 2px solid #3498db;
  border-radius: 5px;
}

/* Button Styles */
.workorderActionStatus,
.select-button,
.add-button {
  display: inline-block;
  margin: 5px;
  padding: 10px 20px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Save Button Styles */
#new_assign_save_btn {
  background-color: #4CAF50;
  color: white;
  /* display: inline-block; */
  margin: 5px;
  padding: 10px 20px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  float: right;
}

/* Edit Button Styles */
#workorder_edit_btn {
  background-color: #ffc107;
  color: #333;
  display: inline-block;
  margin: -3px;
    padding: 7px 12px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  float: right;
}

/* Delete Button Styles */
#deleteWorkorderBtn {
  background-color: #f44336;
  color: white;
  display: inline-block;
  margin: 5px;
  padding: 10px 20px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Request for Close Workorder Button Styles */
#request_send {
  background-color: #d32f2b;
  color: white;
  display: inline-block;
  margin: 5px;
  padding: 10px 20px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

/* Table Styles */
table {
  width: 100%;
  border-collapse: collapse;
  border: 2px solid #3498db;
}

/* Table Header Styles */
table th {
  background-color: #3498db;
  color: white;
  font-weight: bold;
  text-align: center;
  padding: 10px;
  border: 2px solid #3498db;
}

/* Table Row Styles */
table td {
  background-color: #f1f2f6;
  color: #333;
  text-align: center;
  padding: 10px;
  border: 2px solid #3498db;
}

/* Hover Effect for Table Rows */
table tr:hover {
  background-color: #e74c3c;
  color: white;
}

/* Custom Styles for Headings */
.wkorderhead {
  background-color: #3498db;
  color: white;
}

.wksubhead {
  background-color: #f2f2f2;
  font-weight: bold;
  text-align: center;
}

.wksubhead2 {
  background-color: #f2f2f2;
  font-weight: bold;
  text-align: center;
}

/* Add this to your existing CSS */

#workorderStatus__container {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

#deleteWorkorderBtn, #request_send {
  background-color: #d32f2b;
  color: white;
  display: inline-block;
  margin: 5px;
  padding: 10px 20px;
  font-weight: bold;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

#deleteWorkorderBtn:hover, #request_send:hover {
  background-color: #b22824;
  color: white;
}

/* Responsive Styles */
@media (max-width: 768px) {
  .container {
    padding: 17px;
 
    width: 373px;
    margin-left: -20px !important;
  }

  .filter-handle {
    width: 100%;
    max-width: 100%;
  }

  button#close_workorder {
    width: 100%;
  }

  .workorderActionStatus,
  .select-button,
  .add-button,
  #request_send,
  #openWorkorder,
  #deleteWorkorderBtn {
    display: block;
    width: 100%;
    margin: 5px 0;
  }

  /* Center align table headers and data for smaller screens */
  table th,
  table td {
    text-align: center;
  }
}



</style>

<div class="main">
<div class="container" id="view_workorder">
    <div id='section_viewworkorder' class="table-responsive-md">
    <div class="title1">
            <p style="font-size: 1.75rem; margin-left: 23px; margin-top: 17px; font-weight: 600;">View Workorder</p>
        </div>
        <div class="text-center my-5">
            <!-- <span>Select Workorder Number</span> -->
            <span class="font-weight-display-6" style="font-size: larger; font-weight: 500;">Select Workorder Number :</span>

            <select name="workorder" id="workorderids" class="filter-handle" onchange="myfunction()" style="width:305px;">
                <?php
                foreach ($workorderdetails as $workid) {
                    // var_dump($zones);
                    echo '<option value="' . $workid['workorder_no'] . '">' . $workid['workorder_no'] . '-' . $workid['client_name'] . '</option>';
                } ?>

            </select>
        </div>
        <?php
        if ($this->session->userdata('usertype') == 'admin') {
        ?>
            <div id="workorderStatus__conatiner">

                <form method="post" autocomplete="off" action="<?= base_url('Workorder/closeWorkOrderStatus') ?>">
                    <input type="text" value="" name="currentWorkorderNo" readonly id="currentWorkOrderNo" style="display: none;" />
                    <input type="text" value="" name="workorderStatus" readonly id="workorderStatus" style="display: none;" />
                    <input type="submit" class="workorderActionStatus" id="closeWorkorder" value="Close Workorder" />

                    <input type="submit" class="workorderActionStatus" id="openWorkorder" value="Open Workorder" />
                    <input type="text" readonly id="deleteWorkorderBtn" value="Delete Workorder" />
                    <button id="close_workorder" style="border: none; color: white ; background: cadetblue;height:41px;border-radius: 4px;float: right;" >Request for close workorder</button>
                </form>
            
                <form method="post" id="deleteWorkOrderForm" autocomplete="off" action="<?= base_url('Workorder/deleteWorkorderNumber') ?>">
                    <input type="text" value="" name="currentWorkorderNumber" readonly id="currentWorkOrderNumber" style="display: none;" />
            
                </form>
                <!-- Delete Workorder confirmation -->
                <!-- <div id="deleteWorkOrderConfirmationBox">
                    <div id="deleteConfirmation">
                        <h5 id="deleteConfirmation__msg">Are you sure to delete this Workorder?</h5>
                        <div id="deleteConfirmation__buttons">
                            <span id="deleteConfirmation__buttons__yes">Yes</span>
                            <span id="deleteConfirmation__buttons__no">No</span>
                        </div>
                    </div>
                </div>

            </div> -->

            <!-- <button class="workorderActionStatus" id="closeWorkorder">Close Workorder</button> -->
            <!-- <button class="workorderActionStatus" id="openWorkorder">Open Workorder</button> -->
            <!-- <button id="deleteWorkorderBtn">Delete Workorder</button> -->

        <?php
        }
        ?>
        <?php if ($this->session->flashdata('success')) { ?>
            <?php $this->session->flashdata('success') ?>
        <?php } ?>

        <?php if ($this->session->flashdata('error')) { ?>
            <?php $this->session->flashdata('error') ?>
        <?php } ?>

        <script>
            let loggedInUserId = "<?php echo $this->session->userdata('userId') ?>"
            // alert(loggedInUserId)
        </script>

        <?php


        if ($this->session->flashdata('success')) {    ?>

            <script>
                alert("<?php echo $this->session->flashdata('success') ?>")
            </script>
        <?php } ?>
        <div id="viewWorkOrderTable__Container">
            <table class="table table-bordered my-5" id="viewWorkOrderTable">
                <thead class="viewtable">
                    <tr class="text-center text-white text-capitalize">
                        <th class="wkorderhead" colspan="8">Name
                            <?php
                            if ($this->session->userdata('usertype') == 'admin') {
                            ?>
                                <i class='bx bxs-message-square-edit' id='workorder_edit_btn'>
                                    <p style="position:absolute;"></p>
                                </i>
                                <button id="save_workorder_btn" style="background: red;
    width: 40px;
    height: 28px;
    color: rgb(51, 51, 51);
    display: none;
    padding: 4px 13px;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    float: right;
  "><i class='bx bxs-save'></i><span></span></button>
                            <?php
                            }
                            ?>


                        </th>


                    </tr>


                </thead>
                <tbody id="viewbody">
                    <?php
                    $workorder_number;
                    ?>
                <tbody id="viewbody">
                    <?php
                    $workorder_number;
                    ?>
                    <?php
                    $this->load->model('Workorder_model');
                    $data['name'] = $this->Workorder_model->getClientName();
                    foreach ($data['name']  as $name) {
                        $data['clientname'][] = array(
                            'name' => $name['name']
                        );
                        //print_r($data['clientname']);
                    }

                    if (!empty($oneworkorderdata)) {
                        foreach ($oneworkorderdata as $row) {
                            // print_r(end($oneworkorderdata));
                            // $workorder_no=$row['workorder_no'];
                            //  print_r($workorder_no);

                            $this->load->library('session');
                            $this->session->set_userdata(array('current_workorder_no' => $row['workorder_no']));

                    ?>
                            <tr class="viewrow">

                                <?php
                                $workorder_number = $row['workorder_no'];
                                ?>

                                <input type="text" value=" <?php echo $row['workorder_no']; ?> " id="workno" hidden />
                                <input type="text" value=" <?php echo $row['client_name']; ?> " id="workclnt" hidden />
                                <td colspan="2" class="wksubhead">Work Order No </td>


                                <td colspan="2"><?php echo $row['workorder_no']; ?> </td>
                                <td colspan="2" class="wksubhead">Created on </td>
                                <!--<td colspan="2"><?php echo $row['created_on']; ?></td>-->
                                <!-- changes made -->
                                <td colspan="2"><?php echo date('d-m-Y', strtotime($row['created_on'])); ?></td>
                            </tr>
                            <tr>
                                <td class="wksubhead">Legal Name / Trade Name </td>
                                <td colspan="7" class="text-center" id="clientNameNonEditable">
                                    <?php echo $row['client_name']; ?>
                                </td>
                                <td colspan="7" class="text-center" id="clientNameEditable" style="display: none;">
                                    <select id="clientNameEditableSelect">
                                        <option value="">Select</option>
                                        <?php foreach ($data['clientname'] as $clientnamerecord) : ?>
                                            <option value="<?= $clientnamerecord['name']; ?>" <?php echo ($row['client_name'] === $clientnamerecord['name']) ? 'selected' : '' ?>>
                                                <?= $clientnamerecord['name']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td class="wksubhead">Type of Work </td>
                                <td colspan="7" class="text-center"><?php echo $row['type_of_work']; ?> </td>
                            </tr>
                            <tr>
                                <td class="wksubhead">Partner in Charge </td>
                                <td colspan="7" class="text-center" id="partnerNonEditable">
                                    <?php echo $row['partner_in_charge']; ?> </td>
                                <td colspan="7" class="text-center" id="partnerEditable" style="display: none;">
                                    <select id="partnerEditableSelect">
                                        <option value="">Select</option>
                                        <option value="R.E. Balasubramanyam" <?php echo ($row['partner_in_charge'] === "R.E. Balasubramanyam") ? 'selected' : '' ?>>
                                            R.E. Balasubramanyam</option>
                                        <option value="A.V. Muralisharan" <?php echo ($row['partner_in_charge'] === "A.V. Muralisharan") ? 'selected' : '' ?>>
                                            A.V. Muralisharan</option>
                                        <option value="N.K.S. Bharath" <?php echo ($row['partner_in_charge'] === "N.K.S. Bharath") ? 'selected' : '' ?>>
                                            N.K.S. Bharath</option>
                                        <option value="Ashok S Navalgund" <?php echo ($row['partner_in_charge'] === "Ashok S Navalgund") ? 'selected' : '' ?>>
                                            Ashok S Navalgund</option>
                                    </select>
                                </td>

                            </tr>
                            <tr>
                                <td class="wksubhead">Start Date </td>
                                <td>

                                    <!--<input type="text" id="start_date" style="border:none" value="<?php echo $row['start_date']; ?>"
                            readonly />-->

                                    <!-- changes I have made in date -->
                                    <input type="text" id="start_date" style="border:none" value=" <?php echo date("d-m-Y", strtotime($row['start_date'])); ?>" readonly />
                                </td>

                                <td colspan="2" class="wksubhead">Targetted End Date </td>
                                <!-- Testing  -->
                                <!-- Edited Data  -->


                                <td>
                                    <input type="date" class="view_workorder_editable" id="targeted_date" name="targeted_date" value="<?php echo $row['targetted_end_date']; ?>" min="<?php echo date("Y-m-d") ?>" data-date-format="DD MMMM YYYY" />
                                </td>
                                <!-- Old Code-don't delete know untill new one working properly -->
                                <!-- <td> <?php echo $row['targetted_end_date']; ?> </td>  -->

                                <td class="wksubhead" colspan="2">Deadline</td>
                                <td>
                                    <input type="date" class="view_workorder_editable" id="deadline_date" name="deadline_date" value="<?php echo $row['deadline']; ?>" min="<?php echo date("Y-m-d") ?>" />


                                </td>

                                <!-- <td><?php echo $row['deadline']; ?> </td> -->
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8">No Data Found</td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr class="text-center text-white text-capitalize">
                        <th class="wkorderhead" colspan="8">Team Members
                            <!-- Start Working(22/06/23)-1 -->
                            <?php
                            if ($this->session->userdata('usertype') == 'admin'  && isset($row)) {
                            ?>
                                <button id="new_assign_btn" class="assign_btn">Assign</button>
                                <form method="post" autocomplete="off" action="<?= base_url('Workorder/updateData') ?>">
                                    <select id="selected_New_Assigned_Name" name="assign_to[]" hidden>
                                    </select>
                                    <select id="New_Assigned_Name_last_user" name="last_user[]" hidden></select>

                                    <input type="text" value="<?php echo $row['workorder_no']; ?>" name="workorder_number" hidden />

                                    <script>
                                        let workorder_number = "<?php echo $row['workorder_no']; ?>"
                                    </script>
                                    <input type="submit" id="new_assign_save_btn" value="Save" class="assign_btn" />
                                </form>

                                <!-- Test form for removing assign user -->
                                <form method="post" autocomplete="off" action="<?= base_url('Workorder/updateDataAfterDelete') ?>">
                                    <select id="delete_assign_user" name="remove_assign_user[]" hidden>
                                    </select>
                                    <input type="text" value="<?php echo $row['workorder_no']; ?>" name="workorder_number" hidden />
                                    <input type="submit" id="removeAssignUserBtn" value="Update" style="display:none" />
                                </form>
                            <?php
                            }
                            ?>
                            <!-- End Working(22/06/23) -->
                        </th>

                    </tr>
                    <tr class="wksubhead2">
                        <td colspan="2"></td>
                        <td colspan="2">Employee Code</th>
                        <td colspan="2">SRO Number</td>
                        <td colspan="2">Name </td>
                    </tr>
                    <?php
                    if (!empty($userdetails1)) {
                        foreach ($userdetails1 as $key => $row) {
                            // var_dump($key);
                            if ($key == 0) {
                    ?>
                                <script>
                                    let assign_user_name = []
                                    let assign_user_id = []
                                </script>
                                <tr>
                                    <td colspan="2" class="wksubhead">Lead Member </td>
                                    <td colspan="2"><?php echo $row['balunand_id_no']; ?> </td>
                                    <td colspan="2"><?php echo $row['student_reg_no']; ?> </td>
                                    <td colspan="2" class="assign_name" value="<?php echo $row['user_id']; ?>">
                                        <?php echo $row['name']; ?>
                                        <input type="text" value="<?php echo $row['user_id']; ?>" id="otheruserid" hidden />
                                        <!-- Delete assign user start -->

                                        <?php

                                        if ($this->session->userdata('usertype') == 'admin') {
                                        ?>
                                            <button id="deleteAssignUser" class="deleteMe_btn">X</button>
                                        <?php
                                        }
                                        ?>
                                        <!-- Delete assign user end -->

                                    </td>
                                    <script>
                                        assign_user_name.push("<?php echo $row['name']; ?>")
                                        assign_user_id.push("<?php echo $row['user_id']; ?>")
                                    </script>

                                    <input type="text" value="<?php echo $row['user_id']; ?>" id="leaduserid" hidden />

                                </tr>

                    <?php
                            }
                        }
                    }
                    ?>

                    <?php
                    if (!empty($userdetails1)) {
                        foreach ($userdetails1 as $key => $row) {
                            if ($key > 0) {
                    ?>
                                <tr>
                                    <th id="viewhead" colspan="2" class="wksubhead" style="color: black;">Others </th>
                                    <td colspan="2"><?php echo $row['balunand_id_no'];
                                                    $key ?></td>
                                    <td colspan="2"><?php echo $row['student_reg_no']; ?></td>
                                    <td colspan="2" class="assign_name" value="<?php echo $row['user_id']; ?>">
                                        <?php echo $row['name']; ?>
                                        <input type="text" value="<?php echo $row['user_id']; ?>" id="otheruserid" hidden />


                                        <!-- Delete assign user start -->

                                        <?php
                                        if ($this->session->userdata('usertype') == 'admin') {
                                        ?>
                                            <button id="deleteAssignUser" class="deleteMe_btn">X</button>
                                        <?php
                                        }
                                        ?>

                                        <!-- Delete assign user start -->
                                    </td>
                                    <script>
                                        assign_user_name.push("<?php echo $row['name']; ?>")
                                        assign_user_id.push("<?php echo $row['user_id']; ?>")
                                    </script>

                                    <input type="text" value="<?php echo $row['user_id']; ?>" id="otheruserid" hidden />
                                </tr>
                        <?php
                            }
                        }
                    } else {
                        ?>
                        <tr>
                            <td>No Data Found</td>
                        </tr>
                    <?php
                    }
                    ?>

                    <!-- Start Working(23/06/23)-2 -->
                    <tr id="new_assign_user_name_container" hidden>
                        <td colspan="8" id="new_assign_user_name">
                            <ul id="new_assign_user_name__list" name="assign_to[]">
                            </ul>
                        </td>
                    </tr>
                    <!-- End Working(23/06/23)-2 -->
                    <!-- Start Working(22/06/23)-2 -->
                    <tr id="new_assign_to_section">
                        <script>
                            let alreadyAssignUser = [];
                            let alreadyAssignUserId = [];
                        </script>

                        <!-- <script>
                        let testArray = [];
                        <?php foreach ($assign_to_id as $worksheetrecord) : ?>
                            testArray.push("<?php echo $worksheetrecord['remarks'] ?>")
                        <?php endforeach; ?>
                    </script> -->


                        <th colspan="8" id="new_assign_section__options">
                            <select id="new_assign_to_section__select">
                                <option id="default_value">Select</option>
                                <?php foreach ($assign_to2 as $worksheetrecord) : ?>
                                    <option value="<?= $worksheetrecord['user_id']; ?>"><?= $worksheetrecord['name']; ?>

                                    </option>

                                    <script>
                                        alreadyAssignUser.push("<?php echo  $worksheetrecord['user_id'] ?>");
                                        alreadyAssignUser.push("<?php echo $worksheetrecord['name'] ?>")
                                        alreadyAssignUserId.push("<?php echo  $worksheetrecord['user_id'] ?>")
                                    </script>
                                <?php endforeach; ?>
                            </select>
                            <button id="new_assign_user_addBtn">Add</button>
                        </th>
                    </tr>

                    <tr class="text-center text-white text-capitalize">
                        <th class="text-capitalize wkorderhead" colspan="8">Flow of work </th>
                    </tr>
                    <tr class="wksubhead2">
                        <td>Name of Employee </th>
                        <td>Date</td>
                        <td colspan="2">Description of Work Done </td>
                        <td>Start Time</td>
                        <td>End Time</td>
                        <td>Time Spent</td>
                        <td>Remarks</td>
                    </tr>
                    <?php
                    if (!empty($workesheetdata)) {
                        foreach ($workesheetdata as $row) {
                    ?>
                            <tr>
                                <td id="tableviewdata"><?php echo $row['name_of_employee']; ?></td>
                                <td> <?php echo date("d-m-Y", strtotime($row['date'])); ?> </td>
                                <td colspan="2"> <?php echo $row['work_description']; ?></td>
                                <td><?php echo $row['start_time']; ?></td>
                                <td><?php echo $row['end_time']; ?></td>
                                <td> <?php echo $row['spent_time']; ?></td>
                                <td><?php echo $row['remark']; ?></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="8">No Data Found</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- close workorder button -->
     
        <!-- <div id="refreshSection">
            <p>If not able to see Request for close workorder button,Please refresh the page</p>            
        </div>-->


    </div>
</div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function autoReload() {
        setTimeout(() => {
            location.reload()
            localStorage.removeItem('refreshPage')
        }, 200);
    }
    if (localStorage.getItem('refreshPage')) {
        autoReload()
    }

    let selectedWorkOrderId = document.getElementById('workorderids')
    let selectedValue = selectedWorkOrderId.options[selectedWorkOrderId.selectedIndex].text
    let selectedWorkOrder = '';
    for (let i = 0; i < selectedValue.length; i++) {
        if (selectedValue.charAt(i) != '-') {
            selectedWorkOrder += selectedValue.charAt(i)
        } else {
            break
        }
    }
    const url = "<?= base_url("workorder/view_workorder") ?>"
    const url_2 = "<?= base_url("Workorder/View_workorder/") ?>"
    const url_5 = "<?= base_url("Workorder/View_workorder/") ?>" + selectedWorkOrder
    const url_6 = "<?= base_url("workorder/view_workorder") ?>" + selectedWorkOrder

    if (window.location.href == url || window.location.href == url_2 || window.location.href == url_6) {
        localStorage.setItem('selectedte', selectedWorkOrder)
    }
    var name = ['naki', 'nuka'];
    $(".saveMe").click(function() {

        var name = $("#name").val();
        $.post(
            "../test.php", {
                name: name
            },
            function(response) {
                $("#res").html("response");
            }
        );
    })
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<script type="text/javascript">
    //alert('a' + workOrder);
    var data = <?php echo json_encode($workorderdetails); ?>;
    let newData = [];
    data.map((e) => {
        var e1 = e.workorder_no;
        var e2 = e.client_name;
        var obj = {
            e1,
            e2
        };
        newData.push(obj);
        // index = 0;
        // newData.forEach(myFunction);

        // function myFunction(item, index) {
        //     console.log(item);
        // }

        // let newOption = new Option('e1', 'e1');
        // let otherOption = new Option('e2', 'e2');
        // const select = document.querySelector('select');
        // select.add(newOption, otherOption);
    })
    // console.log(newData);




    //alert('b' + workClient);

    //alert(var1)
    // select = document.querySelector('#workorderids');
    // output = select.options[select.selectedIndex].value
    // //document.querySelector('.output').textContent = output;
    // output = workOrder;
    // alert(output);
</script>


<script type="text/javascript">
    jQuery(document).ready(function($) {

        const workOrder = document.getElementById("workno").value.trim();

        const workClient = document.getElementById("workclnt").value;

        const var1 = workOrder + '-' + workClient;

        //var var2 = document.getElementById("#workorderids");

        // console.log("<option value='" + var1 + "'</option>");

        // $('select[name="workorder"]').append(var1);

        // $("select[name='workorder']").find('option').val((var1).attr('selected', 'selected'));

        // $("select[name='workorder']").find('option').append(var1).attr('selecte d', 'selected');
        // //alert(var1);

        // var output = [];
        // console.log(newData);

        newData.map((element) => {
            // console.log(element.e1)
            var pending = workOrder;
            var d = element.e1;
            // console.log(d)
            // console.log(pending)
            var output = [];

            // $.each(newData, function(element, value) {
            // console.log(workOrder)
            // for (let d of newData) {


            if (d == `${pending}`) {

                // $.each(newData, function(element, value) {
                output.push('<option selected value="' + element + '" selected="selected">' +
                    var1 + '</option>');
                // });
                // });
                // $('#workorderids').html(output.join(" "));

                newData.map((ele) => {
                    var e3 = ele.e1 + "- " + ele.e2;
                    if (ele.e1 != `${pending}`) {
                        output.push('<option  value="' + ele.e1 + '">' +
                            e3 + '</option>');

                        //
                    }
                })
                $('#workorderids').html(output.join(" "));
                // console.log(output)
            }
            // console.log(newArray)
            // }
            // });
        })

        // $.each(newData, function(key, value) {
        //     output.push('<option value="' + key + '">' + var1 + '</option>');
        // });

        // $('#workorderids').html(output.join(" ")).prop('selected', true);

    });
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />



<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    function myfunction() {


        var workId = document.getElementById("workorderids").value;

        const url = "<?= base_url("Workorder/View_workorder") ?>" + '/' + workId;
        localStorage.setItem('selectedte', workId);
        window.location.href = url;
    }


    // localStorage.removeItem('selectedtem');

    if (localStorage.getItem('selectedtem')) {

        // alert(localStorage.getItem('selectedtem'));

        //document.getElementById('workorderids').options[localStorage.getItem('selectedtem')].selected = true;

        $('select').find('option[value=' + localStorage.getItem('selectedtem') + ']').attr('selected', 'selected');

        localStorage.setItem('selectedtem', '');

    }
</script>


<script>
    $(document).ready(function() {

        //change selectboxes to selectize mode to be searchable
        $(".filter-handle").select2();
    });
</script>



<!-- Edit for date button -->

<script>
    let view_workorder_editable = document.querySelector('.view_workorder_editable');
    let work_order_edit_btn = document.getElementById('workorder_edit_btn');


    // Start Date
    let start_date = document.getElementById('start_date').value
    //  deadline Date Value
    let deadline_date = document.getElementById('deadline_date').value;
    //  targeted Date Value
    let targeted_date = document.getElementById('targeted_date').value;

    let clientNameEditable = document.getElementById('clientNameEditable');
    let clientNameEditableSelect = document.getElementById('clientNameEditableSelect');
    let clientNameNonEditable = document.getElementById('clientNameNonEditable');

    let partnerEditable = document.getElementById('partnerEditable');
    let partnerEditableSelect = document.getElementById('partnerEditableSelect');
    let partnerNonEditable = document.getElementById('partnerNonEditable');


    document.getElementById('targeted_date').setAttribute("min", start_date)
    document.getElementById('targeted_date').setAttribute("max", deadline_date)

    document.getElementById('deadline_date').setAttribute("min", start_date)


    document.getElementById('targeted_date').addEventListener('change', function() {
        let deadline_date = document.getElementById('deadline_date').value;
        let targeted_date = document.getElementById('targeted_date').value;
        if (targeted_date > deadline_date) {
            // alert('Targetted date cannot be greater than deadline date')
        }
    })


    // Targeted Date
    view_workorder_editable.setAttribute('readonly', 'readonly');
    view_workorder_editable.style.border = "0px"
    //Deadline Date
    document.getElementById('deadline_date').setAttribute('readonly', 'readonly');
    document.getElementById('deadline_date').style.border = "0px";

    //View Workorder Edit button
    work_order_edit_btn.addEventListener('click', function() {
        // Tageted Date
        view_workorder_editable.removeAttribute('readonly');
        view_workorder_editable.style.border = "1px solid black";
        //Deadline Date
        document.getElementById('deadline_date').removeAttribute('readonly');
        document.getElementById('deadline_date').style.border = "1px solid black";
        // edit button
        work_order_edit_btn.style.display = "none";
        // save button
        document.getElementById('save_workorder_btn').style.display = "block";

        clientNameNonEditable.style.display = 'None';
        clientNameEditable.style.removeProperty('display');

        partnerNonEditable.style.display = 'None';
        partnerEditable.style.removeProperty('display');


    })
    // View workorder Save button
    let save_workorder_btn = document.getElementById('save_workorder_btn')
    save_workorder_btn.addEventListener('click', function() {
        // Targeted Date
        view_workorder_editable.setAttribute('readonly', 'readonly');
        view_workorder_editable.style.border = "0px"
        //Deadline Date
        document.getElementById('deadline_date').setAttribute('readonly', 'readonly');
        document.getElementById('deadline_date').style.border = "0px";
        //Edit button
        work_order_edit_btn.style.display = "block";
        // Save Button
        save_workorder_btn.style.display = "none";
        // alert('Save Success Fully');
        let deadline_date = document.getElementById('deadline_date').value;
        let targeted_date = document.getElementById('targeted_date').value;
        //   let editedDataArray=[];
        //   editedDataArray.push(deadline_date);
        //   editedDataArray.push(targeted_date);
        //   console.log(editedDataArray);

        //    document.getElementById('targeted_date_data').value=targeted_date;
        //    document.getElementById('deadline_date_data').value=deadline_date;


    })

    const button = document.getElementById('save_workorder_btn');

    // Add a click event listener to the button
    button.addEventListener('click', () => {
        var workOrderNo = document.getElementById('workno');
        var workOrderNoValue = workOrderNo.value.trim();
        console.log(workOrderNoValue);

        var targetedDate = document.getElementById('targeted_date');
        var targetedDateValue = targetedDate.value;
        console.log(targetedDateValue);

        var deadlineDate = document.getElementById('deadline_date');
        var deadlineDateValue = deadlineDate.value;
        console.log(deadlineDateValue);

        var clientName = document.getElementById('clientNameEditableSelect');
        var clientNameValue = clientName.options[clientName.selectedIndex].text;
        document.getElementById('clientNameNonEditable').innerText = clientNameValue;

        var partner = document.getElementById('partnerEditableSelect');
        var partnerValue = partner.options[partner.selectedIndex].text;
        document.getElementById('partnerNonEditable').innerText = partnerValue;



        fetch('http://localhost/kriyasheela-p2/kriyasheela/index.php/Workorder/update_date?workorder_no=' +
                workOrderNoValue + '&targeted_date=' + targetedDateValue + '&deadline_date=' + deadlineDateValue +
                '&client_name=' + clientName.value + '&partner_in_charge=' + partner.value)

            .then(response => response.json())
            .then(data => {
                // Process the received data here
                console.log(data);
            })
            .catch(error => {
                // Handle any errors that occur during the request
                console.error('Error:', error);
            });

        clientNameNonEditable.style.removeProperty('display');
        clientNameEditable.style.display = 'None';
        partnerNonEditable.style.removeProperty('display');
        partnerEditable.style.display = 'None';


    });

    const reloadButton = document.getElementById('save_workorder_btn');
    // Add a click event listener to the button
    reloadButton.addEventListener('click', function() {
        // Reload the page
        location.reload();
    });
</script>



<!-- Closed workorder script -->
<script>
    const close = document.getElementById('close_workorder');

    // Add a click event listener to the button
    close.addEventListener('click', () => {
        <?php
        if ($this->session->userdata('usertype') == 'admin') {
        ?>
            if (newAssignNameArray.length != "") {

                // newAssignNameArray.map((x)=>{
                for (let i = 0; i < newAssignNameArray.length; i++) {

                    if (newAssignNameArray[i] == loggedInUserId) {

                        var workOrderNo = document.getElementById('workno');
                        var workOrderNoValue = workOrderNo.value.trim();

                        document.getElementById('close_workorder').innerHTML = "Request Sent";
                        document.getElementById('close_workorder').style.background = "green";
                        fetch('http://localhost/kriyasheela-p2/kriyasheela/index.php/Workorder/close_work_order?workorder_no=' +
                                workOrderNoValue)
                            .then(response => response.json())
                            .then(data => {
                                // Process the received data here
                                console.log(data);
                            })
                            .catch(error => {
                                // Handle any errors that occur during the request
                                console.error('Error:', error);
                            });
                        break;
                    } else {

                        // alert('You are not assigned for this workorder')
                        // break;
                    }

                }

            } else {
                alert('No User is assigned to this workorder')
            }
        <?php

        } ?>

        <?php
        if (!($this->session->userdata('usertype') == 'admin')) {
        ?>
            var workOrderNo = document.getElementById('workno');
            var workOrderNoValue = workOrderNo.value.trim();

            document.getElementById('close_workorder').innerHTML = "Request Sent";
            document.getElementById('close_workorder').style.background = "green";
            fetch('http://localhost/kriyasheela-p2/kriyasheela/index.php/Workorder/close_work_order?workorder_no=' +
                    workOrderNoValue)
                .then(response => response.json())
                .then(data => {
                    // Process the received data here
                    console.log(data);
                })
                .catch(error => {
                    // Handle any errors that occur during the request
                    console.error('Error:', error);
                });



        <?php

        } ?>


    });
</script>


<!-- deadline notification code -->

<script>
    var workorder = document.getElementById('workno');
    var workorderno = workorder.value.trim();
    var targetted = document.getElementById('targeted_date');
    var targetteddate = targetted.value.trim();
    var deadline = document.getElementById('deadline');
    var deadlinedate = deadline.value.trim();
    fetch('http://localhost/kriyasheela-p2/kriyasheela/index.php/Workorder/deadline?workorder_no=' +
            workorderno + '&targeted_date=' +
            targetteddate + '&deadline_date=' + deadlinedate)


        .then(response => response.json())
        .then(data => {
            // Process the received data here
            console.log(data);
        })
        .catch(error => {
            // Handle any errors that occur during the request
            console.error('Error:', error);
        });
</script>




<!-- Assign to new user code -->


<script>
    let assignedUserId = [];
    let isUserAssigned = true;
    // Save button 
    document.getElementById('new_assign_save_btn').addEventListener('click', function(event) {
        let select = document.getElementById('new_assign_to_section__select')
        let selectData = select.options[select.selectedIndex].value;
        let deleteBtnClass = document.getElementsByClassName('deleteMe_btn');
        for (let i = 0; i < deleteBtnClass.length; i++) {
            deleteBtnClass[i].style.opacity = 0;
        }
        if (isUserAssigned) {
            event.preventDefault();
            alert('No Changes Made')
            document.getElementById('new_assign_save_btn').style.display = 'none' // Save Button
            document.getElementById('new_assign_btn').style.display = 'block' // Assign Button
            document.getElementById('new_assign_to_section').style.display = 'none' // Assign new user section 
            document.getElementById('new_assign_user_name_container').setAttribute('hidden', 'hidden') // Selected n
        } else {

            document.getElementById('new_assign_save_btn').style.display = 'none' // Save Button
            document.getElementById('new_assign_btn').style.display = 'block' // Assign Button
            document.getElementById('new_assign_to_section').style.display = 'none' // Assign new user section 
            document.getElementById('new_assign_user_name_container').setAttribute('hidden',
                'hidden') // Selected new assign user contaner 
        }

    })

    // Assign button
    document.getElementById('new_assign_btn').addEventListener('click', function() {

        let deleteBtnClass = document.getElementsByClassName('deleteMe_btn');
        for (let i = 0; i < deleteBtnClass.length; i++) {
            deleteBtnClass[i].style.opacity = 1;
            deleteBtnClass[i].style.zIndex = "999";
        }
        document.getElementById('new_assign_save_btn').style.display = 'block' // Save Button
        document.getElementById('new_assign_btn').style.display = 'none' // Assign Button
        document.getElementById('new_assign_to_section').style.display = 'block' // Assign new user section   
        document.getElementById('new_assign_user_name_container').removeAttribute(
            'hidden') // Selected new assign user contaner  
    })

    //Selecting new user for workorder//
    //Storing selected names into an array
    let newAssignNameArray = []
    // new user
    let newUser = []
    document.getElementById('new_assign_user_addBtn').addEventListener('click', function(e) {
        e.preventDefault();

        //Creating new li element
        let li = document.createElement('li')
        //Getting data from dropdown
        let select = document.getElementById('new_assign_to_section__select')
        let selectData = select.options[select.selectedIndex].text;
        let selectDataValue = select.options[select.selectedIndex].value;
        let isPresent = false;
        newAssignNameArray.map((x) => {
            if (x == selectDataValue) {
                alert('Already Exist!!!')
                isPresent = true;
            }
        })
        var id_Number = 0;
        if (!li.id) {
            li.id = id_Number;
            id_Number++;
        }

        if (selectData != 'Select' && isPresent == false) {
            newAssignNameArray.push(select.options[select.selectedIndex].value)
            newUser.push(select.options[select.selectedIndex].value)
            isUserAssigned = false;
            let textNode = document.createTextNode(selectData)
            // Adding textNode into li
            li.appendChild(textNode)
            //Creating span tag
            let span = document.createElement('span')
            let spanIcon = document.createTextNode('\u00D7')
            span.className = "closeIcon"
            span.appendChild(spanIcon)
            li.appendChild(span)
            li.value = selectDataValue
            document.getElementById('new_assign_user_name__list').appendChild(li)
            var closeItem = document.getElementsByClassName('closeIcon');
            var i;
            let isDelete = false;
            for (i = 0; i < closeItem.length; i++) {
                closeItem[i].onclick = function() {
                    let div = this.parentElement;
                    let id_To_Delete = div.id;
                    let deleted_Item_Index = newAssignNameArray.indexOf(div.value.toString());
                    newAssignNameArray.splice(deleted_Item_Index, 1);

                    assignNewUser(newAssignNameArray);
                    div.remove()
                    select.options[select.options.value = `${test_value}`].style.display = "block";
                }
            }
            if (!isDelete) {
                assignNewUser(newAssignNameArray)
            }

            function assignNewUser(data) {
                let selected_New_Assigned_Name = document.getElementById('selected_New_Assigned_Name');
                let New_Assigned_Name_last_user = document.getElementById('New_Assigned_Name_last_user')
                let newOptionForLastUser = new Option(newUser);
                let newOption = new Option(data);
                New_Assigned_Name_last_user.add(newOptionForLastUser, undefined)
                selected_New_Assigned_Name.add(newOption, undefined);
                for (let i = 0; i < selected_New_Assigned_Name.options.length; i++) {
                    selected_New_Assigned_Name.options[i].selected = true;
                }
                for (let i = 0; i < New_Assigned_Name_last_user.options.length; i++) {
                    New_Assigned_Name_last_user.options[i].selected = true;
                }
            }
            select.options[select.selectedIndex].style.display = "none"
            document.getElementById('default_value').selected = true;
        }
        //array to store the selected user from the dropdown list
        console.log(newUser)
    })
    // Storing already assign user name and user id
    let alreadyAssignUserObject = {}
    for (let i = 0; i < alreadyAssignUser.length; i += 2) {
        const key = alreadyAssignUser[i]
        const value = alreadyAssignUser[i + 1]
        alreadyAssignUserObject[key] = value
    }
    // For each user name which is already assign, we are adding it into array 'newAssignNameArray'
    // which we are using to update the assign to column
    assign_user_name.map((x) => {
        //Iterating through 'alreadyAssignUserObject' object
        for (let [key, value] of Object.entries(alreadyAssignUserObject)) {
            if (value == x) { // if username(already assigned) is equal to username present in username list
                newAssignNameArray.push(key) // adding respective user id to an array
            }
        }
    })
    // Removing or Deleting assigned user
    let deleteMe_btn = document.getElementsByClassName('deleteMe_btn');
    let i;
    let userDeleted;
    let selectWorkorder = document.getElementById("workorderids");
    let workid = selectWorkorder.options[selectWorkorder.options.selectedIndex].text
    assignedUserId = newAssignNameArray;
    let remainingUser = newAssignNameArray
    for (i = 0; i < deleteMe_btn.length; i++) {
        deleteMe_btn[i].onclick = function() {
            let parentElement = this.parentNode;
            let value = parentElement.textContent;
            let updatedValue = value.replace('X', '')
            parentElement.style.color = "red"
            this.style.display = "none"
            document.getElementById('new_assign_btn').style.display = "none"
            document.getElementById('new_assign_save_btn').style.display = "none"
            document.getElementById('new_assign_to_section').style.display = "none"
            document.getElementById('new_assign_user_name_container').style.display = "none"
            document.getElementById('removeAssignUserBtn').style.display = "inline"
            let result = 0;
            for (let [key, value] of Object.entries(alreadyAssignUserObject)) {
                if (value == updatedValue.trim()) {
                    remainingUser = remainingUser.filter((x) => {
                        userDeleted = key;
                        return x != key
                    })
                    if (remainingUser == "") {
                        remainingUser = null
                    }
                    let selected_New_Assigned_Name = document.getElementById('delete_assign_user');
                    let newOption = new Option(remainingUser);
                    // alert(`User  is ${userDeleted} remove from workorder number ${workid} ` )
                    selected_New_Assigned_Name.add(newOption, undefined);
                    for (let i = 0; i < selected_New_Assigned_Name.options.length; i++) {
                        selected_New_Assigned_Name.options[i].selected = true;
                    }
                }
            }
        }
    }
</script>
<!-- Close WorkOrder Script -->
<script>
    let closeWorkorderNumbers = localStorage.getItem('closeWorkorderNumbers')
    let result = JSON.string
    let closeWorkNo = closeWorkorderNumbers.split(",")
    // removing duplicates present in closeWorkNo array
    function removeDuplicates(closeWorkNo) {
        return [...new Set(closeWorkNo)]
    }
    //Reassign with unique element
    closeWorkNo = removeDuplicates(closeWorkNo)
    let openWorkorder = document.getElementById('openWorkorder');
    let closeWorkorder = document.getElementById('closeWorkorder');
    document.getElementById('closeWorkorder').style.display = "none !important"
    let workOrderStat = <?php echo json_encode($workorderStatus); ?>;

    function workorderStatusFun() {
        if (assignedUserId.length == 0) {
            // hidding assign to
            document.getElementById('new_assign_btn').style.display = "none"
            // hidding edit button
            document.getElementById('workorder_edit_btn').style.display = "none"
            //hidding request for close workorder button
            document.getElementById('close_workorder').style.display = "none"
            //    openWorkorder.style.visibility = "visible";
        } else {
            //    closeWorkorder.style.visibility = "visible";
        }
        //On Clicking for openWorder
        openWorkorder.addEventListener('click', function() {
            //showing assign to button
            document.getElementById('new_assign_btn').style.display = "block"
            //showing - edit button        
            document.getElementById('workorder_edit_btn').style.display = "block"
            // showing - request for close workorder button
            document.getElementById('close_workorder').style.display = "block"
            //showing - closeworkorder button
            closeWorkorder.style.visibility = "visible";
            // Hidding openWorkorder button
            openWorkorder.style.visibility = "hidden";
            // closeworkorder status
            document.getElementById('workorderStatus').value = "open"
            // localStorage.setItem('workOrderStatus','open')
            document.getElementById('currentWorkOrderNo').value = workorder_number
        })
        //  On Clicking for closeWorder
        closeWorkorder.addEventListener('click', function() {
            // closeworkorder status
            document.getElementById('workorderStatus').value = "closed"
            // localStorage.setItem('workOrderStatus','closed')
            document.getElementById('currentWorkOrderNo').value = workorder_number
            // showing openworkorder button
            openWorkorder.style.visibility = "visible";
            //hidding assign to button
            document.getElementById('new_assign_btn').style.display = "none"
            //hidding edit button
            document.getElementById('workorder_edit_btn').style.display = "none"
            //hidding request for close workorder button
            document.getElementById('close_workorder').style.display = "none"

        })

    }

    //  close button show only if atleast somone request to close it
    var workId = localStorage.getItem('selectedte');
    closeWorkNo.map((element) => {

        workOrderStat.map((ele) => {

            if (closeWorkNo != '' && element == workId && ele.workorder_no == workId) {


                if (workId == element && ele.status == 'open') {
                    document.getElementById('close_workorder').style.display = "none"
                    closeWorkorder.style.visibility = "visible";
                    openWorkorder.style.visibility = "hidden";
                    //showing assign to button
                    document.getElementById('new_assign_btn').style.display = "block"
                    //showing edit button        
                    document.getElementById('workorder_edit_btn').style.display = "block"
                    //showing request for close workorder button
                    document.getElementById('close_workorder').style.display = "block"


                } else if (element == workId && ele.status == 'closed') {
                    closeWorkorder.style.visibility = "hidden";
                    let closedWorkOrderNumber = localStorage.getItem('closeWorkorderNumbers')
                    let closedWorkOrderNumberArray = closedWorkOrderNumber.split(",")
                    let localWorkOrder = localStorage.getItem('selectedte')
                    closedWorkOrderNumberArray.map(workorderNumber => {
                        var url_3 = "<?= base_url("workorder/view_workorder/") ?>" + workorderNumber;
                        var url_4 = "<?= base_url("Workorder/View_workorder/") ?>" + workorderNumber;
                        // if(window.location.href==url_3||window.location.href==url_4){                    
                        openWorkorder.style.visibility = "visible";
                        //   }
                    })
                    //hidding assign to button
                    document.getElementById('new_assign_btn').style.display = "none"
                    //hidding edit button
                    document.getElementById('workorder_edit_btn').style.display = "none"
                    //hidding request for close workorder button
                    document.getElementById('close_workorder').style.display = "none"
                }
                workorderStatusFun()
            }
        })

    })


    //    disabling close workorder request button
</script>
<script>
    var workId = localStorage.getItem('selectedte');
    // workorder number and status from database
    let workorderStats = <?php echo json_encode($workorderStatus); ?>;
    // workorderStats.map((x) => {
    // //  alert('Here')
    //     if (x.workorder_no == workId && x.status == 'closed') {    
    //         document.getElementById('close_workorder').style.display = "none"
    //     }
    // })
</script>
<!-- For Delete Workorder Number -->
<script>
    document.getElementById('deleteWorkorderBtn').addEventListener('click', function() {
        document.getElementById('deleteWorkOrderConfirmationBox').style.visibility = "visible";
        var workId = localStorage.getItem('selectedte');
        document.getElementById('currentWorkOrderNumber').value = workId;
    })
    // alert('lioo')
</script>
<script>
    function urlWorkOrder() {
        let currentURL = window.location.href
        let lastURLIndex = currentURL.length - 1
        let URL_workOrder = '';
        for (let i = lastURLIndex; i >= 60; i--) {
            if (currentURL.charAt(i) != '/') {
                URL_workOrder += currentURL.charAt(i)
            } else {
                break;
            }
        }
        let URL_workOrder_final = URL_workOrder.split("").reverse().join("")
        return URL_workOrder_final;
    }

    // alert(window.location.href)
    let url_3, url_4
    let closedWorkOrderNumber = localStorage.getItem('closeWorkorderNumbers')
    let closedWorkOrderNumberArray = closedWorkOrderNumber.split(",")
    let localWorkOrder = localStorage.getItem('selectedte')
    closedWorkOrderNumberArray.map(workorderNumber => {
        url_3 = "<?= base_url("workorder/view_workorder/") ?>" + workorderNumber;
        url_4 = "<?= base_url("Workorder/View_workorder/") ?>" + workorderNumber;

        if (window.location.href == url_3) {
            localStorage.setItem('selectedte', workorderNumber)
        }

        // localStorage.setItem('selectedte',urlWorkOrder())          
        if (window.location.href == url_5 || window.location.href == url_6) {
            localStorage.setItem('selectedte', selectedWorkOrder)
        }
    })
</script>

<script>
    // Delete Workorder Confirmation
    let noButton = document.getElementById('deleteConfirmation__buttons__no')
    let yesButton = document.getElementById('deleteConfirmation__buttons__yes')
    let deleteWorkOrderConfirmationBox = document.getElementById('deleteWorkOrderConfirmationBox')
    noButton.addEventListener('click', function() {
        deleteWorkOrderConfirmationBox.style.visibility = "hidden";
    })
    yesButton.addEventListener('click', function() {
        let deleteWorkOrderForm = document.getElementById('deleteWorkOrderForm')
        deleteWorkOrderForm.submit();
    })
</script>