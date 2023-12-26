<!DOCTYPE html>
<html>
<head>
  <title>Borrow History</title>
  <style>
    /* Add your custom CSS styling here */
  </style>
</head>
<body>
  <header>
    <!-- Add your header content here -->
  </header>

  <div class="container">
    <h1>Borrow History</h1>
    <table id="borrowHistoryTable">
      <thead>
        <tr>
          <th>Book Title</th>
          <th>Author</th>
          <th>Borrow Date</th>
          <th>Return Date</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <!-- Borrow history records will be dynamically added here -->
      </tbody>
    </table>
  </div>

  <script>
    // Sample data for demonstration purposes
    var borrowHistoryData = [
      { title: "Book 1", author: "Author 1", borrowDate: "2023-06-01", returnDate: "2023-06-10", status: "Returned" },
      { title: "Book 2", author: "Author 2", borrowDate: "2023-06-05", returnDate: "2023-06-15", status: "On Loan" },
      { title: "Book 3", author: "Author 3", borrowDate: "2023-06-10", returnDate: null, status: "On Loan" },
    ];

    // Function to populate the borrow history table with data
    function populateBorrowHistoryTable() {
      var tableBody = document.querySelector("#borrowHistoryTable tbody");
      tableBody.innerHTML = "";

      borrowHistoryData.forEach(function (record) {
        var row = document.createElement("tr");
        row.innerHTML = `
          <td>${record.title}</td>
          <td>${record.author}</td>
          <td>${record.borrowDate}</td>
          <td>${record.returnDate || "N/A"}</td>
          <td>${record.status}</td>
        `;
        tableBody.appendChild(row);
      });
    }

    // Call the function to populate the borrow history table on page load
    populateBorrowHistoryTable();
  </script>
</body>
</html>
