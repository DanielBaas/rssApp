<?php
include "simplepie-1.5/autoloader.php";

// init the feed
$url = 'http://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml';
$feed = new SimplePie();
$feed->set_feed_url($url);

// enable caching
$feed->enable_cache();

$feed->set_cache_location('E:\PhpStormProjects\RSS\cache');

$feed->init();
?>

<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="utf-8">
  <title>RSS Feed</title>
 </head>
 <body>

<?php

// Conexión a la base de datos
 
$mysqli = new mysqli('127.0.0.1', 'root', '', 'rss');

// Capturar el error ante la conexión
 
if ($mysqli -> connect_errno) {

    echo '<h1>' . "Lo sentimos, este sitio web está experimentando problemas." . '</h1';

    echo '<br>';
    echo '<br>';
    echo '<br>';

    echo '<h2>' . "Error: Fallo al conectarse a MySQL debido a: " . '</h2>';
    echo '<br>';

    echo '<h3>'. "Error: " . $mysqli -> connect_errno . ' - ' . $mysqli -> connect_error . '</h3>';

    exit;
}

// show feed information

echo '<h1>' . $feed->get_title() . '</h1>';
echo '<p>' . $feed->get_description() . '</p>';

// show the first five items in the feed
foreach ($feed->get_items(0, 30) as $item) {

    $sql = "INSERT INTO `noticias` (`link`, `titulo`, `descripcion`, `fecha`)" . "VALUES ('$link','$titulo','$descripcion','$fecha')";        
    $result = $mysqli -> query($sql);

    	if ($result) {
    		echo "Guardado en la BD"."\n";
    	} else {
    		echo "ERROR, no se pudo guardar en la BD";
    	}
}
?>
 </body>
</html>