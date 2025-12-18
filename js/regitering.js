// Tharaka W.S IT23579580
function enableButton()
{
	 var checkboxx = document.getElementById("acceptTerms");
	 var submitButtonn = document.getElementById("submitBtn");
	 
	 if(checkboxx.checked)
	 {
		 submitButtonn.disabled = false;
	 }
	 else
	 {
		 submitButtonn.disabled = true;
	 }
	
	
	
}
