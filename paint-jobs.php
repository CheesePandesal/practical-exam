<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />

  <title>Juan's Auto Paint</title>
</head>

<body>
  <header>
    <div class="header-title">
      <h1>Juan's Auto Paint</h1>
    </div>
    <nav>
      <ul>
        <li class="nav-link"><a href="index.html">New Paint Job</a></li>
        <li class="nav-link active">
          <a href="#">Paint Jobs</a>
        </li>
      </ul>
    </nav>
  </header>
  <main>
    <h2 class="main-title">Paint Jobs</h2>

    <section>
      <?php
      $conn = new mysqli('localhost', 'root', '', 'paint-jobs');


      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }


      $query = "SELECT * FROM `paint-progress`";

      $result = $conn->query($query);


      echo '<table border="1">';
      echo '<tr><th>Plate No.</th><th>Current Color</th><th>Target Color</th></tr>';


      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row["plateNo"] . '</td>';
          echo '<td>' . $row["currentColor"] . '</td>';
          echo '<td>' . $row["targetColor"] . '</td>';
          echo '</tr>';
        }
      } else {
        echo '<tr><td colspan="3">No data found</td></tr>';
      }

      echo '</table>';


      $conn->close();
      ?>

    </section>
  </main>
</body>

</html>