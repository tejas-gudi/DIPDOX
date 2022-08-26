<html>
<head>
<title>Admin Logout Panel</title>
<link rel="stylesheet" href="dash11.css">
</head>
<body>

<form method="post" action="logout.php">
      <center>
      <div class="ddox"><img src="dd.png"></div>
      <h1>Delete Students!</h1>
      <button>log-out</button>
    
 <table>
<tr>
    <th>Name</th>
    <th>Reg no</th>

    <th>Action</th>
</tr> 
<div class="info">
<?php
$con=mysqli_connect("localhost","root","","test");
if(!$con)
{
die('error in connection'.mysqli_error());
}

$query="select * from student_login";
$data= mysqli_query($con,$query);
$total=mysqli_num_rows($data);
while($row=mysqli_fetch_array($data))
{
  echo"<tr>
  <td> ".$row['name']."</td>
  <td>".$row['reg_no']."</td>
  <td><a href ='del_stud.php?nm=$row[name]'>Delete </a></td>
</tr>";  
}
mysqli_close($con);
  ?>
  </form>
</table></center>

</div>
</body>
</html>