<?php
include_once __DIR__ . "/hotels.php";

$filteredhotels = [];

$_GET['parking'] = $_GET['parking'] ?? 'default';
$_GET['value'] = $_GET['value'] ?? 'default';

if ($_GET['parking'] == 'default') {
    $filteredhotels = $hotels;
} elseif ($_GET['parking'] == 'on') {
    foreach ($hotels as $hotel) {
        if ($hotel['parking']) {
            $filteredhotels[] = $hotel;
        }
    }
} elseif ($_GET['parking'] == 'off') {
    foreach ($hotels as $hotel) {
        if (!$hotel['parking']) {
            $filteredhotels[] = $hotel;
        }
    }
}

$hotelvalue = 0;
$secondfilteredhotels = [];

if (!($_GET['value'] == 'default')) {
    $hotelvalue = (int)$_GET['value'];
}

if ($hotelvalue > 0) {
    foreach ($filteredhotels as $hotel) {
        if ($hotel['vote'] == $hotelvalue)
            $secondfilteredhotels[] = $hotel;
    }
} else {
    $secondfilteredhotels = $filteredhotels;
}

var_dump($hotelvalue);
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
            <label for="parking">Parking:</label>
            <select name="parking" id="parking">
                <option value="default">Default</option>
                <option value="on">With</option>
                <option value="off">Without</option>
            </select>
            <label for="value">Value:</label>
            <select name="value" id="value">
                <option value="default">Default</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
                <option value="5">Five</option>
            </select>
            <button type="submit" class="btn btn-dark btn-sm">Send</button>
        </form>

        <div class="row d-flex">
            <?php foreach ($secondfilteredhotels as $hotel) { ?>
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