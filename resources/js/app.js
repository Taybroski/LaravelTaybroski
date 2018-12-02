require("./bootstrap");

$(document).ready(function() {
    console.log("ready");

    // CK Editor - WYSIWYG
    let editor = $("#editor");
    if (editor.length) {
        CKEDITOR.editorConfig = function(config) {
            config.htmlEncodeOutput = true;
        };
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

    // Confirm delete alert
    var deleteButton = $("#deleteConfirm");
    if (deleteButton.length) {
        deleteButton.click(function(e) {
            e.preventDefault();
            if (confirm("Are you sure?")) {
                // Post the form
                $(e.target)
                    .closest("form")
                    .submit(); // Post the surrounding form
            } else {
                return alert("Aborted!");
            }
        });
    } // end Confirm delete

    // Key logger
    let map = {};
    onkeydown = onkeyup = function(e) {
        e = e || event; // to deal with IE
        map[e.keyCode] = e.type == "keydown";
        /* insert conditional here */
        element.innerHTML = "";
        $("#submitEnter").keypress(function(e) {
            if (map[16] && map[13]) {
                return true;
            } else if (map[13]) {
                e.preventDefault();
                $(e.target)
                    .closest("form")
                    .submit();
                return false;
            }
        });
    };

    // Submit input on enter
    // $("#submitEnter").keypress(function(e) {
    //     if (event.keyCode == 13 || event.which == 13) {
    //         e.preventDefault();
    //         $(e.target)
    //             .closest("form")
    //             .submit();
    //         return false;
    //     }
    //     if (event.keyCode == 16 + 13 || event.which == 16 + 13) {
    //         return true;
    //     }
    // }); // end Submit on enter
}); // End ready function
