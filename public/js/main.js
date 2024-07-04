//navdown
document.getElementById('userIcon').addEventListener('click', function(event) {
    event.preventDefault();
    document.querySelector('.dropdown-menu').classList.toggle('show');
});

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('#userIcon') && !event.target.matches('ion-icon')) {
        var dropdowns = document.getElementsByClassName('dropdown-menu');
        for (var i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}




let listimg = document.querySelector(".list-img");
let items = document.querySelectorAll(".item");
let prev = document.getElementById("prev");
let next = document.getElementById("next");
let count = 0;
let index = items.length - 1;

next.onclick = function () {
    if (count + 1 > index) {
        count = 0;
    } else {
        count += 1;
    }
    reloadslide();
    clearInterval(auto);
    auto = setInterval(() => { next.click() }, 5000);
}
prev.onclick = function () {
    if (count -1 < 0) {
        count = index;
    } else {
        count -= 1;
    }
    reloadslide();
    clearInterval(auto);
    auto = setInterval(() => { next.click() }, 5000);
}

function reloadslide() {
    let checkleft = items[count].offsetLeft;
    listimg.style.left = -checkleft + 'px';
}

let auto = setInterval(() => { next.click() }, 5000);
