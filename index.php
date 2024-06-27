<?php
include_once __DIR__ . "/hotels.php";

var_dump($hotels)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/style.css">
    <title>Hotels</title>
</head>

<body>

    <main class="d-flex container">
        <div class="row">
            <?php foreach ($hotels as $hotel) { ?>
                <div class="col-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center mb-5"><?php echo $hotel['name'] ?></h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Vote: <?php echo $hotel['vote'] ?></h6>
                            <p class="card-text"><?php echo $hotel['description'] ?> at <?php echo $hotel['distance_to_center'] ?>KM from you</p>
                            <a href="#" class="card-link">Hotel link</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

</body>

</html>