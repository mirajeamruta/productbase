
<style>
/* Reset some default browser styles */
body, div, p, h3, table {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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
    padding: 20px; /* Add some padding for all screens */
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

/* Center the h3 heading */
h3.text-center {
    text-align: center;
}

/* Style the table */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px; /* Add some margin for all screens */
	overflow-x: auto;
}

/* Style the table header */
.wkorderhead th {
    background-color: #f6f8fa;
  
    font-weight: 600;
}

/* Style table rows */
.table tr {
    border-bottom: 1px solid #ddd;
}

/* Style table cells */
.table td, .table th {
    padding: 10px;
}





/* Responsive Styles for Small Screens */
@media (max-width: 768px) {
    .container-fluid {
		padding: 10px;
    margin-left: -19px !important;
    width: 441px;
    height: 543px; 
    }

   
    .table {
        font-size: 14px; /* Decrease font size for small screens */
        white-space: nowrap; /* Prevent line breaks in table cells */
        overflow-x: scroll;
    }
    

    .wkorderhead th {
        font-size: 1.25rem; /* Decrease font size for small screens */
    }
	/* Style the table */

	
/* Add this CSS code to your stylesheet or inside a <style> tag in your HTML */

/* Apply styles to the container holding the table */
#section_viewuser {
	max-width: 349px;
  overflow-x: auto;
}

/* Set a fixed width for the table to make it scroll horizontally */
.table {
  width: 100%; /* Adjust the width as needed */
  white-space: nowrap; /* Prevent text from wrapping */
}

/* If you want to set a specific width for each table cell, you can do it like this */
.table td {
  width: 150px; /* Adjust the width as needed */
  /* Add any other styling you want for table cells */
}
}


</style>


<body>
<div class="main">

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
<div class="title" style=" font-size: 1.75rem;margin-left: 7px;margin-top: 2px;font-weight: 600;background: #f6f8fa;" >
      <p>View User Form</p>
    </div>
	<table class="table table-bordered" style="margin-top: 48px;">
		<thead class="wkorderhead text-black">
			<tr>
				<th>Name</th>
				<th hidden>usertype</th>
				<th>Email</th>
				<th>Mobile Number</th>
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
						<td><?php echo $row['name']; ?> </td>
						<td hidden><?php echo $row['user_type_id']; ?> </td>
						<td><?php echo $row['personal_email']; ?> </td>
						<td><?php echo $row['mobile_no']; ?> </td>
						<td class="text-center" style="font-weight: 700;">
							<a class='viewdetail' href="<?= base_url("User/editUserData") ?>/<?php echo $row['user_id']; ?>">view</a>
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
</div>
</div>
</body>
<script>
window.addEventListener('beforeunload',function(){
    localStorage.removeItem('selectedte')
    localStorage.setItem('refreshPage',true)
})
</script>