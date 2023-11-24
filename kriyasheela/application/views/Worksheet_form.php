<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title></title>
  <meta name="viewport" content="width=device-width,
      initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" integrity="sha256-XPTBwC3SBoWHSmKasAk01c08M6sIA5gF5+sRxqak2Qs=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha256-98vAGjEDGN79TjHkYWVD4s87rvWkdWLHPs5MC3FvFX4=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha256-xaF9RpdtRxzwYMWg4ldJoyPWqyDPCRD0Cv7YEEe6Ie8=" crossorigin="anonymous"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.21/moment-timezone-with-data-2012-2022.min.js"></script> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js" integrity="sha256-z0oKYg6xiLq3yJGsp/LsY9XykbweQlHl42jHv2XTBz4=" crossorigin="anonymous"></script>
</head>



<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');


*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #f6f8fa;
    font-family: 'Poppins', sans-serif;
}
.custom-select{
    width: 100%;
    height: 45px;
    border: none;
    outline: none;
    border-radius: 5px;
    font-size: 16px;
    padding-left: 15px;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1);
    background-color: #f6f8fa;
    font-family: 'Poppins', sans-serif;
    transition: all 120ms ease-out 0s;
}
.worksheet-container{
    max-width: 1386px;
    width: 100%;
    background: #ffffff;
    border-radius: 0.5rem;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1), 0px 5px 12px -2px rgba(0, 0, 0, 0.1), 0px 18px 36px -6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    margin: -4px;
}

.worksheet-container .title{
    padding: 25px;
    background: #f6f8fa;
}

.worksheet-container .title p{
    font-size: 25px;
    font-weight: 500;
    /* position: relative; */
}

.worksheet-container .title p::before{
    content: "";
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30px;
    height: 3px;
    background: linear-gradient(to right, #F37A65, #D64141);
}

.worksheet_details{
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 20px;
    padding: 19px;
}

.worksheet_details .input_box{
    width: calc(100% / 2 - 20px);
    margin: 0 0 12px 0;
}

.input_box label{
    font-weight: 500;
    margin-bottom: 5px;
    display: block;
}

.input_box label::after{
    content: " *";
    color: red;
}

.input_box input{
    width: 100%;
    height: 45px;
    border: none;
    outline: none;
    border-radius: 5px;
    font-size: 16px;
    padding-left: 15px;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1);
    background-color: #f6f8fa;
    font-family: 'Poppins', sans-serif;
    transition: all 120ms ease-out 0s;
}
.textarea{
    width: 100%;
    height: 45px;
    border: none;
    outline: none;
    border-radius: 5px;
    font-size: 16px;
    padding-left: 15px;
    box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.1);
    background-color: #f6f8fa;
    font-family: 'Poppins', sans-serif;
    transition: all 120ms ease-out 0s;
}

.main-container {
    display: flex;
    width: 100vw;
    position: relative;
    top: 4px;
    z-index: 1;
}

form .gender{
    padding: 0px 25px;
}

.gender .gender_title{
    font-size: 20px;
    font-weight: 500;
}

.gender .category{
    width: 80%;
    display: flex;
    justify-content: space-between;
    margin: 5px 0;
}

.gender .category label{
    display: flex;
    align-items: center;
    cursor: pointer;
}

.gender .category label .dot{
    height: 18px;
    width: 18px;
    background: #d9d9d9;
    border-radius: 50%;
    margin-right: 10px;
    border: 4px solid transparent;
    transition: all 0.3s ease;
}

#radio_1:checked ~ .category label .one,
#radio_2:checked ~ .category label .two,
#radio_3:checked ~ .category label .three{
    border-color: #d9d9d9;
    background: #D64141;
}

.gender input{
    display: none;
}

.reg_btn{
    padding: 25px;
    margin: 15px 0;
}

