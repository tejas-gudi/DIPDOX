<html>
    <head>
        <title>
            login
        </title>
        <link rel="stylesheet" type="text/css" href='/DIPDOX/project/teacher/reg/reg.css'>
    </head>
    <body>
<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$full_name=$fname." ".$lname; //full_name is first_name + white_space + last_name.

$con = mysqli_connect("localhost", "root", "", "test");

if(!$con){
    die('error in connection'.mysqli_error);
}
    
$query="INSERT INTO login VALUES('$full_name', '$email', '$pass');";
if(mysqli_query($con,$query)){

    echo "<h1>Registeration successfull!</h1>";
    echo "<img src='block.gif'>";
    echo "<h1> Redirection to Login page.</h1>";
    header( "refresh:3; url = /DIPDOX/project/teacher/login/login_form.php"); //redirects to login page after 3 seconds.
}
else{
    echo "<h1>Registeration Failed!</h1>";
    echo "<img src='block.gif'>";
    echo "<h1> Redirection to Login page.</h1>";
    header( "refresh:3; url = /DIPDOX/project/teacher/login/login_form.php"); //redirects to login page after 3 seconds.
}

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