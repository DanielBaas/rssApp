<?php

$bd = "rss";
$server ="localhost";
$user = "root";
$password = "";


    $var = array();
    $mysqli = mysqli_connect($server, $user, $password, $bd);
    $search = $_GET['q'];
    if( ! $mysqli ) die( "Error de conexion ".mysqli_connect_error() );
 

$sql = "SELECT * FROM noticias WHERE MATCH(titulo,descripcion) against('$search')";

$result = mysqli_query($mysqli, $sql);

$array = array();
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    echo '{"noticias":'.json_encode($array).'}';
} else {
    echo "{}";

}

$mysqli->close(); 
   




?>