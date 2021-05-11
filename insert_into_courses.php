<?php
$con = mysqli_connect("localhost","root","","srv");
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$insert_into_courses="INSERT INTO course VALUES("."'".$_POST["CourseId"]."','".$_POST["CourseName"]."');";


$result=mysqli_query($con,$insert_into_courses);
echo $insert_into_courses;
mysqli_close($con);
?>
