<style>
	.pagination {

		padding-left: 810px;

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
</style>

<div class='container-fluid' id="section_clientlist">
   <div id='section_clientlist__header'><h5>View Client</h5></div>
	<table class="table table-bordered" id="clienttable" style="text-align: center;">

		<thead class="wkorderhead text-white">
			<tr>
				<th>Legal Name / Trade Name</th>
				<th style="width: 131.0625px;">PAN Number</th>

				<th style="width: 129.0625px;">GST Number</th>
				<th style="width: 103.975px;">TAN Number</th>
				<th style="width: 136.713px;">Aadhaar Number</th>
				<th style="width: 120.812px;">Address</th>
				<th style="width: 132.925px;">Person Incharge</th>
				<th>Person To Be Contact</th>
			</tr>
		</thead>
		<tbody>
			<?php       
			if (count($clientdetailsdata) > 0) {
				foreach ($clientdetailsdata as $row) 
				{
			?>
					<tr>
						<td><?php echo $row['name']; ?></td>
						<td><?php echo $row['PAN']; ?></td>
						<td><?php echo $row['GST']; ?></td>
						<td><?php echo $row['tan']; ?></td>
						<td><?php echo $row['aadhar']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['person_incharge']; ?></td>
						<td><?php echo $row['person_to_be_contact']; ?></td>
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


	<!-- For Small Screen Version -->
	<div class="client_Details_Collapsible">
		<?php       
			 if (count($clientdetailsdata) > 0) {
			 foreach ($clientdetailsdata as $row) 
			 {
		 ?>
		<section class='client_Details_Collapsible__Client'>
			<input type='checkbox' id="client_Details_Collapsible__Collapse">
			<h5 class='client_Details_Collapsible__Client__Name'>
				<label for='client_Details_Collapsible__Collapse'><?php echo $row['name']; ?></label>
	        </h5>
			<i class='bx bx-chevron-down' id='client_Chevron_Down'></i>
			<div class='client_Details_Collapsible__Content'>
				<table class='client_Details_Collapsible__Content__Table'>
					<tbody>
						
					<tr>
						<td>Legal/Trade Name</td>
						<td>:</td>
						<td><?php echo $row['name']; ?></td>
		            </tr>
					<tr>
						<td>PAN Number</td>
						<td>:</td>
						<td><?php echo $row['PAN']; ?></td>
		            </tr>
					<tr>
						<td>GST Number</td>
						<td>:</td>
						<td><?php echo $row['GST']; ?></td>
		            </tr>
					<tr>
						<td>TAN Number</td>
						<td>:</td>
						<td><?php echo $row['tan']; ?></td>
		            </tr>
					<tr>
						<td>Adhaar Number</td>
						<td>:</td>
						<td><?php echo $row['aadhar']; ?></td>
		            </tr>
					<tr>
						<td>Address</td>
						<td>:</td>
						<td><?php echo $row['address']; ?></td>
		            </tr>
					<tr>
						<td>Person In Charge</td>
						<td>:</td>
						<td><?php echo $row['person_incharge']; ?></td>
		            </tr>
					<tr>
						<td>Person To Be Contacted</td>
						<td>:</td>
						<td><?php echo $row['person_to_be_contact']; ?></td>
		            </tr>
					
		        </tbody>
		        </table>
		    </div>
		</section>
    <?php
	 }
	 }
	?>
	
	</div>
</div>


<script>
	
	$(document).ready(function() {
		$('#clienttable').DataTable();
	});
</script>
