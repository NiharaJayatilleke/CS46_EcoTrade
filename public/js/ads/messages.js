$(document).ready(function () {
    // sending a message
    $("#message-btn").click(function(event){
        event.preventDefault();

        // check message input field
        if(!($("#send-message").val() == 0)) {

            $.ajax({
                url:URLROOT +"/Messages/message/"+ CURRENT_AD,
                method:"post",
                data:$("form").serialize(),
                dataType:"text",

                success:function(message){
                    $("#test").text(message);
                }
            })

            // Refresh the messages thread
            $.ajax({
                url:URLROOT +"/Messages/showMessages/"+ CURRENT_AD,
                dataType:"html",

                success:function(results){
                    $("#results").html(results);
                }
            })

            $("#send-message").val("");

        }
    })

    //Messages visible on page load
    // $.ajax({
    //     url:URLROOT +"/Messages/showMessages/"+ CURRENT_AD,
    //     dataType:"html",

    //     success:function(results){
    //         $("#results").html(results);
    //     }
    // })
    // $.ajax({
    //     url: URLROOT + "/Messages/getMessagesJson/" + CURRENT_AD,
    //     dataType: "json",
    //     success: function(messages){
    //         // Clear the #results element
    //         $("#results").empty();
    //         // Loop through the messages and append them to the #results element
    //         $.each(messages, function(index, message){
    //             // You'll need to modify this line to match the structure of your messages
    //             $("#results").append('<p>' + message.content + '</p>');
    //         });
    //     }
    // });

        $(".rmessage-reply-btn").click(function() {
            console.log("Reply button clicked");
            // Get the id of the message from the data-message-id attribute
            var messageId = $(this).data('message-id');
            // Call the messageReply function
            messageReply(messageId);
        });

});

    function messageReply(messageId) {
        console.log($messageId);
        // Create a new input element
        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'reply';
        input.placeholder = 'Enter your reply here...';
    
        // Create a new submit button
        var submit = document.createElement('button');
        submit.type = 'submit';
        submit.textContent = 'Submit Reply';
    
        // Create a new form
        var form = document.createElement('form');
        form.action = URLROOT + "/Messages/replyToMessage/"+ messageId; // Replace with the path to your endpoint
        form.method = 'POST';
        form.appendChild(input);
        form.appendChild(submit);
    
        // Append the form to the message
        var message = document.getElementById('message-' + messageId); // Replace with the actual ID of your message element
        message.appendChild(form);
    }
