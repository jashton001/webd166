<?php
// Initialize the message variable.
ini_set('display_errors', 1); // Let me learn from my mistakes,
error_reporting(E_ALL);      // Show all possible problems,

// Get and clean values from the form.
$firstName = trim($_POST["first_name"]);
$lastName = trim($_POST["last_name"]);
$email = trim($_POST["email"]);

$safe_firstName = htmlspecialchars($firstName,ENT_QUOTES, 'UTF-8');
$safe_lastName = htmlspecialchars($lastName,ENT_QUOTES, 'UTF-8');
$safe_email = htmlspecialchars($email,ENT_QUOTES, 'UTF-8');

// Format the donation amount to two decimal places.
$donation = $_POST['donation'] ?? 0;
$donation = number_format($donation, 2);

// $amount = number_format((float) $amount, 2); Either is acceptable for formatting the amount to two decimal places.
$donation = number_format((float) $donation, 2);

// Create a random confirmation number.
$orderRand = random_int(1000, 9999);

// Get the first letter of the last name and convert it to uppercase.
$last_initial = strtoupper(substr($lastName, 0, 1));

// Count the number of characters in the last name.
$length = strlen($lastName); 

// Combine the values to create the confirmation number.
$conf = $length . $last_initial . $orderRand;

// Create the confirmation message
$msg = "<p> Thank you $safe_firstName $safe_lastName for your donation of $$donation! We really appreciate it! </p>" .
"<p>Your confirmation number is <b>$conf</b>. We will email your receipt to $safe_email </p>. <br>\n" . "<p> Our goal is to help take care of these beautiful animals to prevent them from harmful environments.
 We continue to strive to keep them safe!</p>"
?>

<!DOCTYPE html>
<html lang="en">

<!-- Builds the donation conformation format -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Donation Confirmation</title>

    <style>
        body {
            font-family: arial;
            font-size: 100%;
        }

        #outer {
            width: 960px;
            margin: 50px auto;
            padding: 10px;
            border: 1px solid #a8a8a8;
            box-shadow: 0px 0px 20px #a8a8a8;
            background-color: aliceblue;
        }

        h1,
        h2 {
            font-size: 1.5em;
            color: navy;
            text-align: center;
        }

        .info {
            text-align: left;
        }

        input {
            display: block;
            margin-bottom: 25px;
        }

        input[type=submit] {
            margin-top: 25px;
        }
    </style>

</head>

<body>
    <!-- Structuring the header -->
    <header>
        <h1>Humane Society Donations</h1>
        <h2>Help the Animals</h2>
    </header>

    <section id="outer">
        <h1 class="info">Your Contribution</h1>

        <!-- PHP GOES HERE -->
         <?php echo $msg; ?>

    </section>

</body>

</html>