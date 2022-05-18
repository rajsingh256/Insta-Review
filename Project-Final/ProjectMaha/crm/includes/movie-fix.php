<?php
function readMovies($filename) {
   $arr = file($filename) or die('ERROR: Cannot find file');
   $delimiter = ';';
   foreach ($arr as $line) {  

      $splitcontents = explode($delimiter, $line);
      
      $aMovie = array();
      
      $aMovie['name'] = $splitcontents[0];
      $aMovie['rating'] = utf8_encode($splitcontents[1]);
      $aMovie['review'] = utf8_encode($splitcontents[2]);
     //$aMovie['release'] = utf8_encode($splitcontents[3]);
      //$aMovie['rating'] = utf8_encode($splitcontents[4]);
      //$aMovie['review'] = utf8_encode($splitcontents[5]);

      $movies[$aMovie['name']] = $aMovie;
   }
   return $movies;
}


function readReviews($movie, $filename) {
   $arr = file($filename) or die('ERROR: Cannot find file');

   $delimiter = ';';

   foreach ($arr as $line) {  
      $splitcontents = explode($delimiter, $line);
      
      $anReview = array();      
      $anReview['movie'] = $splitcontents[0];
      $anReview['rating'] = $splitcontents[1];
      $anReview['review'] = $splitcontents[2];

      $reviews[] = $anReview;    
   }
   
   foreach ($reviews as $rev) {
      if ($rev['movie'] == $movie) $filtered[] = $rev;
   }
   
   if (isset($filtered) )
      return $filtered;
   else
      return null;

}
?>