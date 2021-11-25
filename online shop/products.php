<!DOCTYPE html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Grandstander:wght@200&display=swap" rel="stylesheet">
<link rel="stylesheet" href="products.css">
<?php
include "connect.php"
?>
</head>
<body>
    <?php
$sql = "SELECT * FROM products ORDER BY price DESC ";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);
echo("<table border =1><thead><tr><th>Name</th><th>Price</th><th>short description</th></tr></thead><tbody>");
if($resultCheck > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["price"] . "</td><td>" . $row["short_description"]. "</td></tr>";
        }
}
echo("</tbody></table>");
?>
</body>