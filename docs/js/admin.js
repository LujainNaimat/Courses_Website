// admin pages helpers (same idea as admin/navbar.php)

// only admins can open the admin pages
function adminGuard() {
    if (getSession().role != "admin") {
        window.location.href = "../index.html";
    }
}

function renderAdminNavbar() {
    adminGuard();

    document.getElementById("navigation").innerHTML =
        "<div class='navbar'>" +
        "<div class='logo'>Smart Training Institute</div>" +
        "<div class='nav-left'>" +
        "<a href='home.html' class='navlink'>Home</a>" +
        "<a href='course.html' class='navlink'>Courses</a>" +
        "<a href='package.html' class='navlink'>Packages</a>" +
        "<a href='schedule.html' class='navlink'>Schedule</a>" +
        "<a href='instructor.html' class='navlink'>instructors</a>" +
        "<a href='../index.html' class='navlink'>View site</a>" +
        "</div>" +
        "<div class='navbar-right'>" +
        "<a href='#' class='navlink' id='signout' onclick=\"signOut('../index.html'); return false;\">sign out</a>" +
        "</div>" +
        "</div>";

    showDemoNote("../index.html");
}

// builds the admin table with Delete and Update buttons
// columns: [{ key: "name" }, { key: "price", suffix: " JD" }]
function renderAdminTable(tableName, rows, columns, updatePage) {
    var html = "";

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        html += "<tr>";

        for (var c = 0; c < columns.length; c++) {
            var suffix = columns[c].suffix ? columns[c].suffix : "";
            html += "<td>" + esc(row[columns[c].key]) + suffix + "</td>";
        }

        html += "<td>" +
            "<a href='#' class='btn btn-danger btn-sm me-2' onclick=\"deleteRow('" + tableName + "', " + row.id + "); return false;\">Delete</a>" +
            "<a href='" + updatePage + "?id=" + row.id + "' class='btn btn-primary btn-sm'>Update</a>" +
            "</td></tr>";
    }

    document.getElementById("rows").innerHTML = html;
}

// same as the delete_*.php files
function deleteRow(tableName, id) {
    if (confirm("Are you sure you want to delete this?")) {
        deleteById(tableName, id);
        window.location.reload();
    }
}

// puts the row values inside the form inputs (for update pages)
function fillForm(row) {
    for (var key in row) {
        var input = document.querySelector("[name='" + key + "']");
        if (input) {
            input.value = row[key];
        }
    }
}

// reads the form inputs into an object
function readForm(fields) {
    var data = {};
    for (var i = 0; i < fields.length; i++) {
        data[fields[i]] = document.querySelector("[name='" + fields[i] + "']").value;
    }
    return data;
}

// INSERT INTO table
function insertRow(tableName, data) {
    var rows = getTable(tableName);
    data.id = nextId(rows);
    rows.push(data);
    saveTable(tableName, rows);
}

// UPDATE table SET ... WHERE id = ...
function updateRow(tableName, id, data) {
    var rows = getTable(tableName);
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].id == id) {
            for (var key in data) {
                rows[i][key] = data[key];
            }
        }
    }
    saveTable(tableName, rows);
}
