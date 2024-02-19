$(document).ready(function () {
    // // sending a message
    // $("#message-btn").click(function(event){
    //     event.preventDefault();

    //     // check message input field
    //     if(!($("#send-message").val() == 0)) {

    //         $.ajax({
    //             url:URLROOT +"/Messages/message/"+ CURRENT_AD,
    //             method:"post",
    //             data:$("form").serialize(),
    //             dataType:"text",

    //             success:function(message){
    //                 $("#test").text(message);
    //             }
    //         })

    //         // Refresh the messages thread
    //         $.ajax({
    //             url:URLROOT +"/Messages/showMessages/"+ CURRENT_AD,
    //             dataType:"html",

    //             success:function(results){
    //                 $("#results").html(results);
    //             }
    //         })

    //         $("#send-message").val("");

    //     }
    // })

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

        $(".message-reply-btn").click(function(event) {
            event.preventDefault();
            console.log("Reply button clicked");
            //Get the id of the message from the data-message-id attribute
            var messageId = $(this).data('message-id');
            //Call the messageReply function
            messageReply(messageId);
            $(this).hide();
        });

        //cancel button
        $(document).on('click', '.reply-close-button', function(event) {
            event.preventDefault();  
            $(this).parent().remove();
            $('.message-reply-btn').show();
        });

        //delete message
        $(".msg-delete-button").click(function(event) {
            event.preventDefault();
            var messageId = $(this).data('message-id');
            deleteMessage(messageId);
            // $(this).hide();
        });

        //delete reply
        $(".reply-delete-button").click(function(event) {
            event.preventDefault();
            var messageId = $(this).data('message-id');
            deleteReply(messageId);
        });


});

    function messageReply(messageId) {
        console.log(messageId);
        // Create a new input element
        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'reply';
        input.placeholder = 'Enter your reply here...';
        input.classList.add('reply-input');
    
        // Create a new submit button
        var submit = document.createElement('button');
        submit.type = 'submit';
        submit.textContent = 'Submit Reply';
        submit.classList.add('reply-submit-button');

        //cancel button
        var close = document.createElement('button');
        close.type = 'button'; 
        close.textContent = 'Cancel';
        close.classList.add('reply-close-button'); 
    
        // Create a new form
        var form = document.createElement('form');
        form.action = URLROOT + "/Messages/replyToMessage/"+ messageId; 
        form.method = 'POST';
        form.classList.add('reply-form');
        form.appendChild(input);
        form.appendChild(submit);
        form.appendChild(close);
    
        // Append the form to the message
        var message = document.getElementById('message-' + messageId); 
        message.appendChild(form);
    }

    // Function to delete a MESSAGE
    function deleteMessage(messageId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(URLROOT + '/Messages/deleteMessage/' + messageId, {
                    method: 'POST',
                    body: JSON.stringify({ messageId: messageId }),
                    headers: { 'Content-Type': 'application/json' }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        //remove the message from view
                        var messageElement = document.getElementById('message-container' + messageId);
                        if (messageElement) {
                            messageElement.remove();
                        }

                        Swal.fire(
                            'Deleted!',
                            'Your message has been deleted.',
                            'success'
                        )
                    }
                });
            }
        })
    }

    // Function to delete a REPLY
    function deleteReply(messageId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                fetch(URLROOT + '/Messages/deleteReply/' + messageId, {
                    method: 'POST',
                    body: JSON.stringify({ messageId: messageId }),
                    headers: { 'Content-Type': 'application/json' }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        //remove the reply from view

                        console.log('#message-reply ' + messageId)

                        var messageElement = document.getElementById('message-reply' + messageId);
                        console.log(messageElement);
                        if (messageElement) {
                            messageElement.remove();
                        }

                        Swal.fire(
                            'Deleted!',
                            'Your message has been deleted.',
                            'success'
                        )

                        // Make the reply button visible
                        // $('#msg-reply-btn').show();

                        var replyButton = document.getElementById('msg-reply' + messageId);
                        console.log(replyButton);
                        if (replyButton) {
                            console.log('Reply button found');
                            $(replyButton).show();
                        }

                        // deleteReplyFromDOM(messageId).then(() => {
                        //     // After the reply is deleted, show the reply button
                        //     $('#msg-reply-btn').show();
                        // });
                    }
                });
            }
        })
    }
