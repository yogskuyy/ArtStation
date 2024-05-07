document.getElementById("toggle-sales").addEventListener("click", function() {
    var table = document.getElementById("sales-table");
    if (table.style.display === "none") {
      table.style.display = "table";
    } else {
      table.style.display = "none";
    }
  });
  document.querySelector('.sidebar-toggle').addEventListener('click', function() {
    // Menambahkan atau menghapus kelas 'open' pada sidebar
    document.querySelector('.sidebar').classList.toggle('open');
});

  