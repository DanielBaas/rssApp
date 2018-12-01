<?php

$bd = "rss";
$server ="localhost";
$user = "root";
$password = "";


    $var = array();
    $mysqli = mysqli_connect($server, $user, $password, $bd);
    $search = $_GET['q'];
    if( ! $mysqli ) die( "Error de conexion ".mysqli_connect_error() );
 

// Esta sentencia usa LIKE

/* $sql = "SELECT * FROM noticias WHERE 
    id_noticia LIKE '%$search%' OR
    link LIKE '%$search%' OR
    titulo LIKE '%$search%' OR
    descripcion LIKE '%$search%' OR
    fecha LIKE '%$search%'"; */


// Esta sentencia usa MATCH
// Antes de ejecutar la sentencia hay que ejecutar lo siguiente:
// 
// alter table noticias ADD FULLTEXT INDEX Buscar (titulo ASC, descripcion ASC)
$sql = "SELECT * FROM noticias WHERE MATCH(titulo,descripcion) against('$search')";

$result = mysqli_query($mysqli, $sql);

/*
while($obj = mysqli_fetch_assoc($result)) {
$var[] = $obj;

}*/
//echo $result->num_rows;
$array = array();
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $array[] = $row;
    }
    echo '{"noticias":'.json_encode($array).'}';
} else {
    echo "{}";

}

$mysqli->close(); 
   




?>