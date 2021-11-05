function validate() {
	var firstName = document.RegForm.firstname;
    if (firstName.value == "") {
        alert( "Please provide your first name!" );
        firstName.focus();
        return false;
     }

    var lastName = document.RegForm.lastname;
    if (lastName.value == "") {
        alert( "Please provide your last name!" );
        lastName.focus() ;
        return false;
     }

    // Validation of the firstname and last name must be letters
    if (!(/^[A-Za-z]+$/).test(firstName.value)){
    	alert( "Please provide a valid name!" );
        firstName.focus();
        return false;
    }

    if (!(/^[A-Za-z]+$/).test(lastName.value)){
    	alert( "Please provide a valid name!" );
        lastName.focus();
        return false;
    }


    var email = document.RegForm.email;
    if (email.value == "") {
        alert( "Please provide your email!" );
        email.focus() ;
        return false;
     }

	// Validation of email address
    if (!(/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/).test(email.value)){
     	alert( "Please provide a valid email address!" );
        email.focus();
        return false;
     }


    var firstPass = document.getElementById("firstPw");
    var secPass = document.getElementById("secondPw");
    if (firstPass.value == "") {
        alert( "Please provide your own password" );
        firstPass.focus() ;
        return false;
     }

	// Validation of passward, the first letter must be uppercase and the minimum length is 8
	if (!(/^[A-Z].{7,}$/).test(firstPass.value)){
     	alert( "Please provide a valid passward, the first letter must be uppercase and the minimum length is 8." );
        firstPass.focus();
        return false;
     }

    if (secPass.value == "") {
        alert( "Please repeat your own password again!" );
        secPass.focus() ;
        return false;
    }

    // If passward and repeated passward are different, return false
    if (firstPass.value != secPass.value) {
    	alert ("Your repeated passward is wrong.")
    	secPass.focus() ;
        return false;
    }

   

    if (document.RegForm.gender.value == "") {
        alert( "Please provide your gender!" );
        document.RegForm.gender.focus() ;
        return false;
     }


    // If both "yes" and "no" options are not checked, return false
    if (!document.getElementById('yes').checked && !document.getElementById('no').checked) {
        alert("Please check an option");
        document.getElementById('yes').focus();
        return false;
    }
        return( true );
    }
