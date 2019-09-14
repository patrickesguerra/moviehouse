<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<?php 
$con=mysqli_connect("localhost","root","","moviehousesystem");
if(isset($_POST['insert'])){
	$mname=$_POST['moviename'];
	$description=$_POST['description'];
	$genre=$_POST['genre'];
	$duration=$_POST['duration']; //or hours in database;
	$file=addslashes(file_get_contents($_FILES['image']['tmp_name']));
	
	if(mysqli_query($con,"INSERT into movies(title,genre,picture,summary,hours) VALUES('$mname','$genre','$file','$description','$duration')")){
		echo '<script>alert("Successful Insert of data");</script>';
	}
}
?>
<body>
<div style="margin-left:23px; margin-top:20px;">
<B>ADMIN ADD MOVIE DETAILS</B><BR><BR>
<form method="post" enctype="multipart/form-data">
<input type="text" name="moviename" placeholder="Movie name"/><br>
Upload image: <input type="file" name="image"/><br>
<textarea type="text" name="description" placeholder="Summary of the movie" style="width:172px; height:90px;"></textarea><br>
<input type="text" name="genre" placeholder="Genre"/><br>
<input type="text" name="duration" placeholder="Duration"><br>
<input type="submit" name="insert" value="Insert" id="insert">
</form>
</div>
<script>
$(document).ready(function(){
	$('#insert').click(function(){
		var image_name=$('#image').val();
		if(image_name==''){
			alert("Please Select Image");
			return false;
		}
		else{
			var extension =$('#image').val().split('.').pop().toLowerCase();
			if(jQuery.inArray(extension,['gif','png','jpg','jpeg'])==-1){
				alert('Invalid Image file');
				$('#image').val('');
				return false;
			}
		}
	});
});
</script>


</body>

</html>