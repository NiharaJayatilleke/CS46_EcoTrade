$(document).ready(function () {
    // sending a message
    $("#message-btn").click(function (event) {
        event.preventDefault();

        // check message input field
        if(!($("#send-message").val() == 0)) {
            alert("Please enter a message");
        }


    })
})
