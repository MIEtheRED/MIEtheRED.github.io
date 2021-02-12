/* * *****************************************************************************
  Author: Brandon Miethe
  Date: 02/05/2021

  Modification Log:

  02/05/2021 Created inital doc
  
  PAGE CREATED AS AN EXERCISE!!!! PAGE IS NOT INCLUDED IN ANY NAVIGATION WITHIN
  SITE.
 * **************************************************************************** */

<?php

    class Database {
        private static $dsn = 'mysql:host=localhost;dbname=shcontact';
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
    
    class Employee {
        private $first_name, $last_name;

        public function __construct($first_name, $last_name) {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
        }
    
        public function getFirstName(){
            return $this->first_name;
        }
        
        public function getLastName(){
            return $this->last_name;
        }
    }
    
    class EmployeeDB {
        public static function getEmployees() {
            $db = Database::getDB();
            $query = 'SELECT first_name, last_name FROM employee
                      ORDER BY last_name';
            $statement = $db->prepare($query);
            $statement->execute();

            $employees = array();
            foreach ($statement as $row) {
                $employee = new Employee($row['first_name'],
                                         $row['last_name']);
                $employees[] = $employee;
            }
            return $employees;
        }
    }
// Instantiate employees object
    
    $employees = EmployeeDB::getEmployees();
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>The Social Hub</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/normalize.css">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <script src="js/nav.js"></script>
    </head>
    <body>
        <header>
            <div class="topnav" id="myTopnav">
                <a href="index.html" class="active">TheSocialHub</a>
                <a href="#about">About</a>
                <a href="admin/admin_index.html">Admin</a>
                <a href="#contact">Contact</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                  <i class="fa fa-bars"></i>
                </a>
              </div>
        </header>
        <section id="thankyou">
            <h1>Employees List</h1>
            <p>
                <ul>
                    <?php foreach($employees as $employee) : ?>
                    <li>
                        <?php echo $employee->getLastName() . ", " . $employee->getFirstName() ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </p>
        </section>
    </body>
</html>
