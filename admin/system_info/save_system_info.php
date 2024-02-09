<?php
// save_system_info.php


// Retrieve form data
$name = $_POST['name'];
$shortName = $_POST['short_name'];
$welcomeContent = $_POST['content']['welcome'];
$aboutContent = $_POST['content']['about'];

// Upload system logo
$logoFile = $_FILES['img'];
$logoFileName = $logoFile['name'];
$logoFilePath = 'uploads/system/' . $logoFileName;

if (move_uploaded_file($logoFile['tmp_name'], $logoFilePath)) {
    // Image uploaded successfully
} else {
    // Error in uploading image
}

// Upload banner images
$bannerFiles = $_FILES['banners'];
$bannerFileCount = count($bannerFiles['name']);

$bannerFilePaths = [];
for ($i = 0; $i < $bannerFileCount; $i++) {
    $bannerFileName = $bannerFiles['name'][$i];
    $bannerFilePath = 'uploads/banner/' . $bannerFileName;
    if (move_uploaded_file($bannerFiles['tmp_name'][$i], $bannerFilePath)) {
        $bannerFilePaths[] = $bannerFilePath;
    } else {
        // Error in uploading image
    }
}

// Insert system information into table
$sql = "INSERT INTO system_info (name, short_name, welcome_content, about_content, logo_path) VALUES ('$name', '$shortName', '$welcomeContent', '$aboutContent', '$logoFilePath')";

if ($conn->query($sql) === TRUE) {
    // Success message
    $successMessage = "System information saved successfully.";
    echo "<script>alert('$successMessage');</script>";
} else {
    // Error message
    $errorMessage = "Error: " . $sql . "<br>" . $conn->error;
    echo "<script>alert('$errorMessage');</script>";
}

// Get the last inserted system_info ID
$systemInfoID = $conn->insert_id;

// Insert banner image paths into banner_images table
foreach ($bannerFilePaths as $bannerFilePath) {
    $sql = "INSERT INTO banner_images (system_info_id, image_path) VALUES ('$systemInfoID', '$bannerFilePath')";
    $conn->query($sql);
}

// Close database connection
$conn->close();
?>
