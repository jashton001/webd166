<?php
// These are the key variables in order to show the results.
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$heard = $_POST['heard'];
$comment = $_POST['comments'];
?>

<!DOCTYPE html>
<!-- Joe Ashton -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Form Results - Joe Ashton</title>
</head>

<body>
    <header>
        <h1>Thank You For Signing Up!</h1>
    </header> 

<main>
    <h2>You have entered the following information: </h2>

    <!-- Displays the results once user enters their information -->
    <p><strong>Entered Name: </strong><?php print $name; ?></p>
    <p><strong>Entered E-Mail: </strong><?php print $email; ?></p>
    <p><strong>Entered Phone Number: </strong><?php print $phone; ?></p>
    <p><strong>Where Did You Hear About Us: </strong><?php print $heard; ?></p>
    <p><strong>Comments: </strong><?php print $comment; ?></p>
</main>
</body>
</html>