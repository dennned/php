<?php

function connect()
{
    $db = new mysqli('localhost', 'root', '','test');
    if($db->connect_error) {
        die('ERROR CONNECTION!');
    }
    return $db;
}

function createTable($db)
{
    $sqlQuery = "CREATE TABLE contacts (
                id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
                firstName VARCHAR(35) NOT NULL,
                lastName VARCHAR(35) NOT NULL,
                email VARCHAR(55)
                )";

    if ($db->query($sqlQuery) === TRUE) {
        echo "Table created successfully!";
    } else {
        echo "Error creating SQL table: " . $db->error;
    }
}

function checkTable($db)
{
    $countFileds = $db->query("SELECT * FROM contacts")->num_rows;
    if ($countFileds == 0) {
        for($i=1; $i<=10; $i++) {
            $insert = "INSERT INTO contacts(firstName,lastName,email) VALUES ('userName_".$i."','UserLastName_".$i."','test@test.com')";
            $db->query($insert);
        }
    }
}

function showFileds($db)
{
    $allFileds = $db->query("SELECT * FROM contacts");
    while ($row = $allFileds->fetch_array()) {
        echo 'line = '.$row['firstName'].'<br/>';
    }
}

$db = connect();
createTable($db);
checkTable($db);
showFileds($db);
$db->close();

////////////////////////////////////// PDO

//$server = "localhost";
//$dbuser = "root";
//$dbpassword = "";
//$dbname = "test";
//
//try {
//    $connection = new PDO("mysql:host=$server;dbname=$dbname", $dbuser, $dbpassword);
//    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    $sqlQuery = "CREATE TABLE contacts (
//        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//        firstName VARCHAR(35) NOT NULL,
//        lastName VARCHAR(35) NOT NULL,
//        email VARCHAR(55)
//    )";

//    $connection->exec($sqlQuery);

//    echo "Table created successfully!";
//}
//catch(PDOException $e){
//    echo $sqlQuery . "<br>" . $e->getMessage();
//}
