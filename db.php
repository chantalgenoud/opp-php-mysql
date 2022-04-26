<?php

function getQuestions () {
    //prepare connection parameters. 


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


        // Get all questions and answers - together.
        $query = $dbConnection ->query("SELECT * FROM Questions");
        $questions = $query ->fetchAll (PDO::FETCH_ASSOC);


        for ($q = 0; $q < count($questions); $q++) {
            $question = $questions[$q];
            $subQuery = $dbConnection->prepare("SELECT * FROM Answers WHERE Answers.questionID = ?");
            $subQuery->bindValue(1, $question['ID']); //wo ist die ID?
            $subQuery-> execute();
            $answers = $subQuery-> fetchAll(PDO::FETCH_ASSOC);

            $questions[$q]['answers'] = $answers;
        }
    return $questions;
}
?>