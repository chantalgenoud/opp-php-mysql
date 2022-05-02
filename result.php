<?php
include 'db.php';
include 'data-collector.php'; ?>

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



<?php

// Get the lits with the achieved and maximum points (listed er question).
if (isset($_SESSION['achievedPointsList'])) {
    $achievedPointsList = $_SESSION['achievedPointsList'];
}

else{
    //Lands here if result-php is opened in the browser before visiting any qustion before.
    $achievedPointsList = array();
}

if(isset($_SESSION['maxPointsList'])) {
    $maxPointsList = $_SESSION['maxPointsList'];
}
else {
    // Lands here if result.php is opened in the browser before visiting any question before. 
    $maxPointsList = array();
}

    // Get total of achieved points. 
    $total = 0;

    foreach ($achievedPointsList as $key => $value) {
        $total += $value;
    }

    //Get total maximum points.
    $maxTotal = 0;

    foreach ($maxPointsList as $key => $value) {
        $maxTotal += intval($value);
    }
        
        
        //Depending of the achieved points, set a feedback exclamation
        if ($total / $maxTotal >= 0.8) {
            $exclamation = "Great";
        }
        
        elseif ($total / $maxTotal >= 0.4){
            $exclamation = "Good";
        }
        
        else {
            $exclamation = "Autsch";
        }
?>

<h3> <?php echo $exclamation; ?>, you got <?php echo $total;?> of <?php echo $maxTotal; ?> points!</h3>
<p class = "warning"></p>

<form action = "index.php" method= "post">
    <input type = "submit" value="Again">
    <p class = "warning"></p>
    </form> 

    </body>
    </html>