<?php include('./tooltip.php'); ?>

<div class="navbar navbar-fixed-top navbar-inverse">
	<div class="navbar-inner">

		<div class="container">
			<ul class="nav">
				<?php
				if (!isset($_SESSION['$CURRENT_USERID'])) { ?>
					<a class="logo-brand" href="index.php"><img src="assets/img/PITT.png" alt="Logo" style="width: 45px;"></a>
					<li class="divider-vertical"></li>
					<li class="">
						<a rel="tooltip" data-placement="bottom" title="Click Here to Login" id="login" href="views/login_form.php"> Login</a>
					</li>
					<li class="divider-vertical"></li>
					<li class="">
						<a rel="tooltip" data-placement="bottom" title="Click Here to Sign Up" id="signup" href="views/signup.php"></i></strong> Sign up</a>
					</li>
					<li class="divider-vertical"></li>
					<li class="signup"><span class="sg"></span></li>
				<?php } else { ?>
					<?php
					$CURRENT_USERID = $_SESSION['$CURRENT_USERID'];
					include('dbcon.php');
					$query = mysqli_query($connection, "select * from grade where SCHOOL_ID='$CURRENT_USERID'");
					$row = mysqli_fetch_array($query);
					?>
				
					<li>
						<a href="change_password.php">
							<?php if (!empty($row['PHOTO'])) { ?>
								<img height="30" class="profile-icon" width="30" src="registrar/<?php echo $row['PHOTO']; ?>">
							<?php } elseif (empty($row['PHOTO'])) { ?>
								<img height="30" class="profile-icon" width="30" src="../assets/img/user2.png">
							<?php } ?>
					</li></a>
					<li class="svg-con">
					<a class="svg-list" rel="tooltip" data-placement="bottom" title="Home" id="home" href="dashboard.php">
					<img class="svg-icon" src="PITT/img/home.svg" alt="Home Icon">

					</a>
					</li>

					<li class="svg-con">
					<a rel="tooltip" data-placement="bottom" title="View Grade" id="signup" href="sort_grade.php">
					<img class="svg-icon" src="PITT/img/blue (1).svg" alt="Home Icon">
					</a>
					</li>

					<li class="svg-con">
					<a rel="tooltip" data-placement="bottom" title="View Course" id="login" href="evaluation.php">
					<img  class="svg-icon" src="PITT/img/blue (2).svg"  alt="Home Icon">
					</a>
					</li>


					<li rel="tooltip" data-placement="bottom"  class="active">
						<a rel="tooltip" href="" data-toggle="dropdown">
						<img class="svg-icon" src="PITT/img/gear (1).svg"  alt="Home Icon">
						</a>
						<ul class="dropdown-menu">
							<li><a rel="tooltip" href="change_password.php"><i class="icon-pencil icon-large"></i>&nbsp;Edit</a></li>
							<li><a rel="tooltip" href="logout.php"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>
						</ul>
					</li>
				<?php } ?>
			</ul>
		</div>
	</div>
</div>
<style>
	.svg-icon{
  width: 30px !important;
  height: 30px !important;
  border: none !important;
  background-color: transparent !important;
  border-radius: 1px !important;
  fill: #ffffff; /* Change the color of the icon */
  align-items: center !important;
		border-radius: 1px !important;

}
.svg-con{

	align-items: center;
	
}

</style>

<!-- Modal student login -->