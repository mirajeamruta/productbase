<div class='container userform' id="view_user">

	<div id="section_userform" class="user_details_lg">
		<span style="position: relative;
    top: 20px;
    left: 510px;
    font-size: 20px;">USER DETAIL</span>
		<form class="form col-md-8 offset-md-1" method="post" autocomplete="off" style="margin-top: 45px;" >
			<?php
			/*
                  <td><a href="<?=base_url("User/editUserData")?><?php echo 'user_id='.$row['user_id'];?>">view
            details</a>
            </td>
            */
			if (count($userdetailsdata) > 0) {
				foreach ($userdetailsdata as $row) {
			?>
					<div class="row mb-3" >
						<label for="inputEmail3" class="col-sm-3">Name</label>
						<div class="col-sm-9">
							<input type="text" name="username" class="form-control" id="username" value="<?php echo $row['name'] ?>" aria-describedby="created_on" />
						</div>
					</div>
					<div class="row mb-3" id="displayimage">
						<label for="demo-date" class="col-sm-3">Profile photo</label>
						<div class="col-sm-9">
							<!-- <p><?php echo ('http://172.105.55.147/kriyasheela/photos/http://localhost/kriyasheela-p2/kriyasheela/photos/' . $row['image']) ?></p> -->
							<img id="propileimage" src="<?php echo ('http://localhost/kriyasheela-p2/kriyasheela/photos/' . $row['image']) ?>" width="100px" height="100px" alt="your image" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="demo-date" class="col-sm-3">ICAI Number</label>
						<div class="col-sm-9">
							<input type="text" name="username" class="form-control" id="username" value="<?php echo $row['ID'] ?>" aria-describedby="created_on" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="demo-date" class="col-sm-3">Start Date </label>
						<div class="col-sm-9">
							<input type="text" name="username" class="form-control" id="username" value="<?php echo $row['startdate'] ?>" aria-describedby="created_on" disabled />
						</div>
					</div>
					<div class="row mb-3">
						<label for="demo-date" class="col-sm-3">End Date</label>
						<div class="col-sm-9">
							<input type="text" name="username" class="form-control" id="username" value="<?php echo $row['enddate'] ?>" aria-describedby="created_on" disabled />
						</div>
					</div>
					<div class="row mb-3">
						<label for="demo-date" class="col-sm-3">Partner Under Whom Registered </label>
						<div class="col-sm-9">
							<input type="text" name="username" class="form-control" id="username" value="<?php echo $row['partner_under_whom_registered'] ?>" aria-describedby="created_on" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="demo-date" class="col-sm-3">Balunand Id Number</label>
						<div class="col-sm-9">
							<input type="text" name="username" class="form-control" id="username" value="<?php echo $row['balunand_id_no'] ?>" aria-describedby="created_on" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="demo-date" class="col-sm-3">Personal Email Address</label>
						<div class="col-sm-9">
							<input type="text" name="username" class="form-control" id="username" value="<?php echo $row['personal_email'] ?>" aria-describedby="created_on" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="demo-date" class="col-sm-3">Official Email Address</label>
						<div class="col-sm-9">
							<input type="text" name="username" class="form-control" id="username" value="<?php echo $row['official_email'] ?>" aria-describedby="created_on" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="demo-date" class="col-sm-3">Mobile Number </label>
						<div class="col-sm-9">
							<input type="text" name="username" class="form-control" id="username" value="<?php echo $row['mobile_no'] ?>" aria-describedby="created_on" />
						</div>
					</div>
					<div class="row mb-3">
						<label for="demo-date" class="col-sm-3">Blood Group</label>
						<div class="col-sm-9">
							<input type="text" name="username" class="form-control" id="username" value="<?php echo $row['bloodgroup'] ?>" aria-describedby="created_on" />
						</div>
					</div>
			<?php
				}
			}
			?>
		</form>
	</div>

	<!-- FOR SMALL SCREEN -->
	<div class="user_details_sm">   
	   <?php
			if (count($userdetailsdata) > 0) {
				foreach ($userdetailsdata as $row) {
		?>
	<!-- User Profile Picture -->
	<div class="user_details_sm__profile_Picture">
		<img src="<?php echo ('http://localhost/kriyasheela-p2/kriyasheela/photos/' . $row['image']) ?>" alt="User Image">
	</div>
	<!-- User Name -->
	<p class="user_details_sm__user_Name"><?php echo $row['name'] ?></p>

	<!-- User Details -->
	<table class="user_details_sm__table">
		<tbody>
			<tr>
				<td>ICAI Number</td>
				<td class="user_dots">:</td>
				<td class="user_data"><?php echo $row['ID'] ?></td>
		    </tr>
			<tr>
				<td>Start Date</td>
				<td class="user_dots">:</td>
				<td class="user_data"><?php echo $row['startdate'] ?></td>
		    </tr>
			<tr>
				<td>End Date</td>
				<td class="user_dots">:</td>
				<td class="user_data"><?php echo $row['enddate'] ?></td>
		    </tr>
			<tr>
				<td>Partner Under Whom Registered</td>
				<td class="user_dots">:</td>
				<td class="user_data"><?php echo $row['partner_under_whom_registered'] ?></td>
		    </tr>
			<tr>
				<td>Balunand Id</td>
				<td class="user_dots">:</td>
				<td class="user_data"><?php echo $row['balunand_id_no'] ?></td>
		    </tr>
			<tr>
				<td>Personal Email</td>
				<td class="user_dots">:</td>
				<td class="user_data"><?php echo $row['personal_email'] ?></td>
		    </tr>
			<tr>
				<td>Official Email</td>
				<td class="user_dots">:</td>
				<td class="user_data"><?php echo $row['official_email'] ?></td>
		    </tr>
			<tr>
				<td>Mobile Number</td>
				<td class="user_dots">:</td>
				<td class="user_data"><?php echo $row['mobile_no'] ?></td>
		    </tr>
			<tr>
				<td>Blood Group</td>
				<td class="user_dots">:</td>
				<td class="user_data"><?php echo $row['bloodgroup'] ?></td>
		    </tr>
		</tbody>
	</table>
    <?php
				}
			}
			?>
	</div>
	
