<html>
<head>
<link rel="stylesheet" type="text/css" href='/DIPDOX/project/student_portal/stud_dash.css'>
</head>
        <div class="info">
        <form method="post" action="sub_list.php">
          
        <?php
        session_start();
        $reg = $_SESSION['reg_no'];
        $stud_name = $_SESSION['username'];
        $con=mysqli_connect("localhost","root","","test");
        //$sem="1";
        $sem=mysqli_query($con,"select sem from student_login where reg_no='$reg';");
        $sem = mysqli_fetch_array($sem);
        echo"<h1>LIST OF SUBJECTS FOR SEM $sem[0] </h1>";
        $query=mysqli_query($con,"select * from sem_subs where sem='$sem[0]';"); //stored  subjects for particular sem number
       
      //prnt subjects list in button form and  link them to page having files uploaded by teacher //retrive by "subjectname attribute" -->
        $i=0;
        echo"<br/>";
        while($r=mysqli_fetch_array($query))
        {
            $sub=$r['subject'];
            //$array[$i]=$sub;
            //echo"$sub";
           //echo"<input type='button' value='$sub' onlcick=<a href ='sub_list.php?nm=$sub'>>";
           echo"<a href ='sub_list.php?nm=$sub'><input type='button' value='$sub'> </a>";
           echo"<br>";
           //$i++;
        }  
        echo "<a href = '/DIPDOX/project/slidebar/home.php'>Back to home</a>"
        //function myfunction($sub){
            //echo"$sub";
            //echo"<a href ='sub_list.php?nm=$sub'></a>"
        ?>
        </div>
</body>
</html>
