let bgLoader = localStorage.getItem("theme");

if (bgLoader == 'dark') {
    var eyeBackground = document.getElementById('eyeShow');
    var bgImage = document.getElementById('background-login');
    var icon = document.getElementById('icon');
    bgImage.style = 'background-image: none !important';
    icon.style = 'color: white';
}
