 
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>
 <?php
        require('includes/mysqli_connect.php');
session_start();


$sql = "SELECT Comments, Livability, Amenities, CostOfLiving, Crime, Employment, housng, Schools, Comments, ReivewDate, zipcode, reviewID, userID FROM reviews";
$result = $dbc->query($sql);

if ($result->num_rows > 0) {
  echo "<table><tr><th>ID</th><th>Name</th></tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>".$row["comments"]."</td><td>".$row["userID"]." ".$row["zipcode"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$dbc->close();
?>
</body>
</html>