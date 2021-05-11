<?php
$con = mysqli_connect("localhost","root","","srv");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$q="select * from student";
$query="INSERT INTO student VALUES("."'".$_POST["rollno"]."','".$_POST["name"]."','".$_POST["date"]."','".$_POST["phone"]."');";
$result=mysqli_query($con,$query);
echo $query;
mysqli_close($con);
?>
