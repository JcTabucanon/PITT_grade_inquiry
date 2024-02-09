<a href="https://putlocker-is.org"></a><br>
    <style>
    .mapouter{
        position:relative;
        text-align:right;
        height:659px;
        width:100%;
    }
    .gmap_canvas {
        overflow:hidden;
        background:none!important;
        height:659px;
        width:100%;
    }
</style>
<div class="container">
    <div class="clear-fix my-4"></div>
    <div class="card card-outline card-primary rounded-0 shadow">
        <div class="card-body py-5">
            <h3 class="text-center font-weight-bolder">Contact Information</h3>
            <center>
                <hr class="border-primary bg-primary w-25 border-3" style="opacity:1;height:3px;">
            </center>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <dl>
                        <dt><b>Address</b></dt>
                        <dd class="pl-3"><?= $_settings->info('school_address') ?></dd>
                        <dt><b>Email</b></dt>
                        <dd class="pl-3"><?= $_settings->info('school_email') ?></dd>
                        <dt><b>Telephone #</b></dt>
                        <dd class="pl-3"><?= $_settings->info('school_tel_no') ?></dd>
                        <dt><b>Mobile #</b></dt>
                        <dd class="pl-3"><?= $_settings->info('school_mobile') ?></dd>
                    </dl>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="mapouter">
                        <div class="gmap_canvas">
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
        </div>
    </div>
</div>