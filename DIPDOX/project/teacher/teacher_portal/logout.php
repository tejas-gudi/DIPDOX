<html>
    <head>
    <link rel="stylesheet" type="text/css" href="logout.css">
    </head>
    <body>
    
<?php

session_start();
$email = $_SESSION['email'];
$con = mysqli_connect("localhost", "root", "", "test");
mysqli_query($con, "insert into stat_teacher(email, action) values('$email', 'logout');");

session_unset();
session_destroy();
echo "<h2>Logout Successful!</h2>";
echo "<img src='block.gif'>";
echo "<h2>Redirecting to Home page...</h2>";
header( "refresh:3; url = /DIPDOX/project/home/home.html");

?>
    <section class="footer">
    <div class="box-container">

        <p1>"<b>Diploma documents</b>" provides you all the essential learning resources.<br>
            This website is to provide syllabus copies, notes, question papers, link to
            educational videos, media, text-books for all semesters in a PDF format.</p1>
        </br>
    </div>
</section>
</body>
</html>