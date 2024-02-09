<?php

$USER_ID = $_SESSION['CURRENT_USERID'];

// Create a database connection
require_once '../dbConnection/db.php';

$sql = "SELECT * FROM USERS WHERE USER_ID='$USER_ID'";
$result = mysqli_query($conn, $sql);
while($rows=mysqli_fetch_assoc($result)){
    $imageData = $rows['PHOTO'];
    $fileType = $rows['FILE_TYPE'];
}
if ($fileType === 'image/jpeg') {
    header("Content-type: image/jpeg");
} elseif ($fileType === 'image/png') {
    header("Content-type: image/png");
} elseif ($fileType === 'image/gif') {
    header("Content-type: image/gif");
} else {
    // Set a default content type if the file type is unknown
    header("Content-type: application/octet-stream");
}
// // Prepare the SQL statement to retrieve the image data based on user ID
// $stmt = $conn->prepare("SELECT PHOTO, FILE_TYPE FROM USERS WHERE USER_ID = ?");
// $stmt->bind_param("i", $USER_ID);
// $stmt->execute();
// $stmt->bind_result($imageData, $fileType);
// $stmt->fetch();

// // Set the appropriate content type header based on file extension or MIME type
// if ($fileType === 'image/jpeg') {
//     header("Content-type: image/jpeg");
// } elseif ($fileType === 'image/png') {
//     header("Content-type: image/png");
// } elseif ($fileType === 'image/gif') {
//     header("Content-type: image/gif");
// } else {
//     // Set a default content type if the file type is unknown
//     header("Content-type: application/octet-stream");
// }

// Echo the image data
echo $imageData;