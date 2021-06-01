<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
<body>
<table>
<tr>
<th>Material Id</th>
<th>Material Name</th>
<th>Material Type</th>
</tr>
<?php

$conn = mysqli_connect("localhost", "root", "", "webapp");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
$sql = "SELECT * FROM material";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $link = $row["material_file"];
    $type = $row["material_type"];
    echo "<tr><td>" . $row["material_id"]. "</td><td>" . $row["material_name"] . "</td><td>"
    . $row["material_type"]. "</td><td>" . "<a target=_blank href=" . $link. ">$link</a>" . "</td></tr>";
    echo "<tr><td>" . $row["material_id"]. "</td><td>" . $row["material_name"] . "</td><td>"
    . "<a target=_blank href=" . $link . ">$type</a>" . "</td></tr>";
    }
    echo "</table>";
    } else { echo "0 results"; }
    $conn->close();
?>


</table>
</body>
</html>