<?php
session_start();

if (isset($_POST['lastQuestionIndex'])) {
    // Get the Index (string) of the last question.
    $lastQuestionIndex = $_POST['lastQuestionIndex']; // ohne intval()

    // and create the key for that question.
    $questionKey = 'q-' . $lastQuestionIndex;

    // ACHIEVED POINTS


    /*Get tehe number of achieved points, chacking all keys in $_POST for the head
    'a-', like 'a-0', 'a-1' etc.*/

    $achievedPoints= 0;

    foreach ($_POST as $key => $value){
        if (str_contains($key, 'a-')) {
            //same as: $achieved Points = $achievedPoints + intval ($value);
            $achievedPoints += intval($value);
        }
    }

    /* PUt the achieved points into the list, using a 'q-' headed key,
    which identifies the question in the list.*/

    $_SESSION['achievedPointsList'][$questionKey] = $achievedPoints;

    // MAX Points
    $maxPoints = intval($_POST['maxPoints']);

    //make sure the list of all max points exixts in the $_SESSION
    if (!isset($_SESSION['maxPointsList'])); {
        $_SESSION['maxPointsList'] = array();
    }

    /*put the achieved points into the list, asing a 'q-' headed key, 
    which identifies the question in the list. */
    $_SESSION['maxPointsList'][$questionKey] = $maxPoints;

    /*da kommt noch was*/
}