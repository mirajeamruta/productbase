

<style>
/* Reset some default browser styles */
body, div, p, h3, table {
    margin: 0;
    padding: 0;
}

/* Set a background color for the entire page */
body {
    background-color: #f4f4f4;
    font-family: Arial, sans-serif;
}

/* Style the container */
.container-fluid {
    max-width: 1293px;
    margin: 0 auto;
    padding: -3px;
}

#section_viewworksheet {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

/* Center the h3 heading */
h3.text-center {
    text-align: center;
}

/* Style the filter section */
#filterSection {
    background-color: #f0f0f0;
    padding: 10px;
    border-radius: 5px;
    margin-top: 20px;
    text-align: center;
}

/* Style the filter buttons */
#filterDateText,
#filter_by_date,
#filterStartTime {
    margin: 5px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    width: 146px;
}

#showFilterResult,
#clearFilter {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
    margin: 5px;
}

/* Style the first table */
#worksheettable {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

/* Style the first table headers */
#worksheettable th {
    background-color: #007BFF;
    color: #fff;
    font-weight: bold;
}

/* Style the first table rows */
#worksheettable tr {
    border-bottom: 1px solid #ddd;
}

/* Style the first table data cells */
#worksheettable td {
    padding: 5px;
}

/* Style the second table */
#viewWorksheetTable {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

/* Style the second table headers */
#viewWorksheetTable th {
    background-color: #007BFF;
    color: #fff;
    font-weight: bold;
}

/* Style the second table rows */
#viewWorksheetTable tr {
    border-bottom: 1px solid #ddd;
}

/* Style the second table data cells */
#viewWorksheetTable td {
    padding: 5px;
}

/* Add responsiveness for smaller screens */
@media (max-width: 768px) {
    #worksheettable, #viewWorksheetTable {
        font-size: 14px;
        display: block;
    }
    
    #filterSection {
        text-align: left;
    }
    
    h3.text-center {
        margin-top: 10px;
    }
      #worksheettable {
        overflow-x: auto;
    }

    #viewWorksheetTable {
        overflow-x: auto;
    }
}
/* Style the filter section */
#filterSection {
    background-color: #f0f0f0;
    padding: 10px;
    border-radius: 5px;
    margin-top: 20px;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* Style the filter titles and labels */
#filterTilte {
    font-weight: bold;
    font-size: 18px;
}

#fDate, #fTime, #totalBreakTime {
    font-weight: bold;
}

/* Style the filter buttons and inputs */
#filterDateButtons {
    display: flex;
    align-items: center;
}

input[type="text"], input[type="date"], input[type="time"] {
    margin: 5px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

#showFilterResult, #clearFilter {
    background-color: #007BFF;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
    margin: 5px;
}

/* Add responsiveness for smaller screens */
@media (max-width: 768px) {
    /* Style the filter section */
    #filterSection {
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

   /* Style the date input and text */
   input[type="date"] {
        margin: 5px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        width: 100%; /* Adjust the width to your preference */
    }


    /* Style the time input and text */
    #filterStartTime {
        margin: 5px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        width: 94%; /* Adjust the width to your preference */
    }

    #fDate {
        font-weight: bold;
    }
    /* Style the time input */
    input[type="time"] {
        margin: 5px;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 3px;
        width: 94%;/* Adjust the width to your preference */
    }

    /* Style the Apply Filter and Clear buttons */
    #showFilterResult, #clearFilter {
        background-color: #007BFF;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        margin: 5px;
        width: 283px; /* Adjust the width as needed */
    }

    /* Center-align the Total Break Time */
    #totalBreakTime {
        text-align: center;
        margin-top: 20px;
    }
    #showFilterResult, #clearFilter {
        display: block;
    }
    #viewworksheet_form{
        width: 389px;
    margin-left: -39px !important;
    }
    
    #fTime {
        font-weight: bold;
        margin-top: 10px;
    }
    #filterDateText{
        margin: 5px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    width: 146px;
    }

}

    
</style>

