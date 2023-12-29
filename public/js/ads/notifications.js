$(document).ready(function() {
    $('.dropdown-toggle').click(function(e) {
        // e.preventDefault();

        var dropdownMenu = $('.notif-dropdown-menu');
        var caret = $('.caret');

        // Fetch notifications from the server
        $.ajax({
            url: URLROOT + "/Notifications/ajaxShowNotifications",
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Clear the old notifications
                $('.notif-dropdown-menu').empty();
            
                // Add the new notifications
                $.each(data, function(i, notification) {
                    $('.notif-dropdown-menu').append('<a href="#" class="notif-dropdown-item">' + notification.message + '</a>');
                });
            
                dropdownMenu.show();
                caret.show();
            },
            error: function() {
                console.error('Error fetching notifications');
            }
        });
    });

    $(document).on('click', '.notif-dropdown-item', function(event) {
        event.stopPropagation();
    });

    $(document).click(function(e) {
        // Reference to the dropdown menu
        var dropdownMenu = $('.notif-dropdown-menu');
        var caret = $('.caret');

        if (!$(e.target).closest('.user-dropdown').length) {
            // Hide the dropdown menu if the click is outside the user-dropdown
            dropdownMenu.hide();
            caret.hide();
        }
    });
});
