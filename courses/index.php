<div class="content py-3 ">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
            <h2 class="text-center font-weight-bolder mt-8">Programs Offered</h2>

                <h2 class="text-center font-weight-bolder mt-8"style="text-transform: uppercase ; color: goldenrod">Programs Offered</h2>
                <center><hr class="border-primary bg-primary my-1" style="width:3vw;height:3px;opacity:1"></center>
                <div class="card card-outline card-primary rounded-0 shadow">
                    <div class="card-body">
                        <?php
                            $dwhere = "";
                            if (isset($_GET['COURSE'])) {
                                $dwhere = " and `ID` = '{$_GET['COURSE']}'";
                            }
                            $departments = $conn->query("SELECT DISTINCT `COURSE`, `PROGRAM_DESC` FROM `curriculum` ORDER BY `COURSE` ASC");
                            while ($drow = $departments->fetch_assoc()):
                        ?>
                            <h4 class="font-weight-bolder" style="color: goldenrod"><?= $drow['COURSE'] ?></h4>
                            <h6 style="text-transform: uppercase"><?= $drow['PROGRAM_DESC'] ?></h6>

                            <hr>
                            
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <?php include("./inc/aside.php") ?>
            </div>
        </div>
    </div>
</div>
