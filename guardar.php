<style>
body {
    text-align: center;
    background-color: red;
}

div {
    /* color: white; */
    /* text-align: center; */
    
}

/* p {
    font-family: verdana;
    font-size: 20px;
} */

</style>
<?php


// $items = $_POST['items'];
// echo "Items: ".$items;
// echo "<br>";
// $total_1 = $_POST['total_1'];
// echo "Total: ".$total_1." S/";

// $nombreTd = $_POST['nombreTd'];
// echo "Total: ".$nombreTd." S/";

// $qwe = count($_POST['totalitem']);
// echo $qwe . "<br>";


// $items = $_POST['nombreTd'];

$con = mysqli_connect('localhost','root','','tupac');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$nu4 = 0;

echo "<body>";
echo "<div class='text-center'>";
echo "PLAZAVEA - SUPERMECADOS PERUANOS S.A <br>";
echo "RUC 2000000000 Morelli 181 P-2 Lima <br>";
echo "Lima - San Borja <br>";
echo "BOLETA DE VENTA ELECTRONICA <br>";
echo "BC19 - 00095376 <br>";
echo "<br>";




for($x = 0; $x <= count($_POST['totalitem']); $x++) {			
		$sql = "SELECT * FROM productos WHERE id = '".$x."'";
		$result = mysqli_query($con,$sql);
		// print_r($result);

		while($row = mysqli_fetch_array($result)) {

		//     // $sql="SELECT * FROM productos WHERE id = '".$q."'";
		//     // $sql="SELECT * FROM productos";
		//     // $result = mysqli_query($con,$sql);
		
		$qwe = $_POST['cantidad'.$x];
        echo " ID: " . $row['id'] ." ". $row['nombre'] ." a ". $row['precio'] . " Cantidad: " . $qwe . " " . "<br>";
		$nu1 = $row['precio'];
		$nu2 = $qwe;
		$nu3 = $nu1 * $nu2;
        echo "Total: " . $nu3 . "<br><br>";

        $nu4 += $nu3;
        echo number_format($nu4, 2, '.', '');
        
		//     echo "<div hidden id='idP'>" . $row['id'] . "</div>";
		//     echo "<div hidden id='nombre'>" . $row['nombre'] . "</div>";
		//     echo "<div hidden id='precio'>" . $row['precio'] . "</div>";
		}
		// mysqli_close($con);

}
echo "</div>";
echo "</body>";

// for($r = 1; $r <= count($_POST['totalitem']); $r++) {			
//     // $sql = "SELECT * FROM productos WHERE id = '".$r."'";
//     // $result = mysqli_query($con,$sql);
//     $qwe = $_POST['cantidad'.$r];
//     echo $qwe;
// }
// $i = 1;
// $qwe = $_POST['cantidad'.$i];
// echo $qwe;
// $r = 2;
// $qwe = $_POST['cantidad'.$r];
// echo $qwe;
// $q = intval($_GET['q']);



// while($row = mysqli_fetch_array($result)) {

//     $sql="SELECT * FROM productos WHERE id = '".$q."'";
//     // $sql="SELECT * FROM productos";
//     $result = mysqli_query($con,$sql);
    
//     echo "<div hidden id='idP'>" . $row['id'] . "</div>";
//     echo "<div hidden id='nombre'>" . $row['nombre'] . "</div>";
//     echo "<div hidden id='precio'>" . $row['precio'] . "</div>";
// }
// mysqli_close($con);

// INSERT INTO order_item (order_id, product_id, quantity, rate, total, order_item_status) 


// $totalitem1 = $_POST['totalitem1'];
// $totalitem2 = $_POST['totalitem2'];
// $totalitem3 = $_POST['totalitem3'];
// echo "<br>";
// echo "<br>";
// $suma = $totalitem1 + $totalitem3 + $totalitem3;
// echo "Total Facturado " . "$suma" . " S/";
// $lista = $_POST['lista[]'];
// echo $lista;

// $con = mysqli_connect('localhost','root','','tupac');
// if (!$con) {
//     die('Could not connect: ' . mysqli_error($con));
// }

// mysqli_select_db($con,"ajax_demo");
// $sql="SELECT * FROM productos WHERE id = '".$q."'";
// // $sql="SELECT * FROM productos";
// $result = mysqli_query($con,$sql);

// while($row = mysqli_fetch_array($result)) {
    
//     echo "<div name='idP' hidden id='idP'>" . $row['id'] . "</div>";
//     echo "<div name='nombre' hidden id='nombre'>" . $row['nombre'] . "</div>";
//     echo "<div name='precio' hidden id='precio'>" . $row['precio'] . "</div>";
// }
// mysqli_close($con);
?>