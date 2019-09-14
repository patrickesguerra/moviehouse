<html>
<head>
</head>
<body>

<?php
$con=mysqli_connect("localhost","root","","moviehousesystem");
$query="SELECT * FROM movies ORDER BY id DESC";
$result=mysqli_query($con,$query);
echo '<table>';
echo '<tr>';
while($row=mysqli_fetch_array($result)){
	if($row['id']%5==0){
		echo '<tr>';
	}
	echo '<td>';
	echo $row['title']."<br>";
	echo "<b>".$row['hours']."</b>"."<br>";
	echo '<img src="data:image/jpeg;base64,'.base64_encode($row['picture']).'" style="width:300px; height:400px;"/>'."<br>";
	echo $row['summary']."<br>";
	echo '<td>';
}
echo '</tr>';
echo '</table>';

?>

</body>
</html>