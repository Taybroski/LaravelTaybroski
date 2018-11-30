require("./bootstrap");

$(document).ready(function() {
    console.log("ready");

    // CK Editor - WYSIWYG
    let editor = $("#editor");
    if (editor.length) {
        CKEDITOR.replace("editor");
    }

    // Mobile dropdown nav
    let closeNav = $("#fa-close");
    let openNav = $(".mobile-nav");
    let navbar = $(".nav-links");
    let h = navbar.height();
    openNav.click(function() {
        navbar.animate(
            {
                top: "0"
            },
            250,
            "swing"
        );
    });
    closeNav.click(function() {
        navbar
            .animate(
                {
                    top: "-100%"
                },
                250,
                "swing"
            )
            .css("box-shadow", "none");
    });

    let slogan = $(".slogan").slideDown();
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
