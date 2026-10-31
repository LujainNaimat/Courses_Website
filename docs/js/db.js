// Smart Training - static demo
// GitHub Pages can't run PHP or MySQL, so in this demo the "database"
// tables are saved in the browser (localStorage) instead.
// Every visitor gets their own copy of the sample data below.

var seedData = {
    users: [
        { id: 1, fname: "Admin", lname: "User", email: "admin@smarttraining.com", password: "admin123", role: "admin" },
        { id: 2, fname: "Demo", lname: "Student", email: "student@smarttraining.com", password: "student123", role: "user" }
    ],

    services: [
        { id: 1, name: "Web Development", details: "Build responsive websites with HTML, CSS, JavaScript and PHP, from your first page to a full database-driven site.", price: 150, image: "assets/course1.jpg" },
        { id: 2, name: "Data Analysis", details: "Clean, analyze and visualize data using Excel, SQL and Power BI dashboards.", price: 180, image: "assets/course2.jpg" },
        { id: 3, name: "Cybersecurity", details: "Learn network security, common attacks and how to defend against them through hands-on labs.", price: 200, image: "assets/course3.jpg" },
        { id: 4, name: "Cloud Computing", details: "Understand cloud services, storage and deployment, and launch your own app in the cloud.", price: 190, image: "assets/course4.jpg" },
        { id: 5, name: "Software Engineering", details: "Programming fundamentals, object-oriented design, Git and working in a development team.", price: 170, image: "assets/course6.jpg" },
        { id: 6, name: "Personal Career Mentoring", details: "One-to-one sessions on your CV, interviews and planning the next step in your career.", price: 90, image: "assets/course6.avif" }
    ],

    instructors: [
        { id: 1, name: "Dr. Michael Harris", role: "Data Analysis Instructor", details: "15 years teaching statistics and data analysis for business.", image: "assets/instructor1.jpg" },
        { id: 2, name: "Dr. James Carter", role: "Web Development Instructor", details: "Full-stack developer who has built websites for companies across the region.", image: "assets/instructor2.png" },
        { id: 3, name: "Prof. Robert Miller", role: "Cybersecurity Instructor", details: "Security researcher focused on network defense and ethical hacking.", image: "assets/instructor3.webp" },
        { id: 4, name: "Sarah Mitchell", role: "Career Mentor", details: "Helps students prepare CVs, practice interviews and find their path.", image: "assets/instructor4.jpg" },
        { id: 5, name: "Eng. Lina Haddad", role: "Cloud Computing Instructor", details: "Certified cloud engineer with experience deploying large systems.", image: "assets/instructor5.jpg" },
        { id: 6, name: "Eng. Noor Khalil", role: "Software Engineering Instructor", details: "Software engineer passionate about clean code and teamwork.", image: "assets/instructor6.jpg" }
    ],

    packages: [
        { id: 1, name: "Starter Package", details: "Any 2 courses of your choice plus access to online learning resources.", price: 280 },
        { id: 2, name: "Professional Package", details: "Any 4 courses, certification preparation and workshop access.", price: 520 },
        { id: 3, name: "Career Track", details: "All courses plus personal career mentoring until you land your first job.", price: 750 }
    ],

    course_schedule: [
        { id: 1, name: "Web Development", stime: "09:00", etime: "11:00", day: "Monday" },
        { id: 2, name: "Data Analysis", stime: "11:30", etime: "13:30", day: "Monday" },
        { id: 3, name: "Cybersecurity", stime: "09:00", etime: "11:00", day: "Tuesday" },
        { id: 4, name: "Cloud Computing", stime: "14:00", etime: "16:00", day: "Tuesday" },
        { id: 5, name: "Software Engineering", stime: "11:30", etime: "13:30", day: "Wednesday" },
        { id: 6, name: "Web Development", stime: "09:00", etime: "11:00", day: "Thursday" },
        { id: 7, name: "Data Analysis", stime: "14:00", etime: "16:00", day: "Thursday" },
        { id: 8, name: "Personal Career Mentoring", stime: "17:00", etime: "19:00", day: "Saturday" },
        { id: 9, name: "Cybersecurity", stime: "11:30", etime: "13:30", day: "Sunday" },
        { id: 10, name: "Cloud Computing", stime: "17:00", etime: "19:00", day: "Sunday" }
    ],

    orders: []
};

// read a table (like SELECT * FROM table)
function getTable(name) {
    var saved = null;
    try {
        saved = localStorage.getItem("st_" + name);
    } catch (e) { }

    if (saved) {
        return JSON.parse(saved);
    }
    return JSON.parse(JSON.stringify(seedData[name]));
}

// save a whole table back
function saveTable(name, rows) {
    try {
        localStorage.setItem("st_" + name, JSON.stringify(rows));
    } catch (e) { }
}

// like AUTO_INCREMENT
function nextId(rows) {
    var max = 0;
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].id > max) {
            max = rows[i].id;
        }
    }
    return max + 1;
}

function findById(rows, id) {
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].id == id) {
            return rows[i];
        }
    }
    return null;
}

function deleteById(name, id) {
    var rows = getTable(name);
    var kept = [];
    for (var i = 0; i < rows.length; i++) {
        if (rows[i].id != id) {
            kept.push(rows[i]);
        }
    }
    saveTable(name, kept);
}

// ---------- session (like $_SESSION) ----------
function getSession() {
    try {
        var s = sessionStorage.getItem("st_session");
        if (s) {
            return JSON.parse(s);
        }
    } catch (e) { }
    return {};
}

function setSession(session) {
    try {
        sessionStorage.setItem("st_session", JSON.stringify(session));
    } catch (e) { }
}

function signOut(homePath) {
    try {
        sessionStorage.removeItem("st_session");
    } catch (e) { }
    window.location.href = homePath;
}

// read ?id=5 from the url (like $_GET['id'])
function getParam(key) {
    return new URLSearchParams(window.location.search).get(key);
}

// stops text typed in forms from breaking the page
function esc(text) {
    return String(text)
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#39;");
}

// puts the sample data back
function resetDemo(homePath) {
    if (!confirm("Reset all demo data back to the original sample data?")) {
        return;
    }
    try {
        for (var name in seedData) {
            localStorage.removeItem("st_" + name);
        }
        sessionStorage.removeItem("st_session");
    } catch (e) { }
    window.location.href = homePath;
}

// small note at the bottom so visitors know this is the demo version
function showDemoNote(homePath) {
    var note = document.createElement("div");
    note.className = "demo-note";
    note.innerHTML = "Demo version: data is saved in your browser only. " +
        "<a href='#' onclick=\"resetDemo('" + homePath + "'); return false;\">Reset data</a>";
    document.body.appendChild(note);
}
