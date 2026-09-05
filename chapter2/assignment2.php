<!-- //need php variables in order to display the information in "<body>" tag. -->
<?php
$heading = "Googleplex"; 
$street = "1600 Amphitheatre Parkway";
$city = "Mountain View";
$state = " CA,";
$country = " United States";
?>
<!DOCTYPE html>
<!-- Joe Ashton --> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables - Joe Ashton</title>
</head>
<body>
    <header>
        <h1>Googleplex</h1>
</header>

<p>
    The Googleplex is the corporate headquarters complex of Google and its parent company Alphabet Inc. It is located at:
    <br>
    <?php
    echo "<p>" . $street . "<br>\n"; // Displays the street name from the created php variable.
    echo $city . "," . $state . " " . $country . "</p>\n"; // Displays the city, state, and country name from the created variable.
    ?>
</body>
</html>