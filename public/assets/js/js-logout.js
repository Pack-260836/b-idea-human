const key_logout = 'bide_logout';

function handlelogout(e) {
    // let url = '/backend/v1/auth/logout';
    // console.log(url);
    $.ajax({
        url: '/backend/v1/auth/check/logout',
        type: 'post',
    }).always(function (response) {
        window.localStorage.setItem(key_logout, Date.now().toString());
        setTimeout(function () {
            window.location = '/'
        }, 100);
    });
}
$(document).ready(function () {
    if (window) {
        window.localStorage.removeItem(key_logout);
    }
    function sysSignout(e) {
        if (e.key === key_logout) {
            window.location = '/';
        }
    }
    window.addEventListener('storage', sysSignout);
});
