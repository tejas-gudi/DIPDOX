<html>
    <head>
    <link rel="stylesheet" type="text/css" href="logout.css">
    </head>
    <body>
<?php
    $reg = $_POST['reg'];
    $pass = $_POST['pass'];
    $query;
    $con=mysqli_connect("localhost","root","");
    if(!$con){
        die('error in connection'.mysqli_error());
    }
    mysqli_select_db($con,"test");
    
    $query="select pass from student_login where reg_no='$reg';";
    $result=mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    
    $reg_exists="SELECT COUNT(*) FROM student_login WHERE reg_no='$reg';"; //query statement to check if the email exists
    $number_of_users = mysqli_query($con,$reg_exists);
    $reg_exists = mysqli_fetch_array($number_of_users);
    //echo $email_exists[0];
    //echo "<br>1<br>";
    if(($reg_exists[0]) && ($pass!="")){
        //echo "<br>2<br>";
        $row = mysqli_fetch_array($row = mysqli_query($con,"select * from student_login where reg_no='$reg';"));                               // checks if the email exists and the given password is not empty
        if($row[2]==$pass){
            $result=mysqli_query($con,"SELECT name FROM student_login WHERE reg_no='$reg';");
            $row = mysqli_fetch_array($result);
            session_start();
            $_SESSION['reg_no']=$reg;
            $_SESSION['username']=$row[0];

            $con = mysqli_connect("localhost", "root", "", "test");
            mysqli_query($con, "insert into stat_student(reg, action) values('$reg', 'login');");

            header("Location: /DIPDOX/project/slidebar/home.php");
            //echo "<br>3<br>";
        }
        else{
            echo "<h2>Invalid password.</h2>";
            print "<br/>";
            print "<h2><a href='/DIPDOX/project/student_portal/login_form.php'>Retry Login</a></h2>";
            //echo "<br>4<br>";
        }
    }
    else{
        echo "<h2>Invalid password.</h2>";
        print "<br/>";
        print "<h2><a href='/DIPDOX/project/student_portal/login_form.php'>Retry Login</a></h2>";
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