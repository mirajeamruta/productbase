<style>
	.pagination {

		padding-left: 734px;

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
				<th class="tablehead"> Trade Name</th>
				<th style="width: 131.0625px;">PAN Number</th>
                <th style="width: 129.0625px;">GST Number</th>
				<th style="width: 103.975px;">TAN Number</th>
				<th style="width: 136.713px;">Aadhaar Number</th>
				<th style="width: 120.812px;">Address</th>
				<th style="width: 132.925px;">Person Incharge</th>
				<th>Person To Be Contact</th>
				<th> Action </th>
			</tr>
		</thead>
		<tbody class="tablebody" id="bodytable">
			<?php       
			if (count($clientdetailsdata) > 0) {
				foreach ($clientdetailsdata as $row) 
				{
			?>
					<tr>
						<td class="tabledata"><?php echo $row['name']; ?></td>
						<td hidden><?php echo $row['client_id']; ?> </td>
						<td><?php echo $row['Trade_Name']; ?></td>
						<td><?php echo $row['PAN']; ?></td>
						<td><?php echo $row['GST']; ?></td>
						<td><?php echo $row['tan']; ?></td>
						<td><?php echo $row['aadhar']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['person_incharge']; ?></td>
						<td><?php echo $row['person_to_be_contact']; ?></td>
					

						<td style="margin-left: -8px " >
							<a class="view_clientdeatils"  href="<?= base_url("Client/editClientData") ?>/
						
							<?php echo $row['client_id']; ?>"
							
							>
							
							View Details					
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


<script>
	
	$(document).ready(function() {
		$('#clienttable').DataTable();
	});
</script>
