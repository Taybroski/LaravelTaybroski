/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

$(document).ready(function() {
    console.log("ready");

    var slogan = $("#slogan");
    var text1 = $(".text1");
    var text2 = $(".text2");
    var clicks = 0;

    slogan.click(function() {
        console.log("clicked");
        clicks++;
        // text1.fadeTo("fast", 0, function() {});
        text1.css("opacity", 0);
        text2.fadeTo("fast", 1, function() {});
        if (clicks == 2) {
            text2.fadeTo("slow", 0, function() {});
            text1.fadeTo("fast", 1, function() {});
            clicks = 0;
        }
    });
});
