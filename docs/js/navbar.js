// same navbar as Php/navbar.php, built with JavaScript
function renderNavbar() {
    var session = getSession();

    var html = "<button id='menu' class='menu-toggle' onclick='toggleMenu()'><span class='material-symbols-outlined'>dehaze</span></button>" +
        "<div class='navbar'>" +
        "<div class='logo'>Smart Training Institute</div>" +
        "<div class='navbar-left'>" +
        "<a href='index.html' class='navlink'>Home</a>" +
        "<a href='courses.html' class='navlink'>Courses</a>" +
        "<a href='courseschedule.html' class='navlink'>Schedule</a>" +
        "<a href='index.html#instructor' class='navlink'>Instructors</a>" +
        "<a href='packages.html' class='navlink'>Packages</a>";

    if (session.pay === true) {
        html += "<a href='mycourses.html' class='navlink'>My Courses</a>";
    }

    html += "<a href='about.html' class='navlink'>About us</a>" +
        "</div>" +
        "<div class='navbar-right'>";

    if (session.student) {
        if (session.role == "admin") {
            html += "<a href='admin/home.html' class='navlink'>Dashboard</a>";
        }
        html += "<a href='cart.html' class='navlink' id='shopping_cart'><span class='material-symbols-outlined'>shopping_cart</span></a>" +
            "<a href='#' class='navlink' id='sign_out' onclick=\"signOut('index.html'); return false;\">sign out</a>";
    } else {
        html += "<a href='signin.html' class='navlink' id='sign_in'>Enroll now</a>";
    }

    html += "</div></div>";

    document.getElementById("navigation").innerHTML = html;
    showDemoNote("index.html");
}

// same as Php/instructors.php
function renderInstructors(containerId) {
    var allinstructors = getTable("instructors");
    var html = "";

    for (var i = 0; i < allinstructors.length; i++) {
        var instructor = allinstructors[i];
        html += "<div class='instructor-card'>" +
            "<div class='card-img'><img src='" + esc(instructor.image) + "' alt='instructor-img'></div>" +
            "<h2>" + esc(instructor.name) + "</h2>" +
            "<h3>" + esc(instructor.role) + "</h3>" +
            "<p>" + esc(instructor.details) + "</p>" +
            "</div>";
    }

    document.getElementById(containerId).innerHTML = html;
}
