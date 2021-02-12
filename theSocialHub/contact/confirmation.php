<?php
/*******************************************************************************
 Author: Brandon Miethe
 Date: 02/05/2021
 
 Modification Log:
 
 02/05/21 Created inital doc
 02/12/21 Added db definition & function calls.
          Improved nav
  
 ******************************************************************************/
   
    $visitor_name = filter_input(INPUT_POST, 'name');
    $visitor_email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $visitor_msg = filter_input(INPUT_POST, 'message');
    
    //Validate inputs
    if ($visitor_name == NULL || $visitor_email == NULL || $visitor_msg == NULL) {
        $error = "Invalid input data. Check all fields and try again.";
        echo "Form Data Error: " . $error;
        exit();
    } else {
        require_once('../model/database.php');
        require_once('../model/visitor_db.php');
        
        addVisitor($visitor_name, $visitor_email, $visitor_msg);
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
                <a href="index.html" class="active">TheSocialHub</a>
                <a href="../admin/admin_login.php">Admin</a>
                <a href="../contact/index.php">Contact</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                  <i class="fa fa-bars"></i>
                </a>
              </div>
        </header>
        <section id="thankyou">
          <h2>Thank you, <?php echo $visitor_name; ?>, for reaching out to us! Typically,
          we will respond within 48 business hours.</h2>
        </section>
    </body>
</html>
