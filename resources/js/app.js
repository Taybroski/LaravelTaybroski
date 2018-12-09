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
    let keys = {};
    onkeydown = onkeyup = function(e) {
        e = e || event; // to deal with IE
        keys[e.keyCode] = e.type == "keydown";
        /* insert conditional here */
        // Submit on enter
        $("#submitEnter").keypress(function(e) {
            if (keys[16] && keys[13]) {
                return true;
            } else if (keys[13]) {
                e.preventDefault();
                $(e.target)
                    .closest("form")
                    .submit();
                return false;
            }
        }); // End submit on enter
    }; // Ent Keylogger

    // Wakatime API
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
        let timeStr = "";
        $.ajax({
            type: "GET",
            url: act,
            dataType: "jsonp",
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
                timeStr += timeTemplate(hours, mins);
                wakaTime.html(timeStr).css("margin-left", "1rem");
            }
        }); // end Coding Activity

        // Returns the time data with html
        function timeTemplate(hours, mins) {
            return `<i class="far fa-clock mr-2"></i><p>${hours} Hours, ${mins} Minutes`;
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

        // Returns an li for the wakatime language API
        function languageTemplate(name, percent) {
            return `<li><i class="fas fa-caret-right mr-2"></i>${name} - ${percent}%</div>`;
        }
    } // end Wakatime API

    // Add function, used with the .reduce() function
    function add(a, b) {
        return a + b;
    }

    // Check for geolocation if dashboard present
    let dashboard = $(".dashboard-page");
    if (dashboard.length) {
        if ($("body").width() <= 400) {
            if (confirm("Allow location tracking")) {
                navigator.geolocation;
            }
        }
    }

    // OpenWeatherMapAPI
    let weatherContainer = $(".api-weather");
    if (weatherContainer.length && navigator.geolocation) {
        let weatherDetails = $("#weather-details");
        let loader = $(".weather-loader");
        let weatherStr = "";

        navigator.geolocation.getCurrentPosition(
            function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                let lat = pos.lat;
                let lon = pos.lng;
                let owmApiKey = "29ea1d615b68f7299dd1826274565af4";
                let owmQuery = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&units=metric&APPID=${owmApiKey}`;
                console.log("Weather here!");
                $.ajax({
                    type: "GET",
                    url: owmQuery,
                    dataType: "json",
                    success: function(data) {
                        let main = data.main;
                        let sys = data.sys;
                        let weath = data.weather[0];
                        let wind = data.wind;
                        let sunrise = new moment.unix(sys.sunrise).format(
                            "H:mm:ss a"
                        );

                        let sunset = new moment.unix(sys.sunset).format(
                            "H:mm:ss a"
                        );
                        console.log(data);

                        loader.css("display", "none");
                        weatherDetails.html(`
                            <div class="weather-left">
                                    <p>Location:</p>
                                    <p>Description:</p>
                                    <p>Temp:</p>
                                    <p>Wind:</p>
                                    <p>Pressure:</p>
                                    <p>Humidity:</p>
                                    <p>Sunrise:</p>
                                    <p>Sunset:</p>
                                </div>
                                <div class="weather-right">
                                    <p>${data.name}, ${sys.country}</p>
                                    <p>${weath.main}, ${weath.description}</p>
                                    <p>${main.temp}&deg;</p>
                                    <p>${wind.speed}mph</p>
                                    <p>${main.pressure}mb</p>
                                    <p>${main.humidity}%</p>
                                    <p>${sunrise}</p>
                                    <p>${sunset}</p>
                                </div>
                            `);
                    }
                });
            },

            function() {
                handleLocationError(true);
            }
        );
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(
            false,
            alert("Browser doesn't support Geolocation")
        );
    }

    // Dashboard date and time
    function updateTime() {
        $(".date-time").html(moment().format("h:mm:ssa - dddd, Do MMMM "));
    }
    setInterval(updateTime, 1000);
}); // End ready function
