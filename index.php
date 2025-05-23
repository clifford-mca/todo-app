<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Task Manager</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/style.css">
</head>
<script src="assets/script.js"></script>
<body class="container py-5">

  <h2 class="text-center mb-4">📝 Task/To-do Management</h2>

  <!-- Add Task Form -->
  <form method="POST" action="add.php" class="d-flex mb-4">
    <input type="text" name="title" class="form-control me-2" placeholder="Enter a new task" required>
    <button class="btn btn-primary">Add Task</button>
  </form>

  <!-- Task List -->
  <table class="table table-bordered shadow">
    <thead class="table-light">
      <tr>
        <th>Task</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = $conn->query("SELECT * FROM tasks ORDER BY created_at DESC");
      while ($row = $result->fetch_assoc()) {
        $isDone = $row['status'] === 'done';
        $doneClass = $isDone ? 'text-decoration-line-through text-muted' : '';
        echo "<tr>
          <td class='$doneClass'>{$row['title']}</td>
          <td>{$row['status']}</td>
          <td>
            " . (!$isDone ? "<a href='mark_done.php?id={$row['id']}' class='btn btn-success btn-sm me-1'>Done</a>" : "") . "
            <a href='update.php?id={$row['id']}' class='btn btn-warning btn-sm me-1'>Edit</a>
            <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
          </td>
        </tr>";
      }
      ?>
    </tbody>
  </table>

</body>
</html>
