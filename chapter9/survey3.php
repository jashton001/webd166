<?php
// Chapter 9: PHP Sessions and a Multi-Page Form
// Name:

// TODO: Start or resume the session.
session_start();
// TODO: Create an array containing the valid education choices.
$valid_education = ['High School', 'Associate Degree'. "Bachelor's Degree", "Master's Degree", 'Doctoral Degree'];
// TODO: Process the form only when this page receives a POST request.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $education = $_POST['education'] ?? '';

    // TODO: Validate the submitted education against the allowed choices.
    if (!in_array($education, $valid_education, true)) {
        echo '<p class="error">Error: Please select a valid education level.</p>';
        exit;
    }

    $_SESSION['education'] = $education;

    // TODO: Redirect to this page after successfully processing the POST request.
    header('Location: survey3.php');
    exit;
}

// TODO: Prevent this page from being viewed if the required
// responses from the previous pages are missing.
if (!isset($_SESSION['age']) || !isset($_SESSION['education'])) {
    header('Location: survey.php');
    exit;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Anonymous Survey - Page 3</title>
    <link rel="stylesheet" href="survey.css">
</head>

<body>
    <div class="wrapper">

        <header>
            <h1>Anonymous Survey - Page 3</h1>

            <img class="survey-image"
                 src="https://thewisconsinvegetablegardener.files.wordpress.com/2019/05/adm_survey_660x320.png?w=705"
                 alt="Survey clipboard">
        </header>

        <main>
            <form action="survey_result.php" method="post">

                <fieldset>
                    <legend>What is your income bracket?</legend>

                    <div class="choice">
                        <input type="radio"
                               id="under20"
                               name="income"
                               value="under $20,000"
                               required>
                        <label for="under20">Under $20,000</label>
                    </div>

                    <div class="choice">
                        <input type="radio"
                               id="income20-39"
                               name="income"
                               value="$20,000 to $39,000">
                        <label for="income20-39">$20,000 to $39,000</label>
                    </div>

                    <div class="choice">
                        <input type="radio"
                               id="income40-59"
                               name="income"
                               value="$40,000 to $59,000">
                        <label for="income40-59">$40,000 to $59,000</label>
                    </div>

                    <div class="choice">
                        <input type="radio"
                               id="income60-80"
                               name="income"
                               value="$60,000 to $80,000">
                        <label for="income60-80">$60,000 to $80,000</label>
                    </div>

                    <div class="choice">
                        <input type="radio"
                               id="over80"
                               name="income"
                               value="over $80,000">
                        <label for="over80">Over $80,000</label>
                    </div>

                </fieldset>

                <button type="submit">Next &gt;&gt;</button>

            </form>
        </main>

    </div>
</body>

</html>