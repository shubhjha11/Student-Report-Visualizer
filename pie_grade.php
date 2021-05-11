<<<<<<< HEAD
<?php

$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=srv;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );

    $handle = $link->prepare("select grade,count(grade) as 'count' from student_grade group by grade");
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    foreach($result as $row){
        array_push($dataPoints, array("name" =>$row->grade,"y"=>$row->count ));
    }
    $json=json_encode($dataPoints);
//    echo $json;
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Grades Distribution"
	},
  legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "pie", //change type to bar, line, area, pie, etc
    //startAngle: 240,
    showInLegend: true,
		toolTipContent: "{name}: <strong>{y}</strong>",
    indexname: "{name}:{y}",
		dataPoints: <?php echo $json; ?>
	}]
});
chart.render();

}
function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
=======
<?php

$dataPoints = array();
//Best practice is to create a separate file for handling connection to database
try{
     // Creating a new connection.
    // Replace your-hostname, your-db, your-username, your-password according to your database
    $link = new \PDO(   'mysql:host=localhost;dbname=srv;charset=utf8mb4', //'mysql:host=localhost;dbname=canvasjs_db;charset=utf8mb4',
                        'root', //'root',
                        '', //'',
                        array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )
                    );

    $handle = $link->prepare("select grade,count(grade) as 'count' from student_grade group by grade");
    $handle->execute();
    $result = $handle->fetchAll(\PDO::FETCH_OBJ);

    foreach($result as $row){
        array_push($dataPoints, array("name" =>$row->grade,"y"=>$row->count ));
    }
    $json=json_encode($dataPoints);
//    echo $json;
	$link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}

?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Grades Distribution"
	},
  legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "pie", //change type to bar, line, area, pie, etc
    //startAngle: 240,
    showInLegend: true,
		toolTipContent: "{name}: <strong>{y}</strong>",
    indexname: "{name}:{y}",
		dataPoints: <?php echo $json; ?>
	}]
});
chart.render();

}
function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
>>>>>>> 6e5636536634a741ebd9a5dc2ef345dcbdc5f887
