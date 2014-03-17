<div class="footer">
	<ul class="selection">
		<li>
        	<a href="/project1/index.php?page=home" class="link">Home</a>
        </li>
		<li>
        	<a href="/project1/index.php?page=cosplayers" class="link">Cosplayers</a>
        </li>
		<li>
        	<a href="/project1/index.php?page=about" class="link">About</a>
        </li>
	</ul>
    <h1 class="developer-names">&copy;2014 James Yi, Leo Tse, Clark Yao</h1>
</div>
</body>
<script>
function logout(){
	window.location="/project1/server/logout.php";
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
		//console.log(username, password);
		$.post("server/user_client.php", {username:username, password:password}, function(data){
			//console.log(data);	
			var user1 = $.parseJSON(data);
			window.location.replace("index.php");
		});
	});
	
	$("#unload_pic").click(function(){
		$.get("server/session.php", {session:true}, function(data){
			var session = $.parseJSON(data);
			$.post("server/picture_client.php", {session:true}, function(){
				var user_id = $.parseJSON(data);
			});
		});
	});
	
	$.ajax({                                      
 		type: 'GET',
 		url: 'server/picture.php',        
		dataType: 'html',                  
 		success: function(photos){     		
			$("#grid ul").append(photos);
 		} 
	});
	

});
</script>
</html>