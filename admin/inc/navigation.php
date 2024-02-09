</style>
<link rel="stylesheet" href="assets/nav.css">
<link rel="stylesheet" href="assets/scrollbar.css">
<style>
  
.main-sidebar ul > li > a:hover,
.main-sidebar ul > li.active > a {
	color: rgb(246, 243, 240) !important;
    background-color: #111827 !important;

}
.main-sidebar {
	background-color: #0c1e35;
	width: var(--sidebar-width);
	transition: all .3s ease-in-out;
	transform: translateX(0);
	z-index: 9999999;
}
p{
  font-weight: 100;
  /* font-family: mona sans , sans-serif; */
}
</style>
<aside class="main-sidebar position-fixed top-0 left-0 overflow-auto  float-left" id="show-side-navigation1">
  <div class="sidebar-header d-flex justify-content-center align-items-center px-3 py-4">
    <?php if (!empty($row['PHOTO'])) { ?>
      <img class="rounded-pill img-fluid" width="65" src="<?= $row['PHOTO'] ?>">
    <?php } elseif (empty($row['PHOTO'])) { ?>
      <img class="rounded-pill img-fluid" width="65" src="../assets/img/user2.png">
    <?php } ?>
    <div class="ms-2">
      <h5 class="fs-6 mb-0">
        <a class="text-decoration-none" href="#"><?= $capitalLetters ?>, <?= substr($row['FIRSTNAME'], 0, 1) ?></a>
      </h5>
      <p class="mt-1 mb-0"><?= $row['SROLE'] ?></p>
    </div>
  </div>
  <div class=" os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
    <div class="os-resize-observer-host observed">
      <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
    </div>
    <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
      <div class="os-resize-observer"></div>
    </div>
    <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
    <div class="os-padding">
      <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
        <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
          <div class="clearfix"></div>
          <nav class="mt-4">
            <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
              <li class="nav-item dropdown">
                <a href="./" class="nav-link nav-home">
                  <i class="nav-icon fa fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=courses" class="nav-link nav-courses">
                  <i class="nav-icon fa fa-list"></i>
                  <p>
                    Program 
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=students" class="nav-link nav-students">
                  <i class="nav-icon fa fa-users"></i>
                  <p>
                    Students
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=instructors" class="nav-link nav-instructors">
                  <i class="nav-icon fa fa-flag"></i>
                  <p>
                    Instructors
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=createlist" class="nav-link nav-createlist">
                  <i class="nav-icon fa fa-sign"></i>
                  <p class="navp">
                    Create List
                  </p>
                </a>
              </li>
              <li class="nav-header">Department</li>
              
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=curriculum/technology" class="nav-link nav-curriculum_technology">
                  <i class="nav-icon fa fa-blog"></i>
                  <p>
                    Technnology
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=curriculum/genEd" class="nav-link nav-curriculum_genEd">
                  <i class="nav-icon fa fa-blog"></i>
                  <p>
                    General Education
                  </p>
                </a>
              </li>
              <li class="nav-header">Default Contents</li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=default_contents/mission" class="nav-link nav-default_contents_mission">
                  <i class="nav-icon fa fa-window-maximize"></i>
                  <p>
                    Mission Content
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=default_contents/vision" class="nav-link nav-default_contents_vision">
                  <i class="nav-icon fa fa-window-maximize"></i>
                  <p>
                    Vision Content
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=default_contents/goal" class="nav-link nav-default_contents_goal">
                  <i class="nav-icon fa fa-window-maximize "></i>
                  <p>
                    Goal Content
                  </p>
                </a>
              </li>
              <?php if ($_SESSION['CURRENT_SROLE'] == "") { ?>

              <li class="nav-header">Articles</li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=articles/manage_article" class="nav-link nav-articles_manage_article">
                  <i class="nav-icon fas fa-plus"></i>
                  <p>
                    Add New Article
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=articles" class="nav-link nav-articles">
                  <i class="nav-icon fas fa-blog"></i>
                  <p>
                    Articles
                  </p>
                </a>
              </li>
              <?php } else { ?>
              <?php } ?>
              <li class="nav-header">Other Information</li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=academicyear" class="nav-link nav-academicyear">
                  <i class="nav-icon fas fa-calendar"></i>
                  <p>
                    Current Year
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url ?>admin/?page=contact_information" class="nav-link nav-contact_information">
                  <i class="nav-icon fas fa-info-circle"></i>
                  <p>
                    Contact Information
                  </p>
                </a>
              </li>
              <?php if ($_SESSION['CURRENT_SROLE'] == "ADMIN") { ?>

                <li class="nav-header">Maintenance</li>
                <li class="nav-item dropdown">
                  <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>
                      Users
                    </p>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                      Settings
                    </p>
                  </a>
                </li>
              <?php } else { ?>
              <?php } ?>

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
      </div>
    </div>
    <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
      <div class="os-scrollbar-track">
        <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
      </div>
    </div>
    <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
      <div class="os-scrollbar-track">
        <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
      </div>
    </div>
    <div class="os-scrollbar-corner"></div>
  </div>
  <!-- /.sidebar -->
</aside>
<script>
  $(document).ready(function() {
    var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
    page = page.replace(/\//g, '_');
    console.log(page)

    if ($('.nav-link.nav-' + page).length > 0) {
      $('.nav-link.nav-' + page).addClass('active')
      if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
        $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
        $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
      }
      if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
        $('.nav-link.nav-' + page).parent().addClass('menu-open')
      }

    }
    $('.nav-link.active').addClass('bg-gradient-dark')
  })
</script>