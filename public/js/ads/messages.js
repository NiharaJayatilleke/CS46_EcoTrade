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
    $.ajax({
        url:URLROOT +"/Messages/showMessages/"+ CURRENT_AD,
        dataType:"html",

        success:function(results){
            $("#results").html(results);
        }
    })
})