<body>
<div class="main">
<div class="container-fluid" id="viewworksheet_form">

        <div id='section_viewworksheet'>
        <div class="title" style=" font-size: 1.75rem;margin-left: 7px;margin-top: 2px;font-weight: 600;background: #f6f8fa;" >
      <p>View Worksheet Form</p>
    </div>
            <?php
        
            if (count($workesheetuloginuserdetails) > 0) {
            foreach ($workesheetuloginuserdetails as $row) {
            ?>
            <table class="table table-bordered my-4" id="worksheettable">
                <thead  class="viewwork" id="tablehead">
            <table class="table table-bordered my-4" id="worksheettable">
                <thead  class="viewwork" id="tablehead">
                    <tr class="text-center text-white text-capitalize wkorderhead">
                        <th>Name</th>
                        <th>Partner in Charge</th>
                        <th>SRO Number </th>
                        <th>balunand_id_no</th>
                        <th>Start Date</th>
                        <th>Completing On</th>
                    </tr>
                </thead>
                
         
                
                <tbody class="worksheet" id="worksheetbody">
                    <td data-label=""><?php echo $row['name'] ?></td>
                    <td><?php echo $row['partner_under_whom_registered'] ?></td>
                    <td><?php echo $row['student_reg_no'] ?></td>
                    <td><?php echo $row['balunand_id_no'] ?></td>
                    <td><?php echo $row['startdate'] ?></td>
                    <td><?php echo $row['CompletingOn'] ?></td>
                </tbody>
                <?php
                }
            }
                ?>
                <!-- <h3 class="text-center">View Worksheet</h3>
                -->
                <p id="filterTilte">Filter by</p>
                        <div id="filterSection">
                          <p id="fDate">Date</p>
                          <div id="filterDateButtons">
                                <input type="text"  placeholder="Select Date" readonly id="filterDateText"/>
                                <input type="date" id="filter_by_date" placeholder="Select Date"/>
                          </div>                         
                        
                          <p id="fTime">Time</p>
                          <input type="time" name="start_time" id="filterStartTime"/>   
                          <div id="filterAndClear">
                          <button id="showFilterResult">Apply Filter</button>
                          <button id="clearFilter">Clear</button>
                          </div>                     
                          
                          <span id="totalBreakTime">Total Break Time: </span>
                        </div>

                
                <table class="table table-bordered my-5" id="viewWorksheetTable">
                    <thead>
                       
                     
                        
                        <tr class="text-center text-white text-capitalize wksubhead2">
                            <th class="data1" data-label="Date">Date</th>
                           
                            <th>Workorder No</th>
                            <th>Type Of Work</th>
                          
                            <th>Name Of Client </th>
                            <th>Description of work done</th>
                            <th>Work Given By</th>
                            <th>Remarks</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Break Time From </th>
                            <th>Break Time To </th>
                            <th>Break Time</th>
                        </tr>
                    </thead>
                    <tbody >
                     
                    </tbody>
                </table>
              
        </div>
    </div>
</div>
  </div>
</body>
    <!-- Begin Footer -->
<script>
window.addEventListener('beforeunload',function(){
    localStorage.removeItem('selectedte')
    localStorage.setItem('refreshPage',true)
})

</script>

    <script>
        
var uls = 5;


/*
alert(uls.length);

let bt = document.querySelectorAll('#timehours').length;

alert(bt);

for (var i = 0; i < 2; i++) {

	document.querySelectorAll('#timehours').innerText = 12333;

}
*/
// Array of all worksheet details
let worksheetData=<?php echo json_encode($workesheetdata);?>;
// isDate change
let isDateChange=localStorage.getItem('isDateChange')
// isTime Chane
let isTimeChange=localStorage.getItem('isTimeChange')
if(isTimeChange||isDateChange){
    document.getElementById('clearFilter').style.display="inline" 
    document.getElementById('showFilterResult').style.display="inline" 
}
if(isTimeChange){
     document.getElementById('filterStartTime').value=localStorage.getItem('filterTime')
}

if(isDateChange&&isTimeChange){
  var isDateTimeAvailable=false;
   let filterDate=localStorage.getItem('filterDate')
   let filterTime=localStorage.getItem('filterTime')
   worksheetDataDetails(filterDate,filterTime.slice(0,2))
}

