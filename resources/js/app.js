require("./bootstrap");

$(document).ready(function() {
    console.log("ready");

    let slogan = $(".slogan");
    let clicks = 0;
    let clickLog = 0;

    slogan.click(function() {
        clicks++;
        clickLog++;
        console.log(clicks + ", " + clickLog);
        slogan.text("Zombie Killer Robots Inc.").css("right", "38px");
        if (clicks == 2) {
            slogan.text("Buy, Sell, Strum, Code.").css("right", "32px");
            clicks = 0;
        }
        // Easter egg: 1
        if (clickLog == 69) {
            alert("You just clicked this 69 times! You Win! .... Nothing.");
        }
    });
});
