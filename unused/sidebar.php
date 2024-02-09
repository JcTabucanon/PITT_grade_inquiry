			<div class="life-side-bar">
				<div class="hero-container">
					<ul class="nav nav-tabs nav-stacked">
						<li class="active">
							<a href="index.php" class="yellow_link"><i class="icon-home icon-large icon-large"></i>&nbsp;Home</a>
						</li>


						<li><a class="yellow_link" href="sitemap.php"><i class="icon-sitemap icon-large"></i>&nbsp;Site Map</a></li>
					</ul>
				</div>

				<p><img src="images/building.jpg" alt="" class="img-polaroid" /></p>

				<ul class="nav nav-tabs nav-stacked">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-suitcase icon-large"></i>&nbsp;Programs <b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<?php
							include_once 'dbcon.php';
							$sql = "SELECT DISTINCT COURSE, PROGRAM_DESC FROM curriculum";
							$result = mysqli_query($connection, $sql);
							if ($result) {
								while ($row = mysqli_fetch_assoc($result)) {
									$courseCode = $row['COURSE'];
									$descriptiveTitle = $row['PROGRAM_DESC'];
									echo '<li><a href="#">' . $courseCode . ' - ' . $descriptiveTitle . '</a></li>';
								}
							} else {
								echo '<li><a href="#">No courses found</a></li>';
							}
							mysqli_close($connection);
							?>
						</ul>
					</li>
				</ul>


				<ul class="nav nav-tabs nav-stacked">
					<li class="">
						<a href="#"><i class="icon-phone-sign icon-large"></i>&nbsp;Contact US</a>
					</li>
				</ul>
				<strong>Address</strong>
				<p>Sitio Otabon, Brgy. Poblacion 6536 Tabango, Philippines</p>
				<p>Tel. nos.:</p>
				<p>(034) 433-2281 / 435-0535</p>

				<p>Email:</p>
				<p><a href="mailto:pit.tabango@pit.edu.ph">pit.tabango@pit.edu.ph</a></p>


			</div>

			<!-- vision student login -->
			<div id="vision" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<div class="alert alert-info"><strong>Vision</strong></div>
				</div>
				<div class="modal-body">
					<p></p>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
				</div>
			</div>


			<!-- mission student login -->
			<div id="mission" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-header">
					<div class="alert alert-info"><strong>Mission</strong></div>
				</div>
				<div class="modal-body">
					<p>

					</p>
				</div>
				<div class="modal-footer">
					<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
				</div>
			</div>