else if(isDateChange){
    let totalBreakTime1=0; 
    // alert('Date Change')
    let filterDate=localStorage.getItem('filterDate')
    // If no date is matching
    let isDataAvailable=false;
    // worksheetData.map(item=>{
for(let i=0; i<worksheetData.length; i++){    
    let worksheetDay=parseInt(worksheetData[i].date.slice(8,10));
    let worksheetMonth=parseInt(worksheetData[i].date.slice(5,7));
    
    let filterDay=parseInt(filterDate.slice(8,10));
    let filterMonth=parseInt(filterDate.slice(5,7))

    let isMonthMatch=worksheetMonth === filterMonth
   
    if(worksheetDay===filterDay && isMonthMatch){ 
        isDataAvailable=true;
    // accessing table body
    let tbody=document.querySelector('#viewWorksheetTable tbody');
    // creating row
    let row = document.createElement('tr');
    // creating td for date
    let dateCell=document.createElement('td');
    //adding data to cell
    dateCell.textContent=worksheetData[i].date;
    // adding to row
    row.appendChild(dateCell);

    // creating td for workorder_no
    let workorderNoCell = document.createElement('td');
    // adding data to cell
    workorderNoCell.textContent=worksheetData[i].workorder_no;
    // adding to row
    row.appendChild(workorderNoCell);

    // for type_of_work
    let typeOfWork=document.createElement('td');
    // adding data to cell
    typeOfWork.textContent=worksheetData[i].type_of_work;
  
    // adding to row
    row.appendChild(typeOfWork);

    // for Name of Client
    let nameOfClient=document.createElement('td');
     nameOfClient.textContent=worksheetData[i].client_name;
     row.appendChild(nameOfClient);

     // work description
     let workDescription = document.createElement('td');
     workDescription.textContent=worksheetData[i].work_description;
     row.appendChild(workDescription);

     // work given by
     let workGivenBy=document.createElement('td');
     workGivenBy.textContent=worksheetData[i].work_given_by;
     row.appendChild(workGivenBy);

     // remarks
     let remark = document.createElement('td');
     remark.textContent=worksheetData[i].remarks;
     row.appendChild(remark);

     // start time
     let startTime=document.createElement('td');
     startTime.textContent=worksheetData[i].start_time;
     row.appendChild(startTime);

     // end time
     let endTime=document.createElement('td');
     endTime.textContent=worksheetData[i].end_time;
     row.appendChild(endTime);

     // break time from
     let breakTimeFrom=document.createElement('td');
     breakTimeFrom.textContent=worksheetData[i].end_time;
     row.appendChild(breakTimeFrom);
     
     let bTimeFrom=worksheetData[i].end_time;
     
     let workEndTimeHH='';
     let endTimeSession='';
     let workEndTimeIndex=bTimeFrom.indexOf(':')
     let workEndTimeMM='';

      for(let i=workEndTimeIndex; i<bTimeFrom.length; i++){
              if(bTimeFrom[i]=='a'||bTimeFrom[i]=='p'||bTimeFrom[i]=='m'){
                   endTimeSession+=bTimeFrom[i];
              }
     }
     
     for(let i=workEndTimeIndex+1; i<bTimeFrom.length; i++){
        if(bTimeFrom[i]!=' '){
            workEndTimeMM+=bTimeFrom[i];
        }else{
            break;
        }
     }

     for(let i=0; i<bTimeFrom.length; i++){
        if(bTimeFrom[i]!=':'){
            workEndTimeHH+=bTimeFrom[i]            
        }else{
            break;
        }
     }
  if(endTimeSession=='pm'){
        if(parseInt(workEndTimeHH)!=12){
            workEndTimeHH=12+parseInt(workEndTimeHH)
        }else if(parseInt(workEndTimeHH)==12){
            workEndTimeHH='12'
        }
    }
  

     let bTimeTo='';
    if(i!=worksheetData.length-1 && worksheetData[i].date==worksheetData[i+1].date){
    let breakTimeTo=document.createElement('td');
     breakTimeTo.textContent=worksheetData[i+1].start_time;
     bTimeTo=worksheetData[i+1].start_time;
     row.appendChild(breakTimeTo);
    }else{
    let breakTimeTo=document.createElement('td');
     breakTimeTo.textContent='';
     row.appendChild(breakTimeTo);
    }

    // Start Work Time
    let workStartTimeHH='';
    let startWorkSession='';
    let indexOfSemi='';
       
     let workStartTimeIndex=bTimeTo.indexOf(':')  
     let workStartTimeMM='';   
     for(let i=workStartTimeIndex; i<bTimeTo.length; i++){
              if(bTimeTo[i]=='a'||bTimeTo[i]=='p'||bTimeTo[i]=='m'){
                   startWorkSession+=bTimeTo[i];
              }
     }

      for(let i=workStartTimeIndex+1; i<bTimeTo.length; i++){
        if(bTimeTo[i]!=' '){
            workStartTimeMM+=bTimeTo[i];
        }else{
            break;
        }
     }
    
      //  console.log(workStartTimeMM)
     for(let i=0; i<bTimeTo.length; i++){
        if(bTimeTo[i]!=':'){
            workStartTimeHH+=bTimeTo[i]            
        }else{
            break;
        }
     }

     if(startWorkSession=='pm'){
        if(parseInt(workStartTimeHH)!=12){
            workStartTimeHH=12+parseInt(workStartTimeHH)
        }else if(parseInt(workStartTimeHH)==12){
            workStartTimeHH='12'
        }
     }
  

     let breakTimeHH=`${parseInt(workStartTimeHH)-parseInt(workEndTimeHH)}`;
     let breakTimeMM=`${parseInt(workStartTimeMM)-parseInt(workEndTimeMM)}`;
     if(breakTimeMM<=9){
        breakTimeMM=`0${breakTimeMM}`
     }
    //  console.log(parseInt(workStartTimeHH)*60)
     let startWorkTime =(parseInt(workStartTimeHH)*60)+parseInt(workStartTimeMM)
     let endWorkTime=(parseInt(workEndTimeHH)*60)+parseInt(workEndTimeMM);
    //  console.log('end Work Time: '+endWorkTime)
    
     let finalBreakTime=startWorkTime-endWorkTime;
      
      if(finalBreakTime>=60){        
        let hh=Math.trunc(finalBreakTime/60);
        let mm= finalBreakTime%60;
        // alert(mm)
        finalBreakTime=`${hh} Hr:${mm} Min`;
     }else{
       finalBreakTime=`${finalBreakTime} Min`
     }



    //  // break time to
    //  let breakTimeTo=document.createElement('td');
    //  breakTimeTo.textContent=worksheetData[i].break_time_to;
    //  row.appendChild(breakTimeTo);
     
     // break time - total
      if(i!=worksheetData.length-1&&workStartTimeHH!=''){
     let breakTime = document.createElement('td');
     breakTime.textContent=finalBreakTime;
     totalBreakTime1+=startWorkTime-endWorkTime;
     row.appendChild(breakTime);
   }else{
    let breakTime = document.createElement('td');
     breakTime.textContent='';
     row.appendChild(breakTime);
   }
//    Storing Break time in local storage
localStorage.setItem('breakTime','Hello')
console.log('Break Time '+finalBreakTime)

   // Total Break Time
   let totalBreakTime=document.createElement('td');
   totalBreakTime.textContent=''
   row.appendChild(totalBreakTime)
     // adding row to tbody
     tbody.appendChild(row);
    }
    
let totalHH=Math.trunc(totalBreakTime1/60);
let totalMM=totalBreakTime1%60;
document.getElementById('totalBreakTime').innerHTML=`Total Break Time = ${totalHH} Hr : ${totalMM} Min`;

// }) // end of mapping
} // End of For Loop

// When no data is avaiable
if(!isDataAvailable){
     // accessing table body
    let tbody=document.querySelector('#viewWorksheetTable tbody');
    let row = document.createElement('tr');
    let td=document.createElement('td')
       td.textContent="No Data Available";
       td.colSpan=12;
     row.appendChild(td);
     tbody.appendChild(row)      
}
}else if(isTimeChange){
    // alert('Time Block')
    var isTimeDataAvailable=false;

        // worksheetData.map(item=>{
              for(let i=0; i<worksheetData.length; i++){    
    let filterTime=localStorage.getItem('filterTime')
    // // worksheetDataDetails('',filterTime.slice(0,2))
    let newStartTime=parseInt(worksheetData[i].start_time);
    // console.log(`Start Time is ${newStartTime} and Filter Time is ${filterTime}`)
    // session i.e pm or am
    let session=worksheetData[i].start_time.slice(5).trim()
    // hours of start time
    let hh=worksheetData[i].start_time.charAt(0)+worksheetData[i].start_time.charAt(1).trim()
    
    let finalHrs=hh.replace(':','').trim()
    // minutes of start time
    let mm=worksheetData[i].start_time.slice(2,5).replace(":",'').trim()
   if(session=="pm"){
    if(finalHrs=="1"){
        finalHrs="13"
    }else if(finalHrs=="2"){
          finalHrs="14"
    }else if(finalHrs=="3"){
          finalHrs="15"
    }else if(finalHrs=="4"){
          finalHrs="16"
    }else if(finalHrs=="5"){
          finalHrs="17"
    }else if(finalHrs=="6"){
          finalHrs="18"
    }else if(finalHrs=="7"){
          finalHrs="19"
    }else if(finalHrs=="8"){
          finalHrs="20"
    }else if(finalHrs=="9"){
          finalHrs="21"
    }else if(finalHrs=="10"){
          finalHrs="22"
    }else if(finalHrs=="11"){
          finalHrs="23"
    }else if(finalHrs=="12"){
          finalHrs="24"
    }
    newStartTime=parseInt(finalHrs);
    
   }  
    
    let worksheetDay=parseInt(worksheetData[i].date.slice(8,10));
   // let filterDay=parseInt(filterDate.slice(8,10));
    let filterTimeInNumber=parseInt(filterTime)

   
     if(newStartTime>=filterTimeInNumber){
        // alert('Time Block')
      isTimeDataAvailable=true;
        let tbody=document.querySelector('#viewWorksheetTable tbody');
    // creating row
    let row = document.createElement('tr');

    // creating td for date
    let dateCell=document.createElement('td');
    //adding data to cell
    dateCell.textContent=worksheetData[i].date;
    // adding to row
    row.appendChild(dateCell);

    // creating td for workorder_no
    let workorderNoCell = document.createElement('td');
    // adding data to cell
    workorderNoCell.textContent=worksheetData[i].workorder_no;
    // adding to row
    row.appendChild(workorderNoCell);

    // for type_of_work
    let typeOfWork=document.createElement('td');
    // adding data to cell
    typeOfWork.textContent=worksheetData[i].type_of_work;
    // adding to row
    row.appendChild(typeOfWork);

    // for Name of Client
    let nameOfClient=document.createElement('td');
     nameOfClient.textContent=worksheetData[i].client_name;
     row.appendChild(nameOfClient);

     // work description
     let workDescription = document.createElement('td');
     workDescription.textContent=worksheetData[i].work_description;
     row.appendChild(workDescription);

     // work given by
     let workGivenBy=document.createElement('td');
     workGivenBy.textContent=worksheetData[i].work_given_by;
     row.appendChild(workGivenBy);

     // remarks
     let remark = document.createElement('td');
     remark.textContent=worksheetData[i].remarks;
     row.appendChild(remark);

     // start time
     let startTime=document.createElement('td');
     startTime.textContent=worksheetData[i].start_time;
    //  console.log(item.start_time)
    //  console.log(typeof(item.start_time))
     row.appendChild(startTime);

     // end time
     let endTime=document.createElement('td');
     endTime.textContent=worksheetData[i].end_time;
     row.appendChild(endTime);

     // break time from
    //  let breakTimeFrom=document.createElement('td');
    //  breakTimeFrom.textContent=worksheetData[i].end_time;
    //  row.appendChild(breakTimeFrom);

      // break time from
     let breakTimeFrom=document.createElement('td');
     breakTimeFrom.textContent=worksheetData[i].end_time;
     row.appendChild(breakTimeFrom);
     let bTimeFrom=worksheetData[i].end_time;
     
     let workEndTimeHH='';
     let endTimeSession='';
     let workEndTimeIndex=bTimeFrom.indexOf(':')
     let workEndTimeMM='';

     for(let i=workEndTimeIndex; i<bTimeFrom.length; i++){
              if(bTimeFrom[i]=='a'||bTimeFrom[i]=='p'||bTimeFrom[i]=='m'){
                   endTimeSession+=bTimeFrom[i];
              }
     }
     
     for(let i=workEndTimeIndex+1; i<bTimeFrom.length; i++){
        if(bTimeFrom[i]!=' '){
            workEndTimeMM+=bTimeFrom[i];
        }else{
            break;
        }
     }
     
     for(let i=0; i<bTimeFrom.length; i++){
        if(bTimeFrom[i]!=':'){
            workEndTimeHH+=bTimeFrom[i]            
        }else{
            break;
        }
     }
      if(endTimeSession=='pm'){
        if(parseInt(workEndTimeHH)!=12){
            workEndTimeHH=12+parseInt(workEndTimeHH)
        }else if(parseInt(workEndTimeHH)==12){
            workEndTimeHH='12'
        }
    }

     // break time to
    //  let breakTimeTo=document.createElement('td');
    //  breakTimeTo.textContent=worksheetData[i].break_time_to;
    //  row.appendChild(breakTimeTo);
     let bTimeTo='';
    if(i!=worksheetData.length-1 && worksheetData[i].date==worksheetData[i+1].date){
    let breakTimeTo=document.createElement('td');
     breakTimeTo.textContent=worksheetData[i+1].start_time;
     bTimeTo=worksheetData[i+1].start_time;
     row.appendChild(breakTimeTo);
    }else{
    let breakTimeTo=document.createElement('td');
     breakTimeTo.textContent='';
     row.appendChild(breakTimeTo);
    }

    // Start Work Time
    let workStartTimeHH='';
    let startWorkSession='';
    let indexOfSemi='';
       
     let workStartTimeIndex=bTimeTo.indexOf(':')  
     let workStartTimeMM='';   
     for(let i=workStartTimeIndex; i<bTimeTo.length; i++){
              if(bTimeTo[i]=='a'||bTimeTo[i]=='p'||bTimeTo[i]=='m'){
                   startWorkSession+=bTimeTo[i];
              }
     }

     for(let i=workStartTimeIndex+1; i<bTimeTo.length; i++){
        if(bTimeTo[i]!=' '){
            workStartTimeMM+=bTimeTo[i];
        }else{
            break;
        }
     }
    
    //  console.log(workStartTimeMM)
     for(let i=0; i<bTimeTo.length; i++){
        if(bTimeTo[i]!=':'){
            workStartTimeHH+=bTimeTo[i]            
        }else{
            break;
        }
     }

     if(startWorkSession=='pm'){
        if(parseInt(workStartTimeHH)!=12){
            workStartTimeHH=12+parseInt(workStartTimeHH)
        }else if(parseInt(workStartTimeHH)==12){
            workStartTimeHH='12'
        }
     }

    //  if(startWorkSession=='pm'||startWorkSession=='PM'){
    //    workStartTimeHH=timeConversion(workStartTimeHH)
    //  }
    //  console.log(workStartTimeHH)
     let breakTimeHH=`${parseInt(workStartTimeHH)-parseInt(workEndTimeHH)}`;
     let breakTimeMM=`${parseInt(workStartTimeMM)-parseInt(workEndTimeMM)}`;
     if(breakTimeMM<=9){
        breakTimeMM=`0${breakTimeMM}`
     }
    //  console.log(parseInt(workStartTimeHH)*60)
     let startWorkTime =(parseInt(workStartTimeHH)*60)+parseInt(workStartTimeMM)
     let endWorkTime=(parseInt(workEndTimeHH)*60)+parseInt(workEndTimeMM);
    //  console.log('end Work Time: '+endWorkTime)
     
     let finalBreakTime=startWorkTime-endWorkTime;
     
     if(finalBreakTime>=60){        
        let hh=Math.trunc(finalBreakTime/60);
        let mm= finalBreakTime%60;
        finalBreakTime=`${hh} Hr:${mm} Min`;
     }else{
       finalBreakTime=`${finalBreakTime} Min`
     }

     
     // break time - total
    if(i!=worksheetData.length-1&&workStartTimeHH!=''){
     let breakTime = document.createElement('td');
     breakTime.textContent=finalBreakTime;
     row.appendChild(breakTime);
   }else{
    let breakTime = document.createElement('td');
     breakTime.textContent='';
     row.appendChild(breakTime);
   }

     // adding row to tbody

     tbody.appendChild(row);
    }
    //    }) // End of Mapping
   }
    
}// end of condition

