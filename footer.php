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
        <li>
        	<div id="search-box">
                <input type='text' placeholder='Search...' id='search-field'/>
                <img class='search-icon' src='images/search-icon.png' title='search'/>
            </div>
        </li>
	</ul>
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
		$.post("server/user_client.php", {mode:1, username:username, password:password, email:email}, function(data){
			console.log(data);
			window.location.replace("index.php");
		});
	});
	
	$("#login_user").click(function(){
		var username = $("#username").val();
		var password = $("#password").val();
		$.post("server/user_client.php", {mode:2, username:username, password:password}, function(data){
			//console.log(data);	
			var user1 = $.parseJSON(data);
			window.location.replace("index.php");
		});
	});
	
	$("#edit-user").click(function(){
		$.post("server/user_client.php", {mode:3, id:$("#user_id").val(), new_password:$("#new-password").val(), password:$("#old-password").val(), email:$("#user-email").val()}, function(data){
			var result = data;
			console.log(data);
			if(result == "success"){
				window.location.replace("index.php?page=profile&success=t");
			} else if(result == "fail"){
				window.location.replace("index.php?page=profile&success=f");
			} else if(result == "empty"){
				window.location.replace("index.php?page=profile&success=e");
			}
		});
	});
	
	//show user's albums on albums creation page
	$.get("data.php", {data:1}, function(data){
		$("#user_album_list").html(data);
		//console.log(data);
		$(".caption").click(function(){
			var aid = $(this).attr("id");
			var name = $(this).attr("rel");
			window.location.replace("index.php?page=uploadImage&aid="+aid+"&albumName="+name);
		});
		
		$("[rel='tooltip']").tooltip();    
 	
		$('.thumbnail').hover(function(){
				$(this).find('.caption').stop().fadeIn(180); //.fadeIn(250)
			}, function(){
				$(this).find('.caption').stop().fadeOut(180); //.fadeOut(205)
			}
		); 
	});
	
	//show pictures of the album
	$.get("data.php", {data:2, aid:$("#album_id").val()}, function(data){
		$("#user_img_list").html(data);
		$("[rel='tooltip']").tooltip();    
 	
		$('.thumbnail').hover(function(){
				$(this).find('.caption').stop().fadeIn(180); //.fadeIn(250)
			}, function(){
				$(this).find('.caption').stop().fadeOut(180); //.fadeOut(205)
			}
		); 
	});
	
	//show all albums on cosplayers page
	$.get("data.php", {data:3}, function(data){
		//console.log(data);
		$("#all_cosplayers_albums").html(data);
		$("[rel='tooltip']").tooltip();    
 	
		$('.thumbnail').hover(function(){
				$(this).find('.caption').stop().fadeIn(180); //.fadeIn(250)
			}, function(){
				$(this).find('.caption').stop().fadeOut(180); //.fadeOut(205)
			}
		); 
	});
	
	//show user info
	$.get("data.php", {data:4}, function(data){
		//console.log(data);
		$("#user_profile").html(data);
	});
	
	//search icon
	$("#search-field").hide();
	$(".search-icon").click(function(){
		$(".search-icon").hide();
		$("#search-field").show();
	});
	
	$(document).mouseup(function (e){
		if (!$("#search-field").is(e.target) 
			&& $("#search-field").has(e.target).length === 0){
			$("#search-field").hide();
			$(".search-icon").show();
		}
	});
	
	$('#search-field').keypress(function(event){
		var keycode = (event.keyCode ? event.keyCode : event.which);
			if(keycode == '13'){
				$.get("server/search_client.php",{keyword:$("#search-field").val()}, function(data){
				//console.log(data);
				var results = $.parseJSON(data);
				console.log(results);
				var row = "<h1>Search Result</h1><br/><table class='search-result-table' border='0' cellspacing='0'>";
				for (key in results){
					if(results[key]['username'] === "username" && results[key]['link'] === "link"){
						
					}
			}
				var table = row + "</table>";
				$("body").html(table);
				
			});
		}
	});
});
</script>
</html>