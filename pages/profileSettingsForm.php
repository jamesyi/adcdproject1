<div class="container" style="text-align:center;">



<h1 style="margin-top:80px;">Change Your Profile Settings</h1></br>

	
	<input type='text' placeholder='Change Email' id='user-email' value='' style="font-size:2em; padding:3px;margin-bottom:20px;"/>
    <br/>
   
   
    <input type='password' placeholder='Your Old Password' id='old-password' style="font-size:2em; padding:3px;margin-bottom:20px;"/>
    <br/>
	<input type='password' placeholder='Your New Password' id='new-password' style="font-size:2em; padding:3px;margin-bottom:20px;"/>
    <br/>
    <input type="hidden" id="user_id" value="<?php echo $_SESSION['user_id']?>">
    <input type="button" name="Submit" value="Edit" id="edit-user" class="btn btn-primary" style="width:250px;border-radius:0px;font-size:1.5em;"/>
    
    </div>