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
        $dbConnection = new PDO("mysql:host=$dbHost;dbName=$dbName;charset=utf8", $dbUser, $dbPassword);

        // TELL PDO to throw Exceptions for every error
        $dbConnection->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Create the SELECT query and fetch all table rows as associative array
        // Bsp. SELECT * FROM Customers
        $query = $dbConnection->query("SELECT * from Books"); //https://www.php. blabla
        $query->fetch(PDO::FETCH_ASSCOC);

echo '<div class="container-fluid p-5">'
echo '<div class ="h3">My favorite Books</div>'
echo '<table class="table table-striped">'
echo '<thead>'
echo '<tr>'
echo '<th>columnName</th>'
echo '</tr>'
echo '</thead>'
echo '<tr>'
echo '<td>value</td>'
echo '</tr>'
echo '</table>'
echo '</div>'
echo '</div>'

echo '<pre>':
print_r($dbConnection);
echo '</pre>';*/

    
</body>
</html>