! function() {
    var e, r, t, l = "";

    function a(n) {
        var e;
        n.querySelector(".country-flagimg") && (e = n.querySelector(".country-flagimg").getAttribute("src")), Array.from(n.querySelectorAll(".dropdown-menu li")).forEach(function(r) {
            var t = r.querySelector(".options-flagimg").getAttribute("src");
            r.addEventListener("click", function() {
                var e = r.querySelector(".countrylist-codeno").innerHTML;
                n.querySelector("button") && (n.querySelector("button img").setAttribute("src", t), n.querySelector("button span")) && (n.querySelector("button span").innerHTML = e)
            }), e == t && r.classList.add("active")
        }), Array.from(document.querySelectorAll("[data-option-flag-img-name]")).forEach(function(n) {
            var e = getComputedStyle(n.querySelector(".flag-input")).backgroundImage,
                o = e.substring(e.indexOf("/as") + 1, e.lastIndexOf('"'));
            Array.from(n.querySelectorAll(".dropdown-menu li")).forEach(function(r) {
                var t = r.querySelector(".options-flagimg").getAttribute("src");
                r.addEventListener("click", function() {
                    var e = r.querySelector(".country-name").innerHTML;
                    n.querySelector(".flag-input").style.backgroundImage = "url(" + t + ")", n.querySelector(".flag-input").value = e
                }), o == t && (r.classList.add("active"), n.querySelector(".flag-input").value = r.querySelector(".country-name").innerHTML)
            })
        }), Array.from(document.querySelectorAll("[data-option-flag-name]")).forEach(function(t) {
            var n = t.querySelector(".flag-input").value;
            Array.from(t.querySelectorAll(".dropdown-menu li")).forEach(function(e) {
                var r = e.querySelector(".country-name").innerHTML;
                e.addEventListener("click", function() { t.querySelector(".flag-input").value = r }), n == r && (e.classList.add("active"), t.querySelector(".flag-input").value = e.querySelector(".country-name").innerHTML)
            })
        })
    }
    e = "country-list.json", r = function(e, r) {
        if (null !== e) console.log("Something went wrong: " + e);
        else {
            var e = l = r,
                t = Array.from(document.querySelectorAll("[data-input-flag]")),
                n = "",
                o = Array.from(e);
            for (let e = 0; e < o.length; e++) n += '<li class="dropdown-item d-flex">            <div class="flex-shrink-0 me-2"><img src="' + o[e].flagImg + '" alt="country flag" class="options-flagimg" height="20"></div>                <div class="flex-grow-1">                <div class="d-flex"><div class="country-name me-1">' + o[e].countryName + '</div><span class="countrylist-codeno text-muted">' + o[e].countryCode + "</span></div>            </div>            </li>";
            for (let e = 0; e < t.length; e++) t[e].querySelector(".dropdown-menu-list").innerHTML = "", t[e].querySelector(".dropdown-menu-list").innerHTML = n, a(t[e])
        }
    }, (t = new XMLHttpRequest).open("GET", "assets/json/" + e, !0), t.responseType = "json", t.onload = function() {
        var e = t.status;
        r(200 === e ? null : e, t.response)
    }, t.send(), Array.from(document.querySelectorAll("[data-input-flag]")).forEach(function(n) {
        var o = n.querySelector(".search-countryList");
        o && o.addEventListener("keyup", function() {
            var e = o.value.toLowerCase();
            r = e;
            var r, t = l.filter(function(e) { return -1 !== e.countryName.toLowerCase().indexOf(r.toLowerCase()) || -1 !== e.countryCode.indexOf(r) });
            setTimeout(function() { n.querySelector(".dropdown-menu-list").innerHTML = "", Array.from(t).forEach(function(e) { n.querySelector(".dropdown-menu-list").innerHTML += '<li class="dropdown-item d-flex">                        <div class="flex-shrink-0 me-2"><img src="' + e.flagImg + '" alt="country flag" class="options-flagimg" height="20"></div>                        <div class="flex-grow-1">                        <div class="d-flex"><div class="country-name me-1">' + e.countryName + '</div><span class="countrylist-codeno text-muted">' + e.countryCode + "</span></div>                        </div>                        </li>" }), a(n) }, 350)
        })
    })
}();