try {
    var setEndDate1 = "March 19, 2024 6:0:0",
        setEndDate2 = "April 16, 2023 5:3:1",
        setEndDate3 = "Dec 01, 2023 1:0:1",
        setEndDate4 = "Nov 26, 2024 1:2:1",
        setEndDate5 = "May 27, 2023 1:6:6",
        setEndDate6 = "May 20, 2023 2:5:5",
        setEndDate7 = "June 10, 2023 5:1:4",
        setEndDate8 = "June 25, 2023 1:6:3",
        setEndDate9 = "July 08, 2023 1:5:2";

    function startCountDownDate(t) { return new Date(t).getTime() }

    function countDownTimer(t, e) {
        var t = t - (new Date).getTime(),
            n = (n = Math.floor(t / 864e5)) < 10 ? "0" + n : n,
            o = (o = Math.floor(t % 864e5 / 36e5)) < 10 ? "0" + o : o,
            a = (a = Math.floor(t % 36e5 / 6e4)) < 10 ? "0" + a : a,
            c = (c = Math.floor(t % 6e4 / 1e3)) < 10 ? "0" + c : c;
        document.querySelector("#" + e).textContent = n + " : " + o + " : " + a + " : " + c, t < 0 && (document.querySelector("#" + e).textContent = "00 : 00 : 00 : 00")
    }
    var cdd1 = startCountDownDate(setEndDate1),
        cdd2 = startCountDownDate(setEndDate2),
        cdd3 = startCountDownDate(setEndDate3),
        cdd4 = startCountDownDate(setEndDate4),
        cdd5 = startCountDownDate(setEndDate5),
        cdd6 = startCountDownDate(setEndDate6),
        cdd7 = startCountDownDate(setEndDate7),
        cdd8 = startCountDownDate(setEndDate8),
        cdd9 = startCountDownDate(setEndDate9);
    document.getElementById("auction-time-1") && setInterval(function() { countDownTimer(cdd1, "auction-time-1") }, 1e3), document.getElementById("auction-time-2") && setInterval(function() { countDownTimer(cdd2, "auction-time-2") }, 1e3), document.getElementById("auction-time-3") && setInterval(function() { countDownTimer(cdd3, "auction-time-3") }, 1e3), document.getElementById("auction-time-4") && setInterval(function() { countDownTimer(cdd4, "auction-time-4") }, 1e3), document.getElementById("auction-time-5") && setInterval(function() { countDownTimer(cdd5, "auction-time-5") }, 1e3), document.getElementById("auction-time-6") && setInterval(function() { countDownTimer(cdd6, "auction-time-6") }, 1e3), document.getElementById("auction-time-7") && setInterval(function() { countDownTimer(cdd7, "auction-time-7") }, 1e3), document.getElementById("auction-time-8") && setInterval(function() { countDownTimer(cdd8, "auction-time-8") }, 1e3), document.getElementById("auction-time-9") && setInterval(function() { countDownTimer(cdd9, "auction-time-9") }, 1e3)
} catch (t) {}
var filterBtns = document.querySelectorAll(".filter-btns .nav-link"),
    productItems = document.querySelectorAll(".product-item");
Array.from(filterBtns).forEach(function(t) {
    t.addEventListener("click", function(t) {
        t.preventDefault();
        for (var e = 0; e < filterBtns.length; e++) filterBtns[e].classList.remove("active");
        this.classList.add("active");
        var n = t.target.dataset.filter;
        Array.from(productItems).forEach(function(t) { "all" === n || t.classList.contains(n) ? t.style.display = "block" : t.style.display = "none" })
    })
});