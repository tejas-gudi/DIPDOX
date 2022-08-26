<html>
    <head>
    <link rel="stylesheet" type="text/css" href="logout.css">
    </head>
    <body>
<?php

session_start();
$reg = $_SESSION['reg_no'];
$con = mysqli_connect("localhost", "root", "", "test");
mysqli_query($con, "insert into stat_student(reg, action) values('$reg', 'logout');");

session_unset();
session_destroy();
echo "<h1>Redirecting to </h1>";
echo "<img src='block.gif'>";
echo "<h1> home page</h1>";
header( "refresh:3; url = /DIPDOX/project/slidebar/home.php");
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