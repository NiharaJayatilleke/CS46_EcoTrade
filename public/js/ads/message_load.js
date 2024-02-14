//Messages visible on page load
    $.ajax({
        url:URLROOT +"/Messages/showMessages/"+ CURRENT_AD,
        dataType:"html",

        success:function(results){
            $("#results").html(results);
        }
    })