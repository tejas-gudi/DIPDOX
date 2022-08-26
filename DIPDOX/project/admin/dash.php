<html>
<head>
  <title>Admin Logout Panel</title>
</head>
<body>
<form method="post" action="logout.php">
      <h2>ADMIN DASHBOARD</h2>
      <table border="1">
<tr>
    <th>name</th>
    <th>email</th>
    <th>pass</th>
    <th>action</th>
</tr>

<?php
$con=mysqli_connect("localhost","root","","test");
if(!$con)
{
die('error in connection'.mysqli_error());
}
//mysqli_select_db("uday",$con);
$query="select * from login";
$data= mysqli_query($query,$con);
$total=mysqli_num_rows($data);
while($row=mysqli_fetch_array($data))
{
  echo"<tr>
  <td> ".$row['name']."</td>
  <td>".$row['email']."</td>
  <td>".$row['pass']."</td>
  <td><a href ='delete.php?nm=$row[name]'> Delete </td>
</tr>
";
}
mysqli_close($con);
  ?>
  <button type="submit">Logout</button> 
      </form>
</table>
</body>
</html>