<?php
// Displays errors if any.
ini_set('display_errors', '1');
error_reporting(E_ALL);

$msg = "<p>Please <a href=\"donation2.html\"> GO BACK</a> and fill in the following errors:</p>\n";

//Holds the error messages or the success message.
$okay = true; 

//Entering the default values from the form to validate
$fname = trim($_POST['fname'] ?? '');
$lname = trim($_POST['lname'] ?? '');
$email = trim($_POST['email'] ?? '');
$amount_raw = trim($_POST['amount'] ?? '');
$subscription = trim($_POST['subscription'] ?? '');

if(empty($fname)) {
    $msg .="<p>First name is required.</p>\n";
    $okay = false;
}

if (empty($lname)) { 
    $msg .="<p>Last name is required.</p>\n";
    $okay = false;
}

// Makes sure the email address is valid and not empty.
if (empty($email)) {
    $msg .= "<p>Email address is required.</p>\n";
    $okay = false;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg .= "Invalid email address format.</p>\n";
    $okay = false;
}

// Makes sure the donation amount is valid.
if ($amount_raw === '') {
    $msg .= "<p>Donation amount is missing.</p>\n";
    $okay = false;
} elseif (!is_numeric($amount_raw)) {
    $msg .="<p>Donation amount must be greater than zero.</p>\n";
    $okay = false;
} elseif ($amount_raw <= 0) {
    $msg .="<p>Donation amount must be greater than zero.</p>\n";
    $okay = false;
}
// Formats the donation amount once user enters the amount.
if ($okay) {
    $formatted_amount = number_format((float) $amount_raw, 2);

    // Shows a confirmation number when user donates. 
    $confirmation_number = strtoupper(substr($lname, 0, 1)) . random_int(1000, 9999);

    $subscription_status = isset($_POST['subscription']) ? 'no_subscription' : 'subscription';

    // Shows if the user would like to recieve a free subscription or not when clicking the checkbox.
    switch ($subscription_status) {
        case 'no_subscription':
            $subscription_message = "You have chosen not to receive a free one-year subscription to our e-magazine.";
            break;
        case 'subscription':
            $subscription_message = "You will receive a free one-year subscription to our e-magazine.";
            break;
    }
    if ($amount_raw >= 100) {
        $donation_level = "Gold Supporter";
    } elseif ($amount_raw >= 50) {
        $donation_level = "Silver Supporter";
    } elseif ($amount_raw >= 25) {
        $donation_level = "Bronze Supporter";
    } else {
        $donation_level = "Friend of the Animals";
    }

    // Adds the amount of thank you messages on display.
    $thank_you_repeated = "";
    for ($i = 1; $i <= 3; $i++) {
        $thank_you_repeated .="Thank you! " ;  
   } 

   $thank_you_repeated = trim($thank_you_repeated);

// Accurately collects the user's full name and email
   $safe_fname = htmlspecialchars($fname, ENT_QUOTES, 'UTF-8');
   $safe_lname = htmlspecialchars($lname, ENT_QUOTES, 'UTF-8');
   $safe_email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); 

   // Created thank you messages once the user finishes filling out form.
   $msg = "<p>Thank you " . $safe_fname . " " . $safe_lname . " for your donation of $" . $formatted_amount . ".</p>\n";
   $msg .= "<p>Your confirmation number is " . $confirmation_number . ".</p>\n";
   $msg .= "<p>We will email your receipt to " . $safe_email . ".</p>\n";
   $msg .= "<p>" . $subscription_message . "</p>\n";
   $msg .= "<p>Your donation level is " . $donation_level . ".</p>\n";
   $msg .="<p>" . $thank_you_repeated . "</p>\n"; 
}
?>

<!DOCTYPE html>
<!-- Joe Ashton -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Processing</title>
</head>

<body>
    <h1>Donation Status</h1>
    <?php echo $msg; ?>
</body>
</html>