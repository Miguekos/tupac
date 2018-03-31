<style>
body {

}

div {
    /* color: white; */
    /* text-align: center; */
    /* background-color: lightblue; */
}

/* p {
    font-family: verdana;
    font-size: 20px;
} */

.centro{
    /* margin-left: 50%;
    margin-right: 50%; */
    text-align: center;
    background-color: lightblue; 
    margin-left: 41%;
    margin-right: 41%;
}

table, td, th {
    /*border: 1px solid black;*/
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    height: 50px;
}

.text-center{
    text-align: center;

}

.pull-right{
    padding-right:5px;
    padding-left:0;
    text-align:right;
    border-right:5px solid #eee;
    border-left:0
}

</style>

<link rel="stylesheet" href="bootstrap.min.css">

<?php

$con = mysqli_connect('localhost','root','','tupac');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$nu4 = 0;

echo "<div class='centro'>";
echo "PLAZAVEA - SUPERMECADOS S.A <br>";
echo "RUC 2000000000 Morelli 181 P-2 Lima <br>";
// echo "Lima - San Borja <br>";
echo "BOLETA DE VENTA ELECTRONICA <br>";
echo "BC19 - 00095376 <br>";
echo "<br>";
echo "<table class=''>
  <tr>
    <th style='width:25%'>Cant.</th>
    <th style='width:50%'>Prodcuto</th> 
    <th style='width:20%'>Precio</th>
  </tr>
  <tr>";

for($x = 1; $x <= count($_POST['totalitem']); $x++) {
        
        $asd = $_POST['asd'.$x];
		$sql = "SELECT * FROM productos WHERE id = '".$asd."'";
		$result = mysqli_query($con,$sql);
		// print_r($result);

		while($row = mysqli_fetch_array($result)) {

		$cantidad = $_POST['cantidad'.$asd];
        
		$nu1 = $row['precio'];
		$nu2 = $cantidad;
		$nu3 = $nu1 * $nu2;
        $nu4 += $nu3;
        
        echo "<td> " . $cantidad . " </td>";
        echo "<td> " . $row['nombre'] . " </td>";
        echo "<td> " . $nu3 . " S/</td>";
        echo "</tr>";
		}

}
echo "</table>";
echo "<br>";
echo "<p class='pull-right'> Total: ". number_format($nu4, 2, '.', '') ." S/</p>";
echo "</div>";

?>