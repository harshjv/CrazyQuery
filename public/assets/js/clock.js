$(document).ready(function() {

    $.post('/api/clock', function(data) {

        if(data.redirect) {
            window.location = data.redirect;
            return;
        }

        var countdown = Tock({
            countdown: true,
            interval: 1000,
            callback: function () {
                $('#clock').text(countdown.msToTime(countdown.lap()));
            },
            complete: function () {
                window.location = "/finish";
            }
        });

        countdown.start(countdown.timeToMS(data));
    });
});