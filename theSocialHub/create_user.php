<?php

//    YOU ONLY NEED TO RUN THIS ONCE PER USER PER DATABASE

//    This is the template to add an administrator to the shcontact db
//    administrators table

$dsn = 'mysql:host=localhost;dbname=shcontact';
$username = 'root';
$password = 'Pa$$w0rd';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error = $e->getMessage();
    include('view/error.php');
    exit();
}
    $email = 'sparkles@cwi.edu';
    $password = 'sesame';
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = 'INSERT INTO administrators (emailAddress, password)
              VALUES (:email, :password)';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->bindValue(':password', $hash);
    $statement->execute();
    $statement->closeCursor();

    echo "Inserted: $email pw: $password hash: $hash<br>"


?>
