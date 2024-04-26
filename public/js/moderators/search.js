// Function to show the search bar
function showSearchBar() {
    var searchBar = document.getElementById('mod-dashboard-search');
    if (searchBar) {
        searchBar.style.display = 'block'; 
    }
}

// Function to hide the search bar
function hideSearchBar() {
    var searchBar = document.getElementById('mod-dashboard-search');
    if (searchBar) {
        searchBar.style.display = 'none'; 
    }
}

// Function to check the URL fragment and show or hide the search bar accordingly
function checkSearch() {
    // Get the URL fragment
    var fragment = window.location.hash;

    // Show or hide the search bar based on the URL fragment
    switch (fragment) {
        case '#users-content':
        case '#secondhand-content':
        case '#secondhand-content':
        case '#recycle-content':
        case '#messages-content':
            showSearchBar();
            break;
        case '#dashboard-content':
        case '#activity-content':
        case '#ad-report-content':
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
document.addEventListener('DOMContentLoaded', checkSearch);

// Also check the state of the search bar when the hash changes
window.addEventListener('hashchange', checkSearch);

//search in users
// The Fuse.js options
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

// Assuming 'users' is your data array
var mod_fuse = new Fuse(users, choices);

// Function to perform search
function modDashSearch() {
    // Get the search query
    var query = document.getElementById('mod-dashboard-search').querySelector('input').value;

    // Clear the table body
    var tableBody = document.querySelector('#users-table tbody');
    tableBody.innerHTML = '';

    // If the search query is empty, repopulate the table with all users
    if (!query) {
        users.forEach(function(user) {
            var row = createRowUser(user); // Assuming createRowUser is a function that creates a row for a user
            tableBody.appendChild(row);
        });
        return;
    }

    // Perform the search
    var results = mod_fuse.search(query);

    // Add the results to the table body
    results.forEach(function(result) {
        var row = createRowUser(result.item);
        tableBody.appendChild(row);
    });
}

// Attach the function to the oninput event of the search bar
document.getElementById('mod-dashboard-search').querySelector('input').addEventListener('input', modDashSearch); 


// Function to create a row for a user or moderator
function createRowUser(item) {
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


//   const ctx = document.getElementById('myChart');

//   new Chart(ctx, {
//     type: 'bar',
//     data: {
//       labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
//       datasets: [{
//         label: '# of Votes',
//         data: [12, 19, 3, 5, 2, 3],
//         borderWidth: 1
//       }]
//     },
//     options: {
//       scales: {
//         y: {
//           beginAtZero: true
//         }
//       }
//     }
//   });



function searchHandler(){
    let pageHash=window.location.hash;
    console.log(pageHash);

}

var choices_preowned = {
    includeScore: true,
    threshold: 0.3,
    location: 0,
    distance: 100,
    maxPatternLength: 32,
    minCharLength: 1,
    keys: [
        "item_price"
    ]
};



var mod_preowned = new Fuse(preowned, choices_preowned);



function preownedDashSearch() {
    // Get the search query
    var query = document.getElementById('preowned-dashboard-search').querySelector('input').value;

    // Clear the table body
    var tableBody = document.querySelector('#ads-container');
    tableBody.innerHTML = '';

    // If the search query is empty, repopulate the table with all users
    if (!query) {
        preowned.forEach(function(preowned) {
            var row = createPreowned(preowned); // Assuming createRowUser is a function that creates a row for a user
            tableBody.appendChild(row);
        });
        return;
    }

    // Perform the search
    var results = mod_preowned.search(query);

    // Add the results to the table body
    results.forEach(function(result) {
        var row = createPreowned(result.item);
        tableBody.appendChild(row);
    });
}