else{
   if(worksheetData==""){
     // accessing table body
    let tbody=document.querySelector('#viewWorksheetTable tbody');
    let row = document.createElement('tr');
    let td=document.createElement('td')
       td.textContent="No Data Available";
       td.colSpan=12;
     row.appendChild(td);
     tbody.appendChild(row)      

}else{

    // var loopCount=0;
    // let prevStartTime;
    
   
let totalBreakTime1=0; 
let isTotalDisplay=true;
   // worksheetData.map(item=>{
    for(let i=0; i<worksheetData.length; i++){
            
    // accessing table body
    let tbody=document.querySelector('#viewWorksheetTable tbody');
    // creating row
    let row = document.createElement('tr');

    // creating td for date
    let dateCell=document.createElement('td');
    //adding data to cell
    // dateCell.textContent=item.date;
    dateCell.textContent=worksheetData[i].date;

    // adding to row
    row.appendChild(dateCell);

    // creating td for workorder_no
    let workorderNoCell = document.createElement('td');
    // adding data to cell
    workorderNoCell.textContent=worksheetData[i].workorder_no;
    // adding to row
    row.appendChild(workorderNoCell);

    // for type_of_work
    let typeOfWork=document.createElement('td');
    // adding data to cell
    typeOfWork.textContent = worksheetData[i].type_of_work;
    // adding to row
    row.appendChild(typeOfWork);

    // for Name of Client
    let nameOfClient=document.createElement('td');
     nameOfClient.textContent=worksheetData[i].client_name;
     row.appendChild(nameOfClient);

     // work description
     let workDescription = document.createElement('td');
     workDescription.textContent=worksheetData[i].work_description;
     row.appendChild(workDescription);

     // work given by
     let workGivenBy=document.createElement('td');
     workGivenBy.textContent=worksheetData[i].work_given_by;
     row.appendChild(workGivenBy);

     // remarks
     let remark = document.createElement('td');
     remark.textContent=worksheetData[i].remarks;
     row.appendChild(remark);

     // start time
     let startTime=document.createElement('td');
     startTime.textContent=worksheetData[i].start_time;
     row.appendChild(startTime);
     prevStartTime=worksheetData[i].start_time

     // end time
     let endTime=document.createElement('td');
     endTime.textContent=worksheetData[i].end_time;
     row.appendChild(endTime);

     // break time from
     let breakTimeFrom=document.createElement('td');
     breakTimeFrom.textContent=worksheetData[i].end_time;
     row.appendChild(breakTimeFrom);
     let bTimeFrom=worksheetData[i].end_time;
     
     let workEndTimeHH='';
     let endTimeSession='';
     let workEndTimeIndex=bTimeFrom.indexOf(':')
     let workEndTimeMM='';

     for(let i=workEndTimeIndex; i<bTimeFrom.length; i++){
              if(bTimeFrom[i]=='a'||bTimeFrom[i]=='p'||bTimeFrom[i]=='m'){
                   endTimeSession+=bTimeFrom[i];
              }
     }
     
     for(let i=workEndTimeIndex+1; i<bTimeFrom.length; i++){
        if(bTimeFrom[i]!=' '){
            workEndTimeMM+=bTimeFrom[i];
        }else{
            break;
        }
     }
     
     for(let i=0; i<bTimeFrom.length; i++){
        if(bTimeFrom[i]!=':'){
            workEndTimeHH+=bTimeFrom[i]            
        }else{
            break;
        }
     }

    //  if(endTimeSession=='pm'||endTimeSession=='PM'){
    //     workEndTimeHH=timeConversion(workEndTimeHH)
    //  }
    if(endTimeSession=='pm'){
        if(parseInt(workEndTimeHH)!=12){
            workEndTimeHH=12+parseInt(workEndTimeHH)
        }else if(parseInt(workEndTimeHH)==12){
            workEndTimeHH='12'
        }
    }
 
 
    let bTimeTo='';
    if(i!=worksheetData.length-1 && worksheetData[i].date==worksheetData[i+1].date){
    let breakTimeTo=document.createElement('td');
     breakTimeTo.textContent=worksheetData[i+1].start_time;
     bTimeTo=worksheetData[i+1].start_time;
     row.appendChild(breakTimeTo);
    }else{
    let breakTimeTo=document.createElement('td');
     breakTimeTo.textContent='';
     row.appendChild(breakTimeTo);
    }

    // Start Work Time
    let workStartTimeHH='';
    let startWorkSession='';
    let indexOfSemi='';
       
     let workStartTimeIndex=bTimeTo.indexOf(':')  
     let workStartTimeMM='';   
     for(let i=workStartTimeIndex; i<bTimeTo.length; i++){
              if(bTimeTo[i]=='a'||bTimeTo[i]=='p'||bTimeTo[i]=='m'){
                   startWorkSession+=bTimeTo[i];
              }
     }

     for(let i=workStartTimeIndex+1; i<bTimeTo.length; i++){
        if(bTimeTo[i]!=' '){
            workStartTimeMM+=bTimeTo[i];
        }else{
            break;
        }
     }
    
    //  console.log(workStartTimeMM)
     for(let i=0; i<bTimeTo.length; i++){
        if(bTimeTo[i]!=':'){
            workStartTimeHH+=bTimeTo[i]            
        }else{
            break;
        }
     }

     if(startWorkSession=='pm'){
        if(parseInt(workStartTimeHH)!=12){
            workStartTimeHH=12+parseInt(workStartTimeHH)
            
        }else if(parseInt(workStartTimeHH)==12){
            workStartTimeHH='12'
        }
     }
    //  if(startWorkSession=='pm'||startWorkSession=='PM'){
    //    workStartTimeHH=timeConversion(workStartTimeHH)
    //  }
    //  console.log(workStartTimeHH)
     let breakTimeHH=`${parseInt(workStartTimeHH)-parseInt(workEndTimeHH)}`;
     let breakTimeMM=`${parseInt(workStartTimeMM)-parseInt(workEndTimeMM)}`;
     if(breakTimeMM<=9){
        breakTimeMM=`0${breakTimeMM}`
     }
    //  console.log(parseInt(workStartTimeHH)*60)
     let startWorkTime =(parseInt(workStartTimeHH)*60)+parseInt(workStartTimeMM)
     let endWorkTime=(parseInt(workEndTimeHH)*60)+parseInt(workEndTimeMM);
    //  console.log('end Work Time: '+endWorkTime)
  

     let finalBreakTime=startWorkTime-endWorkTime;
     
     if(finalBreakTime>=60){        
        let hh=Math.trunc(finalBreakTime/60);
        let mm= finalBreakTime%60;
        finalBreakTime=`${hh} Hr:${mm} Min`;
     }else{
       finalBreakTime=`${finalBreakTime} Min`
     }

     // break time - total
   if(i!=worksheetData.length-1&&workStartTimeHH!=''){
     let breakTime = document.createElement('td');
     breakTime.textContent=finalBreakTime;
    //  localStorage.setItem('breakTime',`${startWorkTime-endWorkTime}`)
     totalBreakTime1+=startWorkTime-endWorkTime
     row.appendChild(breakTime);
   }else{
    let breakTime = document.createElement('td');
     breakTime.textContent='';
     row.appendChild(breakTime);
   }

   //    Storing Break time in local storage



   // Total Break Time
//    if(isTotalDisplay){
//    let totalBreakTime=document.createElement('td');
//    let totalBreakTimeHH=Math.trunc(totalBreakTime1/60);
//    let totalBreakTimeMM=totalBreakTime1%60;
//    totalBreakTime.textContent=`${totalBreakTimeHH} Hr : ${totalBreakTimeMM} Min`
// //    totalBreakTime.rowSpan="2"
//    row.appendChild(totalBreakTime)
//    isTotalDisplay=false;
//    }

     // adding row to tbody
     tbody.appendChild(row);
     
    //  loopCount++;
// }) // end of mapping
} // End of for loop

let totalHH=Math.trunc(totalBreakTime1/60)
let totalMM=totalBreakTime1%60;
document.getElementById('totalBreakTime').innerHTML=`Total Break Time = ${totalHH} Hr : ${totalMM} Min`
console.log(`Total Break Time is: `+totalBreakTime1)

}// end  of if statement
}
document.getElementById('filter_by_date').value=localStorage.getItem('filterDate')
document.getElementById('filterDateText').value=localStorage.getItem('filterDate')
let currentWorksheetArray=<?php echo json_encode($workesheetdata);?>;
// Filter Date
document.getElementById('filter_by_date').addEventListener('change',function(){
    // alert('Date Change')
    let date=document.getElementById('filter_by_date').value;
    localStorage.setItem("isDateChange",true)
    localStorage.setItem('filterDate',date)
    document.getElementById('clearFilter').style.display="inline" 
    document.getElementById('showFilterResult').style.display="inline"    
    document.getElementById('filter_by_date').value=localStorage.getItem('filterDate')
    document.getElementById('filterDateText').value=localStorage.getItem('filterDate')
})
// Clear Button
document.getElementById('clearFilter').addEventListener('click',function(){
    localStorage.setItem("isDateChange",'')
    localStorage.setItem('filterDate','')
     localStorage.setItem("isTimeChange",'')
    localStorage.setItem('filterTime','')
    window.location.reload()
})

