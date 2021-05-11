<?php
  $con = mysqli_connect("localhost","root","","srv");
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $h=fopen("marks.csv","r");
  //echo "working<br>";

  if($h!=FALSE)
  {
    $row_count=1;
    $num=0;
    while (($data=fgetcsv($h,1000,","))!==FALSE)
    {
        if($row_count==1)
        {
          $row_count++;
          continue;
        }
        $query="insert into student_course values('";
        $num=count($data);
        for ($i=0; $i < $num; $i++)
        {
          if($data[$i]=="")
            $data[$i]="NULL";
        }
        $query="insert into student_course values('".$data[0]."','".$data[1]."',".$data[2].",".$data[3].",".$data[4].",".$data[5].");";
        $result=mysqli_query($con,$query);
        if($result==true)
        {
            echo"done";
        }
        else {
            echo "not done";
        }
        echo "<br>".$query."<br>";
        $row_count++;
        echo "<br>";
    }
  }
  else {
    echo"error";
  }
  fclose($h);
 ?>
