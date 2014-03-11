<div class="artist">&copy;2014 Leo Tse, James Yi, & Clark Yao</div>
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
	
	$("#add_user").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		var email = $("#email").val();
		console.log(username, password, email);
		$.post("server/user_client.php", {username:username, password:password, email:email}, function(data){
			//console.log(data);		
		});
	});
	
	$("#login_user").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		//console.log(username, password);
		$.post("server/user_client.php", {username:username, password:password}, function(data){
			//console.log(data);	
			var user1 = $.parseJSON(data);
				
		});
	});
	
	/* $.get("/server/session.php", {session:true}, function(data){
		var session = $.parseJSON(data);
		console.log(session['username']);
		if(session['LoggedIn'] != true){
			document.href = "http://google.com";
		} else {
			$("#user_panel").text("Welcome! "+ session['username']);
		}
	});
	*/ 

});
</script>
</html>