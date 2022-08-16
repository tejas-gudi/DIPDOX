<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
</head>
<body>
<form method="POST" action="upload_form.php">
Select your sem : <input type="number" value="0" min="1" max="6" name="sem"/> 
<input type="submit" value="Register"/>
</form>
</body>
</html> -->

<html>
<head>
<link rel="stylesheet" type="text/css" href='/DIPDOX/project/teacher/teacher_portal/success.css'>
<script>
function select_sem() {
  document.getElementById("sem_tbox").innerHTML = input type="number" value="0" min="1" max="6" name="sem";
}
</script>
</head>
<body>
    <?php
    echo "<section class='footer'>";
    echo "   <p1><b>Diploma documents</b> provides you all the essential learning resources.<br>";
    echo "      This website is to provide syllabus copies, notes, question papers, link to";
    echo "   educational videos, media, text-books for all semesters in a PDF format.</p1>";
    echo "   </br>";
    echo "   </section>";

    session_start();
    $con=mysqli_connect("localhost","root","", "test");
    echo "<div class='header'>";
    $uname = $_SESSION['username'];
    echo "<h2>welcome $uname</h2>";
    echo "<br/>";
    $e_id = $_SESSION['email'];
    echo "<h4>$e_id</h4><br/>";
    print "<a href= '/DIPDOX/project/teacher/teacher_portal/logout.php'><button>log-out</button></a>";
    echo"<br/>";
    echo "<img src='W3.png'>";
    echo "</div>";
    $query = "SELECT * FROM uploaded_files WHERE  uname = '$uname';";
    $query_count = "SELECT count(*) FROM uploaded_files WHERE  uname = '$uname';";


    echo "<div class='details'>";

    $rows = mysqli_query($con,$query);
    $rows = mysqli_fetch_array($rows);
    $rows_count = mysqli_query($con,$query_count);
    $rows_count = mysqli_fetch_array($rows_count);
    if($rows != NULL){
        // echo "1";
        // echo " <a href='/DIPDOX/project/teacher/upload/upload_form.php'>Upload new files</a>";
        // echo "<a href='<input type='button' onclick='select_sem()' value='uplad new files'/>";
            echo"<form method='post' action='/DIPDOX/project/teacher/upload/upload_form.php'>";

            echo"<select name='select_sem' id='sem'>";
            echo"<option value='1'>sem1</option>";
            echo"<option value='2'>sem2</option>";
            echo"<option value='3'>sem3</option>";
            echo"<option value='4'>sem4</option>";
            echo"<option value='5'>sem5</option>";
            echo"<option value='6'>sem6</option>";
            echo"</select>";
            echo "<input type='submit' value='upload'/>";
            echo"</form>";
        echo "<div id='sem_tbox'></div>";
        echo "<table border='2'>";
        echo "<tr><th>sl.no.</th><th>File name</th><th>Link</th><th>Date</th><th>Subject</th></tr>";
        // echo $rows[1];
        $rows_count = (int)$rows_count[0];

        for($i=0;$i<$rows_count;$i++){
            // echo "2";
            $j=$i+1;
            //$file_loc = file_link($rows[2]);   
            $file_loc = '/1691231-62b2aae5893577.39368218.png';
            echo "<tr><td>$j</td><td>$rows[1]</td><td>
            <a href='/DIPDOX/project/teacher/upload/uploaded_files/$file_loc'>file</a></td><td>$rows[4]</td><td>$rows[5]</td></tr>";
        }
        echo "</table>";
        
    }
    else{
        echo "No files uploaded yet!! </br> <a href='/DIPDOX/project/teacher/upload/upload_form.php'>Upload new files +</a>";
    }
    echo "</div class='details'>";
    function file_link($DB_Location){
        // $DB_Location = "SELECT location FROM uploaded_files WHERE file_disp_name='$dis_name'";
        // if($DB_Location=mysqli_query($conn,$DB_Location))
        //     $DB_Location=mysqli_fetch_array($DB_Location);
        //     $DB_Location=$DB_Location[0];
        echo "<br/>".$DB_Location;
        $pattern = "/ /";
        $DB_Location = preg_split($pattern, $DB_Location);
        print_r($dest);
            $DB_Location1 = implode("\\",$DB_Location);
            echo "<br/>++++++++".$DB_Location;
            return $DB_Location1;
    }

?>

</body>
</html>