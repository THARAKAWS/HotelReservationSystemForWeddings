// Tharaka W.S IT23579580
function checkPassword()
{
	var passwordd = document.getElementById("newpwd").value;
	var confirmpassword = document.getElementById("renewpwd").value;
	
	if (passwordd !== confirmpassword)
	{
		
		alert("Password Missmatch!!");
		return false;
		
	}
	else
	{
		
		alert("Success!!");
		return true;
			
	}
}