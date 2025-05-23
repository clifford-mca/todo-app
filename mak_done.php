<?php
include('db.php');
$id = $_GET['id'] ?? null;

if ($id && is_numeric($id)) {
    $conn->query("UPDATE tasks SET status='done' WHERE id=$id");
}
header("Location: index.php");
?>
