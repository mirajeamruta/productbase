<!DOCTYPE html>


<html>




<body bgcolor="lightblue">
    <center>
  
        <table class="table table-bordered" style="" id="tableid1">
        <th class="activity" colspan="11" hidden>User Report Details</th>
            <thead class="wkorderhead text-white">
                <tr>
                    <th hidden>Name</th>
                    <th hidden>ICAI / SRO Number</th>
                    <th hidden>Date of Commencement of Articleship / Employement</th>
                    <th hidden>Date of Completion of Articleship / Employement</th>
                    <th hidden>Partner under whom registered</th>
                    <th hidden>Balu & Anand ID Number</th>

                </tr>
            </thead>
            <tbody>
                <?php
                if (count($userdetailsdata) > 0) {
                    foreach ($userdetailsdata as $row) {
                ?>
                        <tr>
                            <td hidden><?php echo $row['name']; ?> </td>
                            <td hidden><?php echo $row['ID']; ?> </td>
                            <td hidden ><?php echo $row['startdate']; ?> </td>
                            <td hidden><?php echo $row['enddate']; ?> </td>
                            <td hidden><?php echo $row['partner_under_whom_registered'] ?></td>
                            <td hidden><?php echo $row['balunand_id_no'] ?></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="5">No Data Found</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>

        </table>


     <div id="reportFilterButtons">
       <input type="date" id="filterDate" class="Filterdatabutton report__filterbtn">
        <button onclick="filterData()" class="Filter__dataBtn" style="position: absolute;top: 89px;right: 50px;width: 79px;border: none;background: #4545e8;;color: white;height: 37px; border-radius: 3px;">Filter</button>
     </div>
       
        <table border="1" cellspacing="5" bgcolor="white" class="daily___activityreport"  id="tblData">
        <thead><!-- Add the header row here --></thead>
            <tr class="tablereport">
                <th class="activity" colspan="13">Daily Activity Report</th>
            </tr>
            <tr>
                <th colspan="2">Beginning of Year 1:</th>
                <th>2022-02-26</th>
                <th colspan="3">End of Year 1:</th>
                <th colspan="">2023-03-27</th>
            </tr>
            <tr class="reportdata" id="adminreport_data">
                <th>Sl. No.</th>
                <th>Date</th>
                <th>Name of Client</th>
                <th>Workorder Number</th>
                <th>Type Of Work</th>
                <th>Description of Work</th>
		<th>Partner Incharge</th>
                <th>Start Time</th>
                <th>End Time</th>
		<th>Break Time From </th>
                <th>Break Time To </th>
                <th>Break Time</th>
                <th>Status</th>
            </tr>
            <!--<?php
            if (!empty($workesheetdata)) {
                foreach ($workesheetdata as $worksheetrecord) {
            ?>
                    <tr>
                        <td><?php echo $worksheetrecord['SrNo']; ?></td>
                        <td><?php echo date('Y-m-d', strtotime($worksheetrecord['date'])); ?></td>
                        <td><?php echo $worksheetrecord['client_name']; ?></td>
                        <td><?php echo $worksheetrecord['workorder_no']; ?></td>
                        <td><?php echo $worksheetrecord['type_of_work']; ?></td>
                        <td><?php echo $worksheetrecord['work_description']; ?></td>
                        <td><?php echo $worksheetrecord['start_time']; ?></td>
                        <td><?php echo $worksheetrecord['end_time']; ?></td>
                        <td><?php echo $worksheetrecord['partner_in_charge']; ?></td>
                        <td><?php echo $worksheetrecord['status']; ?></td>
                    </tr>
                <?php
                }
            } else {
                ?>
                <tr class="text-center">
                    <td colspan="10">No Data Found</td>
                </tr>
            <?php
            }
            ?>-->

        </table>
<br>
     <!-- Add a new button to export both tables -->
   
    <button class="excelbutton" onclick="exportTablesToExcel()">Export Tables Data To Excel File</button>


    </center>

    <!-- excel sheet data both table exporting -->

<script>
window.addEventListener('beforeunload',function(){
    localStorage.removeItem('selectedte')
    localStorage.setItem('refreshPage',true)
})
</script>

<!-- Add the Moment.js library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<!-- Add the SheetJS library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>



<script>
function formatDate(dateString) {
    const dateObject = moment(dateString);
    return dateObject.isValid() ? dateObject.format("YYYY-MM-DD") : dateString;
}

function formatDatesInSheet(sheet, columnIndex) {
    for (var r = 1; r < sheet.length; r++) {
        var cell = sheet[XLSX.utils.encode_cell({ r: r, c: columnIndex })];
        if (cell && cell.t === 'd' && !isNaN(cell.v)) {
            cell.t = 's';
            cell.v = formatDate(cell.w);
        }
    }
}

function exportTablesToExcel() {
    var filename = 'Report_data.xlsx';
    var wb = XLSX.utils.book_new();

    // Export data from the first table (tblData)
    var tblData = document.getElementById('tblData');
    var wsTblData = XLSX.utils.table_to_sheet(tblData);
    formatDatesInSheet(wsTblData, 1); // Assuming the date is in the second column (index 1)
    XLSX.utils.book_append_sheet(wb, wsTblData, 'Daily Activity Report');

    // Create a hidden table to copy the data from tableid1
    var hiddenTable = document.createElement('table');
    hiddenTable.style.display = 'none';
    document.body.appendChild(hiddenTable);
    var tableid1 = document.getElementById('tableid1');
    hiddenTable.innerHTML = tableid1.outerHTML;

    // Export data from the second table (tableid1)
    var wsTableid1 = XLSX.utils.table_to_sheet(hiddenTable);
    formatDatesInSheet(wsTableid1, 2); // Assuming the date is in the third column (index 2)
    XLSX.utils.book_append_sheet(wb, wsTableid1, 'Table 2 (Hidden)');

    // Remove the hidden table
    document.body.removeChild(hiddenTable);

    // Export the workbook to Excel file
    XLSX.writeFile(wb, filename);
}
</script>



    <!-- filter the data for report table -->


    <script>
        function filterData() {
            // Get the selected date value
            const filterDate = document.getElementById('filterDate').value;

            // Get all rows in the table except for the header row
            const rows = Array.from(document.querySelectorAll('#tblData tr:not(.reportdata)'));

            // Clear the existing table rows
            rows.forEach(row => {
                row.style.display = '';
            });

            // Filter the data based on the selected date
            let foundData = false;
            rows.forEach(row => {
                const dateCell = row.querySelector('td:nth-child(2)');
                if (dateCell && dateCell.textContent.trim() !== filterDate) {
                    row.style.display = 'none';
                } else {
                    foundData = true;
                }
            });

            // Show "No Data Found" message if no matching rows are found
            if (!foundData) {
                const noDataRow = document.createElement('tr');
                const noDataCell = document.createElement('td');
                noDataCell.setAttribute('colspan', '10');
                noDataCell.textContent = 'No Data Found';
                noDataRow.appendChild(noDataCell);
                document.querySelector('#tblData tbody').appendChild(noDataRow);
            }
        }
    </script>




    <!-- view report paricular details code -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add click event listener to "ViewUserReport" links
            $('.viewdetail').on('click', function(e) {
                e.preventDefault();
                const user_id = $(this).attr('id');

                // Fetch user report details based on the userId using AJAX
                $.ajax({
                    url: "<?php echo base_url('Report/View_user_controllerreport') ?>",
                    method: 'POST',
                    data: {
                        user_id: user_id
                    },
                    success: function(response) {
                        // Update the report table with the fetched data
                        $('#tblData tbody').html(response);
                    },
                    error: function() {
                        alert('Error occurred while fetching user report data.');
                    }
                });
            });
        });
    </script>


