<!DOCTYPE html>
<html>
<head>


</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','tupac');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM productos WHERE id = '".$q."'";
// $sql="SELECT * FROM productos";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    
    echo "<div hidden id='idP'>" . $row['id'] . "</div>";
    echo "<div hidden id='nombre'>" . $row['nombre'] . "</div>";
    echo "<div hidden id='precio'>" . $row['precio'] . "</div>";
}
mysqli_close($con);
?>
</body>
</html>