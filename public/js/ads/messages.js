$(document).ready(function () {
    // sending a message
    $("#message-btn").click(function(event){
        event.preventDefault();

        // alert("Message sent");

        // check message input field
        if(!($("#send-message").val() == 0)) {
            // alert("Message sent");

            $.ajax({
                url:URLROOT +"/Messages/message/"+ CURRENT_AD,
                method:"post",
                data:$("form").serialize(),
                dataType:"text",

                success:function(message){
                    alert("Test");
                    $("#test").text(message);
                }
            })
        }
    })
})
