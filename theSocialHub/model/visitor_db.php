<?php

/*******************************************************************************
 Author: Brandon Miethe
 Date: 02/12/2021
 
 Modification Log:
 
 02/05/21 Created inital doc
 02/12/21 Added db definition & function calls.
 
  
 ******************************************************************************/

function addVisitor($visitor_name, $visitor_email, $visitor_msg) {
    $db = Database::getDB();
    $query = 'INSERT INTO visitor (visitor_name, visitor_email, visitor_msg, visit_date, employeeID)
            VALUES (:name, :email, :message, NOW(), 1)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $visitor_name);
    $statement->bindValue(':email', $visitor_email);
    $statement->bindValue(':message', $visitor_msg);
    $statement->execute();
    $statement->closeCursor();
}

function delVisitor($visitorID) {
    $db = Database::getDB();
    $query = 'DELETE FROM visitor WHERE visitorID = :visitorID;';
    $statement = $db->prepare($query);
    $statement->bindValue(':visitorID', $visitorID);
    $statement->execute();
    $statement->closeCursor();
}

function getVisitorByEmp($employeeID) {
    $db = Database::getDB();
    $query2 = 'SELECT * FROM visitor WHERE visitor.employeeID = :employeeID ORDER BY visit_date;';
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(':employeeID', $employeeID);
    $statement2->execute();
    $visitors = $statement2;
    return $visitors;
}

?>