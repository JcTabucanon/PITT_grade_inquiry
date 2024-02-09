<?php
// Assuming you have a database connection established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ID'])) {
        $id = $_POST['ID'];

        // Perform the delete operation
        $delete_query = mysqli_query($conn, "DELETE FROM listing WHERE ID = '$id'");
        if ($delete_query) {
            // Delete operation successful
            echo "Record deleted successfully.";
        } else {
            // Delete operation failed
            echo "Failed to delete the record.";
        }
    } else {
        // Invalid request, no ID provided
        echo "Invalid request. No ID provided.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}
?>
