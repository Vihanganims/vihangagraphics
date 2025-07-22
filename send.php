<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form values safely
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $number = htmlspecialchars($_POST['number']);
  $design_type = htmlspecialchars($_POST['design_type']);
  $details = htmlspecialchars($_POST['details']);

  // Optional file handling
  $filename = '';
  if (isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0777, true);
    }
    $filename = basename($_FILES['attachment']['name']);
    $filepath = $uploadDir . $filename;
    move_uploaded_file($_FILES['attachment']['tmp_name'], $filepath);
  }

  // Build text content
  $content = "New Design Order\n";
  $content .= "-------------------------\n";
  $content .= "Name: $name\n";
  $content .= "Email: $email\n";
  $content .= "Phone: $number\n";
  $content .= "Design Type: $design_type\n";
  $content .= "Details: $details\n";
  if ($filename !== '') {
    $content .= "File Uploaded: $filename\n";
  }
  $content .= "-------------------------\n\n";

  // Save to a .txt file
  file_put_contents("orders.txt", $content, FILE_APPEND);

  // Redirect or show success
  echo "<h2>✅ Thank you! Your order has been received.</h2>";
  echo "<a href='index.html'>Go back to home</a>";
}
?>
