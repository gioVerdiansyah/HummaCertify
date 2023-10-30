let theme = localStorage.getItem("theme");
if (theme == "light" || theme == "") {
    document.body.setAttribute("data-bs-theme", "light");
} else {
    document.body.setAttribute("data-bs-theme", "dark")
}
