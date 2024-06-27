<?php
include_once __DIR__ . "/hotels.php";

$filteredhotels = [];

$_GET['parking'] = $_GET['parking'] ?? 'default';

if ($_GET['parking'] == 'default') {
    $filteredhotels = $hotels;
}

var_dump($_GET['parking']);
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


    <main class="container">

        <form action="./index.php" method="get">
            <label for="parking">parking:</label>
            <select name="parking" id="parking">
                <option value="default" selected>Default</option>
                <option value="on">With</option>
                <option value="off">Without</option>
            </select>
            <button type="submit" class="btn btn-dark btn-sm">Send</button>
        </form>

        <div class="row d-flex">
            <?php foreach ($filteredhotels as $hotel) { ?>
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