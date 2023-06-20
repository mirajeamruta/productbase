<div class="container">
    <div id='section_viewworkorder' class="table-responsive-md">
        <h2 class=" text-center mb-2">View Workorder</h2>
        <div class="text-center my-5">
            <!-- <span>Select Workorder Number</span> -->
            <span class="font-weight-bold display-6">Select Workorder Number</span>

            <select name="workorder" id="workorderids" class="filter-handle" onchange="myfunction()" style="width:305px;">
                <?php
                foreach ($workorderdetails as $workid) {
                    // var_dump($zones);
                    echo '<option value="' . $workid['workorder_no'] . '">' . $workid['workorder_no'] . '-' . $workid['client_name'] . '</option>';
                } ?>

            </select>




        </div>
        <table class="table table-bordered my-5">
            <thead class="viewtable">
                <tr class="text-center text-white text-capitalize">
                    <th class="wkorderhead" colspan="8">Name
                        <i class='bx bxs-message-square-edit' id='workorder_edit_btn'>
                            <p>Edit</p>
                        </i>
                        <button id="save_workorder_btn" onclick="addEventListener()"><i class='bx bxs-save'></i><span>Save</span></button>


                    </th>


                </tr>

            </thead>
            <tbody id="viewbody">
                <?php
                if (!empty($oneworkorderdata)) {
                    foreach ($oneworkorderdata as $row) {
                        // print_r(end($oneworkorderdata));
                        // $workorder_no=$row['workorder_no'];
                        //  print_r($workorder_no);

                ?>
                        <tr class="viewrow">

                            <input type="text" value=" <?php echo $row['workorder_no']; ?> " id="workno" hidden />
                            <input type="text" value=" <?php echo $row['client_name']; ?> " id="workclnt" hidden />
                            <td colspan="2" class="wksubhead">Work Order No </td>


                            <td colspan="2"><?php echo $row['workorder_no']; ?> </td>
                            <td colspan="2" class="wksubhead">Created on </td>
                            <td colspan="2"><?php echo $row['created_on']; ?></td>
                        </tr>
                        <tr>
                            <td class="wksubhead">Legal Name / Trade Name </td>
                            <td colspan="7" class="text-center"> <?php echo $row['client_name']; ?> </td>
                        </tr>
                        <tr>
                            <td class="wksubhead">Type of Work </td>
                            <td colspan="7" class="text-center"><?php echo $row['type_of_work']; ?> </td>
                        </tr>
                        <tr>
                            <td class="wksubhead">Partner in Charge </td>
                            <td colspan="7" class="text-center"> <?php echo $row['partner_in_charge']; ?> </td>
                        </tr>
                        <tr>
                            <td class="wksubhead">Start Date </td>
                            <td >
                              
                                <input type="text"id="start_date" style="border:none" value="<?php echo $row['start_date']; ?>" readonly/>
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
                    <th class="wkorderhead" colspan="8">Team Members </th>
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
                            <tr>
                                <td colspan="2" class="wksubhead">Lead Member </td>
                                <td colspan="2"><?php echo $row['balunand_id_no']; ?> </td>
                                <td colspan="2"><?php echo $row['student_reg_no']; ?> </td>
                                <td colspan="2"><?php echo $row['name']; ?> </td>
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
                                <th id="viewhead" colspan="2" class="wksubhead">Others </th>
                                <td colspan="2"><?php echo $row['balunand_id_no'];
                                                $key ?></td>
                                <td colspan="2"><?php echo $row['student_reg_no']; ?></td>
                                <td colspan="2"><?php echo $row['name']; ?> </td>
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
                            <td> <?php echo $row['date']; ?> </td>
                            <td colspan="2"> <?php echo $row['work_description']; ?></td>
                            <td><?php echo $row['start_time']; ?></td>
                            <td><?php echo $row['end_time']; ?></td>
                            <td> <?php echo $row['spent_time']; ?></td>
                            <td><?php echo $row['remarks']; ?></td>
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
        <button id="close_workorder">Close Workorder</button>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
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

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

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

        window.location.href = url;

        localStorage.setItem('selectedtem', workId);



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

<script>
    let view_workorder_editable = document.querySelector('.view_workorder_editable');
    let work_order_edit_btn = document.getElementById('workorder_edit_btn');


    // Start Date
    let start_date = document.getElementById('start_date').value
     //  deadline Date Value
     let deadline_date = document.getElementById('deadline_date').value;
 //  targeted Date Value
   let targeted_date = document.getElementById('targeted_date').value;

    document.getElementById('targeted_date').setAttribute("min",start_date)
    document.getElementById('targeted_date').setAttribute("max",deadline_date)

    document.getElementById('deadline_date').setAttribute("min",start_date)


    document.getElementById('targeted_date').addEventListener('change',function(){
        let deadline_date = document.getElementById('deadline_date').value;
        let targeted_date = document.getElementById('targeted_date').value;
           if(targeted_date>deadline_date){
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

        fetch('http://localhost/kriyasheela-p2/kriyasheela/index.php/Workorder/update_date?workorder_no=' +
                workOrderNoValue + '&targeted_date=' +
                targetedDateValue + '&deadline_date=' + deadlineDateValue)
            .then(response => response.json())
            .then(data => {
                // Process the received data here
                console.log(data);
            })
            .catch(error => {
                // Handle any errors that occur during the request
                console.error('Error:', error);
            });
    });
</script>

<script>
    // For workorder close request button
    document.getElementById('close_workorder').addEventListener('click', function() {
        // document.getElementById('request_message').style.display="block"
        document.getElementById('close_workorder').innerHTML = "Request Sent";
        document.getElementById('close_workorder').style.background = "green";
        let seleectedData = document.getElementById('workorderids')
        console.log(seleectedData.options[seleectedData.selectedIndex].value)
    })
</script>