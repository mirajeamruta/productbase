    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" integrity="sha256-XPTBwC3SBoWHSmKasAk01c08M6sIA5gF5+sRxqak2Qs=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" integrity="sha256-XPTBwC3SBoWHSmKasAk01c08M6sIA5gF5+sRxqak2Qs=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha256-98vAGjEDGN79TjHkYWVD4s87rvWkdWLHPs5MC3FvFX4=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha256-xaF9RpdtRxzwYMWg4ldJoyPWqyDPCRD0Cv7YEEe6Ie8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha256-xaF9RpdtRxzwYMWg4ldJoyPWqyDPCRD0Cv7YEEe6Ie8=" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.21/moment-timezone-with-data-2012-2022.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js" integrity="sha256-z0oKYg6xiLq3yJGsp/LsY9XykbweQlHl42jHv2XTBz4=" crossorigin="anonymous"></script>
    <div class='container userform' id="worksheet_Form">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js" integrity="sha256-z0oKYg6xiLq3yJGsp/LsY9XykbweQlHl42jHv2XTBz4=" crossorigin="anonymous"></script>
    <div class='container userform' id="worksheet_Form">
        <div id="section_userform1" class="col-md-9 offset-md-1">
            <!-- Include Bootstrap DateTimePicker CDN -->

            <span id="span">Worksheet Form </span>
            <form class="" method="post" autocomplete="off" action="<?= base_url('Worksheet/createWorksheet'); ?>">
                <div class="row mb-3">
                    <label for="type_of_work" class="col-sm-4">Type of Work :</label>
                    <div class="col-sm-8">
                       <select placeholder="Type of Work" name="type_of_work" id="type_of_work" class="classic" aria-describedby="type_of_work">
                            <option value="">Select</option>
                            <option value="Accounting">Accounting</option>
                            <option value="Auditing">Auditing</option>
                            <option value="Taxation">Taxation</option>
                            <option value="Management Consultancy">Management Consultancy</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
    						<label for="workorder_no" class="col-sm-4">Workorder No:</label>
    						<div class="col-sm-8">
    							<select name="workorder" id="workorder_no" onchange="fetchworkorder()" class="form-control">
               <option>Please Select Workorder Number</option>
               <?php
               foreach ($workerorderno as $workid) {
               // var_dump($zones);
               echo '<option value="' . $workid['id'] . '">' . $workid['id'] . '-' . $workid['client_name'] . '</option>';
                  }
                 ?>
  </select>
    						</div>
    					</div> 
                <!--<div class="row mb-3">
                    <label for="workorder_no" class="col-sm-4">Workorder No :</label>
                    <div class="col-sm-8">
                        <select name="workorder" class="classic" id="workorder_no" onchange="fetchworkorder()">
                            <option>Please Select Workorder Number</option>
                            <?php
                            if ($selectedValue) {
                                // $selectedValue = intval($_POST['selectedValue']);
                                foreach ($workerorderno as $id) {
                                    $type = substr($id['id'], 2, 2);
                                    //echo $_POST['selectedValue'];    

                                    switch ($selectedValue) {
                                        case 1:
                                            if ($type == 'EA') {
                                                echo '<option value="' . $id['id'] . '">' . $id['id'] . '</option>';
                                            }
                                            break;
                                        case 2:
                                            if ($type == 'IA') {
                                                echo '<option value="' . $id['id'] . '">' . $id['id'] . '</option>';
                                            }
                                            break;
                                        case 3:
                                            if ($type == 'TA') {
                                                echo '<option value="' . $id['id'] . '">' . $id['id'] . '</option>';
                                            }
                                            break;
                                        case 4:
                                            if ($type == 'RF') {
                                                echo '<option value="' . $id['id'] . '">' . $id['id'] . '</option>';
                                            }
                                            break;
                                        default:
                                    }
                                }
                            }

                            ?>

                            if ($selectedValue) {
                                // $selectedValue = intval($_POST['selectedValue']);
                                foreach ($workerorderno as $id) {
                                    $type = substr($id['id'], 2, 2);
                                    //echo $_POST['selectedValue'];    

                                    switch ($selectedValue) {
                                        case 1:
                                            if ($type == 'EA') {
                                                echo '<option value="' . $id['id'] . '">' . $id['id'] . '</option>';
                                            }
                                            break;
                                        case 2:
                                            if ($type == 'IA') {
                                                echo '<option value="' . $id['id'] . '">' . $id['id'] . '</option>';
                                            }
                                            break;
                                        case 3:
                                            if ($type == 'TA') {
                                                echo '<option value="' . $id['id'] . '">' . $id['id'] . '</option>';
                                            }
                                            break;
                                        case 4:
                                            if ($type == 'RF') {
                                                echo '<option value="' . $id['id'] . '">' . $id['id'] . '</option>';
                                            }
                                            break;
                                        default:
                                    }
                                }
                            }

                            ?>

                        </select>
                    </div>
                </div>-->
                <div class="row mb-3" id="clientName">
                    <label for="client_name" class="col-sm-4" id="required-field2">Name of the Client :</label>
                    <div class="col-sm-8">
                        <input type="text" placeholder="Name of the Client" name="client_name" id="clientname" class="form-control" aria-describedby="client_name" required>
                        <input type="text" placeholder="Name of the Client" name="client_name" id="clientname" class="form-control" aria-describedby="client_name" required>
                    </div>
                </div>
                <!-- <div class="row mb-3">
    						<label for="client_name" class="col-sm-4">Date :</label>
    						<div class="col-sm-8">
    							<input type="date" name="date" id="date_time_set" aria-describedby="client_name">
    						</div>
    					</div> -->
                <div class="row mb-3">
                    <label for="client_name" class="col-sm-4">Date :</label>
                    <div class="col-sm-8">
                        <input type="date" name="date" id="date_picker" placeholder="Date" class="form-control" >
                        <input type="text" id="dateAtWokrsheet" readonly value="DD / MM / YYYY"  />
                    </div>

                    <div class="row mb-3">
                   
                </div>

                </div>
                <div class="row mb-3">
                    <label for="type_of_work" class="col-sm-4" id="required-field4">Description of Work Done :</label>
                    <div class="col-sm-8">
                        <textarea id="w3review" name="Description" class="form-control" placeholder="Description of Work Done"></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="partner_in_charge" class="col-sm-4" id="required-field3">Work Given By :</label>
                    <label for="partner_in_charge" class="col-sm-4" id="required-field3">Work Given By :</label>
                    <div class="col-sm-8">
                        <input id="WorkGivenBy" placeholder="Work Given By" type="text" name="WorkGiven" class="form-control" required />
                        <input id="WorkGivenBy" placeholder="Work Given By" type="text" name="WorkGiven" class="form-control" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="demo-date" class="col-sm-4" id="required-field4">Remarks :</label>
                    <div class="col-sm-8">
                        <textarea id="w3review" name="remarks" aria-describedby="client_name" class="form-control" placeholder="Remarks" required></textarea>
                        <textarea id="w3review" name="remarks" aria-describedby="client_name" class="form-control" placeholder="Remarks" required></textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="demo-date" class="col-sm-4">Start Time :</label>
                    <div class="col-sm-8">
                    <div class="col-sm-8">
                        <div class="input-group date" id="datetimepicker" data-target-input="nearest">

                            <input type="time" name="start_time" id="startTime" />
                            <!-- Don't delete Below commented line until new one is working properly -->
                            <!-- <input type="time" class="form-control datetimepicker-input" name="start_time"
                                data-target="#datetimepicker" id="startTime"placeholder="Enter Start Time" required  /> -->
                            <!-- <div id="startTimeClock" class="input-group-append" >
                                <div class="input-group-text"><i class="fa fa-clock-o" ></i></div>
                            </div> -->

                            <input type="time" name="start_time" id="startTime" />
                            <!-- Don't delete Below commented line until new one is working properly -->
                            <!-- <input type="time" class="form-control datetimepicker-input" name="start_time"
                                data-target="#datetimepicker" id="startTime"placeholder="Enter Start Time" required  /> -->
                            <!-- <div id="startTimeClock" class="input-group-append" >
                                <div class="input-group-text"><i class="fa fa-clock-o" ></i></div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="row mb-3" hidden>
                    <label for="demo-date" class="col-sm-4"></label>
                    <div class="col-sm-8">
                        <p id="starttimedisplay"></p>
                    </div>
                </div>
                <div class="row mb-3" id="endtime">
                <div class="row mb-3" id="endtime">
                    <label for="demo-date" class="col-sm-4">End Time :</label>
                    <div class="col-sm-8 time">
                        <div class="input-group date" id="datetimepickerend" data-target-input="nearest">
                            <input type="time" id="endTime" name="End_time" />
                            <!-- Don't delete Below commented line until new one is working properly -->
                            <!-- <input type="text" class="form-control datetimepicker-input" id="endTime"name="End_time"
                                data-target="#datetimepickerend" placeholder="Enter End Time" />
                            <div class="input-group-append" id="endTimeClock"
                            <input type="time" id="endTime" name="End_time" />
                            <!-- Don't delete Below commented line until new one is working properly -->
                            <!-- <input type="text" class="form-control datetimepicker-input" id="endTime"name="End_time"
                                data-target="#datetimepickerend" placeholder="Enter End Time" />
                            <div class="input-group-append" id="endTimeClock"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                            </div> -->
                            </div> -->
                        </div>
                    </div>
                </div>

                <!--
                <div class="row mb-3">
                    <label for="demo-date" class="col-sm-4">Break Time</label>
                    <div class="col-sm-4 time">
                        <div class="input-group date" id="datetimepickerbreak1" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="breakfrom"
                                data-target="#datetimepickerbreak1" />
                            <div class="input-group-append" data-target="#datetimepickerbreak1"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 time">
                        <div class="input-group date" id="datetimepickerbreak2" data-target-input="nearest">
                            <input type="text" class="form-control datetimepicker-input" name="breakto"
                                data-target="#datetimepickerbreak2" />
                            <div class="input-group-append" data-target="#datetimepickerbreak2"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-clock-o"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                        -->


                <div class="row mb-3">
                    <div class="col-sm-8 worksheetformbtn">
                        <input type="submit" value="Submit" class="btn btn-info" id="formsubmit" required />
                    </div>
                </div>
                <?php
                if ($this->session->flashdata('success')) {    ?>
                    <p class="text-success text-center" style="margin-top: 10px;">
                        <?= $this->session->flashdata('success') ?>
                    </p>
                    <p class="text-success text-center" style="margin-top: 10px;">
                        <?= $this->session->flashdata('success') ?>
                    </p>
                <?php } ?>
            </form>
 <script type="text/javascript">
       document.getElementById("clientName").style.display = "none";
 </script>


