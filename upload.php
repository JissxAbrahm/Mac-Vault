<?php
$subject = $_POST['subject'];
$uploadDir = "uploads/" . $subject . "/";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

foreach (['notesFile', 'qpFile'] as $input) {
    if (isset($_FILES[$input]) && $_FILES[$input]['error'] == 0) {
        $filename = basename($_FILES[$input]['name']);
        move_uploaded_file($_FILES[$input]['tmp_name'], $uploadDir . $filename);
        echo "<p>Uploaded $filename successfully to $subject folder.</p>";
    }
}
?>
