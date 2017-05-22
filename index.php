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
  <link rel="stylesheet" href="css/style.css"

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">

    <div class="row header">
        <h4>&#35;Sandwiches on Mountains</h4>
        <p>We don't come to your work and take the salami out of your buns.
        <br />
        <span class="warning"><b>Note:</b> Hotdogs are <b>not sandwiches</b>, please do not eat them on mountains and please <b>do not</b> abuse this hashtag and post pictures of them.</span>
        </p>

    </div>

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
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
