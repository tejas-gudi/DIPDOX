<html>
<head>
<title>Admin Logout Panel</title>
<link rel="stylesheet" href="dash11.css">
</head>
<body>

<form method="post" action="logout.php">
      <center><h1>Admin Dashboard</h1>
      <div class="ddox"><img src="dd.png"></div>
      <button>log-out</button>
    
 <table>
<tr>
    <th>Name</th>
    <th>Email</th>
   
    <th>Action</th>
</tr> 
<?php
$con=mysqli_connect("localhost","root","","test");
if(!$con)
{
die('error in connection'.mysqli_error());
}

$query="select * from login";
$data= mysqli_query($con,$query);
$total=mysqli_num_rows($data);
while($row=mysqli_fetch_array($data))
{
  echo"<tr>
  <td> ".$row['name']."</td>
  <td>".$row['email']."</td>
 
  <td><a href ='delete.php?nm=$row[name]'>Delete </a></td>
</tr>";  
}
mysqli_close($con);
  ?>
  </form>
</table></center>


</body>
</html>