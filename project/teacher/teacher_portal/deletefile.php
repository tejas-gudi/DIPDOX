<html>
    <head>
        <title>
            login
        </title>
        <link rel="stylesheet" type="text/css" href='/DIPDOX/project/teacher/reg/reg.css'>
    </head>
    <body>

<?php
$file = $_GET['file'];
$conn=mysqli_connect("localhost","root","","test");
$query = "delete from uploaded_files where file_disp_name = '$file'";
// mysqli_query($conn,"delete from uploaded_files where file_disp_name = '$file'");

if(mysqli_query($conn,$query) != NULL){

    echo "<h1>Delete successfull!</h1>";
    echo "<img src='block.gif'>";
    echo "<h1> Redirection to Login page.</h1>";
    header( "refresh:1; url = /DIPDOX/project/teacher/teacher_portal/success.php"); //redirects to login page after 3 seconds.
}
else{
    echo "<h1>Delete operation Failed!</h1>";
    echo "<img src='block.gif'>";
    echo "<h1> Redirection to Login page.</h1>";
    header( "refresh:1; url = /DIPDOX/project/teacher/teacher_portal/success.php"); //redirects to login page after 3 seconds.
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
