<div class="" style="display:none">
	<span style="margin-left:50px">Type Of User
		<select name="workorder" id="username" class="filter-handle" style="margin-top:92px " onchange="myfunction()">
			<option value=""></option>
			<?php
			foreach ($usertypes as $user) {
				// var_dump($zones);
				echo '<option value="' . $user['user_type_id'] . '">' . $user['user_type'] . '</option>';
			}
			?>
		</select>
	</span>
</div>
<div class='container-fluid' id="section_viewuser">
	<div class="section_viewuser__header">View User</div>

	<!-- For Large Screen -->

	 <table class="table table-bordered" id="view_User_Table_lg">
		<thead class="wkorderhead text-white">
			<tr>
				<th>Name</th>
				<th hidden>usertype</th>
				<th>Email</th>
				<th>Mobile Number</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			if (count($userdetailsdata) > 0) {
				foreach ($userdetailsdata as $row) {
			?>
					<tr>
						<td><?php echo $row['name']; ?> </td>
						<td hidden><?php echo $row['user_type_id']; ?> </td>
						<td><?php echo $row['personal_email']; ?> </td>
						<td><?php echo $row['mobile_no']; ?> </td>
						<td class="text-center"><a class='viewdetail' href="<?= base_url("User/editUserData") ?>/<?php echo $row['user_id']; ?>">view
								details</a>
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

	<!-- For Small Screen -->
	<table class="table table-bordered" id="view_User_Table">
		<thead class="wkorderhead text-white">
			<tr>
				<th>Name</th>
				<th hidden>usertype</th>
				<th>Balunand Id</th>
				<th>Details</th>
			</tr>
		</thead>
		 <tbody>
			<?php
			if (count($userdetailsdata) > 0) {
				foreach ($userdetailsdata as $row) {
			?>
					<tr>
						<td><?php echo $row['name']; ?> </td>
						<td hidden><?php echo $row['user_type_id'];?></td>
						<td><?php echo $row['balunand_id_no']; ?></td>
						<td class="text-center"><a class='viewdetail' href="<?= base_url("User/editUserData") ?>/<?php echo $row['user_id']; ?>">view</a>
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
