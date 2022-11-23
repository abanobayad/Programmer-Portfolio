var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-bs-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('a.scrollable-container');

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('new-notification');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\NewNotification', function (data) {
    var existingNotifications = notifications.html();
    var newNotificationHtml =
    `<a href="mailto:`+data.email+`">
    <div class="media">
        <div class="media-body">
            <h6 class="media-heading text-right">` + data.name + `</h6>
            <p class="notification-text font-small-3 text-muted ">` + data.email + 'try to contact you' `</p>
            <small style="direction: ltr;">
                <p class="media-meta text-muted " ;"> at ` + data.date + `</p>
            </small>
        </div>
        </div>

    </a>`;
    notifications.html(newNotificationHtml + existingNotifications); //x  = x + new notify
    notificationsCount += 1; //increase counter +1
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
});
