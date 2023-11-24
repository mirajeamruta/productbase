<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

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
    top: 5px;
    z-index: 1;
}

    .container-viewclient {
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

    .container-viewclient .title {
        padding: 25px;
        background: #f6f8fa;
        /* text-align: center; */
    }

    .container-viewclient .title p {
        font-size: 25px;
        font-weight: 500;
        /* position: relative; */
    }

    .container-viewclient .title p::before {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 30px;
        height: 3px;
        background: linear-gradient(to right, #F37A65, #D64141);
    }

    .table {
        font-size: 14px;
        background-color: #fff;
        width: 100%;
        border-collapse: collapse;
    }

    .table th {
        background-color: #007bff;
        color: #fff;
        text-align: center;
        padding: 10px;
    }

    .table th.hidden {
        display: none;
    }

    .table th.tablehead {
        width: 24.2px;
    }

    .table td {
        background-color: #f6f8fa;
        text-align: center;
        padding: 10px;
    }

    .table td.action-column {
        margin-left: -8px;
    }
    #exportAllButtonContainer {
    margin-top: 10px;
    text-align: right; /* Align the export button to the right */
    padding-right: 22px; /* Add some padding to the right to prevent button overflow */
}

#exportAllButton {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    display: inline-block; /* Make the button occupy only the necessary space */
    margin-top: 25px; /* Add margin to move the button down */
}

#exportAllButton:hover {
    background-color: #0056b3;
}

    .table .tablero td {
        background-color: #fff;
        text-align: center;
    }

 

    .pagination {

        padding-left: 690px
}


/* Add this CSS to hide the top pagination controls */
#clienttable_info {
    display: none;
}

/* Add this CSS to show the "Showing X to Y of Z entries" text at the bottom */
#clienttable_info {
    display: block;
    margin-left: 13px;
}

/* Hide the "Show" dropdown and "Entries" text next to the search bar */
#clienttable_length {
    display: none;
}
/* Move the search button up */
.dataTables_filter label {
    position: relative;
    top: -37px; /* Adjust the top value as needed to move the button up */
}

.dataTables_filter input[type="search"] {
    display: inline-block;
    width: auto;
    margin-right: 10px; /* Adjust the margin as needed */
}

/* Add this CSS for small screens only */
@media (max-width: 767px) {
    #exportAllButtonContainer {
        text-align: left; /* Align the export button to the left for small screens */
        margin-left: 41px !important;/* Remove the padding for small screens */
    }

    .dataTables_filter {
        text-align: left; /* Align the search input to the left for small screens */
        margin-bottom: 10px; /* Add some margin below the search input */
    }

    .dataTables_filter label {
        position: relative;
        top: 22px; /* Reset the top value to avoid overlap with the export button */
    }

    .dataTables_filter input[type="search"] {
        display: inline-block;
        width: auto;
        margin-right: 20px; /* Adjust the margin between the search input and export button */
    }

    .container-viewclient {
        margin-top: -1px !important;
    height: 559px;
    width: 359px;
    margin-left: -24px !important; /* Add margin to move the table container down */
    }
    #clienttable{
        margin-top:24px !important;
    }

    #clienttable_info {
    display: block;
    margin-left: -5px !important;

}
.pagination{
    position: absolute;
    margin-left: -439px !important;
    margin-top: -23px !important;

}


}

/* Add this CSS for small screens only */
@media (max-width: 767px) {
    #clienttable_wrapper {
        overflow-x: auto; /* Enable horizontal scrolling for the table wrapper */
    }
    
    .dataTables_wrapper {
        overflow: hidden; /* Hide overflow for the outer wrapper */
    }
}





</style>




<div class="main">


<div class='container-viewclient' id="section_clientlist">
<div class="title">
      <p>View Client Details</p>
    </div>
    <div class="table-container">
	<table class="table table-bordered" id="clienttable" style="text-align: center;  margin-top: -12px;">
	<div id="exportAllButtonContainer" class="client___exportbutton" >
        <button id="exportAllButton" class="btn btn-primary tableclientdata___exporting">Export Table Data to Excel file</button>
    </div>
