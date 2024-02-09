<?php
require_once('../../config.php');
require_once('../../dbConnection/db.php');

$get_ID = $_GET['ID'] ?? 0; // Assign a default value if $_GET['ID'] is not set

$query = mysqli_query($conn, "SELECT * FROM grade");
$row = mysqli_fetch_array($query);

$sql = "SELECT l.*, g.*
        FROM listing l
        INNER JOIN grade g ON l.SCHOOL_ID = g.SCHOOL_ID
        WHERE l.SCHOOL_ID = '$get_ID'";
$result = mysqli_query($conn, $sql);

$data = mysqli_fetch_assoc($result); // Fetch a single row of data

// Assign retrieved data to variables
$ID = $data['ID'] ?? '';
$SID = $data['SCHOOL_ID'] ?? '';
$name = $data['name'] ?? '';
$description = $data['description'] ?? '';
$status = $data['status'] ?? '';

?>

<input name="ID" type="text" value="<?php echo $ID; ?>">

<div class="container-fluid">
    <form action="" id="course-form">
        <input type="hidden" name="id" value="<?php echo $ID; ?>">
        <div class="form-group">
            <label class="control-label" for="inputPassword">Student ID:</label>
            <input type="text" id="inputEmail" name="SCHOOL_ID" value="<?php echo $SID; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input type="text" name="name" id="name" class="form-control form-control-sm rounded-0" value="<?php echo $name; ?>" required/>
        </div>
        <div class="form-group">
            <label for="description" class="control-label">Description</label>
            <textarea rows="5" name="description" id="description" class="form-control form-control-sm rounded-0" required><?php echo $description; ?></textarea>
        </div>
        <div class="form-group">
            <label for="status" class="control-label">Status</label>
            <select name="status" id="status" class="form-control form-control-sm rounded-0" required>
                <option value="1" <?php echo ($status == 1) ? 'selected' : ''; ?>>Active</option>
                <option value="0" <?php echo ($status == 0) ? 'selected' : ''; ?>>Inactive</option>
            </select>
        </div>
    </form>
</div>

<script>
    $(document).ready(function(){
        $('#uni_modal').on('shown.bs.modal', function(){
            $('.select2').select2({
                placeholder:'Please Select Here',
                width:'100%',
                dropdownParent:$('#uni_modal')
            });
        });
        
        $('#course-form').submit(function(e){
            e.preventDefault();
            var _this = $(this);
            $('.err-msg').remove();
            var el = $('<div>');
            el.addClass("alert alert-danger err-msg");
            el.hide();
            
            if(_this[0].checkValidity() == false){
                _this[0].reportValidity();
                return false;
            }
            
            start_loader();
            
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=save_course",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error: function(err){
                    console.log(err);
                    alert_toast("An error occurred", 'error');
                    end_loader();
                },
                success: function(resp){
                    if(typeof resp == 'object' && resp.status == 'success'){
                        el.removeClass("alert alert-danger err-msg");
                        location.reload();
                    } else if(resp.status == 'failed' && !!resp.msg){
                        el.text(resp.msg);
                    } else {
                        el.text("An error occurred");
                        end_loader();
                        console.error(resp);
                    }
                    
                    _this.prepend(el);
                    el.show('slow');
                    $("html, body, .modal").scrollTop(0);
                    end_loader();
                }
            });
        });
    });
</script>
