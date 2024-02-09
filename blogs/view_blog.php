<?php 
if (isset($_GET['ID'])) {
    $blogId = $_GET['ID'];
    $qry = $conn->query("SELECT * FROM `article_list` WHERE ID = '$blogId'");
    if ($qry->num_rows > 0) {
        foreach ($qry->fetch_array() as $k => $v) {
            $$k = $v;
        }
    } else {
        echo "<script> alert('Unrecognized Blog ID.'); location.replace('./?page=blogs');</script>";
    }
} else {
    echo "<script> alert('Blog ID is required to access this page.'); location.replace('./?page=blogs');</script>";
}
?>

<div class="content py-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2 class="text-center font-weight-bolder m-0"><?= isset($title) ? $title : "" ?></h2>
                <center><hr class="border-primary bg-primary my-1" style="width:3vw;height:3px;opacity:1"></center>
                <div class="row">
                    <div class="col-md-6">
                        <small class="text-muted">Posted From: <span class="text-primary">Registrar Office</span></small>
                    </div>
                    <div class="col-md-6 text-right">
                        <small class="text-muted"><?= isset($date_created) ? date("M d,Y, h:i A", strtotime($date_created)) : "" ?></small>
                    </div>
                </div>
                <div class="card card-outline card-success rounded-0 shadow">
                    <div class="card-body" style="background-color: white">
                        <?php 
                        if (isset($content_path) && !empty($content_path)) {
                            echo file_get_contents(base_app . $content_path);
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <?php include("./inc/aside.php") ?>
            </div>
        </div>
    </div>
</div>