</div>
<script type="text/javascript">
	function readfile(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				document.getElementById("propileimage").style.display = 'block';
				document.getElementById("propileimage").src = e.target.result;
				document.getElementById("propileimage").style.width = '100px';
				document.getElementById("propileimage").style.height = '150px';
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>
<script type="text/javascript">
	function userfields(event) {
		alert(event.target.value);
		document.getElementById('employeeID').style.display = 'block';
		document.getElementById('CommencementEmployment').style.display = 'block';
		document.getElementById('completionEmployment').style.display = 'block';
		document.getElementById('studentregno').style.display = 'block';
		document.getElementById('Articleship').style.display = 'block';
		document.getElementById('completionArticleship').style.display = 'block';
		document.getElementById('partner').style.display = 'block';
		if (event.target.value == 3) {
			document.getElementById('employeeID').style.display = 'none';
			document.getElementById('CommencementEmployment').style.display = 'none';
			document.getElementById('completionEmployment').style.display = 'none';
		}
		if (event.target.value == 4) {
			document.getElementById('studentregno').style.display = 'none';
			document.getElementById('Articleship').style.display = 'none';
			document.getElementById('completionArticleship').style.display = 'none';
			document.getElementById('partner').style.display = 'none';
		}
		if (event.target.value == 2) {
			document.getElementById('studentregno').style.display = 'none';
			document.getElementById('Articleship').style.display = 'none';
			document.getElementById('completionArticleship').style.display = 'none';
			document.getElementById('partner').style.display = 'none';
		}
	}
</script>
