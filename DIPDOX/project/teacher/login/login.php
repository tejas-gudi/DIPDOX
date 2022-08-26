<html>
    <head>
        <title>
            login
        </title>
        <link rel="stylesheet" type="text/css" href='/DIPDOX/project/teacher/teacher_portal/invalid.css'>
    </head>
    <body>
<?php
    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $query;
    $con=mysqli_connect("localhost","root","");
    if(!$con){
        die('error in connection'.mysqli_error());
    }
    mysqli_select_db($con,"test");
    
    $query="select pass from login where email='$email';";
    $result=mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    
    $email_exists="SELECT COUNT(*) FROM login WHERE email = '$email';"; //query statement to check if the email exists
    $number_of_users = mysqli_query($con,$email_exists);
    $email_exists = mysqli_fetch_array($number_of_users);
    //echo $email_exists[0];
    //echo "<br>1<br>";
    if(($email_exists[0]) && ($pass!="")){
        //echo "<br>2<br>";
        $row = mysqli_fetch_array($row = mysqli_query($con,"select * from login where email = '$email';"));                               // checks if the email exists and the given password is not empty
        if($row[2]==$pass){
            $result=mysqli_query($con,"SELECT name FROM login WHERE email='$email';");
            $row = mysqli_fetch_array($result);
            session_start();
            $_SESSION['email']=$email;
            $_SESSION['username']=$row[0];
            
            $con = mysqli_connect("localhost", "root", "", "test");
            mysqli_query($con, "insert into stat_teacher(email, action) values('$email', 'login');");
            
            header("Location: /DIPDOX/project/teacher/teacher_portal/success.php");
            //echo "<br>3<br>";
        }
        else{
            echo "<h2> Invalid password! </h2><h2><a href='/DIPDOX/project/teacher/login/login_form.php'>Retry Login</h2></a>";
            //echo "<br>4<br>";
        }
    }
    else{
        echo "<h2>Invalid email </h2><a href='/DIPDOX/project/teacher/login/login_form.php'>Retry Login</h2></a>";
        //echo "<br>5<br>";
    }
    mysqli_close($con); 
    //echo "<br>".$email." ".$pass;

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