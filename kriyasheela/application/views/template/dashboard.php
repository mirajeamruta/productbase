<div class="sidebar">
<div class="logo-details">
			<i class='bx bxl-c-plus-plus'></i>
			<span class="logo_name"></span>
		</div>
		<ul class="nav-links">
			<li>
				<a class="active"  style="margin-left: 10px;">
					<i class='bx bx-grid-alt'></i>
					<span class="links_name">Total Workorders</span>
					<div class="number" style="margin-left: -85px; margin-top: 88px; background: white; border-radius: 21px; box-sizing: border-box; padding: 10px 14px 10px 13px;color: black;"><?php echo $countworkorder; ?></div>
				</a>
			</li>
			<li>
				<a  style="margin-left: 10px; ;margin-top: 74px;">
					<i class='bx bx-box'></i>
					<span class="links_name">Pending Workorders</span>
					<div class="number" style="margin-left: -109px; margin-top: 88px; background: white; border-radius: 21px; box-sizing: border-box; padding: 10px 15px 11px 12px; color: black;" > <?php echo $pendingWorkorders; ?> </div>
				</a>
			</li>
			<li>
				<a style="margin-left: 10px;margin-top: 74px;">
				<i class=' bx bx-user-pin'></i>
					<span class="links_name">Number of Clients</span>
					<div class="number" style="margin-left: -93px; margin-top: 88px; background: white; border-radius: 21px; box-sizing: border-box; padding: 9px 14px 9px 11px; color: black;"><?php echo $countclents; ?></div>	
				</a>
			</li>
			<li>
				<a  style="margin-left: 10px; margin-top: 70px;">
				<i class='bx bx-user'></i>
					<span class="links_name">Number of Users</span>
					<div class="number" style="margin-left: -87px; margin-top: 88px; background: white; border-radius: 21px; box-sizing: border-box;padding: 9px 14px 9px 11px; color: black;"><?php echo $countusers; ?></div>
				</a>
			</li>

			</li>
		</ul>
	</div>
	<section class="home-section">
    <div class="home-content">

        <div class="sales-boxes" style="margin-top: -34px; height: 630px;"> 
            <div class="recent-sales box">
                <div class="title" style="text-align: center;">Notifications</div>
		
				
                <div class="sales-details" style="margin-top: -82px;">

                    <section id="section-dashboard" class="text-center">
                        <!-- <p><a>Workorder-150's</a> targeted end date has been revised.</p>
                        <p><a>Workorder-157's</a> targeted end date has been revised.</p>
                        <p><a>Workorder-140's</a> targeted end date has been revised.</p>
                        <p>New User <a>Vidya</a> has been created.</p>
                        <p>New User <a>Sharath</a> has been created.</p>
                        <p>New User <a>Megala</a> has been created.</p>
                        <p>New User <a>Manoj</a> has been created.</p> -->
                    </section>
                </div>
<!-- 
                <div class="button">
                    <a href="#">ViewAll</a>
                </div> -->
            </div>


            <div class="top-sales box">
                <div class="title" style="text-align: center;">Pending Workorders</div>
                <ul class="top-sales-details" style="margin-left: 36px;">

                    <?php

                    if (!empty($pendingWorkorderDetails2)) {

                        foreach ($pendingWorkorderDetails2  as $dataworkorder) {

                            $key = $dataworkorder['workordernumber'];
                    ?>
                    <li style="color:blue"> <a href="<?= base_url("workorder/view_workorder/$key") ?>">
                            Workorder-<?php echo $dataworkorder['workordernumber'] ?> </a>
                    </li>

                    <?php

                        }
                    }

                    ?>


                </ul>
            </div>
        </div>
    </div>
</section>


	