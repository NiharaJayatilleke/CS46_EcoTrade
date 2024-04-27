let toggle = document.querySelector('.dashboard-toggle');
let sidenav = document.querySelector('.dashboard-sidenav');
let main = document.querySelector('.dashboard-main');
toggle.onclick = function(){
    sidenav.classList.toggle('active');
    main.classList.toggle('active');
}


let list = document.querySelectorAll('.dashboard-sidenav li');

function activeLink() {
    // Add the hovered class to the current item
    this.classList.add('hovered');
}

function inactiveLink() {
    // Only remove the hovered class if the item hasn't been clicked
    if (!this.classList.contains('clicked')) {
        this.classList.remove('hovered');
    }
}

let clickedLink = (event) => {
    // Prevent the default behavior
    event.preventDefault();

    // Remove the 'clicked' and 'hovered' class from all tabs
    list.forEach((item) => {
        item.classList.remove('clicked', 'hovered');
    });

    // Add the 'clicked' and 'hovered' class to the clicked tab
    let clickedTab = event.currentTarget;
    clickedTab.classList.add('clicked', 'hovered');

    // Navigate to the link's href
    let link = clickedTab.querySelector('a');
    if (link) {
        window.location.href = link.href;
    }
}

list.forEach((item) => {
    item.addEventListener('mouseover', activeLink);
    item.addEventListener('mouseout', inactiveLink);
    item.addEventListener('click', clickedLink);
});


