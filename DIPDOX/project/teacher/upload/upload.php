<html>
    <head>
    <link rel="stylesheet" type="text/css" href="up.css">
    </head>
    <body>
    <div class="info">
<?php
echo "<section class='footer'>";
echo "   <p1><b>Diploma documents</b> provides you all the essential learning resources.<br>";
echo "      This website is to provide syllabus copies, notes, question papers, link to";
echo "   educational videos, media, text-books for all semesters in a PDF format.</p1>";
echo "   </br>";
echo "   </section>";

session_start();
$file=$_FILES['file'];
$file_tmp_name=$file['tmp_name'];
$t_name=$_SESSION['username'];

$subject =$_POST['sub'];
echo "<b>Subject name : ".$subject;
echo "<br/>";
echo "File display name : <b>".$dis_name=$_POST['dis_name'];
echo "<br/>";

$pattern = "/ /";
$file_orig_name = $file['name'];        //stores orignal file name in database
$file_name = $file['name'];

$ext_seperator = explode(".",$file_name);
$ext = end($ext_seperator);

$file_name = $ext_seperator[0];

$conn=mysqli_connect("localhost","root","","test");
$sem = mysqli_fetch_array((mysqli_query($conn,"select sem from sem_subs where subject = '$subject'")));
$semester = $sem[0];

if($file['error']!=0){                  // checks for error while uploading.
    echo 'error in uploading the file'; 
}
else{
    if($file['size'] > 11000){          // if block executes when file size is less than 11 MB 
        $file_id=uniqid("$file_name-",true).".".$ext;       //creates a unique ID for each file and attaches the orignal name to the unique id.
        //$file_dest = "C: wamp64 www project teacher_portal upload uploaded_files ".$file_id
        $file_dest_system = "C:\\wamp64\\www\\DIPDOX\\project\\teacher\\upload\\uploaded_files\\".$file_id;
        //                   C:\\wamp64\\www\\project\\teacher_portal\\upload\\uploaded_files\\
        //move_uploaded_file($file_tmp_name,$file_dest_system);
        $query="INSERT INTO uploaded_files(file_disp_name, location, uname, subject, sem) VALUES('$dis_name', '$file_id', '$t_name', '$subject', '$semester')";
              //INSERT INTO uploaded_files(file_disp_name, location, uname, subject) VALUES('$dis_name', '$file_dest', '$t_name', '$sub');  
        if(mysqli_query($conn,$query)){
            echo "<br/>";
            
            echo "File uploaded successfully <br>Redirecting to upload page";
            move_uploaded_file($file_tmp_name,$file_dest_system);
            header( "refresh:3; url = /DIPDOX/project/teacher/teacher_portal/success.php");
        }
        else{
            echo "failed";
            header( "refresh:3; url = /DIPDOX/project/teacher/teacher_portal/success.php");
        }
        // //echo $query;
        // echo "<br><br>";
        // echo "<br><br>";
        // $DB_Location = "SELECT location FROM uploaded_files WHERE file_disp_name='$dis_name'";
        // if($DB_Location=mysqli_query($conn,$DB_Location))
        // $DB_Location=mysqli_fetch_array($DB_Location);
        // $DB_Location=$DB_Location[0];
        // // $DB_Location = preg_split($pattern, $DB_Location);
        // // $DB_Location1 = implode("\\",$DB_Location);
        // print "$DB_Location++++++++";
        // print "<br/>";
        // print "<a href='file:///C:/wamp64/www/project/upload/uploaded_files/$file_id'>file</a>";
    }
    else{echo 'File size too big, please upload something less than 10 Megabytes.';}
}



?>

</div>
</body>
</html>