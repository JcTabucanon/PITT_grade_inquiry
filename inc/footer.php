<style>
  footer{
    background-color: #025043;
    color: aliceblue;

  }
</style>
    
<!-- Footer -->
<footer id="page-footer">
    <section id="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <aside class="logo">
                        <img src="PITT/pitlogo.png" class="vertical-center" width="150" height="150">
                    </aside>
                </div>
                <style>
                      @media (max-width: 767px)
    
    {
       
      .logo{
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .about_pit{
        text-transform: uppercase;  
        font-weight:900; 
        text-align: center;
        color:goldenrod}
        .text-align-center{
            text-align: center;
        }
        .mar-t{
            margin-top: 40px;
        }
        .mar-b{
            margin-bottom: 40px;
        }
    }
                </style>
                <div class="col-md-3 col-sm-4 mar-t mar-b">
                <h4 class="about_pit ">Contact Us</h4>
                    <aside>
                        <address>
                           
                            <dt><b>Address</b></dt>
                        <dd class="pl-3"><?= $_settings->info('school_address') ?></dd>
                        <dt><b>Email</b></dt>
                        <dd class="pl-3"><?= $_settings->info('school_email') ?></dd>
                        <dt><b>Telephone #</b></dt>
                        <dd class="pl-3"><?= $_settings->info('school_tel_no') ?></dd>
                        <dt><b>Mobile #</b></dt>
                        <dd class="pl-3"><?= $_settings->info('school_mobile') ?></dd>
                        </address>
                    </aside>
                </div><!-- /.col-md-3 -->
               
                <div class="col-md-6 col-sm-4">
                    <aside>
                        <h4 class="about_pit">About PIT</h4>
                        <section class="text-align-center">
                            The Palompon Institute of Technology or PIT, is a state college in the Philippines. Mandated to provide higher vocational, professional, and technical instruction and training in trade and industrial education and other vocational courses, professional courses, such as medicine, commerce, pharmacy, education, agriculture and dentistry, and to offer engineering courses, and also to promote research, advance studies and progressive leadership in the fields of trade, technical, industrial and technological education.<br><br>
                        </section>
                    
                    </aside>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
        <div class="mr-md-auto text-center text-md-left">
          <div class="copyright">
            &copy; <strong><span>STUDENTS' GRADE INFORMATION SYSTEM</span></strong> - <?php echo date('Y'); ?> - Program by: <strong style="color:white">Wendel Luche and Jessie Cuna</strong>
          </div>
          <div class="credits">
            The Talented Students Behind This Project
          </div>
        </div>
        <div class="background"><!--<img src="assets/img/background-city.png" class="" alt="">--></div> 
    </section><!-- /#footer-content -->
</footer>