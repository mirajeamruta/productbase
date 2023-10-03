

<h6 class="alluser">User Report Details</h6>
<div class='container-fluid' id="viewuserreport">
	<table class="table table-bordered">
		<thead class="wkorderhead text-white">
			<tr>
              
				<th>Name</th>
				<th>ICAI / SRO Number</th>
				<th>Date of Commencement of Articleship / Employement</th>
				<th>Date of Completion of Articleship / Employement</th>
                <th>Partner under whom registered</th>
                <th>Balu & Anand ID Number</th>
				<th>Action</th>
			</tr>
		</thead>
        <tbody>
	      <?php
			if (count($userdetailsdata) > 0) {
                $userdetail=array_reverse($userdetailsdata);
				foreach ($userdetail as $row) {
			?>
					<tr>
                        <td hidden><?php echo $row ['userid']?></td>
						<td><?php echo $row['name']; ?> </td>
						<td><?php echo $row['ID']; ?> </td>
						<td><?php echo $row['startdate']; ?> </td>
						<td><?php echo $row['enddate']; ?> </td>
                        <td><?php echo $row['partner_under_whom_registered']?></td>
                        <td><?php echo $row['balunand_id_no']?></td>
						<td class="text-center"><a class='viewdetail' href="<?= base_url("Report_Controller/editUserData") ?>/<?php echo $row['user_id']; ?>">View</a>
						</td>
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
</div>













