// shared by cart.html and mycourses.html
// shows the logged in user's courses and packages, returns the total price
function renderOrders(containerId, emptyMessage) {
    var session = getSession();
    var orders = getTable("orders");
    var html = "";
    var total = 0;

    var courses = [];
    var packages = [];
    for (var i = 0; i < orders.length; i++) {
        if (orders[i].user_email == session.email) {
            if (orders[i].course_name) {
                courses.push(orders[i]);
            }
            if (orders[i].package_name) {
                packages.push(orders[i]);
            }
        }
    }

    // courses
    if (courses.length > 0) {
        html += "<table class='cart_table'>" +
            "<tr class='cart-header'><th><h3>Course Name</h3></th><th><h3>Price</h3></th><th><h3>Action</h3></th></tr>";

        for (var c = 0; c < courses.length; c++) {
            total += Number(courses[c].course_price);
            html += "<tr class='cart-row'>" +
                "<td>" + esc(courses[c].course_name) + "</td>" +
                "<td>" + esc(courses[c].course_price) + "</td>" +
                "<td><a href='#' class='delete_btn' onclick='removeOrder(" + courses[c].id + "); return false;'><span class='material-symbols-outlined'>close</span></a></td>" +
                "</tr>";
        }
        html += "</table>";
    }

    // packages
    if (packages.length > 0) {
        html += "<h3>Packages</h3>" +
            "<table class='cart_table'>" +
            "<tr class='cart-header'><th>Package Name</th><th>Price</th><th>Action</th></tr>";

        for (var p = 0; p < packages.length; p++) {
            total += Number(packages[p].package_price);
            html += "<tr class='cart-row'>" +
                "<td>" + esc(packages[p].package_name) + "</td>" +
                "<td>" + esc(packages[p].package_price) + "</td>" +
                "<td><a href='#' class='delete_btn' onclick='removeOrder(" + packages[p].id + "); return false;'><span class='material-symbols-outlined'>close</span></a></td>" +
                "</tr>";
        }
        html += "</table>";
    }

    // if user didnt buy yet
    if (courses.length == 0 && packages.length == 0) {
        html += "<h4><span class='material-symbols-outlined'>shopping_cart</span>" + emptyMessage + "</h4>";
    }

    document.getElementById(containerId).innerHTML = html;
    return total;
}
