<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Sandwiches on Mountains</title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaina|Roboto+Slab" rel="stylesheet">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery-jvectormap-2.0.3.css" type="text/css" media="screen"/>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

  <!-- Map JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="js/jquery-jvectormap-2.0.3.min.js"></script>
  <script src="js/jquery-jvectormap-us-aea.js"></script>

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->

    <div class="row header">
        <div class="container">
          <a href="/" class="logo"><img src="images/logo.svg" /></a>
            <p>Sandwichs on Mountains is all about getting sandwiches into your hands and getting you out onto the world's mountains. What can be better than exercise, good food and great views? The history of sandwiches and humans goes back a long ways with some scientists theorizing that humans actually evolved thumbs purely to help eat sandwiches. This site exists to document our collective love of sandwiches and inspire others to join the cause.
            <br />
            <span class="warning"><b>Note:</b> Hotdogs are <b>not sandwiches</b>, please do not eat them on mountains and please <b>do not</b> abuse this hashtag and post pictures of them.</span>
            </p>
        </div><!-- .container -->
    </div>


    <div class="container photo-feed">
        <h5>Sandwiches in the Wild</h5>
        <p>Below are Instagram images of sandwiches on mountains, hashtagged by our community members. Remember to hashtag your sandwich photos as <b>&#35;sandwichesonmountains</b> to be included on this list.</p>
      <ul class="som-images">
      <?php
        function scrape_insta_hash($tag) {
        	$insta_source = file_get_contents('https://www.instagram.com/explore/tags/'.$tag.'/'); // instagrame tag url
        	$shards = explode('window._sharedData = ', $insta_source);
        	$insta_json = explode(';</script>', $shards[1]);
        	$insta_array = json_decode($insta_json[0], TRUE);
        	return $insta_array; // this return a lot things print it and see what else you need
        }
        $tag = 'hiking'; // tag for which ou want images
        $results_array = scrape_insta_hash($tag);
        $limit = 15; // provide the limit thats important because one page only give some images then load more have to be clicked
        $image_array= array(); // array to store images.
        	for ($i=0; $i < $limit; $i++) {
        		$latest_array = $results_array['entry_data']['TagPage'][0]['tag']['media']['nodes'][$i];
        	 	$image_data  = '<img src="'.$latest_array['thumbnail_src'].'">'; // thumbnail and same sizes
        	 	//$image_data  = '<img src="'.$latest_array['display_src'].'">'; actual image and different sizes
        		array_push($image_array, $image_data);
        	}
        	foreach ($image_array as $image) {
            ?>

                <li><?php echo $image;// this will echo the images wrap it in div or ul li what ever html structure ?></li>

            <?php
        	}
        	// for getting all images have to loop function for more pages
        	// for confirmation  you are getting correct images view
        	//https://www.instagram.com/explore/tags/your-tag-name/
      ?>
      </ul>
  </div><!-- container -->

  <div class="fifty-states">
    <div class="container">
      <h4>50 Sandwiches in 50 States Project</h4>
      <p>The goal of the 50 Sandwiches in 50 States project is to eat a sandwich at the high point of all 50 states.
      <br />
      Hover over the map below to see each state's high point, and which states we've already completed!
      </p>
      <div id="world-map"></div>
      <script>
        $(function(){
          $('#world-map').vectorMap({map: 'us_aea'});
        });
      </script>

  </div><!-- .container -->
  </div><!-- .fifty-states -->


  <div class="about">
    <div class="container">

      <div class="founder founder-image">
      </div><!-- founder -->

      <div class="about-text">
        <h4>Born in a bowl of brownie mix</h4>
        <p>Our esteemed founder started Sandwiches on Mountains with one goal: to raise awareness of sandwiches on mountains. To date our foundation has raised A LOT of awareness about sandwiches on mountains. Possibly even a ton of awareness.</p>
      </div>
    </div><!-- container -->
  </div><!-- .about -->





<footer>
  <div class="container">
    <p>&copy; Copyright <?php echo date("Y"); ?> | Sandwiches on Mountains</p>
  </div><!-- .container -->
</footer>




<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
