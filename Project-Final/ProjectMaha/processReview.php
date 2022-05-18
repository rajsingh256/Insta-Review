<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $movie_category = $_POST["category"];
    $movie_title = $_POST["title"];
    $movie_rating = $_POST["rating"];
    $movie_review = $_POST["review"];

    $fileCom = "crm/data/comedy.txt";
    $fileAct = "crm/data/action.txt";
    $fileRom = "crm/data/romance.txt";
    $fileHorr = "crm/data/horror.txt";

    if($movie_category == 'Action'){
        $current = file_get_contents($fileAct);
        $current .= "\n$movie_title;$movie_rating;$movie_review";
        file_put_contents($fileAct, $current);
    }
    if($movie_category == 'Comedy'){
        $current = file_get_contents($fileCom);
        $current .= "\n$movie_title;$movie_rating;$movie_review";
        file_put_contents($fileCom, $current);
    }
    if($movie_category == 'Horror'){
        $current = file_get_contents($fileHorr);
        $current .= "\n$movie_title;$movie_rating;$movie_review";
        file_put_contents($fileHorr, $current);
    }
    if($movie_category == 'Romance'){
        $current = file_get_contents($fileRom);
        $current .= "\n$movie_title;$movie_rating;$movie_review";
        file_put_contents($fileRom, $current);
    }
}
echo 'Thank You for Adding a Movie Review!<br>';

echo '<a href="http://webster.csc.villanova.edu/~plapro98/Project-Final/dist/">Click To Return To Home</a>'
?>
