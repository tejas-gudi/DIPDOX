<html>
<head>
<link rel="stylesheet" type="text/css" href='/DIPDOX/project/student_portal/stud_dash.css'>
</head>
    <body>
        <div class="info">
        <a href= '/DIPDOX/project/slidebar/home.php'><button>Back</button></a>
        <h1>Notes uploaded by teachers!</h1>
        <center><table border="1">
            <tr>
                <th>Name of file</th>
                <th>Subject</th>
                <th>Upload Date</th>
                <th>Teacher's name </th>
               <th>links </th>
            </tr>
<?php
$sub=$_GET['nm'];
$con=mysqli_connect("localhost","root","","test");
$query=mysqli_query($con,"select * from uploaded_files where subject='$sub';");
while($row = mysqli_fetch_array($query)){
    $link=$row['location'];
    //echo"$link";
    echo" <tr>
            
            <td>".$row['file_disp_name']."</td>
            <td>".$row['subject']."</td>
            <td>".$row['date']."</td>
            <td>".$row['uname']."</td>
            
            <td><a href = '/DIPDOX/project/teacher/upload/uploaded_files/$link'>view</a></td>
            </tr> 
            ";
     //$name=$row['location'];
}
//echo"$sub";
?>
      </table>
</div>
    </center>
</body>
</html>
