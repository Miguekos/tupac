<?php 
include 'header.php';
include "style.php";
?>

<div class="topnav">
  <a href="index2.php">Caja</a>
  <a class="active" href="ventas.php">Facturas</a>
  <a href="#contact">Productos</a>
  <a class="pull-right">Caja Chica:</a>
  <a class="pull-right">Total Caja: <?php echo number_format($total_caja, 2, ',', '.') ." S/"; ?></a>
</div>


<!-- <style>
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
</style> -->
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
  <h2 class="text-center">Facturas</h2>
  <!-- <p>Contextual classes can be used to color table rows or table cells. The classes that can be used are: .active, .success, .info, .warning, and .danger.</p> -->
  <!-- <table id="customers" class="table"> -->
  <table id="example" class="display" style="width:100%">
    <thead>
      <tr>
        <th class="text-center">Factura</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Total S/.</th>
        <th class="text-center">Accion</th>
      </tr>
    </thead>
    <tbody>

<?php

$x = 1;
while ($conteo_f > $x) {
	$dias_S = array("Dom","Lun","Mar","Mie","Jue","Vie","Sab");
	$meses_S = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
	//Obtengo las facturas que tengan el mismo id de factura
	$ventas = "Select id_factura, hora from ventas where id_factura = ".$x."";
	$ventas_1 = mysqli_query($con,$ventas);
	$row = mysqli_fetch_array($ventas_1);
	//Sumo todos los resultados de los productos por id de factura para obtener el total de la factura
	$sum_facturas = "Select sum(total) from ventas where id_factura = $x";
	$result_S_F = mysqli_query($con,$sum_facturas);
	$rowS = mysqli_fetch_array($result_S_F);
	$num1 = $row[0];
	$num2 = $row[1];
	// $date = $num2;
	// $fecha1 = date($num2);
	// echo date('l dS \o\f F Y h:i:s A', $fecha1);
	// echo date('w', $row[1]);
	// $fecha = date('Y-m-d', strtotime(str_replace('-','/', $date)));
	// $fecha = date("d-m-y", $date);
	// $fecha = date('$dias_S[date('d')]', strtotime($date));
	// $fecha = date('l-M-Y', strtotime(str_replace('-','/', $date)));
	// echo date('l', strtotime(str_replace('-','/', $date)));
	// echo date($dias_S[date('w')], strtotime(str_replace('-','/', $date)));
	// echo date($dias_S[date('D')]), strtotime(str_replace('-','/', $date));
	// echo date($dias_S[date('w')]." ".date('j').", ".$meses_S[date('n')-1]. "  ".date('Y'). ", " .date('g:i a')), strtotime(str_replace('','', $date));
	// echo date($dias_S[date('D')])."asd".($meses_S[date('M')]), strtotime(str_replace('-','/', $date));
	// $fecha = date('F/j/Y',$num2);
	// $fecha = date('Y-m-d G:i:s');

	$date = date_create("$num2");
	$diaL1 = date_format($date,"w");
	$diaN1 = date_format($date,"j");
	$mes1 = date_format($date,"n")-1;
	$ano1 = date_format($date,"Y");
	$hora = date_format($date,"g:i a");

	$dia1 = $dias_S["$diaL1"];
	$dia2 = $diaN1;
	$mes =  $meses_S["$mes1"];
	$ano =  $ano1;
	$hora = $hora;


	// $fecha = date_format($date,"$dias_S['n']");
	
	$num3 = $rowS[0];
	$num4 = number_format($num3, 2, '.', '') ." S/";
	echo "<tr>";
    echo "<td class='text-center'>".$num1."</td>";
    echo "<td class='text-center'>".$dia1." ".$dia2.", ".$mes." ".$ano.", ".$hora."</td>";
    echo "<td class='text-center'>".$num4."</td>";
    echo "<td class='text-center'><a href='' class=''>Anular</a></td>";
    echo "</tr>";
	// echo "<div class='text-center'>".$num1." ".$num2."</div>";
	// echo "<div class='text-center'>".$num2."</div><br>";
	$x = $x + 1;
}
?>
    </tbody>
  </table>
</div>
<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
        	"order": [[ 1, "asc" ]],
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
} );
</script>