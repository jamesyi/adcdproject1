</body>
<script>
function logout(){
	window.location="/project1/server/logout.php";
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

	$.get("/server/session.php", {session:true}, function(data){
		var session = $.parseJSON(data);
		console.log(session['username']);
		if(session['LoggedIn'] != true){
			document.href = "http://google.com";
		} else {
			$("#user_panel").text("Welcome! "+ session['username']);
		}
	}); 

});
</script>
</html>