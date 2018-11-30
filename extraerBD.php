<?php

$bd = "rss";
$server ="localhost";
$user = "root";
$password = "";

if (isset($_POST['search'])) 

    $var = array();



    $mysqli = mysqli_connect($server, $user, $password, $bd);
    $search = mysqli_real_escape_string($mysqli, isset($_POST['search']));
    if( ! $mysqli ) die( "Error de conexion ".mysqli_connect_error() );
 





$sql = "SELECT * FROM noticias WHERE 
    id_noticia LIKE '%$search%' OR
    link LIKE '%$search%' OR
    titulo LIKE '%$search%' OR
    descripcion LIKE '%$search%' OR
    fecha LIKE '%$search%'";

$result = mysqli_query($mysqli, $sql);

while($obj = mysqli_fetch_assoc($result)) {

$var[] = $obj;
}

$mysqli->close(); 
   



echo '{"noticias":'.json_encode($var).'}';

?>