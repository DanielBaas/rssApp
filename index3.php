<?php 

$q = $_REQUEST["q"];

$hint = "";



require_once 'vendor/autoload.php';
 
//$url = 'http://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml';
$url = 'http://rss.nytimes.com/services/xml/rss/nyt/HomePage.xml';
$feed = new SimplePie();
//problema con el cache arreglado
$feed->set_cache_location($_SERVER['DOCUMENT_ROOT'] . '/Rss/app');
$feed->set_feed_url($url);
$feed->handle_content_type();
$feed->init();
/*
echo '<h1>' . $feed->get_title() . '</h1>';
echo '<p>' . $feed->get_description() . '</p>';
*/
 create_grid($feed, 3); 

 function create_grid($feed, $num_colum){
	$articles_column = $feed->get_item_quantity()/3;

	$num_articles = $articles_column*($num_colum-1);
	if($num_articles < 1){
		$num_articles=0;
	}
	foreach ($feed->get_items( $num_articles ,$articles_column) as $item) {
		echo "<div class='card-margin'> ";

		echo "<div class='card blue-grey darken-1' >
	        	<div class='card-content white-text'>
	          		<span class='card-title'>" . $item->get_title() . "</span>";
	    echo "<p>" . $item->get_description() . "</p>";
	    echo "<p>" . $item->get_date('Y-m-d H:i:s') . "</p>";

	    echo "</div>
	        <div class='card-action'>
	          <a href='" . $item->get_link() . "'> ir a la noticia </a>  
	        </div>
	      </div></div>";
	}
}



?>

