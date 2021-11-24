function validate() {
	var email = document.login.email;
	if (email.value == "") {
		alert( "Please provide your email!" );
		email.focus() ;
		return false;
	}
	// Validation of email address
	if (!(/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/).test(email.value)) {
		alert( "Please provide a valid email address!" );
		email.focus();
	        return false;
	}

	return true;
}
