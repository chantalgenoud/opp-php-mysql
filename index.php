<?php
    session_start();
    session_destroy();

    include 'db.php'
?>

<h3>Hello, we are starting now!</h3>

<form action="question.php" method="post">
    <input type= "submit" value= "Start">
    <p class="warning"></p>
</form>


</body>

</html>