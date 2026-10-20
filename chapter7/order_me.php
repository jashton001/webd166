<?php

// ----------------------------------------------------
// Assignment 7: Arrays - Pizza Order
//
// You may use this starter PHP file and complete the
// missing code marked YOUR CODE.
//
// You may also create your own order_me.php file
// if you prefer to write and test the code yourself.
//
// If you use this starter file, follow the comments
// and hints to complete each missing section.
// ----------------------------------------------------


// ----------------------------------------------------
// Create an associative array of pizza toppings.
//
// The checkbox value is the KEY.
// The text displayed to the customer is the VALUE.
//
// Example:
// 'extra_cheese' => 'Extra Cheese'
//
// Look at pizza_order.html to find the remaining
// checkbox values.
// ----------------------------------------------------

$allowedToppings = [
    'extra_cheese' => 'Extra Cheese',
    'pepperoni' => 'Pepperoni',

    // YOUR CODE:
    // Add the remaining toppings here. Remove the comment slashes and replace the blanks with the correct values.

     'sausage' => 'Sausage',
     'meatballs' => 'Meatballs',
     'tomato' => 'Tomato',
     'onion' => 'Onion',
     'olives' => 'Olives',
     'mushroom' => 'Mushroom',
     'spinach' => 'Spinach',
     'garlic' => 'Garlic',
     'cilantro' => 'Cilantro',
];


// ----------------------------------------------------
// Initialize variables.
// This code is completed for you.
// ----------------------------------------------------

$name = '';
$phone = '';
$toppings = [];

$basePrice = 7.95;
$toppingPrice = 1.00;

$count = 0;
$cost = $basePrice;


// ----------------------------------------------------
// Retrieve the submitted form values.
//
// The name is completed for you.
// Use the same pattern for the phone number.
// ----------------------------------------------------

$name = trim((string)($_POST['name'] ?? ''));


// Retrieve the customer's phone number.
//
// HINT:
// The key from the HTML form is 'phone'.

// YOUR CODE:
$phone = trim((string)($_POST['phone'] ?? ''));


// ----------------------------------------------------
// Retrieve the checkbox array.
//
// The checkbox name in pizza_order.html is:
//
// topping[]
//
// PHP uses 'topping' as the key in $_POST.
//
// If no checkboxes are selected, use an empty array [].
//
// Example pattern:
// $variable = $_POST['key'] ?? [];
// ----------------------------------------------------

// YOUR CODE:
$toppings = $_POST['topping'] ?? [];


// ----------------------------------------------------
// Make sure $toppings contains an array.
//
// This code is completed for you.
// ----------------------------------------------------

if (!is_array($toppings)) {
    $toppings = [];
}


// ----------------------------------------------------
// Count the selected toppings.
//
// HINT:
// Use count() with the $toppings array.
//
// Example:
// count($arrayName)
// ----------------------------------------------------

// YOUR CODE:
$count = count($toppings);


// ----------------------------------------------------
// Calculate the total pizza cost.
//
// Pizza price: $7.95
// Each topping: $1.00
//
// Formula:
//
// base price + (number of toppings * topping price)
//
// Variables:
// $basePrice
// $count
// $toppingPrice
// ----------------------------------------------------

// YOUR CODE:
$cost = $basePrice + ($count * $toppingPrice);

?>
<!doctype html>
<!-- Joe Ashton -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pizza Order Results</title>

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 1rem;
            font-family: Arial, sans-serif;
            font-size: 100%;
            line-height: 1.5;
            color: #222;
            background-color: #111;
        }

        main {
            width: min(90%, 50rem);
            margin: 2rem auto;
            padding: 1.5rem;
            background-color: #f5f5f5;
            border-radius: 0.5rem;
        }

        header {
            margin-bottom: 2rem;
            text-align: center;
        }

        h1 {
            margin-bottom: 0.5rem;
            color: red;
        }

        h2 {
            margin-top: 0;
        }

        .customer-info {
            margin-bottom: 2rem;
        }

        .total {
            margin-top: 2rem;
            font-size: 1.25rem;
            font-weight: bold;
            color: #b00020;
        }

        .return-link {
            margin-top: 2rem;
        }
    </style>
</head>

<body>

    <main>

        <header>
            <h1>Pizza Express</h1>
            <h2>Your Pizza Order</h2>
        </header>


        <section class="customer-info">

            <h3>Customer Information</h3>

            <p>
                <strong>Name:</strong>

                <?php
                // htmlspecialchars() is completed for you.
                //
                // HINT:
                // Replace the blank with the variable
                // containing the customer's name.
                ?>

                <?= htmlspecialchars(
                    $name,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                ) ?>
            </p>


            <p>
                <strong>Phone:</strong>

                <?php
                // HINT:
                // Replace the blank with the variable
                // containing the phone number.
                ?>

                <?= htmlspecialchars(
                    $phone,
                    ENT_QUOTES | ENT_SUBSTITUTE,
                    'UTF-8'
                ) ?>
            </p>

        </section>


        <?php
        // ------------------------------------------------
        // Check whether any toppings were selected.
        //
        // An empty array is written:
        //
        // []
        //
        // HINT:
        // Compare the $toppings array with [].
        // ------------------------------------------------
        ?>

        <?php if ($toppings === []): ?>

            <h3>Your Pizza</h3>

            <p>
                You did not order any extra toppings,
                so you will receive our traditional
                cheese pizza.
            </p>


        <?php else: ?>

            <h3>Your Toppings</h3>

            <p>
                You ordered

                <?php
                // HINT:
                // The number of selected toppings
                // is stored in $count.
                ?>

                <?= $count ?> topping(s):
            </p>


            <ul>

                <?php
                // -----------------------------------------
                // Loop through the toppings array.
                //
                // HINT:
                //
                // foreach ($arrayName as $value)
                //
                // Use $toppings as the array.
                // Use $topping for each individual value.
                // -----------------------------------------
                ?>

                <?php foreach ($toppings as $topping): ?>


                    <?php
                    // Check whether the submitted topping
                    // exists as a KEY in the
                    // $allowedToppings associative array.
                    //
                    // This code is completed for you.
                    ?>

                    <?php if (isset($allowedToppings[$topping])): ?>

                        <li>

                            <?php
                            // The submitted topping is the KEY.
                            //
                            // Use the key to retrieve its
                            // display VALUE from $allowedToppings.
                            //
                            // Example:
                            // $allowedToppings[$key]
                            ?>

                            <?= htmlspecialchars(
                                $allowedToppings[$topping],
                                ENT_QUOTES | ENT_SUBSTITUTE,
                                'UTF-8'
                            ) ?>

                        </li>

                    <?php endif; ?>

                <?php endforeach; ?>

            </ul>

        <?php endif; ?>


        <p class="total">
            Total Cost:

            <?php
            // ---------------------------------------------
            // number_format() displays two decimal places.
            //
            // HINT:
            // The calculated total is stored in $cost.
            // ---------------------------------------------
            ?>

            $<?= number_format($cost, 2) ?>
        </p>


        <p class="return-link">
            <a href="pizza_order.html">
                Return to the Pizza Order Form
            </a>
        </p>

    </main>

</body>

</html>