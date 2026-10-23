<?php

$conn = new mysqli("localhost", "root", "", "4aanasco");
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
// Add the IMAGE column automatically for existing installations.
$columnCheck = $conn->query("SHOW COLUMNS FROM tbl_users LIKE 'IMAGE'");
if ($columnCheck && $columnCheck->num_rows === 0) {
    $conn->query("ALTER TABLE tbl_users ADD COLUMN IMAGE varchar(255) NOT NULL DEFAULT ''");
}
?>