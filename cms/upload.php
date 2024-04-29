<?php
$conn = new mysqli("localhost", "root", "", "portfolio_hamac");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $photo = $_FILES["photo"];
  $uploadOk = 1;
  $targetDir = "uploads/";
  $targetFile = $targetDir . basename($photo["name"]);
  $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

  // Check if file was uploaded and that there were no errors
  if ($photo["error"] == UPLOAD_ERR_OK) {
    // Generate unique file name to prevent conflicts
    $fileName = uniqid() . '.' . $imageFileType;

    // Move uploaded file to target directory
    if (move_uploaded_file($photo["tmp_name"], $targetDir . $fileName)) {
      // Get the existing filename
      $result = $conn->query("SELECT filename FROM aboutdes WHERE id = 1");
      if (!$result) {
        echo "Error retrieving record: " . $conn->error;
      } else {
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $existingFileName = $row["filename"];
          }
        } else {
          $existingFileName = "";
        }
      }
      $result->close();

      // Update record in database
      $stmt = $conn->prepare("UPDATE aboutdes SET filename = ? WHERE id = 1");
      $stmt->bind_param("s", $fileName);
      if (!$stmt->execute()) {
        echo "Error updating record: " . $stmt->error;
      } else {
        // Delete existing file if there is one
        if (!empty($existingFileName) && file_exists($targetDir . $existingFileName)) {
          unlink($targetDir . $existingFileName);
        }
        echo "File uploaded successfully.";
      }
      $stmt->close();
    } else {
      echo "Error uploading file.";
    }
  } else {
    echo "Error uploading file.";
  }
}
