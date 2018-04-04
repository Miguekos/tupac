<?php 

include "style.php";

?>
<style>
#customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
</style>
<?php 
//CConexion a la base de datos.	
$con = mysqli_connect('localhost','root','','tupac');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"ajax_demo");

$num_facturas = "Select id_factura from ventas order by id_factura desc limit 1";
$result_N_F = mysqli_query($con,$num_facturas);
$row = mysqli_fetch_array($result_N_F);
$conteo_f = $row[0];
// echo $conteo_f;

?>

<div class="container">
  <h2 class="text-center">Contextual Classes</h2>
  <!-- <p>Contextual classes can be used to color table rows or table cells. The classes that can be used are: .active, .success, .info, .warning, and .danger.</p> -->
  <table id="customers" class="table">
    <thead>
      <tr>
        <th class="text-center">Firstname</th>
        <th class="text-center">Lastname</th>
        <th class="text-center">Accion</th>
      </tr>
    </thead>
    <tbody>

<?php
$x = 1;
while ($conteo_f > $x) {
	$ventas = "Select id_factura, hora from ventas where id_factura = ".$x."";
	$ventas_1 = mysqli_query($con,$ventas);
	$row = mysqli_fetch_array($ventas_1);
	$num1 = $row[0];
	$num2 = $row[1];
	echo "<tr>";
    echo "<td class='text-center'>".$num1."</td>";
    echo "<td class='text-center'>".$num2."</td>";
    echo "<td class='text-center'>error</td>";
    echo "</tr>";
	// echo "<div class='text-center'>".$num1." ".$num2."</div>";
	// echo "<div class='text-center'>".$num2."</div><br>";
	$x = $x + 1;
}
?>
    </tbody>
  </table>
</div>