</script>
   

    <script>
 localStorage.setItem("isDateChange",'')
    localStorage.setItem('filterDate','')
     localStorage.setItem("isTimeChange",'')
    localStorage.setItem('filterTime','')
    let worksheetData = <?php echo json_encode($workesheetdata);?>;
    let isDateChange = localStorage.getItem('isDateChange')
    let isTimeChange = localStorage.getItem('isTimeChange')

    if (isTimeChange || isDateChange) {
        document.getElementById('clearFilter').style.display = "inline"
        document.getElementById('showFilterResult').style.display = "inline"
    }

    if (isTimeChange) {
        document.getElementById('filterStartTime').value = localStorage.getItem('filterTime')
    }
    if (isDateChange && isTimeChange) {
        var isDateTimeAvailable = false;
        let filterDate = localStorage.getItem('filterDate')
        let filterTime = localStorage.getItem('filterTime')
        worksheetDataDetails(filterDate, filterTime.slice(0, 2))
    } else if (isDateChange) {

        let filterDate = localStorage.getItem('filterDate')
        let isDataAvailable = false;

        for (let i = 0; i < worksheetData.length; i++) {
            let worksheetDay = parseInt(worksheetData[i].date.slice(8, 10));
            let worksheetMonth = parseInt(worksheetData[i].date.slice(5, 7));

            let filterDay = parseInt(filterDate.slice(8, 10));
            let filterMonth = parseInt(filterDate.slice(5, 7))

            let isMonthMatch = worksheetMonth === filterMonth

            if (worksheetDay === filterDay && isMonthMatch) {
                isDataAvailable = true;
                let tbody = document.querySelector('#tblData tbody');

                let row = document.createElement('tr');

                let serialNoCell = document.createElement('td');
                serialNoCell.textContent = worksheetData[i].SrNo;
                row.appendChild(serialNoCell);

                let dateCell = document.createElement('td');
                dateCell.textContent = worksheetData[i].date;
                row.appendChild(dateCell);

                let nameOfClient = document.createElement('td');
                nameOfClient.textContent = worksheetData[i].client_name;
                row.appendChild(nameOfClient);

                let workorderNoCell = document.createElement('td');
                // adding data to cell
                workorderNoCell.textContent = worksheetData[i].workorder_no;
                // adding to row
                row.appendChild(workorderNoCell);

                let typeOfWork = document.createElement('td');
                // adding data to cell
                typeOfWork.textContent = worksheetData[i].type_of_work;
                // adding to row
                row.appendChild(typeOfWork);

                let workDescription = document.createElement('td');
                workDescription.textContent = worksheetData[i].work_description;
                row.appendChild(workDescription);

                let partnerInCharge = document.createElement('td');
                partnerInCharge.textContent = worksheetData[i].partner_in_charge;
                row.appendChild(partnerInCharge);

                let startTime = document.createElement('td');
                startTime.textContent = worksheetData[i].start_time;
                row.appendChild(startTime);

                let endTime = document.createElement('td');
                endTime.textContent = worksheetData[i].end_time;
                row.appendChild(endTime);

                let breakTimeFrom = document.createElement('td');
                breakTimeFrom.textContent = worksheetData[i].end_time;
                row.appendChild(breakTimeFrom);

                let bTimeFrom = worksheetData[i].end_time;

                let workEndTimeHH = '';
                let endTimeSession = '';
                let workEndTimeIndex = bTimeFrom.indexOf(':')
                let workEndTimeMM = '';

                for (let i = workEndTimeIndex; i < bTimeFrom.length; i++) {
                    if (bTimeFrom[i] == 'a' || bTimeFrom[i] == 'p' || bTimeFrom[i] == 'm') {
                        endTimeSession += bTimeFrom[i];
                    }
                }

                for (let i = workEndTimeIndex + 1; i < bTimeFrom.length; i++) {
                    if (bTimeFrom[i] != ' ') {
                        workEndTimeMM += bTimeFrom[i];
                    } else {
                        break;
                    }
                }

                for (let i = 0; i < bTimeFrom.length; i++) {
                    if (bTimeFrom[i] != ':') {
                        workEndTimeHH += bTimeFrom[i]
                    } else {
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

                let bTimeTo = '';
                if (i != worksheetData.length - 1 && worksheetData[i].date == worksheetData[i + 1].date) {
                    let breakTimeTo = document.createElement('td');
                    breakTimeTo.textContent = worksheetData[i + 1].start_time;
                    bTimeTo = worksheetData[i + 1].start_time;
                    row.appendChild(breakTimeTo);
                } else {

                    let breakTimeTo = document.createElement('td');
                    breakTimeTo.textContent = '';
                    row.appendChild(breakTimeTo);
                }

                let workStartTimeHH = '';
                let startWorkSession = '';
                let indexOfSemi = '';

                let workStartTimeIndex = bTimeTo.indexOf(':')
                let workStartTimeMM = '';
                for (let i = workStartTimeIndex; i < bTimeTo.length; i++) {
                    if (bTimeTo[i] == 'a' || bTimeTo[i] == 'p' || bTimeTo[i] == 'm') {
                        startWorkSession += bTimeTo[i];
                    }
                }

                for (let i = workStartTimeIndex + 1; i < bTimeTo.length; i++) {
                    if (bTimeTo[i] != ' ') {
                        workStartTimeMM += bTimeTo[i];
                    } else {
                        break;
                    }
                }

                for (let i = 0; i < bTimeTo.length; i++) {
                    if (bTimeTo[i] != ':') {
                        workStartTimeHH += bTimeTo[i]
                    } else {
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

                let breakTimeHH = `${parseInt(workStartTimeHH)-parseInt(workEndTimeHH)}`;
                let breakTimeMM = `${parseInt(workStartTimeMM)-parseInt(workEndTimeMM)}`;
                if (breakTimeMM <= 9) {
                    breakTimeMM = `0${breakTimeMM}`
                }

                let startWorkTime = (parseInt(workStartTimeHH) * 60) + parseInt(workStartTimeMM)
                let endWorkTime = (parseInt(workEndTimeHH) * 60) + parseInt(workEndTimeMM);
                //  console.log('end Work Time: '+endWorkTime)
                console.log(workStartTimeHH)
                let finalBreakTime = startWorkTime - endWorkTime;

                if (finalBreakTime >= 60) {
                    let hh = Math.trunc(finalBreakTime / 60);
                    let mm = finalBreakTime - 60;
                    finalBreakTime = `${hh}:${mm} Hour`;
                } else {
                    finalBreakTime = `${finalBreakTime} Minutes`
                }

                if (i != worksheetData.length - 1 && workStartTimeHH != '') {
                    let breakTime = document.createElement('td');
                    breakTime.textContent = finalBreakTime;
                    row.appendChild(breakTime);
                } else {
                    let breakTime = document.createElement('td');
                    breakTime.textContent = '';
                    row.appendChild(breakTime);
                }

                localStorage.setItem('breakTime', 'Hello')
                console.log('Break Time ' + finalBreakTime)

                // Total Break Time
                let totalBreakTime = document.createElement('td');
                totalBreakTime.textContent = ''
                row.appendChild(totalBreakTime)
                // adding row to tbody
                tbody.appendChild(row);

                let status = document.createElement('td');
                status.textContent = worksheetData[i].status;
                row.appendChild(status);
            }

        }

        if (!isDataAvailable) {
            // accessing table body
            let tbody = document.querySelector('#tblData tbody');
            let row = document.createElement('tr');
            let td = document.createElement('td')
            td.textContent = "No Data Available";
            td.colSpan = 12;
            row.appendChild(td);
            tbody.appendChild(row)
        }
    } else if (isTimeChange) {

        var isTimeDataAvailable = false;

        for (let i = 0; i < worksheetData.length; i++) {
            let filterTime = localStorage.getItem('filterTime')
            // // worksheetDataDetails('',filterTime.slice(0,2))
            let newStartTime = parseInt(worksheetData[i].start_time);
            // console.log(`Start Time is ${newStartTime} and Filter Time is ${filterTime}`)
            // session i.e pm or am
            let session = worksheetData[i].start_time.slice(5).trim()
            // hours of start time
            let hh = worksheetData[i].start_time.charAt(0) + worksheetData[i].start_time.charAt(1).trim()

            let finalHrs = hh.replace(':', '').trim()
            let mm = worksheetData[i].start_time.slice(2, 5).replace(":", '').trim()
            if (session == "pm") {
                if (finalHrs == "1") {
                    finalHrs = "13"
                } else if (finalHrs == "2") {
                    finalHrs = "14"
                } else if (finalHrs == "3") {
                    finalHrs = "15"
                } else if (finalHrs == "4") {
                    finalHrs = "16"
                } else if (finalHrs == "5") {
                    finalHrs = "17"
                } else if (finalHrs == "6") {
                    finalHrs = "18"
                } else if (finalHrs == "7") {
                    finalHrs = "19"
                } else if (finalHrs == "8") {
                    finalHrs = "20"
                } else if (finalHrs == "9") {
                    finalHrs = "21"
                } else if (finalHrs == "10") {
                    finalHrs = "22"
                } else if (finalHrs == "11") {
                    finalHrs = "23"
                } else if (finalHrs == "12") {
                    finalHrs = "24"
                }
                newStartTime = parseInt(finalHrs);

            }

            let worksheetDay = parseInt(worksheetData[i].date.slice(8, 10));
            // let filterDay=parseInt(filterDate.slice(8,10));
            let filterTimeInNumber = parseInt(filterTime)

            if (newStartTime >= filterTimeInNumber) {
                isTimeDataAvailable = true;
                let tbody = document.querySelector('#tblData tbody');
                // creating row
                let row = document.createElement('tr');

                let serialNoCell = document.createElement('td');
                serialNoCell.textContent = worksheetData[i].SrNo;
                row.appendChild(serialNoCell);

                let dateCell = document.createElement('td');
                //adding data tolet row = document.createElement('tr'); cell
                dateCell.textContent = worksheetData[i].date;
                // adding to row
                row.appendChild(dateCell);

                let nameOfClient = document.createElement('td');
                nameOfClient.textContent = worksheetData[i].client_name;
                row.appendChild(nameOfClient);

                let workorderNoCell = document.createElement('td');
                // adding data to cell
                workorderNoCell.textContent = worksheetData[i].workorder_no;
                // adding to row
                row.appendChild(workorderNoCell);

                let typeOfWork = document.createElement('td');
                // adding data to cell
                typeOfWork.textContent = worksheetData[i].type_of_work;
                // adding to row
                row.appendChild(typeOfWork);

                let workDescription = document.createElement('td');
                workDescription.textContent = worksheetData[i].work_description;
                row.appendChild(workDescription);

                let partnerInCharge = document.createElement('td');
                partnerInCharge.textContent = worksheetData[i].partner_in_charge;
                row.appendChild(partnerInCharge);

                let startTime = document.createElement('td');
                startTime.textContent = worksheetData[i].start_time;
                //  console.log(item.start_time)
                //  console.log(typeof(item.start_time))
                row.appendChild(startTime);

                let endTime = document.createElement('td');
                endTime.textContent = worksheetData[i].end_time;
                row.appendChild(endTime);

                let breakTimeFrom = document.createElement('td');
                breakTimeFrom.textContent = worksheetData[i].end_time;
                row.appendChild(breakTimeFrom);
                let bTimeFrom = worksheetData[i].end_time;

                let workEndTimeHH = '';
                let endTimeSession = '';
                let workEndTimeIndex = bTimeFrom.indexOf(':')
                let workEndTimeMM = '';

                for (let i = workEndTimeIndex; i < bTimeFrom.length; i++) {
                    if (bTimeFrom[i] == 'a' || bTimeFrom[i] == 'p' || bTimeFrom[i] == 'm') {
                        endTimeSession += bTimeFrom[i];
                    }
                }

                for (let i = workEndTimeIndex + 1; i < bTimeFrom.length; i++) {
                    if (bTimeFrom[i] != ' ') {
                        workEndTimeMM += bTimeFrom[i];
                    } else {
                        break;
                    }
                }

                for (let i = 0; i < bTimeFrom.length; i++) {
                    if (bTimeFrom[i] != ':') {
                        workEndTimeHH += bTimeFrom[i]
                    } else {
                        break;
                    }
                }

		if(endTimeSession=='pm'){
        	  if(parseInt(workEndTimeHH)!=12){
                      workEndTimeHH=12+parseInt(workEndTimeHH)
        	} else if(parseInt(workEndTimeHH)==12){
           	 workEndTimeHH='12'
       	 	}
    	}
                let bTimeTo = '';
                if (i != worksheetData.length - 1 && worksheetData[i].date == worksheetData[i + 1].date) {
                    let breakTimeTo = document.createElement('td');
                    breakTimeTo.textContent = worksheetData[i + 1].start_time;
                    bTimeTo = worksheetData[i + 1].start_time;
                    row.appendChild(breakTimeTo);
                } else {
                    let breakTimeTo = document.createElement('td');
                    breakTimeTo.textContent = '';
                    row.appendChild(breakTimeTo);
                }

                let workStartTimeHH = '';
                let startWorkSession = '';
                let indexOfSemi = '';

                let workStartTimeIndex = bTimeTo.indexOf(':')
                let workStartTimeMM = '';
                for (let i = workStartTimeIndex; i < bTimeTo.length; i++) {
                    if (bTimeTo[i] == 'a' || bTimeTo[i] == 'p' || bTimeTo[i] == 'm') {
                        startWorkSession += bTimeTo[i];
                    }
                }

                for (let i = workStartTimeIndex + 1; i < bTimeTo.length; i++) {
                    if (bTimeTo[i] != ' ') {
                        workStartTimeMM += bTimeTo[i];
                    } else {
                        break;
                    }
                }

                //  console.log(workStartTimeMM)
                for (let i = 0; i < bTimeTo.length; i++) {
                    if (bTimeTo[i] != ':') {
                        workStartTimeHH += bTimeTo[i]
                    } else {
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

                let breakTimeHH = `${parseInt(workStartTimeHH)-parseInt(workEndTimeHH)}`;
                let breakTimeMM = `${parseInt(workStartTimeMM)-parseInt(workEndTimeMM)}`;
                if (breakTimeMM <= 9) {
                    breakTimeMM = `0${breakTimeMM}`
                }

                let startWorkTime = (parseInt(workStartTimeHH) * 60) + parseInt(workStartTimeMM)
                let endWorkTime = (parseInt(workEndTimeHH) * 60) + parseInt(workEndTimeMM);
                //  console.log('end Work Time: '+endWorkTime)
                console.log(workStartTimeHH)
                let finalBreakTime = startWorkTime - endWorkTime;

                if (finalBreakTime >= 60) {
                    let hh = Math.trunc(finalBreakTime / 60);
                    let mm = finalBreakTime - 60;
                    finalBreakTime = `${hh} Hr:${mm} Min`;
                } else {
                    finalBreakTime = `${finalBreakTime} Min`
                }

                // break time - total
                if (i != worksheetData.length - 1 && workStartTimeHH != '' && workStartTimeHH <= 6) {
                    let breakTime = document.createElement('td');
                    breakTime.textContent = finalBreakTime;
                    row.appendChild(breakTime);
                } else {
                    let breakTime = document.createElement('td');
                    breakTime.textContent = '';
                    row.appendChild(breakTime);
                }

                let status = document.createElement('td');
                status.textContent = worksheetData[i].status;
                row.appendChild(status);
                // adding row to tbody

                tbody.appendChild(row);
            }
            //    }) // End of Mapping
        }

    } else {

        if (worksheetData == "") {
            // accessing table body
            let tbody = document.querySelector('#tblData tbody');
            let row = document.createElement('tr');
            let td = document.createElement('td')
            td.textContent = "No Data Available";
            td.colSpan = 12;
            row.appendChild(td);
            tbody.appendChild(row)
        } else {

            let totalBreakTime1 = 0;
            let isTotalDisplay = true;

            for (let i = 0; i < worksheetData.length; i++) {

                let tbody = document.querySelector('#tblData tbody');
                // creating row
                let row = document.createElement('tr');

                let serialNoCell = document.createElement('td');
                serialNoCell.textContent = worksheetData[i].SrNo;
                row.appendChild(serialNoCell);

                // creating td for date
                let dateCell = document.createElement('td');
                //adding data to cell
                // dateCell.textContent=item.date;
                dateCell.textContent = worksheetData[i].date;

                // adding to row
                row.appendChild(dateCell);

                let nameOfClient = document.createElement('td');
                nameOfClient.textContent = worksheetData[i].client_name;
                row.appendChild(nameOfClient);

                // creating td for workorder_no
                let workorderNoCell = document.createElement('td');
                // adding data to cell
                workorderNoCell.textContent = worksheetData[i].workorder_no;
                // adding to row
                row.appendChild(workorderNoCell);

                let typeOfWork = document.createElement('td');
                // adding data to cell
                typeOfWork.textContent = worksheetData[i].type_of_work;
                // adding to row
                row.appendChild(typeOfWork);

                let workDescription = document.createElement('td');
                workDescription.textContent = worksheetData[i].work_description;
                row.appendChild(workDescription);

                let partnerInCharge = document.createElement('td');
                partnerInCharge.textContent = worksheetData[i].partner_in_charge;
                row.appendChild(partnerInCharge);

                let startTime = document.createElement('td');
                startTime.textContent = worksheetData[i].start_time;
                row.appendChild(startTime);
                prevStartTime = worksheetData[i].start_time

                let endTime = document.createElement('td');
                endTime.textContent = worksheetData[i].end_time;
                row.appendChild(endTime);

                let breakTimeFrom = document.createElement('td');
                breakTimeFrom.textContent = worksheetData[i].end_time;
                row.appendChild(breakTimeFrom);
                let bTimeFrom = worksheetData[i].end_time;

                let workEndTimeHH = '';
                let endTimeSession = '';
                let workEndTimeIndex = bTimeFrom.indexOf(':')
                let workEndTimeMM = '';

                for (let i = workEndTimeIndex; i < bTimeFrom.length; i++) {
                    if (bTimeFrom[i] == 'a' || bTimeFrom[i] == 'p' || bTimeFrom[i] == 'm') {
                        endTimeSession += bTimeFrom[i];
                    }
                }

                for (let i = workEndTimeIndex + 1; i < bTimeFrom.length; i++) {
                    if (bTimeFrom[i] != ' ') {
                        workEndTimeMM += bTimeFrom[i];
                    } else {
                        break;
                    }
                }

                for (let i = 0; i < bTimeFrom.length; i++) {
                    if (bTimeFrom[i] != ':') {
                        workEndTimeHH += bTimeFrom[i]
                    } else {
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
                let bTimeTo = '';
                if (i != worksheetData.length - 1 && worksheetData[i].date == worksheetData[i + 1].date) {
                    let breakTimeTo = document.createElement('td');
                    breakTimeTo.textContent = worksheetData[i + 1].start_time;
                    bTimeTo = worksheetData[i + 1].start_time;
                    row.appendChild(breakTimeTo);
                } else {
                    let breakTimeTo = document.createElement('td');
                    breakTimeTo.textContent = '';
                    row.appendChild(breakTimeTo);
                }

                // Start Work Time
                let workStartTimeHH = '';
                let startWorkSession = '';
                let indexOfSemi = '';

                let workStartTimeIndex = bTimeTo.indexOf(':')
                let workStartTimeMM = '';
                for (let i = workStartTimeIndex; i < bTimeTo.length; i++) {
                    if (bTimeTo[i] == 'a' || bTimeTo[i] == 'p' || bTimeTo[i] == 'm') {
                        startWorkSession += bTimeTo[i];
                    }
                }

                for (let i = workStartTimeIndex + 1; i < bTimeTo.length; i++) {
                    if (bTimeTo[i] != ' ') {
                        workStartTimeMM += bTimeTo[i];
                    } else {
                        break;
                    }
                }

                //  console.log(workStartTimeMM)
                console.log(workStartTimeHH)
                for (let i = 0; i < bTimeTo.length; i++) {
                    if (bTimeTo[i] != ':') {
                        workStartTimeHH += bTimeTo[i]
                    } else {
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
                let breakTimeHH = `${parseInt(workStartTimeHH)-parseInt(workEndTimeHH)}`;
                let breakTimeMM = `${parseInt(workStartTimeMM)-parseInt(workEndTimeMM)}`;
                if (breakTimeMM <= 9) {
                    breakTimeMM = `0${breakTimeMM}`
                }

                //  console.log(parseInt(workStartTimeHH)*60)
                let startWorkTime = (parseInt(workStartTimeHH) * 60) + parseInt(workStartTimeMM)
                let endWorkTime = (parseInt(workEndTimeHH) * 60) + parseInt(workEndTimeMM);
                //  console.log('end Work Time: '+endWorkTime)
                console.log(workStartTimeHH)
                let finalBreakTime = startWorkTime - endWorkTime;

                if (finalBreakTime >= 60) {
                    let hh = Math.trunc(finalBreakTime / 60);
                    let mm = finalBreakTime % 60;
                    finalBreakTime = `${hh} Hr:${mm} Min`;
                } else {
                    finalBreakTime = `${finalBreakTime} Min`
                }

                // break time - total
                if (i != worksheetData.length - 1 && workStartTimeHH != '') {
                    let breakTime = document.createElement('td');
                    breakTime.textContent = finalBreakTime;
                    //  localStorage.setItem('breakTime',`${startWorkTime-endWorkTime}`)
                    totalBreakTime1 += startWorkTime - endWorkTime
                    row.appendChild(breakTime);
                } else {
                    let breakTime = document.createElement('td');
                    breakTime.textContent = '';
                    row.appendChild(breakTime);
                }

                let status = document.createElement('td');
                status.textContent = worksheetData[i].status;
                row.appendChild(status);
                //    Storing Break time in local storage

                tbody.appendChild(row);
            } // End of for loop

            let totalHH = Math.trunc(totalBreakTime1 / 60)
            let totalMM = totalBreakTime1 % 60;
            document.getElementById('totalBreakTime').innerHTML = `Total Break Time = ${totalHH} Hr : ${totalMM} Min`
            console.log(`Total Break Time is: ` + totalBreakTime1)
        }
    }
    </script>
    
    