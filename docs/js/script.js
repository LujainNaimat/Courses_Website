function paynow() {
    let confirmPay = confirm("Are you sure you want to proceed with payment?");

    if (confirmPay) {
        // same as $_SESSION['pay'] = true in cart.php
        var session = getSession();
        session.pay = true;
        setSession(session);

        alert("Payment successful! ");
        window.location.href = "index.html";
    }
}
function Social() {
    var menu = document.getElementById("social");
    var plus = document.getElementById("plus-btn");

    if (menu.style.display === "none") {
        menu.style.display = "flex";
        plus.style.display = "none";
    } else {
        menu.style.display = "none";
        plus.style.display = "flex";
    }
}

function toggleMenu() {
    var leftMenu = document.querySelector(".navbar-left");
    var rightMenu = document.querySelector(".navbar-right");
    var Menu = document.querySelector(".navbar");

    if (leftMenu.style.display === "flex") {
        leftMenu.style.display = "none";
        rightMenu.style.display = "none";
        Menu.style.display = "none";

    } else {
        leftMenu.style.display = "flex";
        rightMenu.style.display = "flex";
        Menu.style.display = "flex";

    }
}
