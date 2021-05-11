<?php
$con = mysqli_connect("localhost","root","","srv");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$q="select * from student";
$insert_faculty_query="INSERT INTO Faculty VALUES("."'".$_POST["fid"]."','".$_POST["fname"]."','".$_POST["fphone"]."','".$_POST["femail"]."');";
$result=mysqli_query($con,$insert_faculty_query);
//echo $query;
mysqli_close($con);
?>
