<?php


// $items = $_POST['items'];
// echo "Items: ".$items;
// echo "<br>";
// $total_1 = $_POST['total_1'];
// echo "Total: ".$total_1." S/";

// $nombreTd = $_POST['nombreTd'];
// echo "Total: ".$nombreTd." S/";

$qwe = count($_POST['totalitem']);
echo $qwe;


// $q = intval($_GET['q']);

// $con = mysqli_connect('localhost','root','','tupac');
// if (!$con) {
//     die('Could not connect: ' . mysqli_error($con));
// }

// mysqli_select_db($con,"ajax_demo");

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