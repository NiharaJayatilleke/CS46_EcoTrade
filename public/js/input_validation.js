document.addEventListener("DOMContentLoaded", function () {
    var emailInputs = document.getElementsByClassName("email");
    var emailErrors = document.getElementsByClassName("email_error");

    for (let i = 0; i < emailInputs.length; i++) {
        {
            if (emailInputs[i]) {
                // Add input event listeners to the email input field
                emailInputs[i].addEventListener("input", function () {
                    validateEmail();
                });

                emailInputs[i].addEventListener("mouseenter", function () {
                    emailErrors[i].style.display = "block";
                });

i
                function validateEmail() {
                    var email = emailInputs[i].value;
                    // Regular expression for a simple email validation
                    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

                    if (regex.test(email)) {

                        // Valid email address, clear error message
                        emailErrors[i].display=none;
                        emailInputs[i].style.borderColor = "";
                        emailInputs[i].setCustomValidity("");
                    } else {
                        // Invalid email address, display error message
                        emailErrors[i].display=block;
                        emailInputs[i].style.borderColor = "red";
                        emailInputs[i].setCustomValidity(" ");
                    }
                }
            }
        }
    }
});