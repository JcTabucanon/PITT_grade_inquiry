<tr>
    <td></td> 
    <td></td> 
    <td class="numberu">Total:</td> 
    <td> 
        <?php
        // Define and assign values to $SY and $SEMESTER variables
        $get_ID = $_GET['ID']; // Update 'ID' to 'id' to match the URL parameter
        $result = mysqli_query($conn, "SELECT SY, SEMESTER FROM grade WHERE SCHOOL_ID = '$get_ID' LIMIT 1");
        if ($row = mysqli_fetch_assoc($result)) {
            $SY = $row['SY'];
            $SEMESTER = $row['SEMESTER'];
        }

      
        
        ?>
    </td> 
    <td></td> 
    <td></td> 
    <td></td> 
    <td></td> 
    <td></td> 
</tr>
