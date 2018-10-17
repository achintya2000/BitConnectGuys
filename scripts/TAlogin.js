function toggle() {

    var x = document.getElementById("registration")
    var y = document.getElementById("login-form")

    if (x.style.display === "inline") {
        x.style.display = "none"
        y.style.display = "inline"
    } else if (y.style.display === "inline") {
        x.style.display = "inline"
        y.style.display = "none"
    }
}
