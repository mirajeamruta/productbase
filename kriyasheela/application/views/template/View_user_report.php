<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    
</head>
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

    .container-report {
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

    .main-container {
    display: flex;
    width: 100vw;
    position: relative;
    top: 4px;
    z-index: 1;
}

    .container-report .title {
        padding: 25px;
        background: #f6f8fa;
        /* text-align: center; */
    }

    .container-report .title p {
        font-size: 25px;
        font-weight: 500;
        /* position: relative; */
    }

    .container-report .title p::before {
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


/* CSS for screens with a maximum width of 768px (adjust as needed) */
@media (max-width: 768px) {
    .container-report {
        margin-top: 0; /* Remove negative margin */
        height: auto; /* Allow the container to adjust its height */
    }

    .container-report .title p::before {
        content: none; /* Hide the decorative line */
    }

    .table th {
        font-size: 12px; /* Reduce the font size for table headers */
    }

    .table td {
        font-size: 12px; /* Reduce the font size for table cells */
        padding: 8px; /* Adjust cell padding */
    }
}
/* CSS for small screens, enabling horizontal scroll for the table */
@media (max-width: 768px) {
    .table {
        display: block;
        overflow-x: auto;
    }
    .table thead {
        display: table;
        width: 100%;
    }
    .table th {
        min-width: 150px; /* Adjust the minimum width as needed */
    }
    .table tbody {
        display: table;
        width: 100%;
    }
    .table td {
        min-width: 150px; /* Adjust the minimum width as needed */
    }
}
	</style>
<body>
    <div class="main">
       
        <div class="container-report" id="viewuserreport" style="margin-top: -11px;">
		<div class="title">
            <p>User Report Details</p>
        </div>
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
                        $userdetail = array_reverse($userdetailsdata);
                        foreach ($userdetail as $row) {
                    ?>
                            <tr>
                                <td hidden><?php echo $row['userid'] ?></td>
                                <td><?php echo $row['name']; ?> </td>
                                <td><?php echo $row['ID']; ?> </td>
                                <td><?php echo $row['startdate']; ?> </td>
                                <td><?php echo $row['enddate']; ?> </td>
                                <td><?php echo $row['partner_under_whom_registered'] ?></td>
                                <td><?php echo $row['balunand_id_no'] ?></td>
                                <td class="text-center" style="font-weight: 700;">
                                    <a class='viewdetail' href="<?= base_url("Report_Controller/editUserData") ?>/<?php echo $row['user_id']; ?>">View</a>
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
</body>
</html>
