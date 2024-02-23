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
                    // console.log(notification);
                    var notificationItem = $('<div class="notif-dropdown-item" data-notification-id="' + notification.notif_id + '"></div>');
                    notificationItem.append('<div class="message">' + notification.message + '</div>');
                    notificationItem.append('<a href="' + URLROOT + '/ItemAds/show/' + notification.ad_id + '" class="view-ad-link">View Ad</a>');
                    // notificationItem.append('<a href="' + URLROOT + '/Notifications/markAsRead/' + notification.notif_id + '" class="mark-as-read-' + notification.notif_id + '" data-notification-id="' + notification.notif_id + '"><i class="fas fa-check"></i></a>');
                    notificationItem.append('<a href="' + URLROOT + '/Notifications/markAsRead/' + notification.notif_id + '" class="mark-as-read" data-notification-id="' + notification.notif_id + '"><i class="fas fa-check"></i></a>');

                    // var notificationItem = $('<li></li>')
                    //     .addClass('notification-item')
                    //     .data('ad-id', notification.ad_id)
                    //     .text(notification.text);

                    // notificationItem.find('.mark-as-read-' + notif_id).click(function(event) {
                    notificationItem.find('.mark-as-read').click(function(event) {
                        var notif_id = $(this).data('notification-id');

                        var notificationItem = $(this).closest('.notif-dropdown-item'); //closest notification item
                        notificationItem.addClass('mark-as-read-active'); 

                        event.preventDefault();
                        // event.stopPropagation(); // Prevents the event from bubbling up the DOM tree, preventing any parent handlers from being notified of the event

                        Swal.fire({
                            title: 'Mark as read?',
                            text: "You won't be able to see this message again!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, mark it!',
                            customClass: { 
                                popup: 'notif-popup' 
                            },
                            showClass: {
                                popup: 'swal2-noanimation',
                                backdrop: 'swal2-noanimation'
                            },
                            hideClass: {
                                popup: '',
                                backdrop: ''
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: URLROOT + '/Notifications/markAsSeen/' + notif_id,
                                    method: 'POST',
                                    success: function() {
                                        // Remove the notification with the same notif_id
                                        $('.notif-dropdown-menu .notif-dropdown-item').each(function() {
                                            var item = $(this);
                                            if (item.data('notification-id') === notif_id) {
                                                $(this).remove();
                                            }
                                        });      
                                        
                                        // var adId = notificationItem.data('ad-id');

                                        // Remove all notifications with the same ad ID
                                        // $('.notif-dropdown-menu .notification-item').each(function() {
                                        //     var item = $(this);
                                        //     if (item.data('ad-id') === adId) {
                                        //         item.remove();
                                        //     }
                                        // });   
                                        $('.notif-dropdown-menu').show();                         
                                    },
                                    error: function() {
                                        console.error('Error marking notification as viewed');
                                    }
                                });
                            }

                            notificationItem.removeClass('mark-as-read-active'); 
                        });

                        event.stopPropagation();
                    });

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

    // Fetch notifications every 5 seconds
    setInterval(function() {
        $.ajax({
            url: URLROOT + "/Notifications/showNotificationCount",
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                // Update the notification count
                $('#notificationCount').text(data);
            },
            error: function() {
                console.error('Error fetching notifications');
            }
        });
    }, 100);
    // }, 10000);

});
