<?php

    // Get total of achieved points. 
    $total = 0;

    foreach($maxPointsList) as $key => $value) {
        $maxTotal += intval($value);
    }
        
        
        //Depending of the achieved points, set a feedback exclamation
        if ($total / $maxTotal >=0.8) {
            $exclamation = "Great";
        }
        
        elseif ($total / $maxTotal >= 0.4){
            $exclamation = "Good";
        }
        
        else {
            $exclamation = "Autsch";
        }
?>

<h3><?php echo $exclamation; ?>, you got <?php echo $total;?> of <?php echo $echo $maxTotal; ?> points!</h3>
<p class ="warning"></p>

<form action = "index.php" method= "post">
    <input type = "submit" value="Again">
    <p class = "warning"></p>
    </form> <!--- wo auch immr die beginnt???-->

<?php indclude 'footer.php'; ?> //wo auch immer der ist :D



 
    }