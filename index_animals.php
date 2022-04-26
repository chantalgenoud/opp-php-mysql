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

        //Create the SELECT query and fetch all table rows as associative array
        // Bsp. SELECT * FROM Customers
        $query = $dbConnection->query("SELECT * from Questions WHERE ID =1"); //https://www.php. blabla
        //$query->fetch(PDO::FETCH_ASSOC);


                //Create the SELECT query and fetch all table rows as associative array
        // Bsp. SELECT * FROM Customers
        $query2 = $dbConnection->query("SELECT * from Answers WHERE QuestionID = 1"); //https://www.php. blabla
        //$query->fetch(PDO::FETCH_ASSOC);

echo '<div class="container-fluid p-5">';
echo '<div class ="h3">Animals
</div>';
echo '<table class="table table-striped">';

//Print table header
echo '<thead>';
echo '<tr>';


//Get column metadate and the name of the column
$columnCount = $query->columnCount();

    for ($i = 0; $i <$columnCount; $i++) {
    $columnInfo = $query->getColumnMeta($i);
    $columnName = $columnInfo['name'];
    echo "<td>$columnName</td>";
    }



echo'</tr>';
echo '</thead>';
 
    //Print table rows (for each book one row).
    while ($row =  $query->fetch(PDO::FETCH_ASSOC)){
    echo'<tr>';

        //For each column (<td> one value.
        foreach ($row as $columnName => $value) { //Implikationspfeil
            
        echo "<td>$value</td>";
        }

    echo '</tr>';

    }



//Get column metadate and the name of the column
$columnCount = $query2->columnCount();

for ($i = 0; $i <$columnCount; $i++) {
$columnInfo = $query2->getColumnMeta($i);
$columnName = $columnInfo['name'];
echo "<td>$columnName</td>";
}



echo'</tr>';
echo '</thead>';

//Print table rows (for each book one row).
while ($row =  $query2->fetch(PDO::FETCH_ASSOC)){
echo'<tr>';

    //For each column (<td> one value.
    foreach ($row as $columnName => $value) { //Implikationspfeil
        
    echo "<td>$value</td>";
    }

echo '</tr>';

}
    // End of table rows.

echo '</table>';
echo '</div>';
echo '</div>';

echo '<pre>';
print_r($query);
print_r($query2);
echo '</pre>';

    ?>
</body>
</html>