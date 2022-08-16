<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="dash11.css">
</head>
<body>
<!-- <h1>Student activities!</h1><br/> -->


<?php

$con = mysqli_connect("localhost", "root", "", "test");
$res = mysqli_query($con, "select * from stat_student;");
echo "<table border='1'>";
echo "<tr><th>Sl.No.</th><th>User</th><th>Action</th><th>Date/Time</th></tr>";
while($row = mysqli_fetch_array($res)){
    echo "<tr><td>".$row['sl.no']."</td>".
        "<td>".$row['reg']."</td>".
        "<td>".$row['action']."</td>".
        "<td>".$row['date/time']."</td></tr>";
}
echo "</table>";

?>
</body>
</html>