// Filter Time
document.getElementById('filterStartTime').addEventListener('change',function(){
   
    let time=document.getElementById('filterStartTime').value
    document.getElementById('clearFilter').style.display="inline" 
    document.getElementById('showFilterResult').style.display="inline"
    let newTime=time;
    if(time>="12:00"){
        let firstNumber=time.charAt(0);
        let secondNumber=time.charAt(1);
        let hh=firstNumber+secondNumber;
        let mm=time.slice(3)  
    }
    // document.getElementById('filter_time').value=time;
    localStorage.setItem('isTimeChange',true)
    localStorage.setItem('filterTime',newTime)
})

// /worksheet data function

function worksheetDataDetails(filterDate,filterTime){
// item.date>=localStorage.getItem('filterDate')
// alert(filterDate)
if(worksheetData==""){
     // accessing table body
    let tbody=document.querySelector('#viewWorksheetTable tbody');
    let row = document.createElement('tr');
    let td=document.createElement('td')
       td.textContent="No Data Available";
       td.colSpan=12;
     row.appendChild(td);
     tbody.appendChild(row)      

}else{
    // If no date is matching
  
worksheetData.map(item=>{    
    // accessing table body
    let newStartTime=parseInt(item.start_time);
    // console.log(`Start Time is ${newStartTime} and Filter Time is ${filterTime}`)
    // session i.e pm or am
    let session=item.start_time.slice(5).trim()
    // hours of start time
    let hh=item.start_time.charAt(0)+item.start_time.charAt(1).trim()
    let finalHrs=hh.replace(':','').trim()
    // minutes of start time
    let mm=item.start_time.slice(2,5).replace(":",'').trim()
   if(session=="pm"){
    if(finalHrs=="1"){
        finalHrs="13"
    }else if(finalHrs=="2"){
          finalHrs="14"
    }else if(finalHrs=="3"){
          finalHrs="15"
    }else if(finalHrs=="4"){
          finalHrs="16"
    }else if(finalHrs=="5"){
          finalHrs="17"
    }else if(finalHrs=="6"){
          finalHrs="18"
    }else if(finalHrs=="7"){
          finalHrs="19"
    }else if(finalHrs=="8"){
          finalHrs="20"
    }else if(finalHrs=="9"){
          finalHrs="21"
    }else if(finalHrs=="10"){
          finalHrs="22"
    }else if(finalHrs=="11"){
          finalHrs="23"
    }else if(finalHrs=="12"){
          finalHrs="24"
    }
    newStartTime=parseInt(finalHrs);
    
   }  
    
    let worksheetDay=parseInt(item.date.slice(8,10));
    let filterDay=parseInt(filterDate.slice(8,10));
    let filterTimeInNumber=parseInt(filterTime)
    // let date_result=worksheetDay==filterDay
    let time_result= newStartTime>=filterTimeInNumber
  
    let worksheetMonth=parseInt(item.date.slice(5,7));
    let filterMonth=parseInt(filterDate.slice(5,7))

    // let isMonthMatch=worksheetMonth === filterMonth
    let DateMatch= worksheetDay===filterDay && worksheetMonth === filterMonth
    console.log(worksheetDay===filterDay)
    if( DateMatch && time_result){
         console.log('Its PErfect')
     isDateTimeAvailable=true;
    let tbody=document.querySelector('#viewWorksheetTable tbody');
    // creating row
    let row = document.createElement('tr');

    // creating td for date
    let dateCell=document.createElement('td');
    //adding data to cell
    dateCell.textContent=item.date;
    // adding to row
    row.appendChild(dateCell);

    // creating td for workorder_no
    let workorderNoCell = document.createElement('td');
    // adding data to cell
    workorderNoCell.textContent=item.workorder_no;
    // adding to row
    row.appendChild(workorderNoCell);

    // for type_of_work
    let typeOfWork=document.createElement('td');
    // adding data to cell
    typeOfWork.textContent=item.type_of_work;
    // adding to row
    row.appendChild(typeOfWork);

    // for Name of Client
    let nameOfClient=document.createElement('td');
     nameOfClient.textContent=item.client_name;
     row.appendChild(nameOfClient);

     // work description
     let workDescription = document.createElement('td');
     workDescription.textContent=item.work_description;
     row.appendChild(workDescription);

     // work given by
     let workGivenBy=document.createElement('td');
     workGivenBy.textContent=item.work_given_by;
     row.appendChild(workGivenBy);

     // remarks
     let remark = document.createElement('td');
     remark.textContent=item.remarks;
     row.appendChild(remark);

     // start time
     let startTime=document.createElement('td');
     startTime.textContent=item.start_time;
    //  console.log(item.start_time)
    //  console.log(typeof(item.start_time))
     row.appendChild(startTime);

     // end time
     let endTime=document.createElement('td');
     endTime.textContent=item.end_time;
     row.appendChild(endTime);

     // break time from
     let breakTimeFrom=document.createElement('td');
     breakTimeFrom.textContent=item.end_time;
     row.appendChild(breakTimeFrom);

     // break time to
     let breakTimeTo=document.createElement('td');
     breakTimeTo.textContent=item.break_time_to;
     row.appendChild(breakTimeTo);
     
     // break time - total
     let breakTime = document.createElement('td');
     breakTime.textContent=item.spent_time;
     row.appendChild(breakTime);

     // adding row to tbody

     tbody.appendChild(row);
    
    }
    
    // end of condition for checking 
   
}) // end of mapping
     // If no data is matching

    if(!isDateTimeAvailable&&!isTimeDataAvailable){
    let tbody=document.querySelector('#viewWorksheetTable tbody');
    let row = document.createElement('tr');
    let td=document.createElement('td')
       td.textContent="No Data Available";
       td.colSpan=12;
       row.appendChild(td);
       tbody.appendChild(row)   
    }
}// end  of if statement
}

document.getElementById('showFilterResult').addEventListener('click',function(){
    window.location.reload()
})
    </script>