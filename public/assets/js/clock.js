$(document).ready(function() {

    $.post('/api/clock', function(data) {
        if(data.redirect) {
            window.location = data.redirect;
            return;
        }

        $('#clock').timeTo({
            seconds: data,
            fontFamily: 'inherit',
            callback: function() {
                $.post('/api/finish', function(data) {
                    if(data.redirect) {
                        window.location = data.redirect;
                        return;
                    }
                })
            }
        });
    });
});