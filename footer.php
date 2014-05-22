<div class="footer">
	<ul class="selection">
		<li>
        	<a href="/moretofu/index.php?page=home" class="link">Home</a>
        </li>
		<li>
        	<a href="/moretofu/index.php?page=cosplayers" class="link">Cosplayers</a>
        </li>
		<li>
        	<a href="/moretofu/index.php?page=about" class="link">About</a>
        </li>
	</ul>
    <h1 class="developer-names">&copy;2014 James Yi, Leo Tse, Clark Yao</h1>
</div>

</body>
<script src="js/bootstrap.min.js"></script>
<script src="js/docs.min.js"></script>

<script>
function logout(){
	window.location="/moretofu/server/logout.php";
}; 

function show_option(){
	var option = document.getElementById("dropdown");
	if(option.style.display == "block"){
		option.style.display = "none";	
	} else {
		option.style.display = "block";	
	}
};

$(document).ready(function(){
	
	$("#gear-container").click(function(){
		$("#dropdown_menu").fadeToggle("slow", function(){
		
		});
	});
	
	$("#add_user").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		var email = $("#email").val();
		console.log(username, password, email);
		$.post("server/user_client.php", {username:username, password:password, email:email}, function(data){
			//console.log(data);
			window.location.replace("index.php");
		});
	});
	
	$("#login_user").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		console.log(username, password);
		$.post("server/user_client.php", {username:username, password:password}, function(data){
			console.log(data);	
			var user1 = $.parseJSON(data);
			window.location.replace("index.php");
		});
	});
	
	//show user's albums on albums creation page
	$.get("data.php", {data:1}, function(data){
		$("#user_album_list").html(data);
		$(".works-image").click(function(){
			var aid = $(this).attr("id");
			var name = $(this).attr("rel");
			window.location.replace("index.php?page=uploadImage&aid="+aid+"&albumName="+name);
		});
	});
	
	//show pictures of the album
	$.get("data.php", {data:2, aid:$("#album_id").val()}, function(data){
		$("#user_img_list").html(data);
	});
	
	//show all albums on cosplayers page
	$.get("data.php", {data:3}, function(data){
		//console.log(data);
		$("#all_cosplayers_albums").html(data);
	});
	
	//display user info
	$.get("data.php", {data:4}, function(data){
		//console.log(data);
		$("#user_profile").html(data);
	});

});
</script>
</html>