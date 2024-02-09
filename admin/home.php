<?php include "registrar.php"?>
<style>
  .content-wrapper{
    background-color: #0c1e35;
  }
</style>
  <div class="row" style="background-color:#0c1e35">
  <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
    <div class="info-box" >
      <span class="info-box-icon elevation-1"><i class="fas fa-building"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">Total Departments</span>
        
      </div><span class="info-box-number" style="font-size: 50px">
          <?php 
            $departmentCount = $conn->query("SELECT COUNT(DISTINCT DEPARTMENT) as department_count FROM listing")->fetch_assoc()['department_count'];
            echo format_num($departmentCount);
          ?>
        </span>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon elevation-1"><i class="fas fa-th-list"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Total Program</span>
       
      </div> <span class="info-box-number" style="font-size: 50px">
          <?php 
            $programCount = $conn->query("SELECT COUNT(DISTINCT COURSE) as program_count FROM curriculum")->fetch_assoc()['program_count'];
            echo format_num($programCount);
          ?>
        </span>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4 col-sm-12 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon elevation-1"><i class="fas fa-th-list"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Courses</span>
       
      </div>
       <span class="info-box-number" style="font-size: 50px">
          <?php 
            $courseCount = $conn->query("SELECT COUNT(*) as course_count FROM curriculum GROUP BY COURSE_CODE")->num_rows;
            echo format_num($courseCount);
          ?>
        </span>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>

 
</div>


<div class="container">
  <?php 
    $files = array();
      $fopen = scandir(base_app.'uploads/banner');
      foreach($fopen as $fname){
        if(in_array($fname,array('.','..')))
          continue;
        $files[]= validate_image('uploads/banner/'.$fname);
      }
  ?>
  <div id="tourCarousel"  class="carousel slide" data-ride="carousel" data-interval="2500">
      <div class="carousel-inner h-100">
          <?php foreach($files as $k => $img): ?>
          <div class="carousel-item  h-100 <?php echo $k == 0? 'active': '' ?>">
              <img class="d-block w-100  h-100" style="object-fit:contain" src="<?php echo $img ?>" alt="">
          </div>
          <?php endforeach; ?>
      </div>
      <a class="carousel-control-prev" href="#tourCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#tourCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
      </a>
  </div>
</div>
