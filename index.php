<?php

require __DIR__ . '/vendor/autoload.php';

$objectFilm = null;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//2 differents adapters
    $adapter = new CinemaApi\Adapter\GuzzleHttpAdapter();
//$adapter = new \CinemaApi\Adapter\CurlAdapter();

    $main = \CinemaApi\MainApi::film($adapter);
//    $main->getFilmInformation($search);
//    $film = $main->film();

    $serachString = $_POST['filmTitle'];


//Вопрос по передаваемыем параметрам.
//Нормальни ли сюда передать отдельно все параметры навание, год

//Search params
    $objectFilm = $main->getFilmInformation($serachString);
}



$adapter = new CinemaApi\Adapter\GuzzleHttpAdapter();
$main = \CinemaApi\MainApi::film($adapter);
$films = $main->getFilmsToRent();


var_dump($films);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cinema API</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <form method="post" action="">
                <div class="form-group">
                    <label for="filmTitle">Film title</label>
                    <input type="text" class="form-control" id="filmTitle" placeholder="Enter film title"
                           name="filmTitle">
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-8">
            <?php
            if ($objectFilm) {
                if ($objectFilm->response === 'True') {
                    ?>
                    <h1>Title: <?= $objectFilm->title; ?></h1>
                    <h2>Year: <?= $objectFilm->year; ?></h2>
                    <h2>Rating: <?= $objectFilm->imdbrating; ?></h2>
                    <a href="http://www.imdb.com/title/<?= $objectFilm->imdbid; ?>/" target="_blank"><img
                                src="<?= $objectFilm->poster; ?>" alt=""></a>
                    <?php
                } else {
                    echo '<h4>Your request: </h4>';
                    echo '<h4>'.$serachString.'</h4>';
                    ?>
                    <div class="alert alert-danger" role="alert">Sorry that film not found</div>
                    <?php
                }
            } else {
                ?>
                <div class="alert alert-danger" role="alert">Please type film title</div>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
