/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

$(document).ready(function() {
    console.log("ready");

<<<<<<< HEAD
    var small = $("small");
    var clicks = 0;
=======
    let slogan = $(".slogan");
    let clicks = 0;
    let clickLog = 0;
>>>>>>> develop

    slogan.click(function() {
        clicks++;
<<<<<<< HEAD
        small.text("Zombie Killer Robots Inc.").css("right", "38px");
        if (clicks == 2) {
            small.text("Buy, Sell, Strum, Code.").css("right", "32px");
=======
        clickLog++;
        console.log(clicks + ", " + clickLog);
        slogan.text("Zombie Killer Robots Inc.").css("right", "38px");
        if (clicks == 2) {
            slogan.text("Buy, Sell, Strum, Code.").css("right", "32px");
>>>>>>> develop
            clicks = 0;
        }
        // Easter egg: 1
        if (clickLog == 69) {
            alert("You just clicked this 69 times! You Win! .... Nothing.");
        }
    });
});
