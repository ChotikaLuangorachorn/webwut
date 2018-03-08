$(document).ready(function () {
    $(window).scroll(function () {
        if ($(window).scrollTop() < 115) {
            $(".navbar").removeClass("fixed-top");
        } else {
            $(".navbar").addClass("fixed-top");
        }
    });
});