<?php
/* * *****************************************************************************
  Author: Brandon Miethe
  Date: 02/05/2021

  Modification Log:

  02/05/21 Created inital doc
  02/12/21 Added db definition & function calls.
           Improved nav


 * **************************************************************************** */



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
                <a href="../admin/admin_login.php">Admin</a>
                <a href="../contact/index.php">Contact</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </header>
        <section >
            <form name="admin_login" method="post" action="index.php">
                <p>Login in required to continue to a secure page!</p>
                <p><input type="submit" name="Login" value="Login"></p>
            </form>
        </section>
    </body>
</html>
