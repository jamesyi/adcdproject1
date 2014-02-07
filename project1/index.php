<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Project 1</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</head>
<body>
<form action='server/insertPic.php' method="POST">
Adding an image...</br>
Image URL:<input type='text' id='link' maxlength='500' /></br>
Image Name:<input type='text' id='title' maxlength='100' /></br>
Image Description:<input type='text' id='descr' maxlength='1000' /></br>
<input type='button' value='Submit' id='add_pic' />
</form>
</body>
<script>
$(document).ready(function(){
	
});
</script>
</html>