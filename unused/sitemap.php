<?php include('header.php'); ?>
<?php include('navbar.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
				
				<div class="span2">
					<?php include('sidebar.php'); ?>
				</div>
				<div class="span8">
					<div id="map" style="height: 500px;"></div>
					<script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/leaflet.min.js"></script>

					<script>
						var map = L.map('map').setView([11.2994253, 124.3757534], 16);

						L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
							maxZoom: 19,
							attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
						}).addTo(map);

						L.marker([11.2994253, 124.3757534]).addTo(map);
					</script>
				</div>
			</div>
		</div>
    </div>
<?php include('footer.php') ?>
						