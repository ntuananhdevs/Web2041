// Dropdown functionality
document.getElementById('userIcon').addEventListener('click', function(event) {
    event.preventDefault();
    document.querySelector('.dropdown-menu').classList.toggle('show');
});

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('#userIcon') && !event.target.matches('ion-icon') && !event.target.closest('.list-img')) {
        document.querySelectorAll('.dropdown-menu.show').forEach(function(openDropdown) {
            openDropdown.classList.remove('show');
        });
    }
};

// Slideshow functionality
let listimg = document.querySelector(".list-img");
let items = document.querySelectorAll(".item");
let prev = document.getElementById("prev");
let next = document.getElementById("next");
let count = 0;
let index = items.length - 1;
// let auto = setInterval(() => { next.click() }, 5000);

next.addEventListener('click', function() {
    count = (count + 1) > index ? 0 : count + 1;
    reloadslide();
    resetAutoSlide();
});

prev.addEventListener('click', function() {
    count = (count - 1) < 0 ? index : count - 1;
    reloadslide();
    resetAutoSlide();
});

function reloadslide() {
    let checkleft = items[count].offsetLeft;
    listimg.style.left = -checkleft + 'px';
}

// function resetAutoSlide() {
//     clearInterval(auto);
//     auto = setInterval(() => { next.click() }, 7000);
// }

