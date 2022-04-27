 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
    <!--
    <?php /*
        echo "Hello, we are starting to work with Databases and PHP PDO!"; 

        //Prepare connection parameters.
        // getenv (string $varname, bool $local_only = false): string|false
        $dbHost = getenv('DB_HOST');
        $dbName = getenv('DB_NAME');
        $dbUser = getenv('DB_USER');
        $dbPassword = getenv('DB_PASSWORD');

        // Connect to mySQL database using PHP PDO Object.
        $dbConnection = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPassword);

        // TELL PDO to throw Exceptions for every error
        $dbConnection->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

*/
    ?> 

</body>
-->


// da kommt der include db
<?php include 'db.php';?>
<?php include 'data-collector.php'; ?>
<?php
    $currentQuestionIndex = 0;

    if (isset($_POST['lastQuestionIndex'])) {
        //get data from last post. 
        $lastQuestionIndex = $_POST['lastQuestionIndex'];

        if (isset($_POST['nextQuestionIndex'])) {
            // Define the index number of the next question.
            $currentQuestionIndex = $_POST['nextQuestionIndex'];

        }
    }

    //Check if $_SESSION ['questions'] exists.
    if (isset($_SESSION['questions'])) {
        // echo 'questions data EXISTS in session <br':
        $questions = $SESSION['questions'];
    }
          
    else {
        // echo 'questions data does NOT exist in session-<br>;

    //Get quiz data using php/db.php
    $questions = getQuestions(); //FEHLER !!!

    //... and save that data in $_SESSION
    $_SESSION['questions'] = $questions;
    }

    echo '<pre>';
    print_r($_SESSION['questions']);
    echo '</pre>';

?>

<!-- SIMPLE CHOICE MULTIPLE CHOISE NO CLUE ABOUT That -->

<div class = "row">
    <div class = "col-sm-12">
    <h3>Frage <?php echo $currentQuestionIndex; ?> </h3>
    <p><?php echo $questions[$currentQuestionIndex]['text']; ?></p>
        <form method = "post">

            <?php
                $answers = $questions[$currentQuestionIndex];
                $isMultipleChoice = $questions[$currentQuestionIndex]['isMulitpleChoice'];

                for ($a = 0; $a < count($answers); $a++) {
                    echo '<div class = "form-check">';
                    $isCorrect = $answers[$a]['isCorrect'];

                    if ($isMultipleChoice == 1) {
                        //Multiple Choice (checkbox)
                        echo '<input class = "form-check-input" type = "checkbox" name = "a-' . $a . '"value="' . $isCorrect . '" id= "i-' . $a . '">';
                    }
                    else {
                        //Single Choice (radio)
                        echo '<input class = "form-check-input" type = "radio" name = "a-0" value ="' . $isCorrect . '" id = "i-' . $a .'">';
                    }

                $maxPoints += $isCorrect;
                
                echo '<label class = "form-check-label" for = "i-' . $a . '">';
                echo $answers[$a]['answer'];
                echo '</label>';
                echo '</div>';
                }       
        ?>

        <!--Hidden Fields -->
        <input type= "hidden" name = "lastQuestionIndex" value = "<?php echo $currentQuestionIndex; ?>">
        <input type = "hidden" name = "nextQuestionIndex" value = "?php echo $currentQuestionIndex + 1; ?>">
        <input type = "hidden" name = "maxPoints" value = "<?php $maxPoints; ?>">
        <!--END hidden Fields -->

        <p class = "warning"></p>
        <input type = "submit">

    </form> <!--wo fängt die an?-->





</html>