<?php
include('db.php');
$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
  header("Location: index.php");
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $conn->query("UPDATE tasks SET title='$title' WHERE id=$id");
  header("Location: index.php");
  exit();
} else {
  $task = $conn->query("SELECT * FROM tasks WHERE id=$id")->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Task</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body class="container py-5" style="background-color: #f5f5dc;">
  <div class="card p-4 shadow" style="max-width: 600px; margin: auto; background-color: #fffaf0;">
    <h3 class="mb-4 text-center" style="color: #5d3a00;">✏️ Edit Task</h3>
    <form method="POST">
      <div class="mb-3">
        <label class="form-label">Task Title</label>
        <input type="text" name="title" class="form-control" value="<?= htmlspecialchars($task['title']) ?>" required>
      </div>
      <div class="d-flex justify-content-between">
        <a href="index.php" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-primary">Update Task</button>
      </div>
    </form>
  </div>
</body>
</html>