.reg_btn input{
    height: 45px;
    width: 100%;
    border: none;
    font-size: 18px;
    font-weight: 500;
    cursor: pointer;
    background: linear-gradient(to right, #F37A65, #D64141);
    border-radius: 5px;
    color: #ffffff;
    letter-spacing: 1px;
    text-shadow: 0px 2px 2px rgba(0, 0, 0, 0.2);
}

.reg_btn input:hover{
    background: linear-gradient(to right, #D64141, #F37A65);
}



/* Add this CSS for responsiveness */
@media screen and (max-width: 584px) {
    .worksheet_details .input_box {
        width: 100%;
        margin-right: 0;
    }
    .worksheet_details .input_box label {
        margin-bottom: 5px;
    }
    .input-group.date {
        display: block;
        margin-top: 10px;
    }
    .reg_btn {
        text-align: center;
        margin-top: 20px;
    }
}

/* Additional styles for very small screens (you can adjust these values as needed) */
@media screen and (max-width: 419px) {
    .worksheet_details .input_box {
        padding-left: 0;
        padding-right: 0;
    }
}



</style>


<body>
<div class="main">

  <div class="worksheet-container" id="worksheet__form">
    <div class="title">
      <p>Worksheet Form</p>
    </div>

    <form method="post" autocomplete="off" action="<?= base_url('Worksheet/createWorksheet'); ?>">
      <div class="worksheet_details">
        <div class="input_box">

          <label for="fullName">Type of Work</label>
         
            <select placeholder="Type of Work" name="type_of_work" id="type_of_work" class="custom-select" style="background-color: #f6f8fa; height: 45px" aria-describedby="type_of_work">
              <option value="">Select</option>
              <option value="Accounting">Accounting</option>
              <option value="Auditing">Auditing</option>
              <option value="Taxation">Taxation</option>
              <option value="Management Consultancy">Management Consultancy</option>
              <option value="Information Technology">Information Technology</option>
              <option value="Others">Others</option>

            </select>
         
        </div>

        <div class="input_box">
          <label for="workorder_no">Workorder No:</label>
          
            <select name="workorder" id="workorder_no" onchange="fetchworkorder()" class="custom-select">
         
          <option>Please Select Workorder Number</option>
          <?php
               foreach ($workerorderno as $workid) {

                 echo '<option value="' . $workid['id'] . '">' . $workid['id'] . '-' . $workid['client_name'] . '</option>';
                  }
                     ?>
                    </select>
          <!-- <input type="text" placeholder="Workorder No" name="workorder_no"  id="workorder_no" aria-describedby="workorder_no" readonly> -->
  
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

                        </select>
                    </div>
                </div>-->
        <div class="input_box">
          <label for="client_name" >Name of the Client :</label>
          <input type="text" placeholder="Name of the Client" name="client_name" id="clientname" aria-describedby="client_name" required>
    
        </div>

        <div class="input_box">
          <label for="client_date">Date :</label>
          <input type="date" name="date" id="date_picker" placeholder="Date" class="form-control" >
           <input type="text" id="dateAtWokrsheet" readonly value="DD / MM / YYYY" hidden  />
        </div>

        <div class="input_box">
          <label for="type_of_work">Description of Work Done :</label>
          <textarea id="w3review" type="text" name="Description" class="textarea"  col="50" row="50" placeholder="Description of Work Done"></textarea>
        </div>

        <div class="input_box">
          <label for="demo-date">Start Date :</label>

          <input type="date" placeholder="Start Date" name="start_date" id="date_picker1" size=9
            aria-describedby="start_date">
        
        </div>

        <div class="input_box">
          <label for="Work_given_by">Work Given By :</label>
          <input id="WorkGivenBy" placeholder="Work Given By" type="text" name="WorkGiven"  required>
       
        </div>

        <div class="input_box">
          <label for="demo-date">Remarks :</label>
        
          <textarea id="w3review" type="text" name="remarks"  class="textarea" aria-describedby="client_name" col="50" row="50" placeholder="Remarks" required></textarea>
        </div>

        <div class="input_box">
          <label for="demo-date">Start Time :</label>
          <div class="input-group date" id="datetimepicker" data-target-input="nearest">

            <input type="time" name="start_time" id="startTime" />
            </div>
        </div>

        <div class="input_box" hidden>
          <label for="demo-date"></label>
          <p id="starttimedisplay"></p>
        </div>

        <div class="input_box">
          <label for="demo-date">End Time :</label>
          <div class="input-group date" id="datetimepickerend" data-target-input="nearest">
            <input type="time" id="endTime" name="End_time" />
          </div>
        </div>



      </div>

      <div class="reg_btn">
        <input type="submit" value="Submit" class="btn btn-info" id="formsubmit" required>
      </div>
      <?php
      if ($this->session->flashdata('success')) {    ?>
          <p class="text-success text-center" style="margin-top: 10px;">
              <?= $this->session->flashdata('success') ?>
          </p>
      <?php } ?>
    </form>
  </div>
  </div>
</body>

</html>



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
       </script>



       <script type="text/javascript">
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

