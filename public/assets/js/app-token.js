var token = $("meta[name='csrf-token']").attr("content");

$.ajaxSetup({
    beforeSend: function (xhr, options) {
        if (!options.url.startsWith('http')) {
            options.url = APP_BASE_URL + options.url;
        }
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
    },
    error: function (jqXHR, textStatus, errorThrown) {
        if (jqXHR.status == 401) {
            if (jqXHR.responseJSON.error == "Unauthenticated.") {
                window.location = '/'
            }
        } else {
            console.log("Error: " + textStatus + ": " + errorThrown);
        }
    }
});
