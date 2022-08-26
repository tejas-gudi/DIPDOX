<html>
    <head>
    <link rel="stylesheet" type="text/css" href="delete.css">
    </head>
    <body>
<?php
$id=$_POST['admin'];
$pass=$_POST['pass'];
$con=mysqli_connect("localhost","root","","test");
if(!$con){
    die('error in connection'.mysqli_error());
}
$query = "select *from admin where id = '$id' and pass = '$pass'";  
$result = mysqli_query($con, $query);  
$row = mysqli_fetch_array($result);  
$count = mysqli_num_rows($result);  
if($count == 1){  
    
    header("Location:/DIPDOX/project/admin/admin_op.html");

}
    else{
        echo "<h2>Incorrect username or password</h2>";
        echo "<img src='block.gif'>";
        echo "<h2>Redirecting to login page...</h2>";
        header("refresh:2; url = /DIPDOX/project/admin/admin.html");
    }




mysqli_close($con);
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




