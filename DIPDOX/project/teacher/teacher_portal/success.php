<html>
<head>
<link rel="stylesheet" type="text/css" href='/DIPDOX/project/teacher/teacher_portal/success.css'>
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
    // $rows = mysqli_fetch_array($rows);
    $rows_count = mysqli_query($con,$query_count);
    $rows_count = mysqli_fetch_array($rows_count);
    if($rows != NULL){
        // echo "1";
        echo"<form method='post' action='/DIPDOX/project/teacher/upload/upload_form.php'>";
        echo"Select sem to Upload";
            echo"<select name='select_sem' id='sem'>";
            echo"<option value='1'>sem 1</option>";
            echo"<option value='2'>sem 2</option>";
            echo"<option value='3'>sem 3</option>";
            echo"<option value='4'>sem 4</option>";
            echo"<option value='5'>sem 5</option>";
            echo"<option value='6'>sem 6</option>";
            echo"</select>";
            
            echo "<input type='submit' value='Upload new files'/>";
            echo"</form>";
        // echo " <a href='/DIPDOX/project/teacher/upload/upload_form.php'><i class='bx bx-upload'>Upload new files</a>";
        echo "<table border='2'>";
        echo "<tr><th>sl.no.</th><th>File name</th><th>Link</th><th>Date</th><th>Subject</th><th>delete file</th></tr>";
        // echo $rows[1];
        $rows_count = (int)$rows_count[0];
        
        $i=1;
        while($row = mysqli_fetch_array($rows)){
        
            $loc = $row['location'];
            $loc = str_replace('$', '', $loc);
            $file_disp = $row['file_disp_name'];
            echo "<td>".$i."</td>".
            "<td>".$row['file_disp_name']."</td>".
            "<td><a href = '/DIPDOX/project/teacher/upload/uploaded_files/".$loc."'>link</a></td>".
            "<td>".$row['date']."</td>".
            "<td>".$row['subject']."</td>".
            "<td>"."<a href = 'deletefile.php?file=$file_disp'>delete</a>"."</td>".
            "</tr>";
            $i++;
        }
        echo "</table>";

    }
    else{

        echo "No files uploaded yet!! </br> <a href='/DIPDOX/project/teacher/upload/pre_upload.php'>Upload new files +</a>";
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