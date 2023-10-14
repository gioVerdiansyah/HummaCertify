function windowScroll() {
    var e = document.getElementById("navbar");
    e && (50 <= document.body.scrollTop || 50 <= document.documentElement.scrollTop ? e.classList.add("is-sticky") : e.classList.remove("is-sticky"))
}
window.addEventListener("scroll", function(e) { e.preventDefault(), windowScroll() });
var swiper = new Swiper(".candidate-swiper", { slidesPerView: 1, spaceBetween: 30, loop: !0, autoplay: { delay: 2500, disableOnInteraction: !1 }, pagination: { el: ".swiper-pagination", clickable: !0 }, navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }, breakpoints: { 1445: { slidesPerView: 4, spaceBetween: 24 }, 768: { slidesPerView: 2, spaceBetween: 24 } } }),
    mybutton = document.getElementById("back-to-top");

function scrollFunction() { 100 < document.body.scrollTop || 100 < document.documentElement.scrollTop ? mybutton.style.display = "block" : mybutton.style.display = "none" }

function topFunction() { document.body.scrollTop = 0, document.documentElement.scrollTop = 0 }
window.onscroll = function() { scrollFunction() };