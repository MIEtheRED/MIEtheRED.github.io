<?php

/*******************************************************************************
 Author: Brandon Miethe
 Date: 02/12/2021
 
 Modification Log:
 
 02/05/21 Created inital doc
 02/12/21 Added db definition & function calls.
 
  
 ******************************************************************************/

function getEmployees() {
    $db = Database::getDB();
    $query = 'SELECT * FROM employee ORDER BY employeeID';
    $statement = $db->prepare($query);
    $statement->execute();
    $employees = $statement;
    return $employees;
}

?>