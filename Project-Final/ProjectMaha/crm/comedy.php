<?php include 'includes/movie-fix.php';
$movies = readMovies('data/comedy.txt');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Movie Reviews</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=2.0">
<link href='http://fonts.googleapis.com/css?family=Arial' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-red.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">

<?php include 'includes/header.inc.php'; ?>
<?php include 'includes/left-nav.inc.php'; ?>

<main class="mdl-layout__content mdl-color--indigo-100">
<section class="page-content">
<div class="mdl-grid">

<div class="mdl-cell mdl-cell--5-col card-lesson mdl-card  mdl-shadow--2dp">
<div class="mdl-card__title mdl-color--red-900 mdl-color-text--white">
<h2 class="mdl-card__title-text"><span style="font-size: 50px;">DATABASE</h2>
</div>
<div class="mdl-card__supporting-text">
<table class="mdl-data-table  mdl-shadow--50dp">
  <thead>
  <tr>
    <th class="mdl-data-table__cell--non-numeric"><span style="font-size: 20px;">Movie</th>
    <!-- <th class="mdl-data-table__cell--non-numeric"><span style="font-size: 20px;">Director</th>
    <th class="mdl-data-table__cell--non-numeric"><span style="font-size: 20px;">Release Date</th> -->
    <th class="mdl-data-table__cell--non-numeric"><span style="font-size: 20px;">Rating</th>
  </tr>
  </thead>
<tbody>
<?php

foreach ($movies as $mov) {
  
  echo '<td class="mdl-data-table__cell--non-numeric"><span style="font-size: 30px;"><a href="comedy.php?movie=' . $mov['name'] . '">' . $mov['name'] . '</a></td>';
  // echo '<td class="mdl-data-table__cell--non-numeric"><span style="font-size: 15px;">' . $mov['director'] . '</td>';
  // echo '<td class="mdl-data-table__cell--non-numeric"><span style="font-size: 15px;">' . $mov['release'] . '</td>';
  echo '<td class="mdl-data-table__cell--non-numeric"><span style="font-size: 20px;">' . $mov['rating'] . '</td>';
  echo '</tr>';
}
?>
</tbody>
</table>
</div>
</div> <!-- / mdl-cell + mdl-card -->
<div class="mdl-grid mdl-cell--5-col">
<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  if (isset($_GET['movie'])) {
    $requestedMovie = $movies[$_GET['movie']];
?>

<div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
<div class="mdl-card__title mdl-color--red-900 mdl-color-text--white">
<h2 class="mdl-card__title-text"><span style="font-size: 30px;">MOVIE DETAILS</h2>
</div>
<div class="mdl-card__supporting-text">

<?php 
// echo '<h4><img src="images/' . $requestedMovie['id'] . '.jpg" height="300" width="200" alt="Image resize"></h4>';
echo '<h3>' . '<b>' . $requestedMovie['name'] .'</h3>'; 
// echo '<h4>' . $requestedMovie['release'] . '</h4>'; 
// echo '<h4>' . 'Directed by: ' . $requestedMovie['director'] . '</h4>';
echo '<br>';
?>

</div>
</div> 

<div class="mdl-cell mdl-cell--12-col card-lesson mdl-card  mdl-shadow--2dp">
<div class="mdl-card__title mdl-color--red-900 mdl-color-text--white">
<h2 class="mdl-card__title-text"><span style="font-size: 30px;">REVIEWS</h2>
</div>
<div class="mdl-card__supporting-text">
<?php
    $reviews = readReviews($_GET['movie'], 'data/comedy.txt');
    if (is_null($reviews)) {
      echo 'No reviews for ' . $requestedMovie['name'] . '. Be the first!';
    } else {
      ?>
      <?php foreach ($reviews as $rev) {
              echo '<h4>'. $rev['rating'] . '</h4>';
              echo '<p><span style="font-size: 20px;">' . $rev['review'] . '<p>';
            } 
          }?>
</div>
</div> 
<?php
}
} ?>
</div>
</div> 
</section>
</main>
</div> 
</body>
</html>