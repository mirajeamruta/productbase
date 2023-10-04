<style>
	.pagination {

		padding-left: 734px;
		padding-left: 734px;

	}
	a {
    margin-left: 6px;
}
	a {
    margin-left: 6px;
}

	.col-sm-12 {
		padding-top: 15px;
	}



	table.dataTable thead .sorting_asc:after {
		content: none !important;
		
	}

	
	table.dataTable thead .sorting:after {
		opacity: 0.2;
		content: none !important;
	}

	select.form-control.input-sm {
    margin-left: 10px;
	margin-right: 10px;
    padding-left: 24px;
}

li#clienttable_previous {
    margin-right: 8px;
}

li#clienttable_next {
    margin-left: 10px;
}
</style>

<div class='container-fluid' id="section_clientlist">

	<table class="table table-bordered" id="clienttable" style="text-align: center;">

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
				<th> Action </th>
			</tr>
		</thead>
		<tbody class="tablebody" id="bodytable">
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
					

						<td style="margin-left: -8px ">
							<a class="view_clientdeatils"  href="<?= base_url("Client/editClientData") ?>/
						
							<?php echo $row['client_id']; ?>"
							
							>
							
							View					
					    </a>
                      </td>
					</tr>
				<?php
				} 
				} 
			} else {
				?>
				<tr class="tablero">
				<tr class="tablero">
					<td colspan="8">No Data Found</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
<div id="exportAllButtonContainer" class="client___exportbutton" style="margin-top: 10px; margin-left: 690px">
        <button id="exportAllButton" class="btn btn-primary tableclientdata___exporting">Export Table Data to Excel file</button>
    </div>
</div>

<script>
window.addEventListener('beforeunload',function(){
    localStorage.removeItem('selectedte')
    localStorage.setItem('refreshPage',true)
})
</script>

<script>
	
	$(document).ready(function() {
		$('#clienttable').DataTable();
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