</div>
		<thead class="wkorderhead text-white">
			<tr>
				<th class="tablehead"> Legal Name</th>
				<th hidden>Client ID</th>
				<th class="tablehead" style="width: 24.200000000000003px;"> Trade Name</th>
				<th class="tablehead">Type Of Clients</th>
				<th style="width: 131.0625px;">PAN Number</th>
                <th style="width: 129.0625px;">GST Number</th>
				<th style="width: 54.2px;">TAN Number</th>
				<th style="width: 136.713px;">Aadhaar Number</th>
				<th style="width: 120.812px;">Address</th>
				<th style="width: 132.925px;">Person Incharge</th>
				<th style="width: 132.925px;">Name</th>
				<th>Person To Be Contact</th>
				<th> Action </th>
			</tr>
		</thead>


		<tbody class="tablebody" id="bodytable">
			<?php       
			if (!empty($clientdetailsdata)) {
				foreach ($clientdetailsdata as $row) 
				{
			?>
					<tr>
						<td class="tabledata"><?php echo $row['name']; ?></td>
						<td hidden><?php echo $row['client_id']; ?> </td>
						<td><?php echo $row['Trade_Name']; ?></td>
						<td><?php echo $row['Type_of_Clients']; ?></td>
						<td><?php echo $row['PAN']; ?></td>
						<td><?php echo $row['GST']; ?></td>
						<td><?php echo $row['tan']; ?></td>
						<td><?php echo $row['aadhar']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['person_incharge']; ?></td>
						<td><?php echo $row['person_name']; ?></td>
						<td><?php echo $row['person_to_be_contact']; ?></td>
					

						<td style="margin-left: -8px; font-weight: 700;">
							<a class="view_clientdeatils"  href="<?= base_url("Client/editClientData") ?>/<?php echo $row['client_id']; ?>">
							
							View					
					    </a>
                      </td>
					</tr>
				<?php
				} 
			} else {
				?>
				<tr class="tablero">
					<td colspan="8">No Data Found</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>
</div>


<script>
window.addEventListener('beforeunload',function(){
    localStorage.removeItem('selectedte')
    localStorage.setItem('refreshPage',true)
})
</script>

<!-- <script>
	
	$(document).ready(function() {
		$('#clienttable').DataTable();
	});
</script> -->


<script>
    $(document).ready(function() {
        $('#clienttable').DataTable({
            "bInfo": true // Show the "Showing X to Y of Z entries" text at the bottom
        });
    });
</script>


<!-- Excel data exporting code  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script>
$(document).ready(function() {
    var table = $('#clienttable').DataTable();

    $('#exportAllButton').on('click', function() {
        exportToExcel(table);
    });
});

function exportToExcel(table) {
    var $exportButton = $('#exportAllButton');
    $exportButton.prop('disabled', true); // Disable the button during export

    var $actionColumn = table.column(-1); // Assuming the "Action" column is the last one
    $actionColumn.visible(false);

    var originalHtml = $('#clienttable').html(); // Save the original table HTML
    var exportHtml = $('#clienttable').clone(); // Clone the table for export
    exportHtml.find('.action-column').remove(); // Remove the action column from the cloned table

    $('#clienttable').html(exportHtml); // Replace the table HTML with the cloned version

    var wb = XLSX.utils.table_to_book(document.getElementById('clienttable'), { sheet: 'Sheet1' });
    XLSX.writeFile(wb, 'all_client_data.xlsx');

    // Restore the original table HTML and enable the button after export is complete
    setTimeout(function() {
        $('#clienttable').html(originalHtml);
        $actionColumn.visible(true);
        $exportButton.prop('disabled', false);
    }, 1000); // You can adjust the timeout value if needed
}

</script>
