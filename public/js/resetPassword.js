const eye = document.getElementById('eyeShow');
const input = document.getElementById('passwordOne');
var count = 0;

eye.addEventListener('click', function () {
    var input = document.getElementById('passwordOne');
    var hide = document.getElementById('hide');
    var show = document.getElementById('show');

    if (count === 0) {
        count = 1;
        show.style.display = 'none';
        hide.style.display = 'block';
        input.setAttribute('type', 'text');
    } else if (count === 1) {
        count = 0;
        show.style.display = 'block';
        hide.style.display = 'none';
        input.setAttribute('type', 'password');
    }
});

input.addEventListener('keyup', function () {
    var input = document.getElementById('passwordOne');
    var eye = document.getElementById('eyeShow');

    if (!input.value) {
        eye.style.display = 'none';
    } else {
        eye.style.display = 'block';
    }
});

const eye2 = document.getElementById('eyeShow2');
const input2 = document.getElementById('passwordTwo');
var count2 = 0;

eye2.addEventListener('click', function () {
    var input2 = document.getElementById('passwordTwo');
    var hide2 = document.getElementById('hide2');
    var show2 = document.getElementById('show2');

    if (count2 === 0) {
        count2 = 1;
        show2.style.display = 'none';
        hide2.style.display = 'block';
        input2.setAttribute('type', 'text');
    } else if (count2 === 1) {
        count2 = 0;
        show2.style.display = 'block';
        hide2.style.display = 'none';
        input2.setAttribute('type', 'password');
    }
});

input2.addEventListener('keyup', function () {
    var input2 = document.getElementById('passwordTwo');
    var eye2 = document.getElementById('eyeShow2');

    if (!input2.value) {
        eye2.style.display = 'none';
    } else {
        eye2.style.display = 'block';
    }
});

let bgLoader = localStorage.getItem("theme");

if (bgLoader == 'dark') {
    var bgImage = document.getElementById('background-login');

    var eyeBackground = document.getElementById('eyeShow');
    var eyeBackground2 = document.getElementById('eyeShow2');
    var eyeBackground3 = document.getElementById('eyeShow3');

    var icon = document.getElementById('icon');
    var icon2 = document.getElementById('icon2');
    var icon3 = document.getElementById('icon3');

    bgImage.style = 'background-image: none !important';

    icon.style = 'color: white';
    icon2.style = 'color: white';
    icon3.style = 'color: white';
}
