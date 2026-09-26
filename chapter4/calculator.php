<?php
// Added for showing errors when giving results
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Key variables needed to properly work
$milesDriven = $_POST["miles_driven"];
$gallonsUsed = $_POST["gallons_used"];
$pricePerGallon = $_POST["price_gallon"];


// Math calculations setup, in order to work
$mpg = $milesDriven / $gallonsUsed;
$tripCost = $gallonsUsed * $pricePerGallon;
?> 

<!doctype html>
<!-- Joe Ashton -->
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Trip Calculator Results</title>
</head>
<body>

<!-- // The HTML part needed to be structured for the file to work correctly. -->
     <h1>Trip Calculator Results</h1>
     
     <!-- // Catches the amount of miles driven -->
     <p>Miles Driven:
        <?php echo number_format($milesDriven); ?>
</p> 
    <!-- Catches the amount of gallons that were used -->
    <p>Gallons Used:
        <?php echo number_format($gallonsUsed, 1); ?>
</p>   
    <!-- Calculate price per gallon -->
    <p>Price Per Gallon:
        <?php echo "$" . number_format($pricePerGallon, 2); ?>
</p>
    <!-- Calculate miles per gallon -->
    <p>Miles Per Gallon:
        <?php echo number_format($mpg, 2); ?>
</p>
    <!-- Shows the full amount of the trip -->
    <p>Cost of the Trip:
        <?php echo "$" . number_format($tripCost, 2); ?>
</p>

</body>
</html>