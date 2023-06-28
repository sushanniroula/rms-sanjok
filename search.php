<?php
$conn = mysqli_connect("localhost", "root", "", "srms");
$searchTerm = $_GET['search'];
$query = "SELECT * FROM students WHERE name LIKE '%$searchTerm%'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $roll = $row['rno'];
        $class = $row['class_name'];
        echo "
<div style='font-family: Helvetica, Arial, sans-serif; margin-left: 35px;'>
      <div style='background-color: #f2f2f270; padding: 10px; width: 450px; '><a href='#' style='text-decoration: none;' onclick='showDetails(" . $roll . ", \"" . $class . "\")'>" . $row['name'] . "</a></div>
</div>
";
    }
} else {
    echo "<p style='padding: 10px;'>No results found.</p>";
}
mysqli_close($conn);
?>









