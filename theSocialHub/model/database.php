<?php

/*******************************************************************************
 Author: Brandon Miethe
 Date: 02/12/2021
 
 Modification Log:
 
 02/05/21 Created inital doc
 02/12/21 Added db definition & function calls.
 
  
 ******************************************************************************/

class Database {
    private static $dsn = 'mysql:host=localhost;dbname=shContact';
    private static $username = 'sh_user';
    private static $password = 'Pa$$w0rd';
    private static $db;

    private function __construct() {}

    public static function getDB () {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO(self::$dsn,
                                     self::$username,
                                     self::$password);
            } catch (PDOException $e) {
                $error_message = $e->getMessage();
                echo $error_message;
                //include('../errors/database_error.php');
                exit();
            }
        }
        return self::$db;
    }
}
?>