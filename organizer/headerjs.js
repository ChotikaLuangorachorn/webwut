$(document).ready(function () {
    $(window).scroll(function () {
        if ($(window).scrollTop() < 116) {
            $(".navbar").removeClass("fixed-top");
            $("#fake-navbar").hide();
        } else {
            $(".navbar").addClass("fixed-top");
            $("#fake-navbar").show();
        }
    });
});