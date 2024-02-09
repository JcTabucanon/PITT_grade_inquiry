  		<?php include('../tooltip.php'); ?>
  		<div class="navbar navbar-fixed-top navbar-inverse">
  			<div class="navbar-inner">
  			
  				<div class="container">
  			

  					<ul class="nav">


  						<?php
							if (!isset($_SESSION['$CURRENT_USERID'])) { ?>

  							<a class="logo-brand" href="../index.php"><img src="../assets/img/PITT.png" alt="Logo" style="width: 45px;"></a>

  	
  							<li class="divider-vertical"></li>
  							<li class="">
  								<a rel="tooltip" data-placement="bottom" title="Click Here to Login" id="login" href="login_form.php"> Login</a>
  							</li>


  							<li class="divider-vertical"></li>
  							<li class="">
  								<a rel="tooltip" data-placement="bottom" title="Click Here to Sign Up" id="signup" href="signup.php"></i></strong> Sign up</a>
  							</li>
  							<li class="divider-vertical"></li>
  							<li class="signup"><span class="sg"></span></li>



  						<?php } else { ?>
  							<?php
								include('../dbcon.php');
								$query = mysqli_query($connection, "select * from grade where SCHOOL_ID='$CURRENT_USERID'") or die(mysqli_error($connection));
								$row = mysqli_fetch_array($query);
								?>
  							<li>
  								<a href="dashboard.php"><img height="30" class="profile-icon" width="30" src="registrar/<?php echo $row['photo']; ?>">
  									<strong class="name1"><?php echo $row['FIRSTNAME'] . " " . $row['LASTNAME']; ?></strong></a>
  							</li>
  							<li class="active">
  								<a href="" data-toggle="dropdown"><i class="icon-cog icon-large"></i></a>

  								<ul class="dropdown-menu">
  									<li><a href="change_password.php"><i class="icon-pencil icon-large"></i>&nbsp;Edit Information</a></li>
  									<li><a href="logout.php"><i class="icon-signout icon-large"></i>&nbsp;Logout</a></li>
  								</ul>


  							</li>
  							<li class="active"><a  rel="tooltip"  data-placement="bottom" title="Home" id="home1"  href="dashboard.php"><i class="icon-home icon-large"></i></a></li>



  						<?php } ?>



  				</div>
  			</div>
  		</div>
  		<!-- Modal student login -->