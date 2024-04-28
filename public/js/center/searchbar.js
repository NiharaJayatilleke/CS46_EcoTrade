// Function to show the search bar
function showSearchBar() {
    var searchBar = document.getElementById('center-dashboard-search');
    if (searchBar) {
        searchBar.style.display = 'block'; 
    }
}

// Function to hide the search bar
function hideSearchBar() {
    var searchBar = document.getElementById('center-dashboard-search');
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

        case '#recycle-content':
            showSearchBar();
            break; 
        case '#dashboard-content':
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



