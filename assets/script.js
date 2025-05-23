document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll('.btn-danger').forEach(btn => {
    btn.addEventListener('click', function (e) {
      if (!confirm("Are you sure you want to delete this task?")) {
        e.preventDefault(); // Stop navigation
      }
    });
  });
});
