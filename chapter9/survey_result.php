<?php
// Chapter 9: PHP Sessions and a Multi-Page Form
// Name: Joe Ashton

// TODO: Start or resume the session.
session_start();

// TODO: Create an array containing the valid income choices.
$valid_income = ['under $20,000', '$20,000 to $39,000', '$40,000 to $59,000', '$60,000 to $80,000', 'over $80,000'];

// TODO: Process the form only when this page receives a POST request.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     if (!isset($_SESSION['age']) || !isset($_SESSION['education'])) {
        header('Location: survey.php');
        exit;
     }

// TODO: Retrieve the submitted income value.
     $income = $_POST['income'] ?? '';

     // TODO: Validate the submitted income against the allowed choices.
     if(!in_array($income, $valid_income, true)) {
        echo '<p class="error">Error: Please select a valid income bracket.</p>';
        exit;
     }

// TODO: Store the valid income value in the session.
     $_SESSION['income'] = $income;

     // TODO: Redirect to this page after successfully processing the POST request.
     header('Location: survey_result.php');
     exit;
}

// TODO: Prevent this page from being viewed unless all three survey responses are available.
if (!isset($_SESSION['age']) || !isset($_SESSION['education']) || !isset($_SESSION['income'])) {
        header('Location: survey.php');
        exit;
}

// TODO: Retrieve the three stored session values so they can be displayed below.
$age = $_SESSION['age'];
$education = $_SESSION['education'];
$income = $_SESSION['income']; 
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Anonymous Survey Results</title>
<link rel="stylesheet" href="survey.css">
</head>
<body>
<div class="wrapper">
 <header>
            <h1>Thank You for Taking Our Anonymous Survey</h1>

            <img class="survey-image"
                 src="https://thewisconsinvegetablegardener.files.wordpress.com/2019/05/adm_survey_660x320.png?w=705"
                 alt="Survey clipboard">
        </header>

<main>
<h2>Your Responses</h2>
<ul class="results">
<li><strong>Age:</strong> <?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?></li>
<li><strong>Education:</strong> <?php echo htmlspecialchars($education, ENT_QUOTES, 'UTF-8'); ?></li>
<li><strong>Income:</strong> <?php echo htmlspecialchars($income, ENT_QUOTES, 'UTF-8'); ?></li>
</ul>
<p class="actions"><a class="button-link" href="survey.php">Take the Survey Again</a></p>
</main>
</div>
</body>
</html>
