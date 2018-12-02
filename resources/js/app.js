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
    }); // End Mobile nav dropdown

    // Confirm delete alert
    var deleteButton = $(".deleteConfirm");
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

        // Submit on enter
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
        }); // End submit on enter
    }; // Ent Keylogger

    // Wakatime API stats
    let wakatime = $("#wakatime");
    let wakaStats = $("#waka-stats");
    if (wakatime) {
        let act =
            "https://wakatime.com/share/@tazje/42dff32c-f465-44e2-a359-e7b2a936b3d7.json";
        let langs =
            "https://wakatime.com/share/@tazje/5cd342d9-9794-4d73-939b-c212d4d43c42.json";

        // Coding Activity
        let wakaTime = $("#waka-time");
        let week = [];
        let day = [];
        $.ajax({
            type: "GET",
            url: act,
            dataType: "jsonp",
            beforeSend: function() {
                wakaTime.html("Loading...");
            },
            success: function(response) {
                // Map Wakatime response and push to week object.
                $.map(response, function(data) {
                    for (let i = 0; i < data.length; i++) {
                        week.push(data[i]);
                    }
                });
                // Map each day and push to day object, return the total_seconds property value.
                let sec = $.map(week, function(day) {
                    for (let i = 0; i < day.length; i++) {
                        day.push(day[i]);
                    }
                    return day.grand_total.total_seconds;
                });
                // calculate the sum of seconds for each day
                // Using the custom add() function
                let sum = sec.reduce(add, 0);
                let days = sum / 86400; // Convert seconds to days
                let hrs = sum / 3600; // Convert seconds to hours
                let mns = sum / 600; // Convert seconds to miniutes
                let rmns = mns % 60; // Get remaning minutes
                let hours = Math.floor(hrs); // Format hours
                let mins = Math.floor(rmns); // Format remaining minutes

                // Inject into Dashboard HTML
                wakaTime.text(hours + " hours, " + mins + " minutes");
            }
        }); // end Coding Activity

        // Add function, used with the .reduce() function
        function add(a, b) {
            return a + b;
        }

        // Languages
        let wakaList = $("#waka-list");
        let langStr = "";
        let languages = [];
        let lang = [];
        $.ajax({
            type: "GET",
            url: langs,
            dataType: "jsonp",
            beforeSend: function() {
                wakaList.html("Loading...");
            },
            success: function(response) {
                $.map(response, function(data) {
                    for (let i = 0; i < data.length; i++) {
                        languages.push(data[i]);
                    }
                });
                for (let i = 0; i < languages.length; i++) {
                    langStr += languageTemplate(
                        languages[i].name,
                        languages[i].percent
                    );
                }
                wakaList.html(langStr);
            }
        }); // End Lnaguage
        function languageTemplate(name, percent) {
            return `            
                <li>${name} - ${percent}%</div>
            `;
        }
    } // end Wakatime API stats
}); // End ready function
