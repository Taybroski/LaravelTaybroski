/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

$(document).ready(function() {
    console.log("ready");

    var small = $("small");
    var clicks = 0;

    small.click(function() {
        console.log("clicked");
        clicks++;
        small.text("Zombie Killer Robots Inc.").css("right", "38px");
        if (clicks == 2) {
            small.text("Buy, Sell, Strum, Code.").css("right", "32px");
            clicks = 0;
        }
    });
});
