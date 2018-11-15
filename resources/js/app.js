/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

$(document).ready(function() {
    console.log("ready");

    let slogan = $(".slogan");
    let text = $(".text");
    let clicks = 0;

    slogan.click(function() {
        clicks++;
        slogan.text("Zombie Killer Robots Inc.").css("right", "38px");
        if (clicks == 2) {
            slogan.text("Buy, Sell, Strum, Code.").css("right", "32px");
            clicks = 0;
        }
    });
});
