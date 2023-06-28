<!DOCTYPE html>
<html>

<body bgcolor="lightblue">
    <center>
        <table border="1" cellspacing="5" bgcolor="white" style="margin-top:95px; width: 78%;" id="tblData">
            <!-- <caption><b>Input Marks</b></caption> -->

            <tr class="tablereport">
                <!-- <th rowspan="2">Name</th> -->
                <th class="activity" colspan="11">Daily Activity Report</th>

            </tr>
            <tr>
                <th colspan="2">Beginning of Year 1:</th>
                <th>26-2-22</th>
                <th colspan="3"> End of Year 1:</th>
                <th colspan="">27-3-23</th>
            </tr>
            <tr class="reportdata">
                <th>Sl. No.</th>
                <th>Date</th>
                <th colspan="">Name of Client</th>
                <th>Workorder Number</th>
                <th>Description of Work</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Partner Incharge</th>
                <th>Status</th>

            </tr>

            <?php
            if (!empty($workesheetdata)) {
                foreach ($workesheetdata as $worksheetrecord) {
            ?>
                    <tbody>
                        <td><?php echo $worksheetrecord['SrNo']; ?></td>
                        <td><?php echo $worksheetrecord['date']; ?> </td>
                        <td><?php echo $worksheetrecord['client_name']; ?> </td>
                        <td><?php echo $worksheetrecord['workorder_no']; ?> </td>
                        <td><?php echo $worksheetrecord['work_description']; ?> </td>
                        <td><?php echo $worksheetrecord['start_time']; ?></td>
                        <td><?php echo $worksheetrecord['end_time']; ?></td>
                        <td><?php echo $worksheetrecord['partner_in_charge']; ?></td>
                        <td><?php echo $worksheetrecord['status']; ?></td>

                    </tbody>

                <?php
                }
            } else {
                ?>
                <tr class="text-center">
                    <td colspan="9">No Data Found</td>
                </tr>
            <?php
            }
            ?>
        </table>
        <br>
        <button class="excelbutton" onclick="exportTableToExcel('tblData')">Export Table Data To Excel File</button>

    </center>





    <script>
        function exportTableToExcel(tableID, filename = '') {
            var downloadLink;
            var dataType = 'application/vnd.ms-excel';
            var tableSelect = document.getElementById(tableID);
            var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

            // Specify file name
            filename = filename ? filename + '.xls' : 'report_data.xls';

            // Create download link element
            downloadLink = document.createElement("a");

            document.body.appendChild(downloadLink);

            if (navigator.msSaveOrOpenBlob) {
                var blob = new Blob(['\ufeff', tableHTML], {
                    type: dataType
                });
                navigator.msSaveOrOpenBlob(blob, filename);
            } else {
                // Create a link to the file
                downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                // Setting the file name
                downloadLink.download = filename;

                //triggering the function
                downloadLink.click();
            }
        }
    </script>


</body>

</html>