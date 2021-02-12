<?php
/* * *****************************************************************************
  Author: Brandon Miethe
  Date: 02/05/2021

  Modification Log:

  02/05/2021 Created inital doc
  02/12/2021 Added function calls & include db definition
             Improved nav
 * **************************************************************************** */
require_once('../model/database.php');
require_once('../model/visitor_db.php');
require_once('../model/employee_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = 'list_visitors';
}

if ($action == 'list_visitors') {
    //Read employee data
    $employeeID = filter_input(INPUT_GET, 'employeeID', FILTER_VALIDATE_INT);
    if ($employeeID == NULL || $employeeID == FALSE) {
        $employeeID = 1;
    }
    try {
        $employees = getEmployees();
        $visitors = getVisitorByEmp($employeeID);
    } catch (PDOException $ex) {
        echo 'Error: ' . $ex->getMessage();
    }
} else if ($action == 'delete_visitor') {
    //Delete the visit record
    $visitorID = filter_input(INPUT_POST, 'visitorID', FILTER_VALIDATE_INT);

    try {
        delVisitor($visitorID);
//            $query = 'DELETE FROM visitor WHERE visitorID = :visitorID;';
//            $statement = $db->prepare($query);
//            $statement->bindValue(':visitorID',$visitorID);
//            $statement->execute();
//            $statement->closeCursor();
        header("Location: index.php");
    } catch (PDOException $ex) {
        echo 'Error on delete: ' . $ex->getMessage();
    }
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>The Social Hub</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/normalize.css">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <script src="js/nav.js"></script>
    </head>
    <body>
        <header>
            <div class="topnav" id="myTopnav">
                <a href="../index.php" class="active">TheSocialHub</a>
                <a href="#admin">Admin Panel</a>
                <a href="../contact/index.php">Contact</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>


        </header>
        <section id="admin">
            <!-- display a list of categories -->
            <h1>ADMIN PANEL</h1>
            <h3>Select an employee to view messages</h3>
            <nav>
                <ul style="list-style-type: none">
                    <?php foreach ($employees as $employee) : ?>
                        <li><a href="?employeeID=<?php echo $employee['employeeID']; ?>">
                                <?php echo $employee['first_name'] . $employee['last_name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <!-- display a table of products -->
            <table class="messages">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Message</th>
                </tr>

                <?php foreach ($visitors as $visitor) : ?>
                    <tr>
                        <td><?php echo $visitor['visitor_name']; ?></td>
                        <td><?php echo $visitor['visitor_email']; ?></td>
                        <td><?php echo $visitor['visit_date']; ?></td>
                        <td><?php echo $visitor['visitor_msg']; ?></td>
                        <td>
                            <form action="index.php" method="POST">
                                <input type="hidden" name="action" value="delete_visitor">
                                <input type="hidden" name="visitorID" value="<?php echo $visitor['visitorID']; ?>">
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </body>
</html>


