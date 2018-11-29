<!DOCTYPE html>
<html>
<head>
	<title>Rss</title>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
	<style type="text/css">
		.main-container {
			
			display: flex;
			flex-wrap: wrap;-
		}
		.card-margin{
			
		}
		.card-action{
			border-radius: .5rem !important;
		}
		.card{
			border-radius: .5rem !important;
		}
	</style>
            
</head>
<body>


<?php


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
?>

  <nav style="background-color: #6e7ceede">
    <div class="nav-wrapper">
    				 

		<?php	
			echo '<a class="brand-logo center" href="' . $feed->get_image_link() . '" title="' . $feed->get_image_title() . '">';
			echo '<img src="' . $feed->get_image_url() . '" width="' . $feed->get_image_width() . '" height="' . $feed->get_image_height() . '" />';
			echo '</a>'; 
		?>

      <ul class="left hide-on-med-and-down">
        <li class="active">            
        	<form>
        <div class="input-field" style="margin-top: 0; margin-bottom: 0; height: auto;">
          <input id="search" type="search" style="margin-bottom: 0;" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
          <i class="material-icons">close</i>
        </div>
      </form></li>
      </ul>

    </div>
  </nav>
  <div class="row">


	<div class="col s4">
		<?php create_grid($feed, 1);  ?>
	</div> 
	<div class="col s4">
		<?php create_grid($feed, 2);  ?>
	</div> 
	<div class="col s4">
		<?php create_grid($feed, 3);  ?>
	</div> 
    <?php 
   	



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

  </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>