<script>
window.addEventListener('beforeunload',function(){
    localStorage.removeItem('selectedte')
    localStorage.setItem('refreshPage',true)
})
</script>
            <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script> -->
            <script>
                // $(document).ready(function() {
                //     $("#date_picker").datepicker({
                //         dateFormat: 'dd-mm-yy'
                //     })
                // })
                // $(document).ready(function() {
                //     $("#date_picker").datepicker({
                //         dateFormat: 'dd-mm-yy'
                //     })
                // })
            </script>


            <script>
                // $('#datetimepicker').datetimepicker({
                //     format: 'hh:mm:ss a',
                // });
                // $('#datetimepickerend').datetimepicker({
                //     format: 'hh:mm:ss a',
                // });
                // $('#datetimepickerbreak1').datetimepicker({
                //     format: 'hh:mm:ss a',
                // });
                // $('#datetimepickerbreak2').datetimepicker({
                //     format: 'hh:mm:ss a',
                // });
                // $('#datetimepicker').datetimepicker({
                //     format: 'hh:mm:ss a',
                // });
                // $('#datetimepickerend').datetimepicker({
                //     format: 'hh:mm:ss a',
                // });
                // $('#datetimepickerbreak1').datetimepicker({
                //     format: 'hh:mm:ss a',
                // });
                // $('#datetimepickerbreak2').datetimepicker({
                //     format: 'hh:mm:ss a',
                // });
            </script>






            <script type="text/javascript">
                function onselectingdate() {
                    const myTimeout = setTimeout(timecheck, 10000);
                }
                function onselectingdate() {
                    const myTimeout = setTimeout(timecheck, 10000);
                }

                function timecheck() {
                    // alert("yyyesss");
                    var date = document.getElementById("date_picker").value;
                    var starttime = document.getElementById("starttime").value;
                    //alert('start time is ' + starttime);
                    var endtime = document.getElementById("endtime").value;
                    //alert('end  time is ' + endtime);
                    $.ajax({
                        url: "<?php echo base_url('Worksheet/timevalidation') ?>",
                        type: 'post',
                        data: {
                            worksheetdate: date,
                            start: starttime,
                            end: endtime
                        },
                        success: function(json) {
                            var jsondata = (json);
                            console.log('log is' + json);
                            //alert('response ' + jsondata);
                            if (jsondata == "true") {
                                document.getElementById("starttimedisplay").innerHTML ="please select different start time and endtime , already you have another worksheet for this time duration ";
                                //alert("if condition ");
                                document.getElementById("starttimedisplay").style.color = 'red';
                                document.getElementById('formsubmit').disabled = false;
                            }
                            if (jsondata == "false") {
                                // alert("false condition ");
                                document.getElementById("starttimedisplay").innerHTML = "";
                                document.getElementById('formsubmit').disabled = false;
                            }
                            //console.log('end time' + message);
                            //alert('success data is' + jsondata);
                        },
                        
                        error: function() {
                            alert('Not Found ');
                        }
                    });
                }
                function timecheck() {
                    // alert("yyyesss");
                    var date = document.getElementById("date_picker").value;
                    var starttime = document.getElementById("starttime").value;
                    //alert('start time is ' + starttime);
                    var endtime = document.getElementById("endtime").value;
                    //alert('end  time is ' + endtime);
                    $.ajax({
                        url: "<?php echo base_url('Worksheet/timevalidation') ?>",
                        type: 'post',
                        data: {
                            worksheetdate: date,
                            start: starttime,
                            end: endtime
                        },
                        success: function(json) {
                            var jsondata = (json);
                            console.log('log is' + json);
                            //alert('response ' + jsondata);
                            if (jsondata == "true") {
                                document.getElementById("starttimedisplay").innerHTML ="please select different start time and endtime , already you have another worksheet for this time duration ";
                                //alert("if condition ");
                                document.getElementById("starttimedisplay").style.color = 'red';
                                document.getElementById('formsubmit').disabled = false;
                            }
                            if (jsondata == "false") {
                                // alert("false condition ");
                                document.getElementById("starttimedisplay").innerHTML = "";
                                document.getElementById('formsubmit').disabled = false;
                            }
                            //console.log('end time' + message);
                            //alert('success data is' + jsondata);
                        },
                        
                        error: function() {
                            alert('Not Found ');
                        }
                    });
                }
            </script>




            <script type="text/javascript">
                function fetchworkorder() {
                    var x = document.getElementById("workorder_no").value;
                    //   alert(x);
                    //alert('<?= base_url() ?>');
                    $.ajax({
                        url: "<?php echo base_url('Worksheet/getClientName') ?>",
                        type: 'post',
                        data: {
                            clientname: x
                        },
                        success: function(data) {
                            //alert('success brand');
                            //  alert(data);
                            var jsondata = JSON.parse(data);
                            let startDateFromDB=jsondata[0].start_date
                            //console.log(jsondata);
                            //alert(jsondata[0].client_name);
                            document.getElementById('clientname').value = jsondata[0].client_name;
                            document.getElementById('WorkGivenBy').value = jsondata[0].partner_in_charge;
                            document.getElementById('clientname').disabled = true;
                            document.getElementById('WorkGivenBy').disabled = true;
                           
                            //Date before one month
                            // enabling select date back to one month only
                            // Start Date
                            let startDate=startDateFromDB
                            // alert(startDate)
                            let sDate=startDate.slice(8);
                            let sMonth=startDate.slice(5,7);
                            let sYear=startDate.slice(0,4);
                            let newStartDate=sYear+'-'+sMonth+'-'+sDate;
                            // current Date
                            let today= new Date()
                            let todayDate=today.getDate()+1
                            let todayMonth=today.getMonth()+1
                            let todayYear=today.getFullYear()

                             if(todayDate<=9){
                                
                                todayDate=`0${todayDate}`
                             }
                             if(todayMonth<=9){
                                todayMonth=`0${todayMonth}`
                             }
                            let maxDate=todayYear+'-'+todayMonth+'-'+(parseInt(todayDate)-1);
                         
                          
                            // Setting maximum date
                            document.getElementById('date_picker').setAttribute('max',maxDate)
                            // if start and current month are same
                            if(sMonth==todayMonth){
                                document.getElementById('date_picker').setAttribute('min',startDate)
                            }else
                            {
                                let currentDate=todayDate;
                                if(currentDate<sDate){
                                    currentDate=sDate
                                }
                                if(newStartDate<startDate){
                                document.getElementById('date_picker').setAttribute('min',startDate)
                                }else{                        
                                    finalStartDate=sYear+'-'+sMonth+'-'+currentDate;
                                    // Checking for YEAR                       
                                    if(todayYear==sYear){
                                     // Checking for MONTH   
                                        if(todayMonth==sMonth){ 
                                        document.getElementById('date_picker').setAttribute('min',finalStartDate)
                                        }else if(todayMonth<sMonth){ // If Current Month is smaller than start month
                                        document.getElementById('date_picker').setAttribute('min',finalStartDate)
                                        }else{ // If Current Month is greater than start month
                                            sMonth=parseInt(todayMonth)-1;
                                            if(sMonth<9){
                                            sMonth=`0${parseInt(todayMonth)-1}`;  
                                            }
                                            finalStartDate=sYear+'-'+sMonth+'-'+currentDate;
                                            document.getElementById('date_picker').setAttribute('min',finalStartDate)
                                        }
                                    }else{ // If Current Year is greater than start year
                                        sYear=parseInt(todayYear)-1;
                                        finalStartDate=sYear+'-'+sMonth+'-'+currentDate;
                                        document.getElementById('date_picker').setAttribute('min',finalStartDate)
                                    }

                                }
                            }
                        },
                        error: function() {
                            alert('Not Found client details for this Work Order Number');
                        }
                    });
                }
            </script>

            <script>

                let todayDate=new Date()
                let tDay=todayDate.getDate()
                let tMonth=todayDate.getMonth()
                let tYear=todayDate.getFullYear()
                if(tMonth<=9){
                    tMonth=`0${tMonth}`
                }
                let currentDate1=tYear+'-'+tMonth+'-'+tDay;               
                     
                document.getElementById('date_picker').setAttribute('max', currentDate1)

                document.getElementById('date_picker').addEventListener('change', function() {
                    let currentDate = document.getElementById('date_picker').value;
                    document.getElementById('dateAtWokrsheet').value = formatDate(currentDate);
                })
                //Date Foramtting
                //Function to add zero for single number
                function addZero(num) {
                    return num.toString().padStart(2, '0')
                }

                function formatDate(currentDate) {
                    // Now we are formatting in DD/MM/YYYY
                    let day = addZero(new Date(currentDate).getDate())
                    let month = addZero(new Date(currentDate).getMonth() + 1)
                    let year = new Date(currentDate).getFullYear()
                    let todayDate = day + ' / ' + month + ' / ' + year;
                    return todayDate;
                }
   
            </script>


            <!-- Dropdown type of work function -->
            
            <!--<script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Your code here
                    console.log('Document loaded');
                });

                // JavaScript code
                document.getElementById('type_of_work').addEventListener('change', function() {
                    var selectedValue = this.value;
                    // Send the selected value to a PHP variable using AJAX
                    $.ajax({
                        url: "<?php echo base_url('Worksheet/typeOfWork'); ?>" + "?selectedValue=" + selectedValue,
                        type: 'GET',
                        success: function(response) {
                            location.reload();
                        },
                        error: function() {

                        }
                    });
                });
            </script>-->
<script>
  let startTime=document.getElementById('startTime')
  let endTime= document.getElementById('endTime')
// Start Time
startTime.addEventListener('change', function(){
   
    if(startTime.value<"07:00"||startTime.value>"23:00"){
        alert(`Time Not Allow!`)
        startTime.value="";
     }
})
// End Time
endTime.addEventListener('change',function(){
    if(endTime.value>'00:00' && endTime.value<'05:00' ){
        alert('Time not allow!')
        endTime.value="";
    }
    if(startTime.value >="09:00" && endTime.value <= "23:00" ){
       if(endTime.value<startTime.value ){
           alert(`You cannot take End Time Before Start Time`)
           endTime.value="";
        }
       }
//else if(endTime.value>"23:00" ||endTime.value<"09:00"){
//         alert(`Time Not Allow(Office Hours is 9 AM - 6 PM)`)
//         endTime.value=""
//       }
if(startTime.value==endTime.value){
           alert('Start and End Time cannot be same')
           endTime.value=""
       }
})

</script>