// Function to show the search bar
function showModSearchBar() {
    var searchBar = document.getElementById('mod-dashboard-search');
    if (searchBar) {
        searchBar.style.display = 'block'; 
    }
}

// Function to hide the search bar
function hideModSearchBar() {
    var searchBar = document.getElementById('mod-dashboard-search');
    if (searchBar) {
        searchBar.style.display = 'none'; 
    }
}

// Function to check the URL fragment and show or hide the search bar accordingly
function checkModSearch() {
    // Get the URL fragment
    var fragment = window.location.hash;

    // Show or hide the search bar based on the URL fragment
    switch (fragment) {
        case '#users-content':
        case '#secondhand-content':
        case '#recycle-content':
            showModSearchBar();
            break;
        case '#dashboard-content':
        case '#activity-content':
        case '#reported-ads-content':
        case '#settings-content':
            hideModSearchBar();
            break;
        default:
            // If there's no fragment or it doesn't match any of the cases, use the value from localStorage
            if (localStorage.getItem('searchBarVisible') === 'false') {
                hideModSearchBar();
            } else {
                showModSearchBar();
            }
            break;
    }
}

// Check the state of the search bar when the DOM is fully loaded
document.addEventListener('DOMContentLoaded', checkModSearch);

// Also check the state of the search bar when the hash changes
window.addEventListener('hashchange', checkModSearch);

//search in users
// The Fuse.js choices
var choices = {
    includeScore: true,
    threshold: 0.3,
    location: 0,
    distance: 100,
    maxPatternLength: 32,
    minCharLength: 1,
    keys: [
        "username",
        "email",
        "number",
        "user_type",
        "created_at"
    ]
};

// Assuming 'moderators' is your data array
var fuseMod = new Fuse(moderators, choices);

// Function to perform search
function performModSearch() {
    // Get the search query
    var query = document.getElementById('mod-dashboard-search').querySelector('input').value;

    // Clear the table body
    var tableBody = document.querySelector('#mod-table tbody');
    tableBody.innerHTML = '';

    // If the search query is empty, repopulate the table with all moderators
    if (!query) {
        moderators.forEach(function(moderator) {
            var row = createRowModerator(moderator); // Assuming createRowModerator is a function that creates a row for a moderator
            tableBody.appendChild(row);
        });
        return;
    }

    // Perform the search
    var results = fuseMod.search(query);

    // Add the results to the table body
    results.forEach(function(result) {
        var row = createRowModerator(result.item);
        tableBody.appendChild(row);
    });
}

// Attach the function to the oninput event of the search bar
document.getElementById('mod-dashboard-search').querySelector('input').addEventListener('input', performModSearch); 

// Function to create a row for a user or moderator
function createRowModerator(item) {
    var row = document.createElement('tr');

    var usernameCell = document.createElement('td');
    usernameCell.textContent = item.username;
    row.appendChild(usernameCell);

    var emailCell = document.createElement('td');
    emailCell.textContent = item.email;
    row.appendChild(emailCell);

    var numberCell = document.createElement('td');
    numberCell.textContent = item.number;
    row.appendChild(numberCell);

    var userTypeCell = document.createElement('td');
    var userTypeSpan = document.createElement('span');
    userTypeSpan.classList.add('usertype'); // Add the 'usertype' class
    userTypeSpan.classList.add(item.user_type); // Add the user type as a class
    userTypeSpan.textContent = item.user_type;
    userTypeCell.appendChild(userTypeSpan);
    row.appendChild(userTypeCell);

    var createdAtCell = document.createElement('td');
    createdAtCell.textContent = item.created_at;
    row.appendChild(createdAtCell);

    return row;
}


// function searchHandler(){
//     let pageHash=window.location.hash;
//     console.log(pageHash);

// }

// var choices_preowned = {
//     includeScore: true,
//     threshold: 0.3,
//     location: 0,
//     distance: 100,
//     maxPatternLength: 32,
//     minCharLength: 1,
//     keys: [
//         "item_price"
//     ]
// };



// var mod_preowned = new Fuse(preowned, choices_preowned);



// function preownedDashSearch() {
//     // Get the search query
//     var query = document.getElementById('preowned-dashboard-search').querySelector('input').value;

//     // Clear the table body
//     var tableBody = document.querySelector('#ads-container');
//     tableBody.innerHTML = '';

//     // If the search query is empty, repopulate the table with all users
//     if (!query) {
//         preowned.forEach(function(preowned) {
//             var row = createPreowned(preowned); // Assuming createRowUsermodash is a function that creates a row for a user
//             tableBody.appendChild(row);
//         });
//         return;
//     }

//     // Perform the search
//     var resultsmod = mod_preowned.search(query);

//     // Add the resultsmod to the table body
//     resultsmod.forEach(function(result) {
//         var row = createPreowned(result.item);
//         tableBody.appendChild(row);
//     });
// }