<!DOCTYPE html>
<!--
Author: Brandon Miethe
Date: 02/01/2021

Modification Log:

02/01/2021 - Initial docs created for The Social Hub
02/02/2021 - Linked contact form to database
02/03/2021 - Added CSS to add design elements to pages
02/04/2021 - Added validation to form with js, but it won't stop the form from
    submitting.
02/12/2021 - Added the requirement for input fields to be filled out prior to
             submission.
             Improved nav
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>The Social Hub</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../css/normalize.css">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
        <script src="js/nav.js"></script>
        <script src="js/validate_form.js"></script>
    </head>
    <body>
        <header>
            <div class="topnav" id="myTopnav">
                <a href="../index.php" class="active">TheSocialHub</a>
                <a href="../admin/admin_login.php">Admin Panel</a>
                <a href="#contact">Contact</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                  <i class="fa fa-bars"></i>
                </a>
              </div>
        </header>
        <section id="contact">
            <h2 id="contact_heading">Let's connect.</h2>
            <h3 id="contact_subheading">The Dev Team is currently building this site.</h3>
            
            <p>Questions, comments, or inquiries can be directed to 
                <a href="mailto: bmiethe90@gmail.com">BMiethe90(at)gmail(dot)com</a>.
            </p>
            <p>The Social Hub is based out of
                <a href="https://www.google.com/maps/place/Star,+ID+83669/@43.6992271,-116.508012,14z/data=!3m1!4b1!4m5!3m4!1s0x54afac595487d87d:0xd5528bf8c98894cc!8m2!3d43.6921071!4d-116.4934631?hl=en" target="_blank">
                    Star, Idaho<br></a>
            </p>
            <form name="sh_contact" id="sh_contact" method="post" action="confirmation.php" >
                <span id="nameTextField">
                    <label for="name"></label>
                    <input type="text" placeholder="What should we call you?" name="name" id="name" required>
                    <span id="input_error">*</span>
                </span>
                <p>
                    <span id="emailTextField">
                        <label for="email"></label>
                        <input type="text" placeholder="Email Address" name="email" id="email" required>
                        <span id="input_error">*</span>
                    </span>
                </p>
                <p>
                    <span id="messageTextArea">
                        <label for="message"></label>
                        <textarea name="message" placeholder="What do we need to know?" cols="45" rows="5" id="message" required></textarea>
                        <span id="input_error">*</span>
                    </span>
                    <br>
                    <input type="submit" name="submit" id="submit" value="Submit">
                </p>
            </form>
        </section>
    </body>
</html>

