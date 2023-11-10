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

const eye3 = document.getElementById('eyeShow3');
const input3 = document.getElementById('passwordThree');
var count3 = 0;

eye3.addEventListener('click', function () {
    var input3 = document.getElementById('passwordThree');
    var hide3 = document.getElementById('hide3');
    var show3 = document.getElementById('show3');

    if (count3 === 0) {
        count3 = 1;
        show3.style.display = 'none';
        hide3.style.display = 'block';
        input3.setAttribute('type', 'text');
    } else if (count3 === 1) {
        count3 = 0;
        show3.style.display = 'block';
        hide3.style.display = 'none';
        input3.setAttribute('type', 'password');
    }
});

input3.addEventListener('keyup', function () {
    var input3 = document.getElementById('passwordThree');
    var eye3 = document.getElementById('eyeShow3');

    if (!input3.value) {
        eye3.style.display = 'none';
    } else {
        eye3.style.display = 'block';
    }
});
