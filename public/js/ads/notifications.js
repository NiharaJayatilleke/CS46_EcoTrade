$(document).ready(function() {
    $('.dropdown-toggle').click(function(e) {
        e.preventDefault();

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
                    console.log(notification);
                    console.log(notification);
                    console.log(notification);
                    var notificationItem = $('<div class="notif-dropdown-item"></div>');
                    notificationItem.append('<div class="message">' + notification.message + '</div>');
                    notificationItem.append('<a href="' + URLROOT + '/ItemAds/show/' + notification.ad_id + '" class="view-ad-link">View Ad</a>');
                    $('.notif-dropdown-menu').append(notificationItem);
                });

                dropdownMenu.show();
                caret.show();
            },
            error: function() {
                console.error('Error fetching notifications');
            }
        });
    });

    $(document).click(function(e) {
        var dropdownMenu = $('.notif-dropdown-menu');
        var caret = $('.caret');

        if (!$(e.target).closest('.notif-wrapper').length) {
            dropdownMenu.hide();
            caret.hide();
        }
    });

});
