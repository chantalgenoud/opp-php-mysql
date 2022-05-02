<?php include 'db.php';?>
<?php include 'data-collector.php'; ?>
<?php
   //Evaluete data in $_POST variable
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
        $questions = $_SESSION['questions'];
    }
          
    else {
            // echo 'questions data does NOT exist in session-<br>;
        //Get quiz data using php/db.php
        $questions = getQuestions();

        //... and save that data in $_SESSION
        $_SESSION['questions'] = $questions;
    }

 //dev ONLy
 
 /*   echo '<pre>';
    print_r($_SESSION['questions']);
    echo '</pre>'; */

?>

<!-- SIMPLE CHOICE MULTIPLE CHOISE NO CLUE ABOUT That -->

<div class = "row">
    <div class = "col-sm-12">
    <h3>Frage <?php echo $questions[$currentQuestionIndex]['ID']; ?> </h3> <!--Fragenummer -->
    <p><?php echo $questions[$currentQuestionIndex]['Text']; ?></p>
        
    
    <form <?php if        ($currentQuestionIndex + 1 >= count($questions)) echo 'action= "result.php" '; ?> method = "post"> 

            <?php
                $answers = $questions[$currentQuestionIndex]['answers'];
                $type = $questions[$currentQuestionIndex]['Type'];
                $maxPoints = 0; 

                for ($a = 0; $a < count($answers); $a++) {
                    echo '<div class = "form-check">';
                    $isCorrect = $answers[$a]['IsCorrectAnswer'];

                    if ($type == 'MULTIPLE') {
                        //Multiple Choice (checkbox)
                        echo '<input class = "form-check-input" type = "checkbox" name = "a-' . $a . '" value="' . $isCorrect . '" id= "i-' . $a . '">';
                    }
                    else {
                        //Single Choice (radio)
                        echo '<input class = "form-check-input" type = "radio" name = "a-0" value ="' . $isCorrect . '" id = "i-' . $a .'">';
                    }

                $maxPoints += $isCorrect;
                
                echo '<label class = "form-check-label" for = "i-' . $a . '">';
                echo $answers[$a]['Text'];
                echo '</label>';
                echo '</div>';
                }       
        ?>

        <!--Hidden Fields -->
        <input type= "hidden" name = "lastQuestionIndex" value = "<?php echo $currentQuestionIndex; ?>">
        <input type = "hidden" name = "nextQuestionIndex" value = "<?php echo $currentQuestionIndex + 1; ?>">
        <input type = "hidden" name = "maxPoints" value = "<?php echo $maxPoints; ?>">
        <!--END hidden Fields -->

        <p class = "warning"></p>
        <input type = "submit">

    </form> 



    </body>

</html>