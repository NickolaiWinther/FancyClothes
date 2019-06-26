$(document).ready(function() {
    $(".login").hide();
    $(".loginBtn").on("click", function(e) {
        $(".login").slideToggle();
    });
});

// Slideshow
if (document.querySelector(".slideshow figure")) {
    let images = document.querySelectorAll(".slideshow figure");
    let speed = 5000;
    let counter = 0;
    images[0].classList.toggle("hide");

    window.onload = setInterval(function() {
        if (counter >= images.length - 1) {
            counter = 0;
        } else {
            counter++;
        }
        for (let i = 0; i < images.length; i++) {
            images[i].classList.add("hide");
        }
        images[counter].classList.toggle("hide");
    }, speed);
}

// Scroll til top knap

let btn = document.querySelector(".scrollToTop");

window.addEventListener("scroll", function() {
    if (window.pageYOffset < 200) {
        btn.classList.add("hide");
    } else {
        btn.classList.remove("hide");
    }
});

btn.addEventListener("click", function() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});
