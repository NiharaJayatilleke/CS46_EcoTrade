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


// Function to show the search bar
function showSearchBar() {
    var searchBar = document.getElementById('admin-dashboard-search');
    if (searchBar) {
        searchBar.style.display = 'block'; 
    }
}

// Function to hide the search bar
function hideSearchBar() {
    var searchBar = document.getElementById('admin-dashboard-search');
    if (searchBar) {
        searchBar.style.display = 'none'; 
    }
}

// Function to check the URL fragment and show or hide the search bar accordingly
function checkFragment() {
    // Get the URL fragment
    var fragment = window.location.hash;

    // Show or hide the search bar based on the URL fragment
    switch (fragment) {
        case '#users-content':
        case '#moderators-content':
        case '#centers-content':
        case '#secondhand-content':
        case '#recycle-content':
        case '#activity-content':
            showSearchBar();
            break; 
        case '#dashboard-content':
        case '#reported-ads-content':
        case '#settings-content':
            hideSearchBar();
            break;
        default:
            // If there's no fragment or it doesn't match any of the cases, use the value from localStorage
            if (localStorage.getItem('searchBarVisible') === 'false') {
                hideSearchBar();
            } else {
                showSearchBar();
            }
            break;
    }
}

// Check the state of the search bar when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', checkFragment);

// Also check the state of the search bar when the hash changes
window.addEventListener('hashchange', checkFragment);



