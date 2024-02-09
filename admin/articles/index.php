<?php if ($_settings->chk_flashdata('success')): ?>
<script>
    alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success');
</script>
<?php endif; ?>

<div class="card card-outline rounded-0 card-primary">
    <div class="card-header">
        <h3 class="card-title">List of Article</h3>
        <div class="card-tools">
            <a href="./?page=articles/manage_article" class="btn btn-flat btn-sm btn-primary"><span class="fas fa-plus"></span> Create New</a>
        </div>
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <table class="table table-hover table-striped table-bordered" id="list">
                <colgroup>
                    <col width="5%">
                    <col width="15%">
                    <col width="25%">
                    <col width="35%">
                    <col width="10%">
                    <col width="30%">
                </colgroup>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date Created</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>User</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Fetch data from the "article_list" table
                    $query = "SELECT * FROM article_list";
                    $result = mysqli_query($conn, $query);
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)):
                        $id = $row['ID'];
                        $dateCreated = $row['date_created'];
                        $title = $row['title'];
                        $description = $row['short_description'];
                        $user = $row['USER_ID'];
                        $status = $row['status'];
                        $statusLabel = ($status == 1) ? 'Published' : 'Unpublished'; // Check status value and assign appropriate label
                    ?>
                    <tr>
                        <td><?php echo $count++; ?></td>
                        <td><?php echo $dateCreated; ?></td>
                        <td><?php echo $title; ?></td>
                        <td><?php echo $description; ?></td>
                        <td><?php echo $user; ?></td>
                        <td><?php echo $statusLabel; ?></td>
                        <td align="center">
                            <a class="dropdown-item view_data" href="./?page=articles/view_article&ID=<?= $row['ID'] ?>" data-id="<?php echo $row['ID'] ?>"><span class="fa fa-eye text-dark"></span> View</a>
                            <a class="dropdown-item edit_data" href="./?page=articles/manage_article&ID=<?= $row['ID'] ?>" data-id="<?php echo $row['ID'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                            <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['ID'] ?>"><span class="fa fa-trash text-danger"></span> Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.delete_data').click(function(){
            _conf("Are you sure to delete this article permanently?","delete_article",[$(this).attr('data-id')])
        })
        $('.table').dataTable({
            columnDefs: [
                { orderable: false, targets: [5, 6] }
            ],
            order:[0,'asc']
        });
        $('.dataTable td,.dataTable th').addClass('py-1 px-2 align-middle')
    });

    function delete_article(id){
        start_loader();
        $.ajax({
            url: _base_url_ + "classes/Master.php?f=delete_article",
            method: "POST",
            data: { id: id },
            dataType: "json",
            error: function(err){
                console.log(err);
                alert_toast("An error occurred.", 'error');
                end_loader();
            },
            success: function(resp){
                if(typeof resp == 'object' && resp.status == 'success'){
                    location.reload();
                }else{
                    alert_toast("An error occurred.", 'error');
                    end_loader();
                }
            }
        });
    }
</script>
