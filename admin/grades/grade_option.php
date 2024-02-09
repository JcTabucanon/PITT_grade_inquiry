<div class="test123">
    <form method="POST" action="sort_grade.php<?php echo '?ID='.$get_ID ?>">
        <input type="hidden" name="SCHOOL_ID" value="<?php echo $get_ID; ?>">
        <div class="span">
            <h4>FILTER Grade</h4>
        </div>
        <div class="span">
            <label>Year Level</label>
            <select name="SY" required>
                <option></option>
                <option>First Year</option>
                <option>Second Year</option>
                <option>Third Year</option>
                <option>Fourth Year</option>
            </select>
       
            <label>SEMESTER</label>
            <select name="SEMESTER" required>
                <option></option>
                <option>1st SEMESTER</option>
                <option>2nd SEMESTER</option>
            </select>
        
      
        </div>
    </form>
</div>
