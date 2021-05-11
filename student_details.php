<?php
$con = mysqli_connect("localhost","root","","srv");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$student_details="select * from student";
$result=mysqli_query($con,$student_details);
echo "<table>";
while($row=mysqli_fetch_array($result,MYSQLI_NUM))
{
  echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
}
echo "</table>";
//echo $student_details;
mysqli_close($con);
?>
